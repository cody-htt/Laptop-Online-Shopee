<?php

// Fetch Product data from Database
class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con))
            return null;
        $this->db = $db;
    }

    //fetch product data

    public function getData(string $productTable = 'product')
    {
        $query_product = $this->db->con->query("SELECT * FROM {$productTable}");
        $productsArray = array();

        //Import products to resultArray
        while ($item = mysqli_fetch_array($query_product, MYSQLI_ASSOC)) {
            $productsArray[] = $item;
        }

        //return product
        return $productsArray;
    }

    public function getItemBrand(string $categoryTable = 'category')
    {
        $query_brand = $this->db->con->query("SELECT * FROM {$categoryTable}" );
        $categoryArray = array();

        //Import brand_name to categoryArray
        while ($item = mysqli_fetch_array($query_brand, MYSQLI_ASSOC)){
            $categoryArray[] = $item;
        }

        return $categoryArray;
    }

    //get product from cart table in database
    public function getProductFromCart($item_id = null, $productTable = 'product')
    {
        if (isset($item_id)) {
            //Query String
            $query_product = $this->db->con->query("SELECT * FROM {$productTable} WHERE item_id={$item_id}");

            $productArray = array();

            //Import products to resultArray
            while ($item = mysqli_fetch_array($query_product, MYSQLI_ASSOC)) {
                $productArray[] = $item;
            }

            //return product
            return $productArray;
        }
    }

}