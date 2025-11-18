<?php
session_start();
include('database/dbconfig.php');

if($dbconfig)
{
  //echo "Databse Connected";
}
else
{
  header("Location: database/dbconfig.php");
}

if(!$_SESSION['username'])
{
  header('Location: login.php');
}

?>