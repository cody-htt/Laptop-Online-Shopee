<?php

// Fetch Product data from Database
class Users
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con))
            return null;
        $this->db = $db;
    }

    //fetch user data

    public function getData(string $userTable = 'user')
    {
        $query_user = $this->db->con->query("SELECT * FROM {$userTable}");
        $usersArray = array();

        //Import users to resultArray
        while ($item = mysqli_fetch_array($query_user, MYSQLI_ASSOC)) {
            $usersArray[] = $item;
        }

        //return user
        return $usersArray;
    }

    // //get user from cart table in database
    // public function getUserFromCart($item_id = null, $userTable = 'user')
    // {
    //     if (isset($item_id)) {
    //         //Query String
    //         $query_user = $this->db->con->query("SELECT * FROM {$userTable} WHERE item_id={$item_id}");

    //         $usersArray = array();

    //         //Import products to resultArray
    //         while ($item = mysqli_fetch_array($query_user, MYSQLI_ASSOC)) {
    //             $usersArray[] = $item;
    //         }

    //         //return product
    //         return $usersArray;
    //     }
    // }

}