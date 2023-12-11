<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$email_err = $first_name_err = $last_name_err = $phone_number_err = $birthdate_err = $address_err = $role_err = "";
$email = $first_name = $last_name = $phone_number = $birthdate = $address = $role = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate email
    $input_email = trim($_POST["email"]);
    if (empty($input_email)) {
        $email_err = "Please enter an email.";
    } else {
        $email = $input_email;
    }

    // Validate first_name
    $input_first_name = trim($_POST["first_name"]);
    if (empty($input_first_name)) {
        $first_name_err = "Please enter a first name.";
    } else {
        $first_name = $input_first_name;
    }

    // Validate last_name
    $input_last_name = trim($_POST["last_name"]);
    if (empty($input_last_name)) {
        $last_name_err = "Please enter a last name.";
    } else {
        $last_name = $input_last_name;
    }

    // Validate phone_number
    $input_phone_number = trim($_POST["phone_number"]);
    if (empty($input_phone_number)) {
        $phone_number_err = "Please enter a phone number.";
    } else {
        $phone_number = $input_phone_number;
    }

    // Validate birthdate
    $input_birthdate = trim($_POST["birthdate"]);
    if (empty($input_birthdate)) {
        $birthdate_err = "Please enter a birthdate.";
    } else {
        $birthdate = $input_birthdate;
    }

    // Validate address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";
    } else {
        $address = $input_address;
    }

    // Validate role
    $input_role = trim($_POST["role"]);
    if (empty($input_role)) {
        $role_err = "Please enter a role.";
    } else {
        $role = $input_role;
    }

    // Check input errors before inserting in database
    if (empty($email_err) && empty($first_name_err) && empty($last_name_err) && empty($phone_number_err) && empty($birthdate_err) && empty($address_err) && empty($role_err)) {
        // Prepare an update statement
        $sql = "UPDATE users SET email=:email, first_name=:first_name, last_name=:last_name, phone_number=:phone_number, birthdate=:birthdate, address=:address, role=:role WHERE id=:id";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email);
            $stmt->bindParam(":first_name", $param_first_name);
            $stmt->bindParam(":last_name", $param_last_name);
            $stmt->bindParam(":phone_number", $param_phone_number);
            $stmt->bindParam(":birthdate", $param_birthdate);
            $stmt->bindParam(":address", $param_address);
            $stmt->bindParam(":role", $param_role);
            $stmt->bindParam(":id", $param_id);

            // Set parameters
            $param_email = $email;
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_phone_number = $phone_number;
            $param_birthdate = $birthdate;
            $param_address = $address;
            $param_role = $role;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
} else {
    // Check existence of id parameter before processing further
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE id = :id";
        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":id", $param_id);

            // Set parameters
            $param_id = $id;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                if ($stmt->rowCount() == 1) {
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    // Retrieve individual field value
                    $email = $row["email"];
                    $first_name = $row["first_name"];
                    $last_name = $row["last_name"];
                    $phone_number = $row["phone_number"];
                    $birthdate = $row["birthdate"];
                    $address = $row["address"];
                    $role = $row["role"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);

        // Close connection
        unset($pdo);
    } else {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
                            <span class="help-block"><?php echo $first_name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
                            <span class="help-block"><?php echo $last_name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($phone_number_err)) ? 'has-error' : ''; ?>">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" value="<?php echo $phone_number; ?>">
                            <span class="help-block"><?php echo $phone_number_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($birthdate_err)) ? 'has-error' : ''; ?>">
                            <label>Birthdate</label>
                            <input type="date" name="birthdate" class="form-control" value="<?php echo $birthdate; ?>">
                            <span class="help-block"><?php echo $birthdate_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($role_err)) ? 'has-error' : ''; ?>">
                       <label>Role</label>
                      <select name="role" class="form-control">
                          <option value="guest" <?php echo ($role == 'guest') ? 'selected' : ''; ?>>Guest</option>
                          <option value="employee" <?php echo ($role == 'employee') ? 'selected' : ''; ?>>Employee</option>
                          <option value="owner" <?php echo ($role == 'owner') ? 'selected' : ''; ?>>Owner</option>
                           </select>
                     <span class="help-block"><?php echo $role_err;?></span>
                    </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>

</html>
