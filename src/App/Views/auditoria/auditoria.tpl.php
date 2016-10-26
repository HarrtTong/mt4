<link href="<?php echo URL; ?>assets/css/console.css" rel="stylesheet">

<h1>Auditoria de Arquivos</h1>

<hr>

<?php
if($this->_data["mensagem"]): 
	switch($this->_data["tpmensagem"]):
		case 'success':	
			$tp_msg = "bg-success text-success";
			break;
		case 'info':
			$tp_msg = "bg-info text-info";
			break;
		case 'error':
			$tp_msg = "bg-danger text-danger";
			break;
		default:
			$tp_msg = "bg-danger text-danger";
			break;
	endswitch;		
?>
	<br/><p class="<?php echo $tp_msg; ?>" style="padding:15px;"><?php echo $this->_data["mensagem"]; ?></p><br/>
<?php endif; ?>

<form action="/mt4/auditoria" class="col-lg-12 col-md-12 vertical-margin-offset-20" id="dados" method="post" enctype="multipart/form-data">		
	<div class="row ">	
		<div class="row">
			<div class="form-group col-lg-4 col-md-4">
				<label for="file" class="control-label">Arquivo</label>
				<input type="file" name="arquivo" id="arquivo" class="file">
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-10 col-md-10">
				<button type="submit" class="btn btn-success">Enviar</button>
			</div>	
			<div class="col-lg-2 col-md-2 text-right">	
				<button type="button" id="help_bt" class="btn btn-danger " data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-question-sign" aria-hidden="true">&nbsp;</span>Ajuda</button>
			</div>
		</div>
</div>

<hr>

<?php 
if(!empty($this->_data["dados"])):
	$this->_data["view"]->partial('auditoria/dados_partial'); 
else:
	echo "<h3>Não foi enviado nenhum arquivo até o momento.</h3>" ;
endif;
?>

</form>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-question-sign" aria-hidden="true">&nbsp;</span>Auditoria de Arquivos</h4>
      </div>
      <div class="modal-body" style="height:400px;overflow:auto;">
      
      <?php $this->_data["view"]->partial('auditoria/ajuda_partial'); ?> 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
      </div>
    </div>

  </div>
</div>

