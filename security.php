<?php

session_start();

include('include/dbconfig.php');

if($dbconfig)
{

}
else
{
header("Location: include/dbconfig.php");
}

if(!$_SESSION['username'])
{
	header("Location: index.php");
}



?>