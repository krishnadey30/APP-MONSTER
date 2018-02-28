<?php
    session_start();
    $username = "root";
    $servername = "localhost";
    $password = "krishna";
    $dbname = "play_store";
    $conn = mysqli_connect($servername , $username , $password , $dbname);
    $uid= $_SESSION["userid"];
    if(!$conn)
    {
      die("oops connection failed :".mysqli_connect_error());
    }
    if(isset($_POST["appname"]))
    {
        $aid=$_POST["appname"];
        $q="DELETE FROM wishlist WHERE userid='$uid' and aid='$aid'";
        mysqli_query($conn,$q);
        header('location: wishlist.php');        
    }
?>