<?php


$modalidade = filter_input(INPUT_POST, 'modalidade', FILTER_SANITIZE_SPECIAL_CHARS);
$mensalidade = filter_input(INPUT_POST, 'mensalidade', FILTER_SANITIZE_SPECIAL_CHARS);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);


require_once "../../classes/autoload.php";

$update = new Modalidades();

$update->update($modalidade, $mensalidade, $id);

?>