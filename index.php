<!DOCTYPE HTML>
<html>
<head>
<title>APP MOSTER</title>
</head>
<body>
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
  ?>


<!-- By genre List of all apps-->
<form  action="" method="post">
      enter genre : <input type="text" name="genre">
</form>
<?php
$gname = $_POST["genre"];

$v0 = "SELECT * FROM App_details";
$v1 = "SELECT * FROM genre WHERE gname='$gname'";
$v2 = mysqli_query($conn,$v1);
$v3 = mysqli_query($conn,$v0);

if(mysqli_num_rows($v2)>0)
{
  while($row=mysqli_fetch_assoc($v2))
  {
    $id=$row["gid"];
    while($row1 = mysqli_fetch_assoc($v3))
    {
      if($row1["gid"]==$id)
      {
        echo $row1["aname"];?><br><?php
      }
    }
  }
}
?>


<!-- By Developer name  List of all apps-->
<form  action="" method="post">
      enter developer name : <input type="text" name="dname">
</form>
<?php
$dname = $_POST["dname"];

$v0 = "SELECT * FROM Developer WHERE dname='$dname'";
$v1 = "SELECT * FROM App_details";
$v2 = mysqli_query($conn,$v1); 
$v3 = mysqli_query($conn,$v0);
if(mysqli_num_rows($v3)>0)
{
  while($row=mysqli_fetch_assoc($v3))
  {
    $id=$row["did"];
    while($row1 = mysqli_fetch_assoc($v2))
    {
      if($row1["did"]==$id)
      {
        echo $row1["aname"]; ?><br><?php
      }
    }
  }
}
?>

<!-- By app name List of all apps -->
<form  action="" method="post">
      enter app name : <input type="text" name="aname">
</form>
<?php
$aname = $_POST["aname"];

$v1 = "SELECT * FROM App_details WHERE aname = '$aname'";
$v2 =  mysqli_query($conn,$v1);
$row = mysqli_fetch_assoc($v2);
if(strlen($aname))
{
if(mysqli_num_rows($v2)>0)
{
  echo "Main app : ".$row["aname"];
  $gid=$row["gid"];
  $v3= "SELECT * FROM  App_details WHERE gid='$gid'";
  $v4= mysqli_query($conn,$v3);
  while($row = mysqli_fetch_assoc($v4))
  {
    echo $row["aname"];?><br><?php
  }
  
}
else
{
  echo "NO such app exists. Please see similar Apps.";?><br><?php
  $v3="SELECT * from App_details where aname like '%$aname%' and aname!='$aname'";
  $v4= mysqli_query($conn,$v3);
  while($row = mysqli_fetch_assoc($v4))
  {
    echo $row["aname"];?><br><?php
  }
}
}
?>
</body>
</html>