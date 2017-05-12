<?php
require_once('model/ocorrencias/functions.php');
index();



include(HEADER_TEMPLATE); ?>

    <script>console.log(<?php echo $ocorrencias[0]['id'] ?>)</script>
    <header>
        <div class="row">
            <div class="col-sm-6">
                <h2>Marcas de Veículos</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Nova Marca</a>
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
            <th>ID</th>
            <th>Marca</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($ocorrencias) : ?>
            <?php foreach ($ocorrencias as $ocorrencia) : ?>
                <tr>
                    <td><?php echo $ocorrencia[0]; ?></td>
                    <td><?php echo $ocorrencia[1]; ?></td>
                    <td class="actions text-right">
                        <a href="view.php?id=<?php echo $ocorrencia['ID']; ?>" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                        <a href="edit.php?id=<?php echo $ocorrencia['ID']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
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

<?php include(FOOTER_TEMPLATE); ?>