<?php
$conn = mysqli_connect("localhost", "root", "", "calatorii");

        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }


        $id =  $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $email =  $_REQUEST['email'];
        $password = $_REQUEST['password'];



        $sql = "INSERT INTO registration  VALUES ('$id',
            '$name','$email','$password')";

        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully."
                . " Please browse your localhost php my admin"
                . " to view the updated data</h3>";

            echo nl2br("\n$id\n $name\n "
                . "$email\n $password\n ");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }


        mysqli_close($conn);
        ?>

