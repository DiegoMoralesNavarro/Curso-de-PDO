<?php

require_once "../../classes/autoload.php";

$modalidade = filter_input(INPUT_POST, 'modalidade', FILTER_SANITIZE_SPECIAL_CHARS);
$mensalidade = filter_input(INPUT_POST, 'mensalidade', FILTER_SANITIZE_SPECIAL_CHARS);

$newMod = new Modalidades();
$newMod->dadosDoFormulario($modalidade, $mensalidade);
$newMod->create();

?>