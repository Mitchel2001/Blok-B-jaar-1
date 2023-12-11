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
                        <h2 class="pull-left">Kentekens</h2>
                        <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nieuwe kenteken toevoegen</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                   
                    // Attempt select query execution
                    // Get sort column from query parameters
                    $sort_column = $_GET['sort'] ?? 'id';

                    $sql = "SELECT * FROM kentekens WHERE eind_datum > NOW() ORDER BY $sort_column";
                    if ($result = $pdo->query($sql)) {

                    }

                    // Validate sort column
                    $allowed_sort_columns = ['id', 'naam', 'kenteken', 'begin_datum', 'eind_datum'];
                    if (!in_array($sort_column, $allowed_sort_columns)) {
                        $sort_column = 'id';
                    }

                    // Attempt select query execution
                   
                    if ($result = $pdo->query($sql)) {
                        if ($result->rowCount() > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th><a href='?sort=id' style='color: black;'>ID &#8595;</a></th>";
                            echo "<th><a href='?sort=naam' style='color: black;'>Name &#8595;</a></th>";
                            echo "<th><a href='?sort=kenteken' style='color: black;'>Kenteken &#8595;</a></th>";
                            echo "<th><a href='?sort=begin_datum' style='color: black;'>Start tijd &#8595;</a></th>";
                            echo "<th><a href='?sort=eind_datum' style='color: black;'>Eind tijd &#8595;</a></th>";
                            echo "<th style='width:100px;'>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch()) {
                                echo "<tr>";
                                echo "<td >" . $row['id'] . "</td>";
                                echo "<td>" . $row['naam'] . "</td>";
                                echo "<td>" . $row['kenteken'] . "</td>";
                                echo "<td>" . $row['begin_datum'] . "</td>";
                                echo "<td>" . $row['eind_datum'] . "</td>";
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
                            table-layout: fixed;
                        }

                        .table {
                            width: 150%;
                            /* Pas dit aan naar de gewenste breedte */
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
</body>

</html>