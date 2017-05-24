<?php
/** O nome do banco de dados*/
define('DB_NAME', 'ocorrencias');
    /** Usuário do banco de dados MySQL */
define('DB_USER', 'root');
    /** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'root');
    /** nome do host do MySQL */
define('DB_HOST', 'localhost');


    /* MUDAR CAMINHO DO LOCALHOST SE QUISER RODAR DE UM CAMINHO DIFERENTE!!! */


    /** caminho absoluto para a pasta do sistema **/
if (!defined('CAMINHO_ABSOLUTO'))
define('CAMINHO_ABSOLUTO', 'http://localhost:80/SistemaOcorrencia/crud/');


    /** caminho no server para o sistema **/
if (!defined('URL_BASE'))
define('URL_BASE', '/crud');

    /** caminho do arquivo de banco de dados **/
if (!defined('DBAPI'))
define('DBAPI', CAMINHO_ABSOLUTO . 'inc/database.php');

    /** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', CAMINHO_ABSOLUTO . 'inc/header.php');
define('FOOTER_TEMPLATE', CAMINHO_ABSOLUTO . 'inc/footer.php');

    /** definindo caminhos de css e javascript **/

define('BOOTSTRAP_PATH', CAMINHO_ABSOLUTO . 'css/bootstrap.min.css');
define('FONT_AWESOME_PATH', CAMINHO_ABSOLUTO . 'css/font-awesome.min.css');
define('JQUERY_PATH', CAMINHO_ABSOLUTO . 'js/jquery.min.js');