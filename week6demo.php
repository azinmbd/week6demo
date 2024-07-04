<?php

require_once("inc/config.inc.php");

require_once("inc/Entities/Shoe.class.php");

require_once("inc/Utilities/Page.class.php");
require_once("inc/Utilities/ShoesDAO.class.php");
require_once("inc/Utilities/PDOService.class.php");


//Intialize the DAO
ShoesDAO::initialize();

//Set the title
Page::setTitle("Week 5 Demo - Sam Hill - 123456789");
//Display the page.
Page::header();

Page::showError(array("Error 1","Error 2","Error 3"));

if (isset($_POST) 
    && !empty($_POST))   {

    $s = new Shoe();
        $s->setBrand($_POST["brand"]);
        $s->setSize((float)$_POST["size"]);
        //Cleared checkbox no data so ..
        if (!isset($_POST["smells"]))   {
            $_POST["smells"] = false;
        }
        $s->setSmells((bool)$_POST["smells"]);

        $s->setType($_POST["type"]);
        $s->setColor($_POST["color"]);

    //Create the shoe int he database
    ShoesDAO::createShoe($s);

} else {
//Get request ... 

//Do something if there is an action
    if (isset($_GET["action"])) {
        switch ($_GET["action"])    {
            case "delete":
                //Do delete things...
                ShoesDAO::deleteShoe($_GET["id"]);
            break;
        }
    }

    Page::shoeForm();



}

    $shoes = ShoesDAO::getShoes();
    //Show the shoes
    Page::showShoes($shoes);
Page::footer();

?>