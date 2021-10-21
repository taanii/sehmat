<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sehmat</title>
    <!--CSS cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="#">
    <!--JS cdn-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
<!--NAVBAR-->
<div>
<nav class="navbar p-3 navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.html">Feedback Form</a>
  </div>
</nav>
</div>
<!--NAVBAR end-->

<!-- FORM -->
<section style="margin: 40px;">
<div class="container">
<h2 class="pb-2 border-bottom">Welcome!</h2><br>
<form class="contact-form" method="POST" autocomplete="off" action="connection.php">
<div class="row">
<div class="col-lg-4 col-md-12 col-sm-12">
  <!-- Image -->
<img src="images/em.png" style="width:100%;">
</div>
<div class="col-lg-8 col-md-12 col-sm-12">
    <div class="form-group">
      <label for="subject">Subject</label>
      <input type="text" class="form-control" placeholder="" id="subject" name="subject" required autocomplete="off">
    </div><br>
    <div class="form-group">
      <label for="msg">Message</label>
      <textarea type="text" class="form-control" placeholder="" id="msg" name="msg" required autocomplete="off"></textarea>
    </div><br>
    <div class="row">
      <div class="col-lg-6 col-md-12 col-sm-12" style="padding-top: 2rem;">
        <button type="submit" class="btn btn-primary" style="width: 100%;" onclick="this.blur();">Submit</button>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-12" style="padding-top: 2rem;">
        <input type="reset" class="btn btn-secondary" style="width: 10rem; float: right;" value="Clear all responses" onclick="this.blur();">
      </div>
      </div>
</form>
</div><br>
</section>

<!--Footer-->
<section>
  <div class="py-3">
    <p class="text-center text-muted">Make sure to give the correct feedback!</p>
  </div>
</section>
<!--Footer end-->

</body>
</html>



