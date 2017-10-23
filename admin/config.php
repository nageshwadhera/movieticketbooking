<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
$conn=mysql_connect("localhost","root","");
$conn=mysql_select_db("cinepolis");
if(!$conn){
    die("database error");
}
require 'functions.php';
$approot = substr(dirname(__FILE__),strlen($_SERVER['DOCUMENT_ROOT']));
$app= str_replace('\\','/',$approot);
$http=isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
$url=$http.$_SERVER['HTTP_HOST'].$app.'/';


define('APP_PATH',$url);
define('CSS','css/');
define('JS','js/');
define('IMG','img/');