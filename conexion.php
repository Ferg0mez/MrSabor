<?php 
try {
    $conn = new PDO("sqlsrv:server = tcp:mrsabor.database.windows.net,1433; Database = mrsabor", "adminmrsabor", "Mrsabor123");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "adminmrsabor@mrsabor", "pwd" => "Mrsabor123", "Database" => "mrsabor", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:mrsabor.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>
