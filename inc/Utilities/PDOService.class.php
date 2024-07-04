<?php

class PDOService {

    //hostname
    private $_host =  DB_HOST;
    //username
    private $_user = DB_USER;
    //password
    private $_passwd = DB_PASS;
    //database name
    private $_dbname = DB_NAME;

    //Store an instance of PDO
    private $_dbh;

    //Store errors
    private $_error;

    //Class name for PDO
    private $_className;

    //Store Prepared Statement
    private $_pstmt;

    //Instantiate this is our constructor it makes the PDO go.
    public function __construct(string $className)  {

        $this->_className = $className;

        //Build the DSN
        $dsn = 'mysql:host='. $this->_host . ';dbname='. $this->_dbname;
        //mysql:host=localhost;dbname=week6demo

        //Set some PDO options
        $options = array (PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        try {
            
            $this->_dbh = new PDO($dsn, $this->_user, $this->_passwd, $options);
             
        } catch (PDOException $pe) {
            echo $pe->getMessage();
            error_log($pe->getMessage());
        }

        }
//Store the query for later execution, this will create a type PreparedStatement (Pdo) and save it in the class
    public function query(string $query)    {
        $this->_pstmt = $this->_dbh->prepare($query);
    }

    //Bind!
    public function bind($param, $value, $type = null)  {
        //Check if the type is nuyll
        if (is_null($type)) {
            switch (true)   {
                //Check for integer
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                default:
                    $type = PDO::PARAM_STR;
                break;
            }
        }

        //Assemble the bind value and add it to the prepared statement
        $this->_pstmt->bindValue($param, $value, $type);
    }

    //Execute the prepared statement
    public function execute()   {
        return $this->_pstmt->execute();
    }

    public function resultSet()     {
        return $this->_pstmt->fetchAll(PDO::FETCH_CLASS, $this->_className);
    }

    public function rowCount() : int {
        return $this->_pstmt->rowCount();
    }

    public function lastInsertId(): int {
        return $this->_dbh->lastInsertId();
    }
}