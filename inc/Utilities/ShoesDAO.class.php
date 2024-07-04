<?php

class ShoesDAO  {

    //A variable to store and instance of the PDO service
    private static $_db;
    
    //Initialize YOU MUST ALWAYS INITILIZE
    public static function initialize()  {
        self::$_db = new PDOService("Shoe");
    }

    static function getShoes() : Array  {
       $sql = "SELECT * FROM shoe;";
       //Query

       self::$_db->query($sql);
       //Bind (optional)
       //Execute
       self::$_db->execute();
       //Return the results
       return self::$_db->resultSet();

    }

    static function deleteShoe(int $idToDelete) {
        $sql = "DELETE FROM shoe WHERE id = :id";

        //Query
        self::$_db->query($sql);
        //Bind
        self::$_db->bind(":id", $idToDelete);
        //Execute
        self::$_db->execute();
        //Return the results
        return self::$_db->rowCount();
    }

    static function createShoe(Shoe $newShoe)   {
        $sql = "INSERT INTO shoe (brand,type,size,smells,color)
            VALUES (:brand,:type,:size,:smells,:color);";

        //Query
        self::$_db->query($sql);

        //Bind
        self::$_db->bind(":brand",$newShoe->getBrand());
        self::$_db->bind(":type",$newShoe->getType());
        self::$_db->bind(":size",$newShoe->getSize());
        self::$_db->bind(":smells",$newShoe->getSmells());
        self::$_db->bind(":color",$newShoe->getColor());

        //Execute
        self::$_db->execute();
        //Return Results

        return self::$_db->lastInsertId();
    }
}

?>