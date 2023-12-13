<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="paul.css" />  -->
    <script src="script.js"></script>
</head>
<body>

<?php
session_start();

echo 'Welcome, ' . $_SESSION['user_name'];
echo 'Your email is: ' . $_SESSION['user_email'];
echo 'Your phonenumber is: ' . $_SESSION['user_number'];
echo 'Your role is: ' . $_SESSION['user_role'];
echo 'Your password is: ' . $_SESSION['user_password'];
?>
    <nav id="desktop-nav">
        <div class="logo">Het Groene Gras</div>
        <div>
          <ul class="nav-links">
            <li><a href="#about">About</a></li>
            <li><a href="#experience">Experience</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="logout.php">Logout</a></li>
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
      <div>
      <img class="campingpic" src="assets/campingpic2.jpg" alt="campingpic 2">
      </div>
      

<div class="container reserveren-formaat"><!--reserveren-->
  <div class="row">
      <div class="col-lg-12 bg-black shadow p-4 rounded">
          <h5 class="mb4">boekings beschikbaarheid</h5>
          <form>
              <div class="row align-items-end">
                  <div class="col-lg-3 mb-3">
                      <label class="form-label" style="font-weight: 500;">check-in</label>
                      <input type="date" class="form-control shadow-none">
                  </div>
                  <div class="col-lg-3 mb-3">
                      <label class="form-label" style="font-weight: 500;">check-out</label>
                      <input type="date" class="form-control shadow-none">
                  </div>
                  <div class="col-lg-3 mb-3">
                      <label class="form-label" style="font-weight: 500;">volwassenen en kinderen</label>
                      <select class="form-select shadow-none">
                          <option selected>hoeveel personen </option>
                          <option value="1">een</option>
                          <option value="2">twee</option>
                          <option value="3">drie</option>
                          <option value="4">vier</option>
                          <option value="5">vijf</option>
                          <option value="6">zes</option>

                      </select>
                  </div>
                  <div class="col-lg-1 mb-lg-3 mt-2">
                      <button type="submit" class="btn text-white shadow-none custom-bg">reserveren</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div>
