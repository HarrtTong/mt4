<link href="<?php echo URL; ?>assets/css/console.css" rel="stylesheet">

<h1>Criptografia e Descriptografia de Textos</h1>

<hr>
		
<?php if($this->_data["erro"]): ?>
	<div class="alert alert-danger" role="alert" id="errors" style="display:block;">
		<?php echo $this->_data["erro"]; ?>
	</div>
	<br />
<?php endif; ?>		
		
<div class="row ">
	<form class="col-lg-12 col-md-12 vertical-margin-offset-20" id="dados">
		<input type="hidden" name="tipo" id="tipo" value="" />
		<div class="row">
			<div class="form-group col-lg-12 col-md-12">
				<label for="ip">Texto</label>
				<textarea name="texto" id="texto" class="form-control"><?php echo $this->_data["texto"]; ?></textarea>
			</div>	
		</div>
		
		<div class="row">
			<div class="form-group col-lg-4 col-md-4">
				<label for="chave">Chave</label>
				<input type="text" name="chave" id="chave" class="form-control" value="<?php echo $this->_data["chave"]; ?>">
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12 col-md-12 text-right">
				<button type="button" id="encrypt" class="btn btn-success">Criptografar</button>
				<button type="button" id="decrypt" class="btn btn-primary">Descriptografar</button>
			</div>
		</div>
		
	</form>
</div>

<hr>

<?php if(!empty($this->_data["string_ret"])): ?>
<h3>Resultado</h3>
<div class="col-lg-12 col-md-12">
<pre>
<?php 	
	echo "=> ".$this->_data["string_ret"]."<br />";
?>
</pre>
</div>
<?php endif; ?>
	
<script type="text/javascript">
<!--
$("#encrypt").click(function() {
	$("#tipo").val("encrypt");
	$("#dados").submit();
});

$("#decrypt").click(function() {
	$("#tipo").val("decrypt");
	$("#dados").submit();
});

//-->
</script>