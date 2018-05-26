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


$stmt = $conn->prepare("update a04 set a04_001_c= :A04_001_C,a04_005_c =:A04_005_C WHERE  ukey = :UKEY");

$a04_001_c = "joao";
$a04_005_c = "ro moreira";
$ukey ="b087bf4bfb4b";

$stmt->bindParam(":A04_001_C",$a04_001_c);
$stmt->bindParam(":A04_005_C",$a04_005_c);
$stmt->bindParam(":UKEY",$ukey);

$stmt->execute();


echo "alterado ok";




?>