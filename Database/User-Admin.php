<?php

// Fetch Product data from Database
class UsersAdmin
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con))
            return null;
        $this->db = $db;
    }

    //fetch user data

    public function getData(string $userTable = 'admin')
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


}