<?php

require __DIR__.'/vendor/autoload.php';

//validação do post
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    die('Cadastrar');
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';