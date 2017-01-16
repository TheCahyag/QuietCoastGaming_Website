<?php
/**
 * File: getNameForFile.php
 * @author: Brandon Bires-Navel (brandonnavel@outlook.com)
 * Takes a name and turns it into a file friendly name
 */

/**
 * @param $name - name that the file has to represent
 * @param $extension - extension of the file e.g. '.php', '.txt'
 * giving no file extension will result in the name having no file
 * extension.
 * @return String - the edited name
 */
function nameMe($name, $extension){
    $fileName = str_replace(" ", "_", $name);
    $fileName = str_replace(".", "-", $fileName);
    $fileName = str_replace(":", "_", $fileName);
    $fileName = str_replace("/", "_", $fileName);
    $fileName = str_replace("\\", "_", $fileName);
    $fileName = str_replace("*", "_", $fileName);
    $fileName = str_replace("<", "_", $fileName);
    $fileName = str_replace(">", "_", $fileName);
    $fileName = str_replace("'", "", $fileName);
    $fileName = str_replace("\"", "", $fileName);
    return $fileName.$extension;
}