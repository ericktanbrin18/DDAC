<?php
require 'db.php';
$sql = 'SELECT * FROM cargo';
$statement = $connection->prepare($sql);
$statement->execute();
$cargo = $statement->fetchAll(PDO::FETCH_OBJ);

$sql1 = 'SELECT * FROM vessel';
$statement1 = $connection->prepare($sql1);
$statement1->execute();
$vessel = $statement1->fetchAll(PDO::FETCH_OBJ);



$message='';
if (isset ($_POST['Submit']))
{
    $ShipmentID = $_POST['ShipmentID'];
    $VesselName = $_POST['VesselName'];
    $CargoName = $_POST['CargoName'];
    $Date = $_POST['Date'];

    $sql2 = 'SELECT * FROM shipment';
    $statement2 = $connection->prepare($sql2);
    $statement2->execute();
    $shipment = $statement2->fetchAll(PDO::FETCH_OBJ);

    foreach($shipment as $ListShipment)
    {

    }

    if ( $ShipmentID == "" || $VesselName == "1" || $CargoName == "1" || $Date == "")
    {
        echo "<script>alert('Please Fill In All The Information')</script>";
    }
    if ($ShipmentID == $ListShipment->ID)
    {
        echo "<script>alert('Please Enter Another ID')</script>";
    }
    else {
        $sql3 = "INSERT INTO shipment(ID, vessel, cargo, date) 
              VALUES('$ShipmentID', '$VesselName', '$CargoName', '$Date')";
        $statement3 = $connection->prepare($sql3);
        if ($statement3->execute())
        {
            header("Location: Shipment.php");
        }


    }
}
if (isset ($_POST['PreviousPage']))
{
    header("Location: Shipment.php");
}
?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create The Shipment</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?= $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class ="form-group">
                        <h2>Please Fill In The Information </h2>
                        <br>
                        <label for="ShipmentID">Shipment ID</label>
                        <input type="text" name="ShipmentID" id="ShipmentID" class="form-control">
                    </div>
                    <div class="form-group">

                        <label for="VesselName">Vessel</label>
                        <br>
                        <?php
                        echo "<select name='VesselName'>";
                        echo"<option value = '1'>(Choose a Vessel)</option>";
                        foreach($vessel as $ListVessel)
                        {
                            echo"<option value='".$ListVessel->VesselName."'>".$ListVessel->VesselName."</option>";
                        }
                        echo"</select>";
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="CargoName">Select Cargo</label>
                        <br>
                        <?php
                        echo "<select name='CargoName'>";
                        echo"<option value = '1'>(Choose a Cargo)</option>";
                        foreach($cargo as $ListCargo)
                        {
                            echo"<option value='".$ListCargo->CargoName."'>".$ListCargo->CargoName."</option>";
                        }
                        echo"</select>";
                        ?>
                    </div>

                    <div class="form-group">
                        <label for="Date">Date</label>
                        <input type="date" name="Date" id="Date" class="form-control">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="Submit" class="btn btn-info">Create Shipment</button>
                        <button type="submit" name="PreviousPage" class="btn btn-info">Previous Page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>