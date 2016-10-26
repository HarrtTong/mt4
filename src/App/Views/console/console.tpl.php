<link href="<?php echo URL; ?>assets/css/console.css" rel="stylesheet">

<h1>Console SSH</h1>

<hr>
		
<?php if($this->_data["erro"]): ?>
	<div class="alert alert-danger" role="alert" id="errors" style="display:block;">
		<?php echo $this->_data["erro"]; ?>
	</div>
	<br />
<?php endif; ?>		
		
<div class="row ">
	<form class="col-lg-12 col-md-12 vertical-margin-offset-20" id="dados" method="post">

		<div class="row">
			<div class="form-group col-lg-2 col-md-2">
				<label for="ip">Host</label>
				<input type="text" name="ip" id="ip" class="form-control" value="<?php echo $this->_data["host"]; ?>">
			</div>
			
			<div class="form-group col-lg-2 col-md-2">
				<label for="usuario">Usuário</label>
				<input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $this->_data["username"]; ?>">
			</div>
			
			<div class="form-group col-lg-2 col-md-2">
				<label for="senha">Senha</label>
				<input type="password" name="senha" id="senha" class="form-control" value="<?php echo $this->_data["password"]; ?>">
			</div>
			
			<div class="form-group col-lg-2 col-md-2">
				<label for="porta">Porta</label>
				<input type="text" name="porta" id="porta" class="form-control" value="<?php echo $this->_data["port"]; ?>">
			</div>
			
		</div>

		<div class="row">
			<div class="form-group col-lg-12 col-md-12">
				<label for="description">Comando</label>
				<input type="text" name="cmd" id="cmd" class="form-control" value="">
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 text-right">
				<button type="submit" class="btn btn-success">Enviar</button>
			</div>
		</div>
	</form>
</div>

<hr>

<div id='shell' class="col-lg-12 col-md-12">
<pre>
<?php 	
	echo "> ".$this->_data["comando"]."<br />";
	echo " ".$this->_data["retorno_cmd"];
?>

</pre>
</div>
	

	
