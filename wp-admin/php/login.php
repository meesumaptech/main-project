<?php
include("../config/classes.php");

$class = new users(); //class object

if(isset($_POST['btnlogin']))
{
    $name = $_POST['username'];
    $pass = SHA1($_POST['password']);

    $class->getusers($name,$pass); //connecting class with login.php and accessing variables with parameters
}
?>