<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 04/01/2017
 * Time: 14:46
 */

class Log
{
    public static function writeCSV($e){
        $date = new DateTime();
        $log = array(
            "date" => $date -> format('Y-m-d h:i:s'),
            "message" => $e
        );
        $log_file = fopen("./logs/logs_".$date -> format ('d-m-y').".csv", "a+");
        fputcsv($log_file, $log, ",");
        fclose($log_file);
    }
}
