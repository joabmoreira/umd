<?php
/**
 * Created by PhpStorm.
 * User: joab
 * Date: 25/05/2018
 * Time: 18:02
 */

$banco = "moinhoteste";
$servidor = "192.168.101.30";
$usuario = "sa";
$senha = "mygod&1000";
$conn = new PDO("sqlsrv:Database=$banco;server=$servidor;ConnectionPooling=0",$usuario,$senha);


$stmt = $conn->prepare("insert into a04 (ukey,a04_001_c,a04_005_c) VALUES (:UKEY,:A04_001_C,:A04_005_C)");

$ukey = substr(uniqid(),1,20);
$a04_001_c = "rosangela";
$a04_005_c = "moreira";

$stmt->bindParam(":UKEY",$ukey);
$stmt->bindParam(":A04_001_C",$a04_001_c);
$stmt->bindParam(":A04_005_C",$a04_005_c);

$stmt->execute();


echo "inserido ok";




?>