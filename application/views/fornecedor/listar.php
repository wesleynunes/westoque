<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">		
		<h2>{ACAO} {FORNECEDOR}</h2>
		<ol class="breadcrumb">
			<li><a href="{HOME}">Home</a></li>
			<li><a href="{URLADICIONAR}">Adicionar</a></li>
		</ol>
	</div>
</div>
<p>
<?php
if ($this->session->flashdata('sucesso')) :
    echo '<p>' . $this->session->flashdata('sucesso') . '</p>';
endif;
?>
<div class="row  border-bottom white-bg dashboard-header">

	<table class="table table-bordered">
		<tr>		
    		<thead>
    			<th class="coluna-acao text-center"></th>
    			<th>CNPJ</th>
    			<th>Razão Social</th>
    			<th>E-mail</th>
    			<th>Telefone</th>
    			<th class="coluna-acao text-center"></th>
    		</thead>
		</tr>
		{BLC_DADOS}
		<tr>
			<td class="alinha-centro"><a href="{URLEDITAR}" title="Editar"><em
					class="fa fa-edit"></em></a></td>
			<td>{CNPJFORNECEDOR}</td>
			<td>{RAZAOSOCIALFORNECEDOR}</td>
			<td>{EMAILFORNECEDOR}</td>
			<td>{TELEFONEFORNECEDOR}</td>
			<td class="alinha-centro"><a href="{URLEXCLUIR}" title="Excluir"
				class="link-excluir"><em class="fa fa-trash-o"></em></a></td>
		</tr>
		{/BLC_DADOS} {BLC_SEMDADOS}
		<tr>
			<td colspan="3" class="alinha-centro">Não há dados</td>
		</tr>
		{/BLC_SEMDADOS}
	</table>

</div>