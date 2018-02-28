<?php
        $username = "root";
        $servername = "localhost";
        $password = "krishna";
        $dbname = "play_store";
        $conn = mysqli_connect($servername , $username , $password , $dbname);
        if(!$conn)
        {
          die("oops connection failed :".mysqli_connect_error());
        }
        echo $_POST["appname"];

?>