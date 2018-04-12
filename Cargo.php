<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">



    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>

<body>
<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">MAERSK</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="Cargo.php">Cargo</a></li>
                <li class="active"><a href="Vessels.php">Vessels</a></li>
                <li class="active"><a href="Shipment.php">Shipment</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php
require 'db.php';
$sql = 'SELECT * FROM cargo';
$statement = $connection->prepare($sql);
$statement->execute();
$cargo = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>List of Cargos</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Cargo Name</th>
                    <th>Cargo Length</th>
                    <th>Cargo Width </th>
                    <th>Cargo Weight </th>
                    <th>Cargo Status </th>
                    <th>Action</th>
                </tr>
                <?php foreach($cargo as $ListCargo): ?>
                    <tr>
                        <td><?= $ListCargo->ID; ?></td>
                        <td><?= $ListCargo->CargoName; ?></td>
                        <td><?= $ListCargo->CargoLength; ?></td>
                        <td><?= $ListCargo->CargoWidth; ?></td>
                        <td><?= $ListCargo->CargoWeight; ?></td>
                        <td><?= $ListCargo->CargoStatus; ?></td>
                        <td>
                            <a href="UpdateCargo.php?id=<?= $ListCargo->ID ?>" class="btn btn-info">Update</a>
                            <a onclick="return confirm('Are you sure you want to delete this entry?')" href="DeleteCargo.php?id=<?= $ListCargo->ID ?>" class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>

            <a href="CreateCargo.php" class="btn btn-info">Create Cargo</a>
        </div>
    </div>
</div>




<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

