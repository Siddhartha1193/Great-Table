<?php
/** 
 * 
 * Database.php
 * 
 * Database class provides various services for establishing and closing database connections, 
 * executing queries and returning results, and providing information about query
 * results.
 * 
 * 
 */ 
 
class Database {
    
    private $conn;
    private $result;
    private $isQueryExecuted;
    private $searchPhrase;
    private $rows;
    private $defaultQuery;  
    
    
    /**
     * Creates an instance of this class and populates fields so as to allow a 
     * database connection  to be created and used quickly
     */
    function __construct() {
        
        $this->conn = new mysqli("sfsuswe.com","f15g13","group13sql", "student_f15g13");
        $this->conn->select_db("student_f15g13"); 
        $this->isQueryExecuted = false;
        $this->rows=0;
        $this->defaultQuery = "SELECT * FROM Restaurant";     
    }
    
    /**
     * Retrieves the next result of a result set of an sql query to the database.
     * @return array containing the next row of results
     */
    function getNextRow() {       
        if ($this->isQueryExecuted) {
            $res = $this->result;
            $next = $res->fetch_array(MYSQLI_ASSOC);
            return $next; 
        }
        else {
            return;
        }
    }
    
    /**
     * Prepares a query for a search in circumstances where a prepared statement is used
     * @param String $qry search query
     * @param String $param the sanitized, validated search term entered by site visitor
     * @return preparedstatement for execution
     */
    
    function prepareSearchQuery($qry, $param) {
        $con = $this->conn;
        $ps = $con->prepare($qry);
        $ps->bind_param("sss", $param, $param, $param);
        return $ps;
    }
    
    /**
     * Executes a prepared statement and returns the result set bound to it
     * @param String $qry
     * @param String $param search parameter
     * @return prepared statement bound with result set of query
     */
    
    function getSearchResults($qry, $param) {
        $con = $this->conn;
        $ps = $con->stmt_init();
        $ps->prepare($qry);
        $ps->bind_param("sss", $param, $param, $param);
        $ps->execute();
        $result = $ps->bind_result();
        return $result; 
    }
    
    /**
     * Executes a prepared statement's query
     * @param prepared statement 
     * @return result set from prepared statement
     */
    function executeStatement($statement) {
        $con = $this->conn;
        $statement->execute();
        $result = $statement->get_result();
        return $result;
    }
     
    /**
     * Generates the result set from a query where a prepared statement is not used
     * @param String $qry
     * @return result set from query
     */
    function query($qry) {
        $con = $this->conn;
        $result = $con->query($qry);
        $this->result = $result;
        if (!$result) { 
            die('Invalid query. ');
            return null;
        }
        $this->isQueryExecuted=true; 
        return $result;
    }
    
    
    /**
     * The following functions execute queries to insert new records of the indicated
     * types into the database, and return a boolean representing the result of the insertion
     * 
     */
    function addUser($qry) {
        $con = $this->conn;
        $outcome = $con->query($qry);
        if ($outcome) {
            echo "<br><h3 style= \"margin-left:100px\">You have successfully registered!</h3><br>";
            return true;
        } 
        else {
            echo"<br>Unable to add user to database<br>";
            return false;
        }
    }
    
    function addRestaurant($qry) {
        $con = $this->conn;
        $outcome = $con->query($qry);
        if ($outcome) {
            return true;
        } 
        else {
            return false;
        }
    }
    
    function addReservation($qry) {
        $con = $this->conn;
        $outcome = $con->query($qry);
        if ($outcome) {
            echo "<br>Reservation successfully added to database<br>";
            return true;
        } 
        else {
            echo"<br>Unable to add reservation to database<br>";
            return false;
        }
    }
    
    /**
     * Obtains the cardinality of result set
     * @return number of rows in result set
     */
    function numberOfResults() {
        if ($this->isQueryExecuted == true) {
            return $this->result->num_rows;
        }
        else {
            return -1;
        }
    }
    
    function closeConn() {
        $this->conn->close();
        return;
    }
    
    function __destruct() {
        $this->closeConn();
    }
    
    function getConn() {
        return $this->conn;
    }

    function getResult() {
        return $this->result;
    }

    function getIsQueryExecuted() {
        return $this->isQueryExecuted;
    }

    function getSearchPhrase() {
        return $this->searchPhrase;
    }

    function getRows() {
        return $this->rows;
    }
    
    function getDefaultQuery() {
        return $this->defaultQuery; 
    }

    function setConn($conn) {
        $this->conn = $conn;
        return $this;
    }

    function setResult($result) {
        $this->result = $result;
        return $this;
    }

    function setIsQueryExecuted($isQueryExecuted) {
        $this->isQueryExecuted = $isQueryExecuted;
        return $this;
    }

    function setSearchPhrase($searchPhrase) {
        $this->searchPhrase = $searchPhrase;
        return $this;
    }

    function setRows($rows) {
        $this->rows = $rows;
        return $this;
    }
    
    function checkPassword($qry) {
        $con = $this->conn;
        $result = $con->query($qry);
        $this->result = $result;
        
    }
    
    
} // end Database class
