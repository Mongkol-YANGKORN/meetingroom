<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// เรียกใช้งานไฟล์เชื่อมต่อกับฐานข้อมูล
//Connect MSSQL
$serverName = 'localhost';
$userName = 'sa';
$userPassword = 'Hunterman1328!';
$dbName = 'meetings_room';

try {
    $conn = new PDO("sqlsrv:server=$serverName ; Database = $dbName", $userName, $userPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die(print_r($e->getMessage()));
}

$json_data = array();

$q = "SELECT * FROM Booked INNER JOIN Room ON Booked.ID_Room=Room.ID_Room  
INNER JOIN dbo.Member on Member.ID_Member= dbo.Booked.ID_Member ";

$meQuery = $conn->query($q);
while ($rs = $meQuery->fetch(PDO::FETCH_ASSOC)) {
    $ID4 = $rs['ID_Booked'];
    $ID = $rs['Room_Name'];
    $ID1 = $rs['Event_Start'];
    $ID2 = $rs['Event_End'];
    $json_data[] = [
        'title' => $ID . ' , ' . $ID4,
        'start' => $ID1,
        'end' => $ID2
    ];
}
$json = json_encode($json_data);
echo $json;