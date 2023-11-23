<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$naam_err = $kenteken_err = $begin_datum_err = $eind_datum_err = "";
$naam = $kenteken = $begin_datum = $eind_datum = "";

// Processing form data when form is submitted
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    // Validate naam
    $input_naam = trim($_POST["naam"]);
    if (empty($input_naam)) {
        $naam_err = "Please enter a name.";
    } else {
        $naam = $input_naam;
    }

    // Validate kenteken
    $input_kenteken = trim($_POST["kenteken"]);
    if (empty($input_kenteken)) {
        $kenteken_err = "Please enter an address.";
    } else {
        $kenteken = $input_kenteken;
    }

    // Validate begin_datum
    $input_begin_datum = trim($_POST["begin_datum"]);
    if (empty($input_begin_datum)) {
        $begin_datum_err = "Please enter the begin date.";
    } else {
        $begin_datum = $input_begin_datum;
    }

    // Validate eind_datum
    $input_eind_datum = trim($_POST["eind_datum"]);
    if (empty($input_eind_datum)) {
        $eind_datum_err = "Please enter the end date.";
    } else {
        $eind_datum = $input_eind_datum;
    }

    // Check input errors before inserting in database
    if (empty($naam_err) && empty($kenteken_err) && empty($begin_datum_err) && empty($eind_datum_err)) {
        // Prepare an update statement
        $sql = "UPDATE kentekens SET naam=:naam, kenteken=:kenteken, begin_datum=:begin_datum, eind_datum=:eind_datum WHERE id=:id";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":naam", $param_naam);
            $stmt->bindParam(":kenteken", $param_kenteken);
            $stmt->bindParam(":begin_datum", $param_begin_datum);
            $stmt->bindParam(":eind_datum", $param_eind_datum);
            $stmt->bindParam(":id", $param_id);

            // Set parameters
            $param_naam = $naam;
            $param_kenteken = $kenteken;
            $param_begin_datum = $begin_datum;
            $param_eind_datum = $eind_datum;
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
        $sql = "SELECT * FROM kentekens WHERE id = :id";
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
                    $naam = $row["naam"];
                    $kenteken = $row["kenteken"];
                    $begin_datum = $row["begin_datum"];
                    $eind_datum = $row["eind_datum"];
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
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Naam</label>
                            <input type="text" name="naam" class="form-control <?php echo (!empty($naam_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $naam; ?>">
                            <span class="invalid-feedback"><?php echo $naam_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Kenteken</label>
                            <input type="text" name="kenteken" class="form-control <?php echo (!empty($kenteken_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $kenteken; ?>" placeholder="JG-PV-81">
                            <span class="invalid-feedback"><?php echo $kenteken_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Begin Datum</label>
                            <input type="text" name="begin_datum" class="form-control <?php echo (!empty($begin_datum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $begin_datum; ?>">
                            <span class="invalid-feedback"><?php echo $begin_datum_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Eind Datum</label>
                            <input type="text" name="eind_datum" class="form-control <?php echo (!empty($eind_datum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $eind_datum; ?>">
                            <span class="invalid-feedback"><?php echo $eind_datum_err; ?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>