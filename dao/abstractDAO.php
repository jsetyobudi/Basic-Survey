<!--
* Basic Survey Website using php
* by Johan Setyobudi
* jsetyobudi@gmail.com
* sety0002@algonquinlive.com 
* April 11, 2016
-->
<?php

//Used to throw mysqli_sql_exceptions for database errors
mysqli_report(MYSQLI_REPORT_STRICT);

class abstractDAO {
    protected $mysqli;
    
  
    protected static $DB_HOST = "127.0.0.1:3307";
    protected static $DB_USERNAME = "survey";
    protected static $DB_PASSWORD = "password";
    protected static $DB_DATABASE = "survey";
    
    /*
     * Constructor. Instantiates new MySQLi object.
     * Throws an exception if any issue connecting
     * to the database.
     */
    function __construct() {
        try{
            $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME, 
                self::$DB_PASSWORD, self::$DB_DATABASE);
        }catch(mysqli_sql_exception $e){
            throw $e;
        }
    }
    
    public function getMysqli(){
        return $this->mysqli;
    }
}
?>