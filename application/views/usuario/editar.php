
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>{ACAO} {USUARIO}</h2>
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
	<div class="col-lg-5">	
		<form action="{ACAOFORM}" method="post" class="form-horizontal">
			<input type="hidden" name="idusuario" id="idusuario"
				value="{idusuario}">					
			
			<div class="form-group">
				<label for="usuario" class="col-lg-2 control-label">Usuário</label>
				<div class="col-lg-10">
					<input id="usuario" name="usuario" value="{usuario}" type="text"
						placeholder="Usuário" required="required" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="nomeusuario" class="col-lg-2 control-label">Nome</label>
				<div class="col-lg-10">
					<input id="nomeusuario" name="nomeusuario" type="text"
						value="{nomeusuario}" placeholder="Nome" required="required"
						class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="emailusuario" class="col-lg-2 control-label">E-mail</label>
				<div class="col-lg-10">
					<input id="emailusuario" name="emailusuario"
						value="{emailusuario}" type="email" placeholder="E-mail"
						required="required" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="senhausuario" class="col-lg-2 control-label">Senha</label>
				<div class="col-lg-10">
					<input id="senhausuario" name="senhausuario" type="password"
						value="" placeholder="Senha" required="required"
						class="form-control">
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-offset-2 col-lg-10">
					<button class="btn btn-primary " type="submit">
						<i class="fa fa-check"></i>&nbsp;Salvar
					</button>
				</div>
			</div>
		</form>		
	</div>
</div>