<?php
echo "<div class='center1'>";
$servername = "YOURHOST";
$username= "YOURUSER";
$password="YOURPASS";
$db="YOURDBNAME";
$conn = new MySQLI($servername,$username,$password,$db);
if ($conn->connect_error){
echo "error";
}
else{
  echo "<strong> Step 1: Connected to the DB  Successfully</strong>";
  
//Collect User Information
 $time = date('Y-m-d H:i:s');
$ip=$_SERVER['REMOTE_ADDR'];
echo "<br />Your IP Address is: " . $ip . "<br /><br />";
//Record a visit
$sql = "INSERT INTO IP_LOGGER (ip_address,date_time) VALUES ('$ip', '$time')";
if(mysqli_query($conn, $sql)){
echo "<strong>Step 2: Submission Successful</strong>";
echo "<br />We've recorded your visit. Thanks for stopping by!";
}
//Query the DB for number of times your IP is in it
$sql =  "SELECT * FROM IP_LOGGER WHERE ip_address LIKE'%$ip%'";
if($search=mysqli_query($conn,$sql)){
$numResults= mysqli_num_rows($search);
  echo "<strong><br /><br />Step 3: Query Database Successful </strong> <br />";
  echo "You've visited this site $numResults times <br /><br />";
}
}
echo "</div>";
?>

<html>
    <style>
        .center1{margin-left:auto;margin-right:auto;width:295px;}
    </style>
</html>
