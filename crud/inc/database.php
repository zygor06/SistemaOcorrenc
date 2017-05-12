<?php

mysqli_report(MYSQLI_REPORT_STRICT);

/**
 * @return mysqli|null
 * Created By: Hygor
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
 * @param $conn
 * Created By: Hygor
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
 * Created By: Hygor
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
 * @param $table        //Nome da tabela
 *
 * @return array|null
 * Created By: Hygor
 */
function find_all($table) {
    return find($table);
}
