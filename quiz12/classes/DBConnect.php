<?php
require_once("Constants.php");
class DBConnect{
    private static $conn;

    private function __construct(){}

    public static function getInstance(){
        if(self::$conn != null){
            return self::$conn;
        }

        self::$conn = new mysqli(Constants::SERVER_NAME, Constants::DB_USERNAME, Constants::DB_PASSWORD, Constants::DB_NAME);
        if (self::$conn->connect_error) {
            return null;
        }else{
            return self::$conn;
        }
    }


}