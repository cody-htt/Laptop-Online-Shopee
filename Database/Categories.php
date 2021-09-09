<?php

// Fetch Product data from Database
class Categories
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con))
            return null;
        $this->db = $db;
    }

    //fetch product data
    public function getCateData(string $cateTable = 'category'): array
    {
        $query_product = $this->db->con->query("SELECT * FROM {$cateTable}");
        $cateArray = array();

        //Import products to resultArray
        while ($item = mysqli_fetch_array($query_product, MYSQLI_ASSOC)) {
            $cateArray[] = $item;
        }

        //return product
        return $cateArray;
    }

}