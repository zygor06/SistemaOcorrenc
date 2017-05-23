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
$ocorrencia = null;

/**
 * @param null $table -> Nome da tabela
 *
 * Retorna todos os dados da tabela
 *
 * Created By: Hygor
 */
function index($table){
    global $ocorrencias;
    $ocorrencias = find_all($table);
}

/**
 * @param null $table -> Nome da tabela
 *
 * Retorna todos os dados da tabela
 *
 * Created By: Hygor
 */
function listaOcorrenciaCNPJ(){
    global $ocorrencias;
    $sql = 'SELECT oc.numero AS \'Ocorrência nº\', oc.ano AS \'Ano\', pj.nome_fantasia AS \'Nome Fantasia\', pj.razao_social AS \'Razão Social\' 
	        FROM ocorrencia_policial oc
	        JOIN envolve_cnpj epj ON oc.numero = epj.ocorrencia_policial_numero AND oc.ano = epj.ocorrencia_policial_ano
	        JOIN pessoa_juridica pj ON epj.pessoa_juridica_cnpj = pj.cnpj;';
    $ocorrencias = executeSql($sql);
}

/**
 * @param null $table -> Nome da tabela
 *
 * Retorna todos os dados da tabela
 *
 * Created By: Hygor
 */
function listaOcorrenciaAutor(){
    global $ocorrencias;
    $sql = 'SELECT oc.numero AS \'Ocorrência nº\', oc.ano AS \'Ano\', pf.nome AS \'Nome do Autor\' FROM pessoa_fisica pf 
	        JOIN envolve_cpf e ON pf.cpf = e.pessoa_fisica_cpf AND pf.cpf_mae = e.pessoa_fisica_cpf_mae
	        JOIN ocorrencia_policial oc ON oc.numero = e.ocorrencia_policial_numero	AND oc.ano = e.ocorrencia_policial_ano
            WHERE e.tipo_envolvimento_id = "3";';
    $ocorrencias = executeSql($sql);
}


/**
 * @param array $post_data -> nome do array passado via post
 *
 * Created By: Hygor
 */
function add() {

  if (!empty($_POST['ocorrencia_policial'])) {
    
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
      $ocorrencia['modified'] = $now->format("Y-m-d H:i:s");

      update('ocorrencias', $id, $ocorrencia);
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
function update($table = null, $id = 0, $data = null) {

  $database = open_database();

  $items = null;

  foreach ($data as $key => $value) {
    $items .= trim($key, "'") . "='$value',";
  }

  // remove a ultima virgula
  $items = rtrim($items, ',');

  $sql  = "UPDATE " . $table;
  $sql .= " SET $items";
  $sql .= " WHERE id=" . $id . ";";

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