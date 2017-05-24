<?php
/**
 * Created by PhpStorm.
 * User: Hygor Dias <hygor_christian@hotmail.com>
 * Date: 23/05/2017
 * Time: 19:34
 */

require_once('../ocorrencias/functions.php');

loadView("pessoas_carros");

include(HEADER_TEMPLATE);
?>

    <header>
        <div class="row">
            <div class="col-sm-6">
                <h2>Ligação de pessoas com veículos</h2>
            </div>
            <div class="col-sm-6 text-right h2">
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

    <hr>

    <table class="table table-hover">
        <thead>
        <tr>
            <th class="col-sm-2">Nome</th>
            <th class="col-sm-1">Tipo Envolvimento</th>
            <th class="col-sm-1">N° Ocorrência</th>
            <th class="col-sm-1">Ano</th>
            <th class="col-sm-1">Marca</th>
            <th class="col-sm-1">Modelo</th>
            <th class="col-sm-1">Cor</th>
            <th class="col-sm-1">Placa</th>
            <th class="col-sm-1">UF</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($ocorrencias) : ?>
            <?php foreach ($ocorrencias as $ocorrencia) : ?>
                <tr>
                    <td><?php echo $ocorrencia[0]; ?></td>
                    <td><?php echo $ocorrencia[1]; ?></td>
                    <td><?php echo $ocorrencia[2]; ?></td>
                    <td><?php echo $ocorrencia[3]; ?></td>
                    <td><?php echo $ocorrencia[4]; ?></td>
                    <td><?php echo $ocorrencia[5]; ?></td>
                    <td><?php echo $ocorrencia[6]; ?></td>
                    <td><?php echo $ocorrencia[7]; ?></td>
                    <td><?php echo $ocorrencia[8]; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">Nenhum registro encontrado.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

<?php

include(FOOTER_TEMPLATE);

?>