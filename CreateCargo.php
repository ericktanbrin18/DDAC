<?php
require 'db.php';
if (isset ($_POST['Submit']))
{
    $CargoID = $_POST['CargoID'];
    $CargoName = $_POST['CargoName'];
    $CargoLength = $_POST['CargoLength'];
    $CargoWidth = $_POST['CargoWidth'];
    $CargoWeight = $_POST['CargoWeight'];
    $CargoStatus = $_POST['CargoStatus'];

    $sql = 'SELECT * FROM cargo';
    $statement = $connection->prepare($sql);
    $statement->execute();
    $cargo = $statement->fetchAll(PDO::FETCH_OBJ);

    foreach($cargo as $ListCargo)
    {

    }

    if ($CargoID == "" || $CargoName == "" || $CargoLength == "" || $CargoWidth == "" || $CargoWeight == "" || $CargoStatus == "")
    {
        echo "<script>alert('Please Fill In All The Information')</script>";
    }

    if ($CargoID == $ListCargo->ID)
    {
        echo "<script>alert('Please Enter Another ID')</script>";
    }

    else {
        $sql1 = "INSERT INTO cargo(ID, CargoName, CargoLength, CargoWidth, CargoWeight, CargoStatus) 
              VALUES('$CargoID', '$CargoName', '$CargoLength', '$CargoWidth', 
                     '$CargoWeight', '$CargoStatus')";
        $statement1 = $connection->prepare($sql1);
        $statement1->execute();

        header("Location: Cargo.php");


    }
}
if (isset ($_POST['PreviousPage']))
{
    header("Location: Cargo.php");
}
?>
<?php require 'header.php'; ?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create The Cargo</h2>
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
                        <label for="CargoID">Cargo ID</label>
                        <input type="text" name="CargoID" id="CargoID" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="CargoLength">Cargo Name</label>
                        <input type="text" name="CargoName" id="CargoName" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="CargoLength">Cargo Length</label>
                        <input type="number" name="CargoLength" id="CargoLength" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="CargoWidth">Cargo Width</label>
                        <input type="number" name="CargoWidth" id="CargoWidth" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="CargoWeight">Cargo Weight</label>
                        <input type="number" name="CargoWeight" id="CargoWeight" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="CargoStatus">Cargo Status</label>
                        <input type="text" name="CargoStatus" id="CargoStatus" class="form-control" placeholder="Available">
                    </div>

                    <div class="form-group">
                        <button type="submit" name="Submit" class="btn btn-info">Create Cargo</button>
                        <button type="submit" name="PreviousPage" class="btn btn-info">Previous Page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>