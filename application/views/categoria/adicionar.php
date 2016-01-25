<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
		<h2>{ACAO} {CATEGORIA}</h2>
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
			<input type="hidden" name="idcategoria" id="idcategoria"
				value="{idcategoria}">

			<div class="form-group">
				<label for="nomecategoria" class="col-lg-2 control-label">Categoria</label>
				<div class="col-lg-10">
					<input id="nomecategoria" name="nomecategoria" value="{nomecategoria}" type="text"
						placeholder="Categoria" required class="form-control" >
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