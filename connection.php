<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fb";
$subject = $_POST['subject'];
$msg = $_POST['msg'];
date_default_timezone_set('Asia/Kolkata');
$time = date('Y-m-d H:i:s');
$timeToDelete = time() - 60;
$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
die("Connection failed: ". $connection->connect_error);
}

$sql = "INSERT INTO fb (subject, msg, created_at) VALUES ('$subject', '$msg','$time')";


$result = $connection->query("SELECT * FROM `fb` WHERE `created_at` < '$timeToDelete'");
while($d = mysqli_fetch_array($result))
{
$connection->query("DELETE FROM `fb` WHERE `id`='$d[id]'");
}

if($connection->query($sql) === TRUE) {
echo "<script>alert('Feedback submitted!');</script>";
} 
else {
echo "Error: ".$sql . "<br>" . $connection->error;
}
header('location:index.php');
$connection->close();
?>