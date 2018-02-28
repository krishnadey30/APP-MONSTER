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
        $gid= $_POST['genredrop'];
        $aname= $_POST['app'];
        $dname=$_POST['developer'];

?>

<?php
if($gid>0)
{
    $v0 = "SELECT * FROM App_details";
    $v1 = "SELECT * FROM genre WHERE gid='$gid'";
    $v2 = mysqli_query($conn,$v1);
    $v3 = mysqli_query($conn,$v0);
    if(mysqli_num_rows($v2)>0)
    {
        ?><form action="details.php" method="POST" name="appd"><?php
      while($row=mysqli_fetch_assoc($v2))
      {
        $id=$row["gid"];
        while($row1 = mysqli_fetch_assoc($v3))
        {
          if($row1["gid"]==$id)
          {
            
           ?> <input type="radio" name="appname" value="<?php echo $row1["aname"];?>"><?php echo $row1["aname"];?> <br><?php
          }
        }
      }?>
      <input type="submit" value="submit"></form><?php
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
      ?><form action="" method="POST"><?php
    if(mysqli_num_rows($v2)>0)
    {
        echo "Main App\n";
      ?><input type="radio" name="appname" value="<?php echo $row["aname"];?>"><?php echo $row["aname"];?><br><?php
      $gid=$row["gid"];
      $v3= "SELECT * FROM  App_details WHERE gid='$gid'";
      
    }
    else
    {
      echo "NO such app exists. Please see similar Apps.";?><br><?php
      $v3="SELECT * from App_details where aname like '%$aname%' and aname!='$aname'";
    }
     $v4= mysqli_query($conn,$v3);
      while($row = mysqli_fetch_assoc($v4))
      {?><input type="radio" name="appname" value="<?php
        echo $row["aname"];?>"><?php
        echo $row["aname"];?><br><?php
      }
      ?>
      <input type="submit" value="submit"></form><?php
    }
}
?>

<?php
if(strlen($dname)>0)
{
    echo "Here is everything";
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
            ?><form action="" method="POST"><input type="radio" name="appname" value="<?php 
            echo $row1["aname"]; ?>"><?php 
            echo $row1["aname"]; ?><br>
            <?php
          }
        }
      }?>
      <input type="submit" value="submit"></form><?php
}
}
?>