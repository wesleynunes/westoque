<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>{ACAO} {PRODUTO}</h2>
		<ol class="breadcrumb">
			<li><a href="{HOME}">Home</a></li>
			<li><a href="{URLLISTAR}">Lista</a></li>
		</ol>
	</div>
</div>
<p>
<div class="row  border-bottom white-bg dashboard-header">
	<div class="col-lg-8">
		<form action="{ACAOFORM}" method="post" class="form-horizontal">
			<input type="hidden" name="idproduto" id="idproduto"
				value="{idproduto}">

			<div class="form-group">
				<label for="nomeproduto" class="col-lg-2 control-label">Produto</label>
				<div class="col-lg-10">
					<input id="nomeproduto" name="nomeproduto" value="{nomeproduto}" type="text"
						placeholder="Produto" required class="form-control" >
				</div>
			</div>
						
			<div class="form-group">
				<label for="dataproduto" class="col-lg-2 control-label">Data</label>
				<div class="col-lg-10">
					<input id="dataproduto" data-format="dd/MM/yyyy" name="dataproduto" value="{dataproduto}"
					type="text" onkeypress='return SomenteNumero(event)'   maxlength="10" title="Inserir data" placeholder="__/__/____" required  >					
				</div>
			</div>
									
	    
			<div class="form-group">
				<label class="col-sm-2 control-label" for="idcategoria">Tipo:</label>
			    <div class="col-lg-10">
				<select name="idcategoria" id="idcategoria" class="form-control m-b;" required >
					<option value="">Escolha uma categoria</option>
					{BLC_CATEGORIA}
					<option value="{IDCATEGORIA}" {sel_idcategoria}>{NOMECATEGORIA}</option>							
					{/BLC_CATEGORIA}
				</select>
			    </div>
			</div>

			<div class="form-group">
				<div>
					<button class="btn btn-primary" id="showtoast" type="submit">
						<i class="fa fa-check"></i>&nbsp;Salvar
					</button>
				</div>
			</div>
			
		</form>
	</div>
</div>