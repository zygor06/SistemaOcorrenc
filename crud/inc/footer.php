<?php

    if($_SERVER['REQUEST_URI'] != '/SistemaOcorrencia/crud/index.php'){
        require_once('../config.php');
    }

?>

</main> <!-- /container -->

<hr>
<footer class="container">
    <p>&copy;2017 - Hygor Christian e Carlos Said - UniCEUB</p>
</footer>

<script src="<?=JQUERY_PATH?>"></script>
<script>window.jQuery || document.write('<script src="<?=JQUERY_PATH?>"><\/script>')</script>

<script src="<?php echo BASEURL; ?>js/bootstrap.min.js"></script>

<script src="<?php echo BASEURL; ?>js/main.js"></script>
</body>
</html>