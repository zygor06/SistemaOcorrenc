<?php
/**
 * Created by PhpStorm.
 * User: Hygor Dias <hygor_christian@hotmail.com>
 * Date: 11/05/2017
 * Time: 21:25
 */

require_once('config.php');
require_once('inc/database.php');

$ocorrencias = null;
$ocorrencia = null;

/**
 * Listagem de Ocorrencias
 *
 */

function index(){
    global $ocorrencias;
    $ocorrencias = find_all('marca');
}