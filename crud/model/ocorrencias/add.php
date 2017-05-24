<?php

require_once('functions.php');
indexUnidadesPoliciais('unidade_policial');
if(isset($_POST['ocorrencia'])){
    insert('ocorrencia_policial', $_POST['ocorrencia']);
}
?>

<?php include(HEADER_TEMPLATE); ?>

    <h2>Nova Ocorrência</h2>

    <form action="add.php" method="post">
        <!-- area de campos do form -->
        <hr/>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="name">Ano</label>
                <input type="text" class="form-control" name="ocorrencia['Ano']">
            </div>

            <div class="form-group col-md-3">
                <label for="campo2">Data Fato</label>
                <input type="text" class="form-control" name="ocorrencia['Data_fato']" placeholder="YY-MM-DD hh:mm:ss">
            </div>

            <div class="form-group col-md-3 hidden">
                <label for="campo2">Data Fato</label>
                <input type="text" class="form-control" name="ocorrencia['Data_registro']" placeholder="YY-MM-DD hh:mm:ss" value="2017-03-10 00:00:00">
            </div>

            <div class="form-group col-md-3">
                <label for="campo2">Flagrante</label>
                <br>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="ocorrencia['Flagrante']" value="0">Não
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="ocorrencia['Flagrante']" value="1">Sim
                    </label>
                </div>
            </div>

            <div class="form-group col-md-3">
                <label for="campo2">Tentativa</label>
                <br>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="ocorrencia['Tentativa']" value="0">Não
                    </label>
                </div>
                <div class="radio-inline">
                    <label>
                        <input type="radio" name="ocorrencia['Tentativa']" value="1">Sim
                    </label>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="form-group col-md-5">
                <label for="sel1">Unidade Policial de Apuração:</label>
                <select class="form-control" id="sel1" name="ocorrencia['Unidade_Policial_Apuracao_ID']">
                    <?php foreach ($unidadesPoliciais as $up) : ?>
                        <option value="<?=$up[0]?>"><?php echo $up[1]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-5">
                <label for="sel1">Unidade Policial de Registro:</label>
                <select class="form-control" id="sel1" name="ocorrencia['Unidade_Policial_Registro_ID']">
                    <?php foreach ($unidadesPoliciais as $up) : ?>
                        <option value="<?=$up[0]?>"><?php echo $up[1]; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-12">
                <label for="comment">Descrição:</label>
                <textarea class="form-control" rows="5" id="comment" name="ocorrencia['descricao']"></textarea>
            </div>
        </div>
        <br>
        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="index.php" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>

<?php include(FOOTER_TEMPLATE); ?>