<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Vaga;

//validação do post
if(isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    
    //criando uma nova vaga 
    $obVaga = new Vaga;

    //Definir os valores 
    $obVaga->titulo = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo = $_POST['ativo'];
    
    /*imprimir para teste 
    echo "<pre>"; print_r($obVaga); echo "</pre>"; exit;
    */

    //Cadastrar a vaga 
    $obVaga->cadastrar();

    header('location: index.php?status=success');
    exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';