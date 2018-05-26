<?php
/**
 * Created by PhpStorm.
 * User: joab
 * Date: 25/05/2018
 * Time: 17:41
 */

$banco = "moinhoteste";
$servidor = "192.168.101.30";
$usuario = "sa";
$senha = "mygod&1000";
$conn = new PDO("sqlsrv:Database=$banco;server=$servidor;ConnectionPooling=0",$usuario,$senha);
$stmt = $conn->prepare("select * from a01");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
//print_r($result);
?>