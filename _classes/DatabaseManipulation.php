<?php
/**
 * @package Sandile Msentri Mazibuko 
 * @version 2.1v
 * @author Sandile Mazibuko <sandile@probansa.co.za>
 */
class DatabaseManipulation extends Clock
{   
    public $_DATABASE_SERVER;
    public $_DATABASE_USERNAME;
    public $_DATABASE_PASSWORD;
//    public $_DATABASE_NAME;
    
    function __construct()
    {
        parent::__construct(); 
        $this->_DATABASE_SERVER = DB_SERVER;
        $this->_DATABASE_USERNAME = DB_USERNAME;
        $this->_DATABASE_PASSWORD = DB_PASSWORD;
    }
    /**
     * 
     * @param string $tableName take table name
     * @param string $column take culumns you want to retrive from database
     * @param string $condition specify the condition of what you want to retive from database works as indexes
     * @return string results of requested information from the query
     */
    function select($tableName,$columns,$condition,$db = DB_NAME)
    {
        $sql = "SELECT ". $columns ." FROM ". $tableName;
        
        if($condition != NULL || !empty($condition))
        {
            $sql.= " WHERE ".$condition;
        }
        mysql_select_db($db,mysql_connect($this->_DATABASE_SERVER,  $this->_DATABASE_USERNAME,  $this->_DATABASE_PASSWORD));
        $results = mysql_query($sql)or die("ERROR ".mysql_error());
        return $results;
    }

     function select_limit($tableName,$columns,$condition,$db, $Limit)
    {
        $sql = "SELECT ". $columns ." FROM ". $tableName." LIMIT ".$Limit;
        
        if($condition != NULL || !empty($condition))
        {
            $sql.= " WHERE ".$condition." LIMIT ".$Limit;
        }
        mysql_select_db($db,mysql_connect($this->_DATABASE_SERVER,  $this->_DATABASE_USERNAME,  $this->_DATABASE_PASSWORD));
        $results = mysql_query($sql)or die("ERROR ".mysql_error());
        return $results;
    }
    
    /**
     * 
     * @param string $tableName take table name
     * @param string $column take culumns you want to save to database
     * @param string $values specifying the values you want to insert to a database
     * @return string of affected row if is greater than 0 than query executed else less than 0 query not executed
     */
    function insert($tableName,$columns,$values,$db = DB_NAME)
    {
        $sql = "INSERT INTO ".$tableName." ( ".$columns." ) VALUES ( ".$values." )";
        mysql_select_db($db,mysql_connect($this->_DATABASE_SERVER,  $this->_DATABASE_USERNAME,  $this->_DATABASE_PASSWORD));
        mysql_query($sql)or die("ERROR ".mysql_error());
        $results = mysql_affected_rows();
        return $results;
    }
    /**
     * 
     * @param string $tableName take table name 
     * @param string $columns set columns 
     * @param string $condition update where you specified
     * @return string of affected row if is greater than 0 than query executed else less than 0 query not executed
     */
    function update($tableName,$columns,$condition,$db = DB_NAME)
    {
        mysql_select_db($db,mysql_connect($this->_DATABASE_SERVER,  $this->_DATABASE_USERNAME,  $this->_DATABASE_PASSWORD));
        $sql = "UPDATE ".$tableName." SET ".$columns." WHERE ".$condition;
        mysql_query($sql)or die("ERROR ".mysql_error());
        $results = mysql_affected_rows();
        return $results;
    }
    /**
     * 
     * @param string $tableName take table name
     * @param string $condition specify what to delete
     * @return @return string of affected row if is greater than 0 than query executed else less than 0 query not executed
     */
    function delete($tableName,$condition,$db = DB_NAME)
    {
        mysql_select_db($db,mysql_connect($this->_DATABASE_SERVER,  $this->_DATABASE_USERNAME,  $this->_DATABASE_PASSWORD));
        $sql = "DELETE FROM ".$tableName." WHERE ".$condition;
        mysql_query($sql)or die("ERROR ".mysql_error());
        $results = mysql_affected_rows();
        return $results;
    }
    /**
     * 
     * @param String $tableName to be passed
     * @param String $condition state what you looking for 
     * @return String Array of results found on database
     */
    function check($tableName,$condition,$db = DB_NAME)
    {
        mysql_select_db($db,mysql_connect($this->_DATABASE_SERVER,  $this->_DATABASE_USERNAME,  $this->_DATABASE_PASSWORD));
        $sql = "SELECT * FROM ".$tableName." WHERE ".$condition;
        mysql_query($sql)or die("ERROR ".mysql_error());
        $results = mysql_affected_rows();
        return $results;
    }
    /**
     * 
     * @param type $tableName
     * @param type $condition
     * @param type $db
     * @return type
     */
    function check2($tableName,$condition,$db = DB_NAME)
    {
        mysql_select_db($db,mysql_connect($this->_DATABASE_SERVER,  $this->_DATABASE_USERNAME,  $this->_DATABASE_PASSWORD));
        $columns = "*";
        $select = $this->select($tableName, $columns, $condition, $db);
        $affected_rows = mysql_num_rows($select);
        return $affected_rows;
    }
}

?>
