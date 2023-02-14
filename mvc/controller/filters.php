<?php
$br = '<br>';
$brr = '<br><br>';
$space = ' ';

filter_var(    true, FILTER_VALIDATE_BOOLEAN); // true
filter_var(    'true', FILTER_VALIDATE_BOOLEAN); // true
filter_var(         1, FILTER_VALIDATE_BOOLEAN); // true
filter_var(       '1', FILTER_VALIDATE_BOOLEAN); // true

filter_var(   false, FILTER_VALIDATE_BOOLEAN); // false
filter_var(   'false', FILTER_VALIDATE_BOOLEAN); // false
filter_var(         0, FILTER_VALIDATE_BOOLEAN); // false
filter_var(       '0', FILTER_VALIDATE_BOOLEAN); // false
filter_var(        '', FILTER_VALIDATE_BOOLEAN); // false
filter_var(      null, FILTER_VALIDATE_BOOLEAN); // false
?>