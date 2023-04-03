<?php
namespace Model;
/**
 * @file
 * It contains the functions related to connections.
 */

 /**
 * Class that handles the connection  related operation of MVC project.
 */
class connection
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "kalash72";
    public $dbname = "Goodreaders";
    public $conn;

      // Constructor
    function __construct()
    {
    
        $this->conn = new \mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );
        if ($this->conn->connect_error) {
            die("Connection failed: "
                . $this->conn->connect_error);
        } else {
        }
    }
}
?>