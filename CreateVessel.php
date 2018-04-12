<?php
require 'db.php';
$message='';
if (isset ($_POST['Submit']))
{

    $VesselID = $_POST['VesselID'];
    $VesselName = $_POST['VesselName'];


    $sql = 'SELECT * FROM vessel';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $vessel = $statement->fetchAll(PDO::FETCH_OBJ);

    foreach($vessel as $ListVessel)
    {

    }

    if ($VesselName == "" || $VesselID == "")
    {
        echo "<script>alert('Please Fill In All The Information')</script>";
    }

    if ($VesselID == $ListVessel->ID)
    {
        echo "<script>alert('Please Enter Another ID')</script>";
    }
    else {
        $sql1 = "INSERT INTO vessel(ID, VesselName) 
              VALUES('$VesselID', '$VesselName')";
        $statement1 = $connection->prepare($sql1);
        if ($statement1->execute())
        {
            header("Location: Vessels.php");
        }


    }
}
if (isset ($_POST['PreviousPage']))
{
    header("Location: Vessels.php");
}
?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create The Vessel</h2>
            </div>
            <div class="card-body">
                <?php if(!empty($message)): ?>
                    <div class="alert alert-success">
                        <?= $message; ?>
                    </div>
                <?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <h2>Please Fill In The Information </h2>
                        <label for="VesselName">Vessel ID</label>
                        <input type="text" name="VesselID" id="VesselID" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="VesselCapacity">Vessel Name</label>
                        <input type="text" name="VesselName" id="VesselName" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="Submit" class="btn btn-info">Create Vessel</button>
                        <button type="submit" name="PreviousPage" class="btn btn-info" >Previous Page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>