<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM Shipment WHERE ID=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$shipment = $statement->fetch(PDO::FETCH_OBJ);

$sql1 = 'SELECT * FROM vessel';
$statement1 = $connection->prepare($sql1);
$statement1->execute();
$vessel = $statement1->fetchAll(PDO::FETCH_OBJ);

$sql2 = 'SELECT * FROM cargo';
$statement2 = $connection->prepare($sql2);
$statement2->execute();
$cargo = $statement2->fetchAll(PDO::FETCH_OBJ);


if (isset($_POST['UpdateShipment']))
{
    $VesselName = $_POST['VesselName'];
    $CargoName = $_POST['CargoName'];
    $Date = $_POST['Date'];



    $sql3 = 'UPDATE Shipment SET Vessel=:VesselName, Cargo=:CargoName, Date=:Date WHERE ID=:id';
    $statement1 = $connection->prepare($sql3);
    if ($statement1->execute([':VesselName' => $VesselName, ':CargoName' => $CargoName, ':Date' => $Date, ':id' => $id]))
    {
        header("Location: Shipment.php");
    }



}
if (isset($_POST['PreviousPage']))
{
    header("Location: Shipment.php");
}
?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update Shipment</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="VesselName">Vessel</label>
                    <br>
                    <?php

                    echo "<select name='VesselName'>";
                    echo"<option value='".$shipment->vessel."'>".$shipment->vessel."</option>";
                    foreach($vessel as $ListVessel)
                    {
                        echo"<option value='".$ListVessel->VesselName."'>".$ListVessel->VesselName."</option>";
                    }
                    echo"</select>";
                    ?>
                </div>

                <div class="form-group">
                    <label for="CargoName">Cargo</label>
                    <br>
                    <?php

                    echo "<select name='CargoName'>";
                    echo"<option value = '".$shipment->cargo."'>".$shipment->cargo."</option>";
                    foreach($cargo as $ListCargo)
                    {
                        echo"<option value='".$ListCargo->CargoName."'>".$ListCargo->CargoName."</option>";
                    }
                    echo"</select>";

                    ?>
                </div>

                <div class="form-group">
                    <label for="Date">Date</label>
                    <input type="date" value="<?= $shipment->date; ?>" name="Date" id="Date" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info" name="UpdateShipment">Update Shipment</button>
                    <button type="submit" class="btn btn-info" name="PreviousPage">Previous Page</button>
                </div>
            </form>
        </div>
    </div>
</div>