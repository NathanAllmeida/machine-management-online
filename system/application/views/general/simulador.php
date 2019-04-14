<div class="content">
	<div class='name-page'>
		<h3><i class='ti ti-desktop'></i></i> Simulador</h3>
	</div><br>
	<div class='row'>
		<div class='col-md-4 col-xs-4 col-sm-4'>
			<h3>Intervalo de tempo atual:</h3>
		</div>
		<div class='col-md-2 col-xs-2 col-sm-2'>
			<input class='form-control' name='tempo' type='number' id='tempo-simulador' value='1' disabled> segundos
	
		</div>
		<div class='col-md-4 col-xs-4 col-sm-4'>
			<button class='link' id='btn-alterar'><i class='ti ti-reload'></i> Alterar Tempo</button>
		</div>
	</div><br>
	<div class='col-md-12 col-xs-12 col-sm-12'>
		<h1 style='text-align:center;'>Tempo até repetir: <span id='time-counter'>0s</span></h1>
	</div><br>
		
  	<br>
	<div class='row'>
		<div class='col-md-12 col-xs-12 col-sm-12'>
			<h4>Listagem de máquinas cadastradas</h4>
		</div>
		<div class='col-md-12 col-xs-12 col-sm-12'>
			<table id='tblMachines' style='width: 100%' class='table table-hover table-striped'>
				<thead>
					<tr>
						<th>Máquina</th>
						<th>Código do Simulador</th>
						<th>Simulador Atual</th>
						<th>Data</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>	  		  	
		


<script src="<?php echo base_url();?>/assets/js/simulador.script.js" async></script>