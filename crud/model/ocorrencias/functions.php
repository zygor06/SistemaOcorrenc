<?php

/**
 * Created by PhpStorm.
 * User: Hygor Dias <hygor_christian@hotmail.com>
 * Date: 11/05/2017
 * Time: 21:25
 */

require_once('../../config.php');
require_once('../../inc/database.php'); //Importando a função save()

$ocorrencias = NULL;
$unidadesPoliciais = NULL;

$ocorrencia = NULL;
$unidadePolicialApuracao = NULL;
$unidadePolicialRegistro = NULL;

/**
 * @param null $table -> Nome da tabela
 *
 * Retorna todos os dados da tabela
 *
 * Created By: Hygor
 */
function index($table, &$var = NULL) {
    global $ocorrencias;
    $ocorrencias = find_all($table);
}


function indexUnidadesPoliciais($table) {
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
function loadView($view) {
    global $ocorrencias;
    $sql = "SELECT * FROM $view;";
    $ocorrencias = executeSql($sql);
}


function view($id = NULL) {
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
        $ocorrencia['Data_registro'] = $today->format("Y-m-d H:i:s");

        save('ocorrencia_policial', $ocorrencia);

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
function update($table = NULL, $id = 0, $pk_name = NULL, $data = NULL) {

    var_dump($data);

    $database = open_database();

    $items = NULL;

    foreach ($data as $key => $value) {
        $items .= trim($key, "'") . "='$value',";
    }

    // remove a ultima virgula
    $items = rtrim($items, ',');

    $sql = "UPDATE " . $table;
    $sql .= " SET $items";
    $sql .= " WHERE $pk_name = $id ;";

    try {
        $database->query($sql);

        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';
        header("Location: index.php");

    } catch (Exception $e) {

        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
}

/**
 *  Atualiza um registro em uma tabela, por ID
 */
function insert($table = null, $data = null) {

    var_dump($data);

    $database = open_database();

    $items = null;

    foreach ($data as $key => $value) {
        $items .= trim($key, "'") . "='$value',";
    }

    // remove a ultima virgula
    $items = rtrim($items, ',');

    $sql = "INSERT INTO $table " ;
    $sql .= "SET  $items ;";

    echo $sql;

    try {
        $database->query($sql);

        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';
        header("Location: index.php");

    } catch (Exception $e) {

        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    }

    close_database($database);
}

function delete($id = null) {
    global $ocorrencia;
    $ocorrencia = remove('ocorrencia_policial', 'Numero', $id);  //remove( $table = null, $pk = null,  $id = null )
    header('location: index.php');
}