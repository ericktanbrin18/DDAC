<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM vessel WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$vessel = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['UpdateVessel'])) {
    $VesselName = $_POST['VesselName'];
    if ($VesselName == "")
    {
        echo "<script>alert('Please Fill In The Information')</script>";
    }
    else
    {
        $sql1 = 'UPDATE vessel SET VesselName=:VesselName WHERE id=:id';
        $statement1 = $connection->prepare($sql1);
        if ($statement1->execute ([':VesselName' => $VesselName, ':id' => $id]))
        {
            header("Location: Vessels.php");
        }
    }

}
if (isset($_POST['PreviousPage']))
{
    header("Location: Vessels.php");
}
?>
<?php require 'header.php'; ?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>Update Cargo</h2>
        </div>
        <div class="card-body">
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <div class="form-group">
                    <label for="VesselName">Vessel Name</label>
                    <input type="text" value="<?= $vessel->VesselName; ?>" name="VesselName" id="VesselName" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info" name="UpdateVessel">Update Vessel</button>
                    <button type="submit" class="btn btn-info" name="PreviousPage">Previous Page</button>
                </div>
            </form>
        </div>
    </div>
</div>