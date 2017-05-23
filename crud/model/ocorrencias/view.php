<?php
/**
 * Created by PhpStorm.
 * User: Hygor Dias <hygor_christian@hotmail.com>
 * Date: 23/05/2017
 * Time: 20:02
 */

	require_once('functions.php');
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

    <?php var_dump($ocorrencia); ?>
    <h2>Ocorrência número <?php echo $ocorrencia['Numero']; ?></h2>
    <hr>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

    <dl class="dl-horizontal">
        <dt>Numero da Ocorrência:</dt>
        <dd><?php echo $customer['name']; ?></dd>

        <dt>Ano:</dt>
        <dd><?php echo $customer['cpf_cnpj']; ?></dd>

        <dt>Data do Fato:</dt>
        <dd><?php echo $customer['birthdate']; ?></dd>
    </dl>

    <dl class="dl-horizontal">
        <dt>Endereço:</dt>
        <dd><?php echo $customer['address']; ?></dd>

        <dt>Bairro:</dt>
        <dd><?php echo $customer['hood']; ?></dd>

        <dt>CEP:</dt>
        <dd><?php echo $customer['zip_code']; ?></dd>

        <dt>Data de Cadastro:</dt>
        <dd><?php echo $customer['created']; ?></dd>
    </dl>

    <dl class="dl-horizontal">
        <dt>Cidade:</dt>
        <dd><?php echo $customer['city']; ?></dd>

        <dt>Telefone:</dt>
        <dd><?php echo $customer['phone']; ?></dd>

        <dt>Celular:</dt>
        <dd><?php echo $customer['mobile']; ?></dd>

        <dt>UF:</dt>
        <dd><?php echo $customer['state']; ?></dd>

        <dt>Inscrição Estadual:</dt>
        <dd><?php echo $customer['ie']; ?></dd>
    </dl>

    <div id="actions" class="row">
        <div class="col-md-12">
            <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-primary">Editar</a>
            <a href="index.php" class="btn btn-default">Voltar</a>
        </div>
    </div>

<?php include(FOOTER_TEMPLATE); ?>