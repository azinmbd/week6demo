<?php

class CSVParser {

    public static function parseShoes($csvData) : array     {

        //An array to store
        $allShoes = array();


        //An array where each line is an element
        $lines = explode("\n",$csvData);

        //Start at line 1, thats where the data begins.
        for ($i = 1; $i < count($lines); $i++)  {

            //Get an array of all the columns
            $cols = explode(",",$lines[$i]);

            //brand,size,smells,color,type
            try {
                if (count($cols) != 5)  {
                    throw new Exception("Error parsing ". CSV_FILE . " on line $i ");
                } else {
                    $s = new Shoe();

                    $s->setBrand(htmlentities(trim($cols[0])));
                    $s->setSize((float)trim($cols[1]));
                    if ($cols[2] == "1")   {
                        $s->setSmells(true);
                    } else {
                        $s->setSmells(false);
                    }
                    $s->setColor(htmlentities(trim($cols[3])));
                    $s->setType(htmlentities(trim($cols[4])));

                    $allShoes[] = $s;
                }
            } catch (Exception $pe) {
                Page::showError($pe->getMessage());
                error_log($pe->getMessage(),3,ERROR_LOG);
            }



        }

        return $allShoes;

    }

}

?>