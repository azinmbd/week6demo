<?php

class FileAgent {


    //This function will append to the end of the CSV file.
    public static function appendCSVFile( string $contents)  {

        try {
            //File Handle
            $fh = fopen(CSV_FILE,'a');

            if (!$fh)   {
                throw new Exception("We couldnt open ".CSV_FILE." for writing");
            }

            //Do stufff
            fwrite($fh,$contents);
            //Close 
            fclose($fh);

        } catch (Exception $fe) {
            echo $fe->getMessage();
            error_log($fe->getMessage(),3,ERROR_LOG);
        }

    }

    public static function readFile() : string {

        try {

        $fh = fopen(CSV_FILE,'r');
        $fileContents = fread($fh,filesize(CSV_FILE));
        fclose($fh);

        } catch (Exception $fe) {
            echo $fe->getMessage();
            error_log($fe->getMessage(),3,ERROR_LOG);
        }

        return $fileContents;
    }
}