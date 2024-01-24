<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="paul.css" />  -->
    <script src="script.js"></script>
</head>

<body>

<nav id="desktop-nav">
    <div class="logo">Het Groene Gras</div>
    <div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="Over.html">Over ons</a></li>
        <li><a href="faciliteiten.html">faciliteiten</a></li>
        <li><a href="omgeving.html">Omgeving</a></li>
        <div class="reservering_btn_container">
        <li class="reservering_btn"><a href="#Boek uw vakantie">Boek uw Vakantie</a></li>
      </div>
      </ul>
    </div>
  </nav>
  <nav id="hamburger-nav">
    <div class="logo">Het Groene Gras</div>
    <div class="hamburger-menu">
      <div class="hamburger-icon" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <ul class="menu-links">
        <li><a href="#about" onclick="toggleMenu()">About</a></li>
        <li><a href="#experience" onclick="toggleMenu()">Experience</a></li>
        <li><a href="#projects" onclick="toggleMenu()">Projects</a></li>
        <li><a href="#contact" onclick="toggleMenu()">Contact</a></li>
        <li class="hamburger_icon_container"><a href="#Reserveren" onclick="toggleMenu()">Boek Mijn Vakantie</a></li>
      </ul>
    </div>
    <script>
      function toggleMenu() {
const menu = document.querySelector(".menu-links");
const icon = document.querySelector(".hamburger-icon");
menu.classList.toggle("open");
icon.classList.toggle("open");
}
    </script>
  </nav>

  <div class="mb-3 mt-3container contact-ons"> <!--contact ons-->
        <div class="my-5 px-4">
          <h2 class="fw-bold h-font text-center">contact ons</h2>
          <div class="h-line bg-dark"></div>
        </div>
        <div class="container">

        <div class="row">
            <div class="col-lg-6 col-md-6 mt-5 px-4"> <!--KAART CONTACT-->
                <div class="bg-white rounded shadow p-4">
                <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d38484.92853642591!2d6.731031694389944!3d52.92488327027273!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47b7df43540facc7%3A0x250128b664c3cd70!2sBoerderijcamping%20Beekdal!5e0!3m2!1snl!2snl!4v1701854412963!5m2!1snl!2snl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  <h5 class="mt-4">Bel ons:</h5>
                  <i class="bi bi-telephone"></i>0657529557
                  <h5 class="mt-4">Email ons:</h5>
                  <i class="bi bi-telephone"></i>HetGroenGras@gmail.com
                  <h5 class="mt-4">Ons adress</h5>
                  <i class="bi bi-telephone"></i>Strengenweg 11, 9531 TE Borger
              </div>
            </div>
            <div class="col-lg-6 col-md-6 mt-5 px-4">
        <div class="bg-white rounded shadow p-4">
          <form method="POST">
            <h5>Stuur ons een bericht</h5>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">Naam</label>
              <input name="name" required type="text" class="form-control shadow-none">
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">Email</label>
              <input name="email" required type="email" class="form-control shadow-none">
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">onderwerp</label>
              <input name="subject" required type="text" class="form-control shadow-none">
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">bericht</label>
              <textarea name="message" required class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
            </div>
            <button type="submit" name="send" class="btn text-white custom-bg mt-3">SEND</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <?php


  $con = mysqli_connect("localhost", "root", "", "goldenbulls");

  function filteration($data){
    foreach($data as $key => $value){
      $value = trim($value);
      $value = stripslashes($value);
      $value = strip_tags($value);
      $value = htmlspecialchars($value);
      $data[$key] = $value;
    }
    return $data;
  }

  function insert($sql,$values,$datatypes)
  {
    $con = $GLOBALS['con'];
    if($stmt = mysqli_prepare($con,$sql))
    {
      mysqli_stmt_bind_param($stmt,$datatypes,...$values);
      if(mysqli_stmt_execute($stmt)){
        $res = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
        return $res;
      }
      else{
        mysqli_stmt_close($stmt);
        die("Query cannot be executed - Insert");
      }
    }
    else{
      die("Query cannot be prepared - Insert");
    }
  }

  function alert($type,$msg){
    $bs_class = ($type == "success") ? "alert-success" : "alert-danger";

    echo <<<alert
      <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
        <strong class="me-3">$msg</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    alert;
  }

    if(isset($_POST['send']))
    {
      $frm_data = filteration($_POST);

      $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
      $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];

      $res = insert($q,$values,'ssss');
      if($res==1){
        alert('success','Mail sent!');
      }
      else{
        alert('error','Server Down! Try again later.');
      }
    }
  ?>

</body>
<footer>
    <div class="footer">
      <div class="footer-content">
        <div class="footer-section about">
            <h1 class="logo-text"><span>Het Groene</span>Gras</h1>
            <p class="footer-text">
            <div class="col-lg-4 p-4">
                <h5 class="mb-3" >Links</h5>
                <a href="index.php" class="text-white mb-2 text-dark text-decoration-none">Home</a> <br>
                <a href="contact.php" class="text-white d-inline-block mb-2 text-dark text-decoration-none">Contact ons</a> <br>
                <a href="faciliteiten.html" class="text-white d-inline-block mb-2 text-dark text-decoration-none">faciliteiten</a> <br>
                <a href="Over.html" class="text-white d-inline-block mb-2 text-dark text-decoration-none">Over ons</a> <br>

          </p>
          </div>
</footer>
</html>