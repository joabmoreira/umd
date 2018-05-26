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

$conn->beginTransaction();


$stmt = $conn->prepare("delete a04  WHERE  ukey = ?");

$ukey ="b08b2e127b95";

$stmt->execute(array($ukey));

//$conn->rollBack();
$conn->commit();

echo "apagado ok";




?>