<?php
require_once('model/ocorrencias/functions.php');
index();

include(HEADER_TEMPLATE); 
?>

<header>
    <div class="row">
        <div class="col-sm-6">
            <h2>Ocorrências</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary" href="addOcorrencia.php"><i class="fa fa-plus"></i> Nova Ocorrência</a>
            <a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>
    </div>
</header>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $_SESSION['message']; ?>
    </div>
    <?php clear_messages(); ?>
<?php endif; ?>