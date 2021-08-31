<?php

class DBController
{
    //Database Connection Properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'laptop-store';

    // connection property
    public $con = null;

    //Initialize Constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error) {
            echo "Fail" . $this->con->connect_error;
        }
        mysqli_set_charset($this->con,'utf8');
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    //Closing Database Connection
    protected function closeConnection()
    {
        if ($this->con != null) {
            $this->con->close();
            $this->con = null;
        }
    }
}
