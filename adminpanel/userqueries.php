<!DOCTYPE html>
<html lang="en">

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

function update($sql,$values,$datatypes)
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
      die("Query cannot be executed - Update");
    }
  }
  else{
    die("Query cannot be prepared - Update");
  }
}
function alert($type,$msg){
  $bs_class =($type == "succes") ? "alert-succes" : "alert-danger";

  echo <<<alert
  <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
      <strong class="me-3">$msg</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
      </div>
  alert;
}

function delete($sql,$values,$datatypes)
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
        die("Query cannot be executed - Delete");
      }
    }
    else{
      die("Query cannot be prepared - Delete");
    }
  }

if(isset($_GET['seen']))
  {
    $frm_data = filteration($_GET);

    if($frm_data['seen']=='all'){
      $q = "UPDATE `user_queries` SET `seen`=?";
      $values = [1];
      if(update($q,$values,'i')){
        alert('success','Marked all as read!');
      }
      else{
        alert('error','Operation Failed!');
      }
    }
    else{
      $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
      $values = [1,$frm_data['seen']];
      if(update($q,$values,'ii')){
        alert('success','Marked as read!');
      }
      else{
        alert('error','Operation Failed!');
      }
    }
  }

  if(isset($_GET['del']))
  {
    $frm_data = filteration($_GET);

    if($frm_data['del']=='all'){
      $q = "DELETE FROM `user_queries`";
      if(mysqli_query($con,$q)){
        alert('success','All data deleted!');
      }
      else{
        alert('error','Operation failed!');
      }
    }
    else{
      $q = "DELETE FROM `user_queries` WHERE `sr_no`=?";
      $values = [$frm_data['del']];
      if(delete($q,$values,'i')){
        alert('success','Data deleted!');
      }
      else{
        alert('error','Operation failed!');
      }
    }
  }
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - User Queries</title>

</head>

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
      <li class="users active"><a href="userqueries.php">Contact form</a></li>
    </ul>
  </nav>
<body class="bg-light">



  <div class="container-fluid"  id="main-content">
    <div class="row">
      
      <div class="col-lg-10  p-4 overflow-hidden">
        <h3 class="mb-4">USER QUERIES</h3>

        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">

            <div class="text-end mb-4">
              <a href="?seen=all" class="btn btn-dark rounded-pill shadow-none btn-sm">
                <i class="bi bi-check-all"></i> Mark all read
              </a>
              <a href="?del=all" class="btn btn-danger rounded-pill shadow-none btn-sm">
                <i class="bi bi-trash"></i> Delete all
              </a>
            </div>

            <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
              <table class="table table-hover border">
                <thead class="sticky-top">
                  <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" width="20%">Subject</th>
                    <th scope="col" width="30%">Message</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $q = "SELECT * FROM `user_queries` ORDER BY `sr_no` DESC";
                    $data = mysqli_query($con,$q);
                    $i=1;

                    while($row = mysqli_fetch_assoc($data))
                    {
                      $date = date('d-m-Y',strtotime($row['date']));
                      $seen='';
                      if($row['seen']!=1){
                        $seen = "<a href='?seen=$row[sr_no]' class='btn btn-sm rounded-pill btn-primary'>Mark as read</a> <br>";
                      }
                      $seen.="<a href='?del=$row[sr_no]' class='btn btn-sm rounded-pill btn-danger mt-2'>Delete</a>";

                      echo<<<query
                        <tr>
                          <td>$i</td>
                          <td>$row[name]</td>
                          <td>$row[email]</td>
                          <td>$row[subject]</td>
                          <td>$row[message]</td>
                          <td>$date</td>
                          <td>$seen</td>
                        </tr>
                      query;
                      $i++;
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>


      </div>
    </div>
  </div>
