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

    <h2>Ocorrência número <?php echo $ocorrencia['Numero']; ?></h2>
    <hr>

<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

    <dl class="dl-horizontal">
        <dt>Numero da Ocorrência:</dt>
        <dd><?php echo $ocorrencia['Numero']; ?></dd>
        <hr>
        <dt>Ano:</dt>
        <dd><?php echo $ocorrencia['Ano']; ?></dd>
        <hr>
        <dt>Data do Fato:</dt>
        <dd><?php echo $ocorrencia['Data_fato']; ?></dd>
        <hr>
        <dt>Data de Registro:</dt>
        <dd><?php echo $ocorrencia['Data_registro']; ?></dd>
        <hr>
        <dt>Flagrante:</dt>
        <dd><?php echo $ocorrencia['Flagrante'] == 0 ? 'Não' : 'Sim'; ?></dd>
        <hr>
        <dt>Tentativa:</dt>
        <dd><?php echo $ocorrencia['Tentativa'] == 0 ? 'Não' : 'Sim'; ?></dd>
        <hr>
        <dt>Unidade Apuração:</dt>
        <dd><?php echo isset($unidadePolicialApuracao['Nome']) ? $unidadePolicialApuracao['Nome'] : ''; ?></dd>
        <hr>
        <dt>Unidade Registro:</dt>
        <dd><?php echo isset($unidadePolicialRegistro['Nome']) ? $unidadePolicialRegistro['Nome'] : ''; ?></dd>
        <hr>
        <dt>Descricao:</dt>
        <dd><?php echo $ocorrencia['descricao']; ?></dd>
    </dl>


<?php include(FOOTER_TEMPLATE); ?>