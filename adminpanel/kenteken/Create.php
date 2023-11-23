<?php

require_once "config.php";


$naam = $kenteken = $begin_datum = $eind_datum = "";
$naam_err = $kenteken_err = $begin_datum_err = $eind_datum_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $kenteken_err = "Please enter a license plate.";
    } elseif (substr_count($input_kenteken, '-') != 2) {
        $kenteken_err = "The license plate must contain two '-' characters.";
    } else {
        $kenteken = strtoupper($input_kenteken);
    }
   

    $input_begin_datum = trim($_POST["begin_datum"]);
    if (empty($input_begin_datum)) {
        $begin_datum_err = "Please enter the begin date.";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $input_begin_datum)) {
        $begin_datum_err = "Please enter a valid date (yyyy-mm-dd).";
    } else {
        $begin_datum = $input_begin_datum;
    }

    $input_eind_datum = trim($_POST["eind_datum"]);
    if (empty($input_eind_datum)) {
        $eind_datum_err = "Please enter the end date.";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $input_eind_datum)) {
        $eind_datum_err = "Please enter a valid date (yyyy-mm-dd).";
    } else {
        $eind_datum = $input_eind_datum;
    }


    // Check input errors before inserting in database
    if (empty($naam_err) && empty($kenteken_err) && empty($begin_datum_err) && empty($eind_datum_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO kentekens (naam, kenteken, begin_datum, eind_datum) VALUES (:naam, :kenteken, :begin_datum, :eind_datum)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":naam", $param_naam);
            $stmt->bindParam(":kenteken", $param_kenteken);
            $stmt->bindParam(":begin_datum", $param_begin_datum);
            $stmt->bindParam(":eind_datum", $param_eind_datum);

            // Set parameters
            $param_naam = $naam;
            $param_kenteken = $kenteken;
            $param_begin_datum = $begin_datum;
            $param_eind_datum = $eind_datum;

            // Attempt to execute the prepared statement
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
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                            <input type="date" name="begin_datum" class="form-control <?php echo (!empty($begin_datum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $begin_datum; ?>">
                            <span class="invalid-feedback"><?php echo $begin_datum_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Eind Datum</label>
                            <input type="date" name="eind_datum" class="form-control <?php echo (!empty($eind_datum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $eind_datum; ?>">
                            <span class="invalid-feedback"><?php echo $eind_datum_err; ?></span>
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