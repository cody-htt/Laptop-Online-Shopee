<?php

//Add item to cart with class Cart
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con))
            return null;
        $this->db = $db;
    }

    //Add item into cart table
    public function insertIntoDatabase($params = null, $cartTable = 'cart')
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $tableColumn = implode(',', array_keys($params));
                $columnValues = implode(',', array_values($params));

                //Query string
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $cartTable, $tableColumn, $columnValues);

                return $this->db->con->query($query_string);
            }
        }
    }

    public function addToCart($userid, $itemid)
    {
        $link = "http" . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

        if (isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            //Add item into cart
            $addResult = $this->insertIntoDatabase($params);
            if ($addResult) {
                //reload current page
                if ($link == "http://localhost:81/Project-php/Laptop%20Online%20Shopee/product.php?" . "item_id={$itemid}") {
                    header($link);
                } else {
                    header("Location:" . $_SERVER['PHP_SELF']);
                }
            }
        }
    }

    //Delete item from cart table
    public function deleteCart($item_id = null, $cartTable = 'cart')
    {
        if ($item_id != null) {
            $deleteResult = $this->db->con->query("DELETE FROM {$cartTable} WHERE item_id={$item_id}");
            if ($deleteResult) {
                //reload index.php
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $deleteResult;
        }
    }

    //Delete item from cart table
    public function deleteWishList($item_id = null, $wistListTable = 'wishlist')
    {
        if ($item_id != null) {
            $deleteResult = $this->db->con->query("DELETE FROM {$wistListTable} WHERE item_id={$item_id}");
            if ($deleteResult) {
                //reload index.php
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $deleteResult;
        }
    }

    //Calculate Subtotal
    public function calculateSubtotal($price_array)
    {
        if (isset($price_array)) {
            $sum = 0;
            foreach ($price_array as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    //get item_id from cart table
    public function getCartId($cartArray = null, $key = "item_id")
    {
        if ($cartArray != null) {
            $cart_id = array_map(function ($value) use ($key) {
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    // Move product to wish-list
    public function moveToWishList($item_id = null, $saveTable = "wishlist", $fromTable = "cart")
    {
        if ($item_id != null) {
            //Query string
            $query_string = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query_string .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";
            echo $query_string;
            //Execute multi query
            $execution_result = $this->db->con->multi_query($query_string);
            if ($execution_result) {
                //reload index.php
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $execution_result;
        }
    }
}