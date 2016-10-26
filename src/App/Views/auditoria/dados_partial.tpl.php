<table id="arquivos" class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome Arquivo</th>
        <th>Tamanho</th>
        <th>Tipo</th>
        <th>Data</th>
        <th>Excluir</th>
        <th class="text-center">Verificar Integridade</th>
      </tr>
    </thead>
    
    <tbody>
<?php foreach ($this->_data["dados"] as $data): ?>      
      <tr>
        <td><?php echo $data["id"]; ?></td>
        <td><a href="<?php echo $data["url"]; ?>" target="_blank"><?php echo $data["nome_arquivo"]; ?></a></td>
        <td><?php echo $data["tamanho"]; ?></td>
        <td><?php echo $data["tipo"]; ?></td>
        <td><?php echo $data["data"]; ?></td>
        <td><a href="#" class="excluir" data-id="<?php echo $data["id"]; ?>"><img src="<?php echo PATH_IMAGES ; ?>delete_icon.png" width="35px" border="0" alt="Excluir Arquivo" title="Excluir Arquivo" /></a></td>
        <td><input type="radio" name="validar" id="validar" class="form-control" value="<?php echo $data["id"]; ?>" /></td>
      </tr>
<?php endforeach; ?>
    </tbody>
  </table>

  
<script type="text/javascript">
<!--
$(".excluir").click(function() {

	if(confirm("Deseja realmente excluir este arquivo?")){
		location.href = "?excluir=" + $(this).attr("data-id") ;
	}
});
//-->
</script>