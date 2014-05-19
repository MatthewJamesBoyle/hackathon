<?php
mysql_connect("localhost", "root", "")
or die("Could not connect:" .mysql_error());
mysql_select_db("car");
function flatten($array, $prefix = '') {
    $result = array();
    foreach($array as $key=>$value) {
        if(is_array($value)) {
            $result = $result + flatten($value, $prefix . $key . '.');
        }
        else {
            $result[$prefix . $key] = $value;
        }
    }
    return $result;
}
?>