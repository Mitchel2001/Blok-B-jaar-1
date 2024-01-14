<?php
 include '../index.php'; 


?>




<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title>Snippet - BBBootstrap</title>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
<link href='#' rel='stylesheet'>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<style>::-webkit-scrollbar {
width: 8px;
 }
                                /* Track */
 ::-webkit-scrollbar-track {
  background: #888; 
}
                                 
                                /* Handle */
 ::-webkit-scrollbar-thumb {
  background: #888; 
 }
                                
 /* Handle on hover */
::-webkit-scrollbar-thumb:hover {
background: #888; 
} body {
    background: #fff;
}

.form-control:focus {
    box-shadow: none;
    border-color: #888
}

.profile-button {
    background: #fff;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #888
}

.profile-button:focus {
    background: #888;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #888;
    color: #fff;
    cursor: pointer;
    border: solid 1px #888
}</style>

</head>
<body className='snippet-body'>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold">Edogaru</span><span class="text-black-50">edogaru@mail.com.my</span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value="<?php echo $_SESSION['user_name']; ?>"></div>
                    <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="<?php echo $_SESSION['user_last']; ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value="<?php echo $_SESSION['user_number']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value="<?php echo $_SESSION['user_addres']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                    <div class="col-md-12"><label class="labels">Phone number</label><input type="text" class="form-control" placeholder="enter address line 2" value="<?php echo $_SESSION['user_number']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Birthdate</label><input type="text" class="form-control" placeholder="enter address line 2" value="<?php echo $_SESSION['user_birthdate']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value="<?php echo $_SESSION['user_email']; ?>"></div>
                    <div class="col-md-12"><label class="labels">Role</label><input type="text" class="form-control" placeholder="education" value="<?php echo $_SESSION['user_role']; ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value="<?php echo $_SESSION['user_last']; ?>"></div>
                    <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-success profile-button" type="button"></button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span></span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Save Profile</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value="<?php echo $_SESSION['user_last']; ?>"></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value="<?php echo $_SESSION['user_last']; ?>"></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript'></script>
                                <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>
                            
                                </body>
                            </html>