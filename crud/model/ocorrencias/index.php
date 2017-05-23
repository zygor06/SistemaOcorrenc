<?php

require_once('functions.php');

index("ocorrencia_policial");

include(HEADER_TEMPLATE);
?>

<header>
    <div class="row">
        <div class="col-sm-6">
            <h2>Ocorrências</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Nova Ocorrência</a>
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
        <th>Número da Ocorrência</th>
        <th>Ano</th>
        <th>Data Registro</th>
        <th>Descricao</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($ocorrencias) : ?>
        <?php foreach ($ocorrencias as $ocorrencia) : ?>
            <tr>
                <td><?php echo $ocorrencia[0]; ?></td>
                <td><?php echo $ocorrencia[1]; ?></td>
                <td><?php echo $ocorrencia[3]; ?></td>
                <td><?php echo $ocorrencia[8]; ?></td>
                <td class="actions text-right">
                    <a href="view.php?id=<?php echo $ocorrencia[0]; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                    <a href="edit.php?id=<?php echo $ocorrencia[0]; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                    <a href="#" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $ocorrencia['id']; ?>">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
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