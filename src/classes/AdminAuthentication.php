<?php
  //this class is part of the business layer it uses the DBAccess class
  require_once("DBAccess.php");
  class AdminAuthentication {
    //constants hold values that do not change
    const LoginPageURL = "adminlogin.php";
    const SuccessPageURL = "admin.php";
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
        $sql = "select password from adminuser where username=:username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username", $uname, PDO::PARAM_STR);
        //execute SQL as the class is static we need to use
        //the keyword self instead of this
        $hash = self::$_db->executeSQLReturnOneValue($stmt);
      }
      catch (PDOException $e) {
        throw $e;
      }
      if(password_verify($pword, $hash)) {
        //success password and username match
        $_SESSION["adminusername"] = $uname;
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
      unset($_SESSION["adminusername"]);
      //redirect the user to the login page
      header("Location: " . self::LoginPageURL);
      exit;
    }

    //check if user is logged in
    public static function protect() {
      if(!isset($_SESSION["adminusername"])) {
        //redirect the user to the login page
        header("Location: " . self::LoginPageURL);
        exit;
      }
    }

    //change password
    public static function changePassword($uname, $pword) {
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
      $username = $_SESSION["adminusername"];
      //change old password
      try {
        //connect to db as the class is static we need to use
        //the keyword self instead of this
        $pdo = self::$_db->connect();
        //set up SQL and bind parameters
        $sql = "update adminuser set password=:password where username=:username";
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
      return "The password has been changed.";
    }
  }
?>
