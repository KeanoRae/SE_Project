<?php
session_start();
include('include/database.php');
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: include/database.php");
}
?>