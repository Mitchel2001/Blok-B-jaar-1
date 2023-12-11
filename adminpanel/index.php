<?php
session_start();


?>

<header role="banner">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <h1>Admin Panel</h1>
    <ul class="utilities">
      <br>
      <li class="users"><a href="/adminpanel/account/account.php">My Account</a></li>
      <li class="logout warn"><a href="/landing%20page%20GG/login/login.php">Log Out</a></li>
    </ul>
  </header>
  
  <nav role='navigation'>
    <ul class="main">
      <li class="dashboard active"><a href="../index.php">Dashboard</a></li>
      <li class="edit active"><a href="#">Edit Website</a></li>
      <li class="write active"><a href="#">Write news</a></li>
      <li class="comments active"><a href="#">Ads</a></li>
      <li class="users active"><a href="/adminpanel/manageusers/index.php">Manage Users</a></li>
      <li class="users active"><a href="/adminpanel/kenteken/index.php">Kenteken</a></li>
    </ul>
  </nav>
   
  
  </main>


  





































  <style>
    @charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic);
@import url(https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css);
html {
  box-sizing: border-box;
}


*,
*:before,
*:after {
  box-sizing: inherit;
}

body {
  background: #f1f2f7;
  font-family: "Open Sans", arial, sans-serif;
  color: darkslategray;
}

body.login {
  background-color: white;
  max-width: 500px;
  margin: 10vh auto;
  padding: 1em;
  height: auto;
}

.warn {
  color: red;
}

/* header */
header[role="banner"] {
  background: white;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.15);
}
header[role="banner"] h1 {
  margin: 0;
  font-weight: 300;
  padding: 1rem;
}
header[role="banner"] h1:before {
  content: "\f248";
  font-family: FontAwesome;
  padding-right: 0.6em;
  color: red;
}
header[role="banner"] .utilities {
  width: 100%;
  background: slategray;
  color: #ddd;
}
header[role="banner"] .utilities li {
  border-bottom: solid 1px rgba(255, 255, 255, 0.2);
}
header[role="banner"] .utilities li a {
  padding: 0.7em;
  display: block;
}

/* header */
.utilities a:before {
  content: "\f248";
  font-family: FontAwesome;
  padding-right: 0.6em;
}

.logout a:before {
  content: "";
}

.users a:before {
  content: "";
}

nav[role="navigation"] {
  background: #2a3542;
  color: #ddd;
  /* icons */
}
nav[role="navigation"] li {
  border-bottom: 1px solid rgba(255, 255, 255, 0.08);
}
nav[role="navigation"] li a {
  color: #ddd;
  text-decoration: none;
  display: block;
  padding: 0.7em;
}
nav[role="navigation"] li a:hover {
  background-color: rgba(255, 255, 255, 0.05);
}
nav[role="navigation"] li a:before {
  content: "\f248";
  font-family: FontAwesome;
  padding-right: 0.6em;
}
nav[role="navigation"] .dashboard a:before {
  content: "";
}
nav[role="navigation"] .write a:before {
  content: "";
}
nav[role="navigation"] .edit a:before {
  content: "";
}
nav[role="navigation"] .comments a:before {
  content: "";
}
nav[role="navigation"] .users a:before {
  content: "";
}
.wrapper {
    width: 600px;
    margin: 0 auto;
}

/* lists */
ul,
li {
  list-style-type: none;
  margin: 0;
  padding: 0;
}



tr:not(:first-child):hover {
  background: rgba(0, 0, 0, 0.1);
}



@media screen and (min-width: 600px) {
  html,
  body {
    height: 100%;
  }

  header[role="banner"] {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 99;
    height: 75px;
  }
  header[role="banner"] .utilities {
    position: absolute;
    top: 0;
    right: 0;
    background: transparent;
    color: darkslategray;
    width: auto;
  }
  header[role="banner"] .utilities li {
    display: inline-block;
  }
  header[role="banner"] .utilities li a {
    padding: 0.5em 1em;
  }

  nav[role="navigation"] {
    position: fixed;
    width: 200px;
    top: 75px;
    bottom: 0px;
    left: 0px;
  }

}
@media screen and (min-width: 900px) {
  footer[role="contentinfo"] {
    position: fixed;
    width: 100%;
    bottom: 0;
    left: 0px;
    margin: 0;
  }
}
  </style>
