<!DOCTYPE html>
<html lang="en">
<?php include '../index.php'; ?>

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
        h2.pull-left, .btn-success.pull-right {
    margin-top: 50px; 
    }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>


 

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
    <h2 class="pull-left">Users</h2>
    <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New User</a>
</div>
<?php
// Include config file
require_once "config.php";

// Attempt select query execution
// Get sort column from query parameters
$sort_column = $_GET['sort'] ?? 'id';

// Validate sort column
$allowed_sort_columns = ['id', 'email', 'first_name', 'last_name', 'phone_number', 'birthdate', 'address', 'role'];
if (!in_array($sort_column, $allowed_sort_columns)) {
    $sort_column = 'id';
}

$sql = "SELECT * FROM users ORDER BY $sort_column";
if ($result = $pdo->query($sql)) {
    if ($result->rowCount() > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo "<thead>";
        echo "<tr>";
        echo "<th><a href='?sort=id' style='color: black;'>ID &#8595;</a></th>";
        echo "<th><a href='?sort=email' style='color: black;'>Email &#8595;</a></th>";
        echo "<th><a href='?sort=first_name' style='color: black;'>First Name &#8595;</a></th>";
        echo "<th><a href='?sort=last_name' style='color: black;'>Last Name &#8595;</a></th>";
        echo "<th><a href='?sort=phone_number' style='color: black;'>Phone Number &#8595;</a></th>";
        echo "<th><a href='?sort=birthdate' style='color: black;'>Birthdate &#8595;</a></th>";
        echo "<th><a href='?sort=address' style='color: black;'>Address &#8595;</a></th>";
        echo "<th><a href='?sort=role' style='color: black;'>Role &#8595;</a></th>";
        echo "<th style='width:100px;'>Action</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($row = $result->fetch()) {
            echo "<tr>";
            echo "<td >" . $row['id'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['birthdate'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td>";
            echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
            echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
            echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        // Free result set
        unset($result);
    } else {
        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
    }
} else {
    echo "Oops! Something went wrong. Please try again later.";
}

                    // Close connection
                    unset($pdo);
                    ?>
                    <style>
                        .table {
                            table-layout: auto;
                            margin-left: -270px; /* Pas dit aan naar de gewenste waarde */
                        }

                        .table {
                            width: 250%;
                            /* Pas dit aan naar de gewenste breedte */
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
</body>

</html>