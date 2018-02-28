<?php
session_start();
        $username = "root";
        $servername = "localhost";
        $password = "krishna";
        $dbname = "play_store";
        $conn = mysqli_connect($servername , $username , $password , $dbname);
        if(!$conn)
        {
          die("oops connection failed :".mysqli_connect_error());
        }
        $gid= $_POST['genredrop'];
        $aname= $_POST['app'];
        $dname=$_POST['developer'];

?>
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
       <a href="index.php?logout='1'" style="color: #379f85;font-size: 24px;"><i class="fa fa-sign-out w3-margin-right"></i>Logout</a> <li><a href="wishlist.php" ><i class="fa fa-heart w3-margin-right"></i></a> </li> <?php
      }
      else
      {
        ?>
        <a href="index.php?login='1'" style="color: #379f85;font-size: 24px;"><i class="fa fa-sign-in w3-margin-right"></i>Login</a><?php
      }
      ?>   
<div class="container">
  
<?php
if($gid>0)
{
    $v0 = "SELECT * FROM App_details";
    $v1 = "SELECT * FROM genre WHERE gid='$gid'";
    $v2 = mysqli_query($conn,$v1);
    $g=mysqli_query($conn,$v1);
    $r=mysqli_fetch_assoc($g);
    $gname=$r["gname"];
    $v3 = mysqli_query($conn,$v0); 
    if(mysqli_num_rows($v2)>0)
    {
        ?>
        <h2>Genre: <?php echo $gname;?></h2>
        <form action="details.php" method="POST" name="appd">
           <ul>
        <?php
      while($row=mysqli_fetch_assoc($v2))
      {
        $id=$row["gid"];
        while($row1 = mysqli_fetch_assoc($v3))
        {
          if($row1["gid"]==$id)
          {
            
           ?>  <li><input type="radio" id="<?php echo $row1["aid"];?>"  name="appname" value="<?php echo $row1["aname"];?>"><label for="<?php echo $row1["aid"];?>"><?php echo $row1["aname"];?> </label>
    <div class="check"></div>
  </li><?php
          }
        }
      }?>
      <input type="submit" style="height: 50px;color: black;margin: 35px;" value="submit"></ul>
</form>
<?php
    }
}
?>

<?php
if(strlen($aname)>0)
{
    $v1 = "SELECT * FROM App_details WHERE aname = '$aname'";
    $v2 =  mysqli_query($conn,$v1);
    $row = mysqli_fetch_assoc($v2);
    if(strlen($aname))
    {
      ?>
      <form action="details.php" method="POST">
        <ul><?php
    if(mysqli_num_rows($v2)>0)
    {
       ?>
     <h2>App you Searched For:</h2><?php
      ?>
      <li><input type="radio" name="appname" id="<?php echo $row["aid"];?>" value="<?php echo $row["aname"];?>"><label for="<?php echo $row["aid"];?>"><?php echo $row["aname"];?></label><div class="check"></div></li>
      <li></li><?php
      $gid=$row["gid"];
      $v3= "SELECT * FROM  App_details WHERE gid='$gid' and aname!='$aname'";
      ?>
     <h2>Similar Apps:</h2><?php
    }
    else
    {
      ?>
     <h2>NO such app exists. Please see similar Apps.</h2><?php
      $v3="SELECT * from App_details where aname like '%$aname%' and aname!='$aname'";
    }
     $v4= mysqli_query($conn,$v3);
      while($row = mysqli_fetch_assoc($v4))
      {?><li><input type="radio" id="<?php echo $row["aid"];?>" name="appname" value="<?php
        echo $row["aname"];?>"><label for="<?php echo $row["aid"];?>"><?php
        echo $row["aname"];?></label><div class="check"></div></li><?php
      }
      ?>
    
      <input type="submit" style="height: 50px;color: black;margin: 35px;" value="submit"></ul></form><?php
    }
}
?>

<?php
if(strlen($dname)>0)
{
    
    $v0 = "SELECT * FROM Developer WHERE dname='$dname'";
    $v1 = "SELECT * FROM App_details";
    $v2 = mysqli_query($conn,$v1); 
    $v3 = mysqli_query($conn,$v0);
    if(mysqli_num_rows($v3)>0)
    {
      ?>
      <h2>Developer Name: <?php echo $dname; ?></h2>
      <?php
      while($row=mysqli_fetch_assoc($v3))
      {
        $id=$row["did"];
        ?><form action="details.php" method="POST"><ul><?php
        while($row1 = mysqli_fetch_assoc($v2))
        {
          if($row1["did"]==$id)
          {
            ?><li><input type="radio" id="<?php echo $row1["aid"];?>" name="appname" value="<?php echo $row1["aname"]; ?>"><label for="<?php echo $row1["aid"];?>"><?php 
            echo $row1["aname"]; ?></label><div class="check"></div></li>
            <?php
          }
        }
      }?>
      <input type="submit" style="height: 50px;color: black;margin: 35px;" value="submit"></ul></form><?php
    }
    else
    {
      ?><h2>Sorry no such developer</h2><?php
    }
}
?>
</div>
</body>
</html>

