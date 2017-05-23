<?php

/**
 * User: Carlos Said <cbandeira@gmail.com>
 * Date: 19/05/2017
 * Time: 17:49
 */

mysqli_report(MYSQLI_REPORT_STRICT);

/**
 * @return mysqli|null
 * Created By: Carlos Said
 */
function open_database() {
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        return $conn;
    } catch (Exception $e) {
        echo $e->getMessage();

        return NULL;
    }
}

/**
 * @return mysqli|null
 * Created By: Carlos Said
 */
function executeSql($sql) {
    $database = open_database();
    $found = NULL;

    try {
        $result = $database->query($sql);

        if ($result->num_rows > 0) {
            $found = $result->fetch_all();
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($database);

    return $found;
}



/**
 * @param $conn
 * Created By: Carlos Said
 */
function close_database($conn) {
    try {
        mysqli_close($conn);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/**
 * @param null $table       //Nome da tabela
 * @param null $id          //ID que procura
 * @param null $column_id   //Nome da coluna
 *
 * @return array|null
 * Created By: Carlos Said
 */
function find($table = NULL, $id = null, $column_id = 'id') {

    $database = open_database();
    $found = NULL;

    try {

        if ($id) {
            $sql = "SELECT * FROM $table WHERE $column_id = $id";
            $result = $database->query($sql);

            if ($result->num_rows > 0) {
                $found = $result->fetch_assoc();
            }

        } else {
            $sql = "SELECT * FROM $table";
            $result = $database->query($sql);

            if ($result->num_rows > 0) {
                $found = $result->fetch_all();
            }
        }

    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';
    }

    close_database($database);

    return $found;
}


/**
 *
 *@param null $table -> Nome da tabela
 *@param null $data -> Array de dados passados via POST
 * 
 * Created By: Carlos Said
 */
function save($table = null, $data = null) {

  $database = open_database();

  $columns = null;
  $values = null;

  //print_r($data);

  foreach ($data as $key => $value) {
    $columns .= trim($key, "'") . ",";
    $values .= "'$value',";
  }

  // remove a ultima virgula
  $columns = rtrim($columns, ',');
  $values = rtrim($values, ',');
  
  $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";

  try {
    $database->query($sql);

    $_SESSION['message'] = 'Registro cadastrado com sucesso.';
    $_SESSION['type'] = 'success';
  
  } catch (Exception $e) { 
  
    $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
    $_SESSION['type'] = 'danger';
  } 

  close_database($database);
}

/**
 * @param $table        //Nome da tabela
 *
 * @return array|null
 * Created By: Carlos Said
 */
function find_all($table) {
    return find($table);
}
