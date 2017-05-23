<?php

/* MUDAR CAMINHO DO LOCALHOST SE QUISER RODAR DE UM CAMINHO DIFERENTE!!! */


/** caminho absoluto para a pasta do sistema **/
if (!defined('CAMINHO_ABSOLUTO'))
    define('CAMINHO_ABSOLUTO', 'http://localhost:80/SistemaOcorrencia/crud/');

?>

</main> <!-- /container -->

<hr>
<footer class="container">
    <p>&copy;2017 - Hygor Christian e Carlos Said - UniCEUB</p>
</footer>

<script src="<?=CAMINHO_ABSOLUTO.'js/jquery.min.js'?>"></script>
<script>window.jQuery || document.write('<script src="<?=CAMINHO_ABSOLUTO.'js/jquery.min.js'?>"><\/script>')</script>

<script src="<?=CAMINHO_ABSOLUTO?>js/bootstrap.min.js"></script>
</body>
</html>