<?php include_once("../header.html"); ?>

<h1>Registrar funcionário</h1><br>
<h6><i>* = obrigatório</i></h6><br>
<fieldset>
<legend>Informações pessoais</legend>
    <form action="" method="post">
        <div class="form-group">
            <label for="nome"><b>Nome completo*</b></label>
            <input type="text" class="form-control col-md-12" name="nome" id="nome" aria-describedby="helpId" placeholder="Nome completo">
        </div>
        <div class="form-group">
            <label for="cpf"><b>CPF*</b></label>
            <input type="text" class="form-control col-md-12" name="cpf" id="cpf" aria-describedby="helpId" placeholder="000.000.000-00">
        </div>
        <div class="form-group">
            <label for="login"><b>Login*</b></label>
            <input type="text" class="form-control col-md-12" name="login" id="login" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
            <label for="password"><b>Senha*</b></label>
            <input type="password" class="form-control col-md-12" name="password" id="password" aria-describedby="helpId" placeholder="">
        </div>
    <div class="row">
        <div class="form-group col-md-6 col-sm-6">
                <label for="tel1"><b>Telefone 1*   </b></label>
                <div>
                    <input type="text" class="form-control" name="tel1" id="tel1" aria-describedby="helpId" placeholder="(00)0000-0000">
                    <small id="helpId" class="form-text text-muted">*apenas números</small>
                </div>
        </div>
        <div class="form-group col-md-6 col-sm-6">
                <label for="tel2"><b>Telefone 2  </b></label>
                <div>
                    <input type="text" class="form-control" name="tel2" id="tel2" aria-describedby="helpId" placeholder="(00)0000-0000">
                    <small id="helpId" class="form-text text-muted">*apenas números</small>
                </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email"><b>Email*</b></label>
        <input type="email" class="form-control col-md-12" name="email" id="email" aria-describedby="helpId" placeholder="exemplo@exemplo.com">
    </div>
    <div class="row">
        <div class="form-group col-md-6 col-sm-6">
            <label for="foto"><b>Foto*</b></label>
            <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="cargo"><b>Cargo*</b></label>
            <select class="form-control" name="cargo" id="cargo">
                <option>Vendedor</option>
                <option>Gerente</option>
                <option>Diretor</option>
            </select>
        </div>
    </div>

</fieldset>
<fieldset>
    <legend>Endereço</legend>
    <div class="row">
        <div class="form-group col-md-4 col-sm-4">
                <label for="cep"><b>CEP*  </b></label>
                <div>
                    <input type="text" class="form-control" name="cep" id="cep" aria-describedby="helpId" placeholder="00000-000">
                    <small id="helpId" class="form-text text-muted">*apenas números</small>
                </div>
        </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="logradouro"><b>Logradouro*  </b></label>
            <div>
                <input type="text" class="form-control" name="logradouro" id="logradouro" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        <div class="form-group col-md-4 col-sm-4">
            <label for="municipio"><b>Município*  </b></label>
            <div>
                <input type="text" class="form-control" name="municipio" id="municipio" aria-describedby="helpId" placeholder="">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="form-group col-md-2 col-sm-2">
            <label for="tel2"><b>Estado*  </b></label>
            <div>
                <div class="form-group">
                    <select class="form-control" name="estado" id="estado">
                    <option>DF</option>
                    <option>SP</option>
                    <option>RJ</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group col-md-10 col-sm-10">
            <label for="complemento_endereco"><b>Complemento  </b></label>
            <div>
                <input type="text" class="form-control" name="complemento_endereco" id="complemento_endereco" aria-describedby="helpId" placeholder="">
            </div>
        </div>
    </div>
    </fieldset>
    <button type="submit" class="btn btn-dark col-md-12">Finalizar cadastro</button>
</form>


</div>


<?php include_once("../footer.html"); ?>