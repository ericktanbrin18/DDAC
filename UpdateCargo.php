<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM cargo WHERE ID=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$cargo = $statement->fetch(PDO::FETCH_OBJ);
if (isset($_POST['UpdateCargo'])) {

    $CargoName = $_POST['CargoName'];
    $CargoLength = $_POST['CargoLength'];
    $CargoWidth = $_POST['CargoWidth'];
    $CargoWeight = $_POST['CargoWeight'];
    $CargoStatus = $_POST['CargoStatus'];

    if ($CargoName == "" || $CargoLength == "" || $CargoWidth == "" || $CargoWeight == "" || $CargoStatus == "")
    {
        echo "<script>alert('Please Fill In All The Information')</script>";
    }
    else

    {
        $sql1 = 'UPDATE cargo SET CargoName= :CargoName, CargoLength=:CargoLength, CargoWidth=:CargoWidth, 
                                 CargoWeight=:CargoWeight, CargoStatus=:CargoStatus WHERE ID= :id';
        $statement1 = $connection->prepare($sql1);
        if ($statement1->execute ([':CargoName' => $CargoName, ':CargoLength' => $CargoLength, ':CargoWidth' => $CargoWidth, ':CargoWeight' => $CargoWeight, ':CargoStatus' => $CargoStatus,  ':id' => $id]))
        {
            header("Location: Cargo.php");
        }
    }

}
if (isset($_POST['PreviousPage']))
{
    header("Location: Cargo.php");
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
                        <label for="name">Cargo Name</label>
                        <input type="text" value="<?= $cargo->CargoName; ?>" name="CargoName" id="CargoName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="length">Cargo Length</label>
                        <input type="Number" value="<?= $cargo->CargoLength; ?>" name="CargoLength" id="CargoLength" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="width">Cargo Width</label>
                        <input type="Number" value="<?= $cargo->CargoWidth; ?>" name="CargoWidth" id="CargoWidth" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="width">Cargo Weight</label>
                        <input type="number" value="<?= $cargo->CargoWeight; ?>" name="CargoWeight" id="CargoWeight" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Cargo Status</label>
                        <input type="text" value="<?= $cargo->CargoStatus; ?>" name="CargoStatus" id="CargoStatus" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info" name="UpdateCargo">Update Cargo</button>
                        <button type="submit" class="btn btn-info" name="PreviousPage">Previous Page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>