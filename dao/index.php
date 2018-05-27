<?php
/**
 * Created by PhpStorm.
 * User: joab
 * Date: 25/05/2018
 * Time: 22:52
 */
require_once("config.php");
/*$sql = new Sql();
$a04 = $sql->select("select * from a04");
echo json_encode($a04);*/

//$cartao = new Cartao();
//$cartao->loadByUkey("b08b2eca2316");

//echo $cartao;

//$lista = cartao::getList();
//echo json_encode($lista);

//$search = Cartao::search("sa");
//echo json_encode($search);

/*$login = new Cartao();
$login->login("daniel","moreira");

echo $login;*/
//inserir
//$car = new Cartao(substr(uniqid(),1,20),"elo","bb");
//$car->insert();

//echo $car;


//alterando

$cartao = new Cartao();
$cartao->loadByUkey("b0aa5c447b6a                ");
$cartao->update("VISA","OUROCARD BOM bom");

ECHO $cartao;

?>