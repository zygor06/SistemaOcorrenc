<?php
if($_SERVER['REQUEST_URI'] != '/SistemaOcorrencia/crud/index.php'){
    require_once('../config.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CRUD de Ocorrências com bootstrap</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="<?=BOOTSTRAP_PATH?>">
    <link rel="stylesheet" href="<?=FONT_AWESOME_PATH?>">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?=CAMINHO_ABSOLUTO?>index.php" class="navbar-brand">CRUD</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Ocorrências <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=CAMINHO_ABSOLUTO?>model/ocorrencias">Gerenciar Ocorrências</a></li>
                        <li><a href="<?=CAMINHO_ABSOLUTO?>model/ocorrencias/ocorrenciaVitima.php">Ocorrências por Vítima</a></li>
                        <li><a href="<?=CAMINHO_ABSOLUTO?>model/ocorrencias/ocorrenciaAutor.php">Ocorrências por Autor</a></li>
                        <li><a href="<?=CAMINHO_ABSOLUTO?>model/ocorrencias/add.php">Nova Ocorrência</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Pessoa Física <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?=CAMINHO_ABSOLUTO?>model/pessoaFisica/index.php">Ligação Pessoas com Veículos</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.navbar-collapse -->

    </div>
</nav>

<main class="container">