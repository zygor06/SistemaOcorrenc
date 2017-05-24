<?php

/**
 * Created by PhpStorm.
 * User: Hygor Dias <hygor_christian@hotmail.com>
 * Date: 11/05/2017
 * Time: 21:25
 */

require_once('../../config.php');
require_once('../../inc/database.php'); //Importando a função save()

$ocorrencias = null;
$unidadesPoliciais = null;

$ocorrencia = null;
$unidadePolicialApuracao = null;
$unidadePolicialRegistro = null;

/**
 * @param null $table -> Nome da tabela
 *
 * Retorna todos os dados da tabela
 *
 * Created By: Hygor
 */
function index($table, &$var = null){
    global $ocorrencias;
    $ocorrencias = find_all($table);
}



function indexUnidadesPoliciais($table){
    global $unidadesPoliciais;
    $unidadesPoliciais = find_all($table);
}

/**
 * @param null $vire -> Nome da view
 *
 * Retorna todos os dados da tabela
 *
 * Created By: Hygor
 */
function loadView($view){
    global $ocorrencias;
    $sql = "SELECT * FROM $view;";
    $ocorrencias = executeSql($sql);
}


function view($id = null) {
    global $ocorrencia;
    global $unidadePolicialApuracao;
    global $unidadePolicialRegistro;
    $ocorrencia = find('ocorrencia_policial', $id, 'Numero');
    $unidadePolicialApuracao = find('unidade_policial', $ocorrencia['Unidade_Policial_Apuracao_ID'], 'ID');
    $unidadePolicialRegistro = find('unidade_policial', $ocorrencia['Unidade_Policial_Registro_ID'], 'ID');
}

/**
 * @param array $post_data -> nome do array passado via post
 *
 * Created By: Hygor
 */
function add() {

  if (!empty($_POST['ocorrencia'])) {
    
    $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));

    $ocorrencia = $_POST['ocorrencia'];
    $ocorrencia['modified'] = $ocorrencia['created'] = $today->format("Y-m-d H:i:s");
    
    save('ocorrencias', $ocorrencia);
    header('location: index.php');
  }
}

/**
 *  Atualização / Edição de ocorrências
 *
 */

function edit() {

  $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));

  if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_POST['ocorrencia'])) {

      $ocorrencia = $_POST['ocorrencia'];
      $ocorrencia['Data_registro'] = $now->format("Y-m-d H:i:s");

      update('ocorrencia_policial', $id, $ocorrencia);
      header('location: ../../index.php');
    } else {

      global $ocorrencia;
      $ocorrencia = find('ocorrencias', $id);
    } 
  } else {
    header('location: index.php');
  }
}


/**
 *  Atualiza um registro em uma tabela, por ID
 */
function update($table = null, $id = 0, $pk_name = null, $data = null) {

  $database = open_database();

  $items = null;

  foreach ($data as $key => $value) {
    $items .= trim($key, "'") . "='$value',";
  }

  // remove a ultima virgula
  $items = rtrim($items, ',');

  $sql  = "UPDATE " . $table;
  $sql .= " SET $items";
  $sql .= " WHERE $pk_name = $id ;";

  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro atualizado com sucesso.';
    $_SESSION['type'] = 'success';

  } catch (Exception $e) { 

    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);
}