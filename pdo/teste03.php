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


$stmt = $conn->prepare("delete a04  WHERE  ukey = :UKEY");

$ukey ="b087bf4bfb4b";

$stmt->bindParam(":UKEY",$ukey);

$stmt->execute();


echo "apagado ok";




?>