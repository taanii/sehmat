<?php
session_start();

// Security against threat
session_regenerate_id(true);

$connection = mysqli_connect("localhost","root","","fb");
$query = "SELECT * FROM fb";
$query_run = mysqli_query($connection,$query);

if(!isset($_SESSION['AdminLoginId'])) {
    header("location: eighty.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secret</title>
    <!--CSS cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <!--JS cdn-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    <style>
        h1 {
            color:white;
            font-weight:500;
            text-align:center;
            margin:2rem;
        }
        th {
            font-size:120%;
            font-weight:600;
        }
        td {
            font-size:100%;
        }
        td #para {
            font-size:100%;
            word-wrap: break-word;
            min-width: 160px;
            max-width: 160px;"

        }
        div.header {
            display:flex;
            flex-direction:row;
            justify-content:space-between;
        }
        div.header button {
            background-color: white;
            font-weight: 500;
            padding:8px 12px;
            border-radius:5px;

        }
        a {
            text-decoration:none;

        }
    </style>
</head>
<body>

<!--NAVBAR-->
<!-- Logout button -->
<div>
<nav  class="navbar p-3 navbar-expand-lg navbar-dark" style="background-color:#222222;">
  <div class="container" style="background-color:#222222;">
        <div class="header">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <button class="btn" name="Logout" type="submit">Logout</button>
        </form>
        </div>
    </div>
</nav>
</div>
<!--NAVBAR end-->

<h1>Feedbacks</h1>

<div class="container">
<input style="width:50%; float:right;" type="text" class="form-control" id="myInput" placeholder="Search here" autocomplete="off"><br>
</div>

<section style="margin: 40px;">
<div class="container">
<!-- Table -->
<div class="tbl table-responsive">
<table class="table table-borderless" style="padding:30px;">
<thead>
<tr>
    <th style="padding:18px;">Subject</th>
    <th style="padding:18px;">Feedback</th>
</tr>
</thead>
<tbody  id="myTable">
    <!-- Fetching data from database -->
<?php
if(mysqli_num_rows($query_run)>0)
{
    while($row=mysqli_fetch_assoc($query_run))
    {
    ?>
<tr>
<td id="para"> <?php echo $row['subject']; ?> </td>
<td id="para"> <?php echo $row['msg']; ?> </td>
<td id="para"> <?php echo $row['created_at']; ?> </td>
<?php echo "<td><a id='del 'class='btn btn-danger' href='delete.php? id=".$row['id']."'>Delete</a></td>"; ?>
</tr>
    <?php
    }
}
else {
    echo "No Record Found";
}
?>
</tbody>
</table>
</div>
</div>
</section>

<!-- Logout php -->
<?php

if(isset($_POST['Logout'])) {
    session_destroy();
    header("location: eighty.php");
}

?>


<!-- Search bar javascript code -->
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>

for ( let i = 0; i < 1000; i++ ) {
  document.getElementById("del").click();
}
</script>

</body>
</html>