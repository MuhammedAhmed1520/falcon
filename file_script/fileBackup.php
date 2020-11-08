<?php

/**
 * @author  muhammadawd
 * backup required files from storage to directory
 * 22 April 2019
 *
 */

/**
 * here is current storage path where required data exist
 */
$storage_directory = 'storage/';

/**
 * here is current company path where required data to be copied
 */
$destination_directory = 'company/';

/**
 * data file
 * logger for not found files data
 */
$file = 'files.csv';
$log = 'log.csv';

/**
 * read data from csv file
 */
$file_data = readCSV($file, ',');

foreach ($file_data as $row) {
    $file_name = $row[3];
    if (file_exists($storage_directory . $file_name)) {

        /**
         * copy file if exist
         */
        @copy($storage_directory . $file_name, $destination_directory . $file_name);

    } else {

        /**
         * log file name if not exist
         */
        writeCSV($log, ',', $file_name);
    }


}

echo 'Copied';

//////////////////// CSV FUNCTIONS IMPLEMENTATION ///////////////////////


/**
 * @param $csvFile
 * @param $delimiter
 * @return array
 */
function readCSV($csvFile, $delimiter)
{
    $file_handle = fopen($csvFile, 'r');
    while (!feof($file_handle)) {
        $line_of_text[] = fgetcsv($file_handle, 0, $delimiter);
    }
    fclose($file_handle);
    return $line_of_text;
}

/**
 * @param $csvFile
 * @param $delimiter
 * @param $line
 * @return bool
 */
function writeCSV($csvFile, $delimiter, $line)
{

    $file = fopen($csvFile, "a");
    fputcsv($file, explode($delimiter, $line));
    fclose($file);
    return true;
}