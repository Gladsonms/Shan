<?php
  //this class is part of the business layer it uses the DBAccess class
  require_once("DBAccess.php");
  class Item {
    //private properties
    private $_itemName;
    private $_itemId;
    private $_price;
    private $_db;
    //constructor sets up the database settings and creates a DBAccess object
    public function __construct() {
      //get database settings
      include "settings/db.php";
      try {
        //create database object
        $this->_db = new DBAccess($dsn, $username, $password);
      }
      catch (PDOException $e) {
        die("Unable to connect to database, ". $e->message());
      }
    }
    //set and get methods
    //get item ID, there is no set as the primary key should not be changed
    public function getitemId() {
      return $this->_itemId;
    }
    //get item name
    public function getitemName() {
      return $this->_itemName;
    }
    //get the price
    public function getPrice() {
      return $this->_price;
    }
    //get a item from the database for the id supplied
    public function getitem($id) {
      try {
        //connect to db
        $pdo = $this->_db->connect();
        //set up SQL and bind parameters
        $sql = "select item_id, item_name, item_saleprice from item where item_id =
        :itemId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':itemId', $id, PDO::PARAM_INT);
        //execute SQL
        $rows = $this->_db->executeSQL($stmt);
        //get the first row as it is a primary key there will only be one row
        $row = $rows[0];
        //populate the private properties with the retreived values
        $this->_itemId = $row["item_id"];
        $this->_itemName = $row["item_name"];
        $this->_price = $row["item_saleprice"];
      }
      catch (PDOException $e) {
        throw $e;
      }
    }
    //get all items limiting to 9 just for exercise purposes
    public function getitems() {
      try {
        //connect to db
        $pdo = $this->_db->connect();
        //set up SQL
        $sql = "select item_id, item_name, item_saleprice from item limit 9";
        $stmt = $pdo->prepare($sql);
        //execute SQL
        $rows = $this->_db->executeSQL($stmt);
        return $rows;
      }
      catch (PDOException $e) {
        throw $e;
      }
    }
  }
?>
