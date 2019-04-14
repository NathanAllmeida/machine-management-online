<div class="content">
	<div class='name-page'>
		<h3><i class='ti ti-desktop'></i></i> Máquinas</h3>
	</div><br>
	<ul class="nav nav-tabs" id="" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" id="list-tab" data-toggle="tab" href="#pane-list" role="tab" aria-controls="List" aria-selected="true">Listar Máquinas</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="add-tab" data-toggle="tab" href="#pane-add" role="tab" aria-controls="Add" aria-selected="false">Adicionar Máquina</a>
	  </li>
	  <li class="nav-item" style='display:none;'>
	    <a class="nav-link" id="edit-tab" data-toggle="tab" href="#pane-edit" role="tab" aria-controls="Edit" aria-selected="false"></a>
	  </li>
	</ul>
	<div class="tab-content" id="myTabContent">
	  <div class="tab-pane fade show active" id="pane-list" role="pane-list" aria-labelledby="pane-list">
	  	<br>
		<div class='row'>
			<div class='col-md-12 col-xs-12 col-sm-12'>
				<h4>Listagem de máquinas</h4>
			</div>
			<div class='col-md-12 col-xs-12 col-sm-12'>
				<table id='tblMachines' style='width: 100%' class='table table-hover table-striped'>
					<thead>
						<tr>
							<th>Id</th>
							<th>Nome</th>
							<th>Alterar</th>
							<th>Excluir</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>	  		  	
	  </div>
	  <div class="tab-pane fade" id="pane-add" role="tabpanel" aria-labelledby="add-tab">
	  	<br>
	  	<div class='row'>
	  		<div class='col-md-12 col-xs-12 col-sm-12'>
				<h4>Adicionar nova máquina</h4><br>
			</div>
			<form id='form-save-add' class='row col-md-12 col-xs-12 col-sm-12'>
				<div class='row col-md-12 col-xs-12 col-sm-12'>
					<div class='col-md-2 col-xs-2 col-sm-2'>
						<label>Nome</label>
					</div>
					<div class='col-md-4 col-xs-4 col-sm-4'>
						<input type="text" name="nome" id='add-nome' class='form-control' required><br>
					</div>
				</div>
				<div class='row col-md-12 col-xs-12 col-sm-12'>
					<div class='col-md-6 col-xs-6 col-sm-6'>
						<button type=button class='link' id='btn-save-add'><i class='ti ti-plus'></i> Adicionar</button>
					</div>
				</div>
			</form>
	  	</div>
	  </div>
	  <div class="tab-pane fade" id="pane-edit" role="tabpanel" aria-labelledby="edit-tab">
	  	<br>
	  	<div class='row'>
	  		<div class='col-md-12 col-xs-12 col-sm-12'>
				<h4>Alterar dados da máquina</h4><br>
			</div>
			<form id='form-save-ed' class='row col-md-12 col-xs-12 col-sm-12'>
				<input type='hidden' name='idmaquina' id='ed-idmaquina' readonly>
				<div class='col-md-2 col-xs-2 col-sm-2'>
					<label>Nome</label>
				</div>
				<div class='col-md-4 col-xs-4 col-sm-4'>
					<input type="text" name="nome" id='ed-nome' class='form-control' required>				
				</div>
				<div class='col-md-6 col-xs-6 col-sm-6'>
					<button type=button class='link' id='btn-save-ed'><i class='ti ti-reload'></i> Alterar</button>
				</div>
			</form>
	  	</div>
	  </div>
	</div>

</div>
<script src="<?php echo base_url();?>/assets/js/maquinas.script.js" async></script>