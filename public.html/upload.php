<?php
require 'firebaseLib.php';
const DEFAULT_URL = 'https://lilygo-bracelet-default-rtdb.firebaseio.com/';
const DEFAULT_TOKEN = 'F6P9ct88fMXhkNeIEQwljRpFi28JMggLsXSlX2Ui';
$DEFAULT_PATH = '/data/gps';
$a=$_POST["gps"];
$_devicestatus= array(
    'a' => $a 
);
$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);
$firebase->set($DEFAULT_PATH,/*$_devicestatus*/ '200'); // for a new entry everytime 
//echo $firebase->get($DEFAULT_PATH, $_devicestatus);
?>