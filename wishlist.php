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
        if(isset($_POST["install"]))
        {
         $aid= $_POST["install"];
         
         $q= "INSERT INTO wishlist(userid,aid) values($uid,$aid)";
         $r=mysqli_query($conn,$q);
         if($r)
         {
          header("location: wishlist.php");
         }
        }
?>
<?php  if (isset($_SESSION['username'])) : ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>App Monster</title>
  <link rel="stylesheet" href="css/radio.css">
  <link href="css/font-awesome.css" rel="stylesheet"> 
</head>
<body>
  <a href="index.php" style="color: #1b6377;font-size: 24px;"><i class="fa fa-home w3-margin-right" style="/*font-size: 40px;*/"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php  
    if (isset($_SESSION['username'])){?>
       <a href="index.php?logout='1'" style="color: #379f85;font-size: 24px;"><i class="fa fa-sign-out w3-margin-right"></i>Logout</a>  <?php
      }
      else
      {
        ?>
        <a href="index.php?login='1'" style="color: #379f85;font-size: 24px;"><i class="fa fa-sign-in w3-margin-right"></i>Login</a><?php
      }
      ?>   
<div class="container">
  
<?php

  $v0 = "SELECT * FROM App_details where aid IN (SELECT aid FROM wishlist WHERE userid='$uid')";
  $v2 = mysqli_query($conn,$v0); 
  // echo mysqli_num_rows($v2);
  if(mysqli_num_rows($v2)>0)
  {
      ?>
      <h2>Wishlist: <?php echo $_SESSION["username"];?></h2>
      <form action="uninstall.php" method="POST" name="appd">
         <ul>
      <?php
    while($row=mysqli_fetch_assoc($v2))
    {
       ?>  
       <li>
        <input type="radio" id="<?php echo $row["aid"];?>"  name="appname" value="<?php echo $row["aid"];?>">
        <label for="<?php echo $row["aid"];?>">
          <?php echo $row["aname"];?> 
        </label>
        <div class="check"></div>
      </li>
      <?php
    }?>
    <input type="submit" style="height: 50px;color: black;margin: 35px;" value="UNINSTALL"></ul>
</form><?php
  }
  else
  {
    ?>
    <h2>NO APPS INSTALLED</h2><?php
  }
?>
      
</div>
</body>
</html>
<?php else: ?>
  <?php header('location: index.php');
  ?>
 <?php endif ?>
