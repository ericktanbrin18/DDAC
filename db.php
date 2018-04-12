<?php
$dsn = 'mysql:host=127.0.0.1;dbname=ddac';
$username = 'root';
$password = '';
$options = [];
try {
    //echo "<script>'ABC'</script>";
    $connection = new PDO("sqlsrv:server = tcp:erickddac123.database.windows.net,1433; Database = MaerskLine", "Erick", "12321232Aq");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "<script>'asdfa'</script>";

} catch(PDOException $e) {


    echo $e;
    die('something went wrong!');

}
?>
