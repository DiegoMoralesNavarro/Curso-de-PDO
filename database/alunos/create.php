<?php

require_once "../../classes/autoload.php";

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$modalidade = filter_input(INPUT_POST, 'modalidade', FILTER_SANITIZE_SPECIAL_CHARS);

$newAluno = new Alunos();
$newAluno->dadosDoFormulario($nome, $tel, $email, $modalidade);
$newAluno->create();



?>