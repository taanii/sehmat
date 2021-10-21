<!--Adminlogin-->
<?php 
$connection = mysqli_connect("localhost","root","","fb");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Come later</title>
    <!--CSS cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="#">
    <!--JS cdn-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<style>
    h1 {
        text-align:center;
    }
</style>

</head>
<body>

<!-- Taking input of admin credentials -->
<section style="margin: 40px;">
<div class="container col-md-4 col-md-offset-4">
<form class="contact-form" method="POST" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
<div>
<center><img src="../images/logi.gif" alt="login" style="width:70%;"></center>

<h1>Under construction!</h1><br>

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="uname" name="uname" placeholder="Username">
  <label for="floatingInput">Username</label>
</div>
<div class="form-floating">
  <input type="password" class="form-control" id="pw" name="pw" placeholder="Code">
  <label for="pw">Code</label>
</div><br>
<button type="submit" class="btn btn-warning" name="Login" style="width: 100%;" onclick="this.blur();">Submit</button>
</form>
</div><br>
</section>

<?php 

// filter input
function ipt($data) {                                      
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

if(isset($_POST['Login'])) {
    $uname = ipt($_POST['uname']);
    $pw = ipt($_POST['pw']);

    //other variables for limit check
    $ip = $_SERVER['REMOTE_ADDR']; 
    $t=time(); 
    $diff = (time()-10); //600 means 10 minutes*60 seconds
    mysqli_query($connection, "INSERT INTO tbl_loginLimit VALUES (null,'$ip','$t')"); 

    // security
    $uname = mysqli_real_escape_string($connection,$uname);
    $pw = mysqli_real_escape_string($connection,$pw);
    $query = "SELECT * FROM `admin_login` WHERE `uname`=? AND `pw`=?";

    //query prepared true
    if($stmt=mysqli_prepare($connection,$query)) {
        mysqli_stmt_bind_param($stmt,"ss",$uname,$pw);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        //max limit
        $result = mysqli_query($connection, "SELECT COUNT(*) FROM tbl_loginLimit WHERE ipAddress LIKE '$ip' AND timeDiff > $diff"); 
        $count = mysqli_fetch_array($result); 

        //true condition - more than 3 attempts made
        if($count[0] > 3) { 
            echo "<script>alert('Maximum limit reached!');</script>";
        }
        //false condition - more than 3 attempts made
        else {
            //true condition - correct login credentials
            if(mysqli_stmt_num_rows($stmt)==1)
            {
                // redirect and reload vulnerabilities
                session_start();
                $_SESSION['AdminLoginId'] = $uname;
                header("location: read.php");
            }
            //false condition - incorrect login credentials
            else
            {
                echo "<script>alert('Uh oh, stranger caught!');</script>";
            }
            mysqli_stmt_close($stmt);
        }
    }
    //query not prepared
    else
    {
        echo "Query can't be prepared";
    }
}
?>

</body>
</html>