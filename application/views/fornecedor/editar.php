<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>{ACAO} {FORNECEDOR}</h2>
		<ol class="breadcrumb">
			<li><a href="{URLADICIONAR}">Adicionar</a></li>
			<li><a href="{URLLISTAR}">Lista</a></li>
		</ol>
	</div>
</div>
<p>
<?php
    if ($this->session->flashdata('sucesso')) :
        echo '<p>' . $this->session->flashdata('sucesso').'</p>';
    endif;
?>
<div class="row  border-bottom white-bg dashboard-header">
	<div class="col-lg-8">
		<form action="{ACAOFORM}" method="post" class="form-horizontal">
			<input type="hidden" name="idfornecedor" id="idfornecedor"
				value="{idfornecedor}">

			<div class="form-group">
				<label for="cnpjfornecedor" class="col-lg-2 control-label">CNPJ</label>
				<div class="col-lg-10">
					<input id="cnpjfornecedor" name="cnpjfornecedor" type="text" value="{cnpjfornecedor}" 
						placeholder="__.___.___/____-__" class="form-control" disabled required >
				</div>
			</div>

			<div class="form-group">
				<label for="razaosocialfornecedor" class="col-lg-2 control-label">Razão social</label>
				<div class="col-lg-10">
					<input id="razaosocialfornecedor" name="razaosocialfornecedor" type="text"
						value="{razaosocialfornecedor}" placeholder="Razão social" required
						class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="emailfornecedor" class="col-lg-2 control-label">E-mail</label>
				<div class="col-lg-10">
					<input id="emailfornecedor" name="emailfornecedor"
						value="{emailfornecedor}" type="email" placeholder="E-mail" required
						class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="telefonefornecedor" class="col-lg-2 control-label">Telefone</label>
				<div class="col-lg-10">
					<input id="telefonefornecedor" name="telefonefornecedor" type="text"
						value="{telefonefornecedor}" placeholder="(__) ____-____" required
						class="form-control">
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
					<button class="btn btn-primary" id="showtoast" type="submit"
						class="">
						<i class="fa fa-check"></i>&nbsp;Salvar
					</button>
				</div>
			</div>
		</form>
	</div>
</div>