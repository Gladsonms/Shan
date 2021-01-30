<?php
  //this class is part of the business layer it uses the DBAccess class
  require_once("DBAccess.php");
  class Authentication {
    //constants hold values that do not change
    const LoginPageURL = "login.php";
    const SuccessPageURL = "login-success.php";
    private static $_db;

    //user login
    public static function login($uname, $pword) {
      $hash = "";
      //get database settings
      include "settings/db.php";
      try {
        //create database object, as the class is static we need to use
        //the keyword self instead of this
        self::$_db = new DBAccess($dsn, $username, $password);
      }
      catch (PDOException $e) {
        die("Unable to connect to database, ". $e->message());
      }
      //check if user exists in database
      try {
        //connect to db as the class is static we need to use
        //the keyword self instead of this
        $pdo = self::$_db->connect();
        //set up SQL and bind parameters
        $sql = "select user_id, password from user where username=:username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username", $uname, PDO::PARAM_STR);
        //execute SQL as the class is static we need to use
        //the keyword self instead of this
        $rows = self::$_db->executeSQL($stmt);
        $row = $rows[0];
        $hash = $row["password"];
        $_SESSION["user_id"] = $row["user_id"];
      }
      catch (PDOException $e) {
        throw $e;
      }
      if(password_verify($pword, $hash)) {
        //success password and username match
        $_SESSION["username"] = $uname;
        //redirect the user to the home page
        header("Location: " . self::SuccessPageURL);
        exit;
      }
      else {
        return false;
      }
    }

    //log user out
    public static function logout() {
      //remove username from the session
      unset($_SESSION["username"]);
      //redirect the user to the login page
      header("Location: " . self::LoginPageURL);
      exit;
    }

    //check if user is logged in
    public static function protect() {
      if(!isset($_SESSION["username"])) {
        //redirect the user to the login page
        header("Location: " . self::LoginPageURL);
        exit;
      }
    }

    //create a new user
    public static function createUser($uname, $pword) {
      //hash the password
      $hash = password_hash($pword, PASSWORD_DEFAULT);
      //get database settings
      include "settings/db.php";
      try {
        //create database object, as the class is static we need to use
        //the keyword self instead of this
        self::$_db = new DBAccess($dsn, $username, $password);
      }
      catch (PDOException $e) {
        die("Unable to connect to database, ". $e->message());
      }
      //add user to database
      try {
        //connect to db as the class is static we need to use
        //the keyword self instead of this
        $pdo = self::$_db->connect();
        //set up SQL and bind parameters
        $sql = "insert into user(username, password) values(:username, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username", $uname, PDO::PARAM_STR);
        $stmt->bindParam(":password", $hash, PDO::PARAM_STR);
        //execute SQL as the class is static we need to use
        //the keyword self instead of this
        $result = self::$_db->executeNonQuery($stmt);
      }
      catch (PDOException $e) {
        throw $e;
      }
      return "New user added, please sign in.";
    }
  }
?>