</div>
<div class="container">
     <div class="intro-container">
      <div class="intro-text--title-container">
        <div class="title-intro"><h1>Lorem Ipsum</h6></div>
        <div class="intro-content"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus voluptate aperiam a quos, earum laborum delectus in nobis sit eos consectetur corporis, voluptatem ullam soluta. Quod at modi, optio beatae sequi magni consequuntur perspiciatis error provident et, debitis labore! Maiores necessitatibus eaque blanditiis quia enim libero sapiente consequuntur accusamus ea.</p></div>
      </div>
      <div class="intro-pic-container">
        <img src="assets/campingpic3.jpeg" alt="camping pic 3" class="camping-pic">
      </div>
    </div>
    </div>
      <div>
        <div class="container faciliteiten-container"> <!--faciliteiten kopjes-->
          <div class="my-5 px-4">
            <h2 class="fw-bold h-font text-center">Onze faciliteiten</h2>
            <div class="h-line bg-dark"></div>
          </div>
          <div class="row">
              <div class="col-lg-4 col-md-6 mb-5 px-4"> <!--wifi-->
                  <div class="bg-white rounded shadow p-4 border-top border- border-dark">
                      <div class="d-flex align-items">
                          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="16" fill="currentColor" class="bi bi-wifi" viewBox="0 0 16 16">
                              <path d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.444 12.444 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049z"/>
                              <path d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.455 9.455 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.473 6.473 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .707 0l.707-.707z"/>
                            </svg>
                          <h5 class="m-0 ms-3">Wifi</h5>
                      </div>
                      <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium doloremque eum aut voluptate.
                          Suscipit sed voluptatum incidunt rem. Natus voluptatibus impedit sunt tempore. Sapiente modi nemo amet veritatis magni aliquid.
                      </p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-5 px-4"> <!--sanitair-->
                  <div class="bg-white rounded shadow p-4 border-top border- border-dark">
                      <div class="d-flex align-items">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-badge-wc" viewBox="0 0 16 16">
                              <path d="M10.348 7.643c0-1.112.488-1.754 1.318-1.754.682 0 1.139.47 1.187 1.108H14v-.11c-.053-1.187-1.024-2-2.342-2-1.604 0-2.518 1.05-2.518 2.751v.747c0 1.7.905 2.73 2.518 2.73 1.314 0 2.285-.792 2.342-1.939v-.114h-1.147c-.048.615-.497 1.05-1.187 1.05-.839 0-1.318-.62-1.318-1.727v-.742zM4.457 11l1.02-4.184h.045L6.542 11h1.006L9 5.001H7.818l-.82 4.355h-.056L5.97 5.001h-.94l-.972 4.355h-.053l-.827-4.355H2L3.452 11z"/>
                              <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"/>
                            </svg>
                          <h5 class="m-0 ms-3">sanitair</h5>
                      </div>
                      <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium doloremque eum aut voluptate.
                          Suscipit sed voluptatum incidunt rem. Natus voluptatibus impedit sunt tempore. Sapiente modi nemo amet veritatis magni aliquid.
                      </p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-5 px-4"> <!--speeltuin-->
                  <div class="bg-white rounded shadow p-4 border-top border- border-dark">
                      <div class="d-flex align-items">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-arms-up" viewBox="0 0 16 16">
                              <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                              <path d="m5.93 6.704-.846 8.451a.768.768 0 0 0 1.523.203l.81-4.865a.59.59 0 0 1 1.165 0l.81 4.865a.768.768 0 0 0 1.523-.203l-.845-8.451A1.492 1.492 0 0 1 10.5 5.5L13 2.284a.796.796 0 0 0-1.239-.998L9.634 3.84a.72.72 0 0 1-.33.235c-.23.074-.665.176-1.304.176-.64 0-1.074-.102-1.305-.176a.72.72 0 0 1-.329-.235L4.239 1.286a.796.796 0 0 0-1.24.998l2.5 3.216c.317.316.475.758.43 1.204Z"/>
                            </svg>
                          <h5 class="m-0 ms-3">speeltuin</h5>
                      </div>
                      <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium doloremque eum aut voluptate.
                          Suscipit sed voluptatum incidunt rem. Natus voluptatibus impedit sunt tempore. Sapiente modi nemo amet veritatis magni aliquid.
                      </p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-5 px-4"> <!--activiteiten-->
                  <div class="bg-white rounded shadow p-4 border-top border- border-dark">
                      <div class="d-flex align-items">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-raised-hand" viewBox="0 0 16 16">
                              <path d="M6 6.207v9.043a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H6.236a.998.998 0 0 1-.447-.106l-.33-.165A.83.83 0 0 1 5 2.488V.75a.75.75 0 0 0-1.5 0v2.083c0 .715.404 1.37 1.044 1.689L5.5 5c.32.32.5.754.5 1.207"/>
                              <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                            </svg>
                          <h5 class="m-0 ms-3">activiteiten</h5>
                      </div>
                      <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium doloremque eum aut voluptate.
                          Suscipit sed voluptatum incidunt rem. Natus voluptatibus impedit sunt tempore. Sapiente modi nemo amet veritatis magni aliquid.
                      </p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-5 px-4"> <!--receptie-->
                  <div class="bg-white rounded shadow p-4 border-top border- border-dark">
                      <div class="d-flex align-items">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
                              <path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745"/>
                              <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                              <path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
                          </svg>
                          <h5 class="m-0 ms-3">receptie</h5>
                      </div>
                      <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium doloremque eum aut voluptate.
                          Suscipit sed voluptatum incidunt rem. Natus voluptatibus impedit sunt tempore. Sapiente modi nemo amet veritatis magni aliquid.
                      </p>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 mb-5 px-4"> <!--huisdieren-->
                  <div class="bg-white rounded shadow p-4 border-top border- border-dark">
                      <div class="d-flex align-items">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                              <path d="M15 8a6.973 6.973 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
                            </svg>
                          <h5 class="m-0 ms-3">huisdieren</h5>
                      </div>
                      <p>
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium doloremque eum aut voluptate.
                          Suscipit sed voluptatum incidunt rem. Natus voluptatibus impedit sunt tempore. Sapiente modi nemo amet veritatis magni aliquid.
                      </p>
                  </div>
              </div>
              
          </div>
        </div>
        
        <!-- <div class="my-5 px-4"> wat hebben wij te huur
          <h2 class="fw-bold h-font text-center">wat hebben wij te huur</h2>
          <div class="h-line bg-dark"></div>
        </div> -->
      </div>
</body>
<script src="script.js"></script>
<footer>
    <div class="footer">
      <div class="footer-content">
        <div class="footer-section about">
          <h1 class="logo-text"><span>Het Groene</span>Gras</h1>
          <p class="footer-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
            voluptatum, quibusdam, voluptate, quos doloribus voluptas
            voluptatibus quod quia quae voluptatem quas. Quisquam, voluptas
            voluptatibus. Quisquam, voluptas voluptatibus.
          </p>
          <div class="contact">
            <span><i class="serial-number"></i> &nbsp; 123-456-789</span>
            <span><i class="fas fa-envelope"></i> &nbsp;
</footer>
</html>