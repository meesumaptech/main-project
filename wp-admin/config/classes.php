<?php

trait connection
{
    protected $con;

    function database()
    {
        $this->con = mysqli_connect("localhost","root","","main-project");

        if($this->con == TRUE)
        {
           /*  echo "Connected"; */
            return $this->con;
        }
    }
}

class users
{
    use connection;

    function __construct()
    {
        $this->database();
    }

    function getusers($name , $pass)
    {
        $query = mysqli_query($this->con,"select * from users where username='$name' AND pass='$pass' ");

        $result = mysqli_num_rows($query);

        $fetchdata = mysqli_fetch_array($query);

        if($result>0)
        {
            session_start();
            $_SESSION['name']=$fetchdata["username"];
            header("Location:../index");
        }
        else
        {
            echo "Failed";
        }

    }
}

?>