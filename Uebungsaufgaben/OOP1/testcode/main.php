<?php
/**
 * Created by PhpStorm.
 * User: dev
 * Date: 9/5/18
 * Time: 11:50 AM
 */

$birthday = DateTime::createFromFormat("Y-m-d", "2001-05-50");
$date = $birthday->format("Y-m-d");
$isValid = validateDate()
if () {
    throw new Exception("The date is invalid");
}
function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
