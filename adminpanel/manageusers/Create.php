<?php

require_once "config.php";

$email = $first_name = $last_name = $phone_number = $birthdate = $address = $role = "";
$email_err = $first_name_err = $last_name_err = $phone_number_err = $birthdate_err = $address_err = $role_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $input_birthdate)) {
        $birthdate_err = "Please enter a valid date (yyyy-mm-dd).";
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
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, first_name, last_name, phone_number, birthdate, address, role) VALUES (:email, :first_name, :last_name, :phone_number, :birthdate, :address, :role)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email);
            $stmt->bindParam(":first_name", $param_first_name);
            $stmt->bindParam(":last_name", $param_last_name);
            $stmt->bindParam(":phone_number", $param_phone_number);
            $stmt->bindParam(":birthdate", $param_birthdate);
            $stmt->bindParam(":address", $param_address);
            $stmt->bindParam(":role", $param_role);

            // Set parameters
            $param_email = $email;
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_phone_number = $phone_number;
            $param_birthdate = $birthdate;
            $param_address = $address;
            $param_role = $role;

            // Attempt to execute the prepared statement
            // ...
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add user record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
                            <span class="invalid-feedback"><?php echo $first_name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>">
                            <span class="invalid-feedback"><?php echo $last_name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" class="form-control <?php echo (!empty($phone_number_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone_number; ?>">
                            <span class="invalid-feedback"><?php echo $phone_number_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Birthdate</label>
                            <input type="date" name="birthdate" class="form-control <?php echo (!empty($birthdate_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $birthdate; ?>">
                            <span class="invalid-feedback"><?php echo $birthdate_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
                            <span class="invalid-feedback"><?php echo $address_err; ?></span>
                        </div>
                        <div class="form-group">
                          <label>Role</label>
                          <select name="role" class="form-control <?php echo (!empty($role_err)) ? 'is-invalid' : ''; ?>">
                          <option value="guest" <?php echo ($role == 'guest') ? 'selected' : ''; ?>>Guest</option>
                          <option value="employee" <?php echo ($role == 'employee') ? 'selected' : ''; ?>>Employee</option>
                          <option value="owner" <?php echo ($role == 'owner') ? 'selected' : ''; ?>>Owner</option>
                             </select>
                          <span class="invalid-feedback"><?php echo $role_err; ?></span>
                            </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>