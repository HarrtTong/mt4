<p><strong># Envio de Arquivos</strong></p>
<p>Para enviar um arquivo, apenas selecione o arquivo no botão "Selecionar Arquivo" e clique em enviar. Uma mensagem de confirmação ou erro será exibida.</p>

<br />

<p><strong># Validar um Arquivo</strong></p>
<p>Para validar a integridade de um arquivo, selecione o arquivo que deseja validar no botão "Selecionar Arquivo", selecione na lista o arquivo que deseja fazer a comparação na coluna "Verificar Integridade" e clique em enviar. Uma mensagem de validação ou violação será exibida.<br/>
OBS: O arquivo não será salvo.
</p>

<p>A validação dos arquivos é realizada comparando dados dos dois arquivos, como:</p>
<ul>
	<li>Nome do Arquivo</li>
	<li>Extensão</li>
	<li>Tipo de Arquivo</li>
	<li>Tamanho</li>
</ul>	

<br />

<p><strong># Excluir um Arquivo Enviado </strong></p>
<p>Para excluir um arquivo, apenas clique no botão com o ícone: <img src="<?php echo PATH_IMAGES ; ?>delete_icon.png" width="35px" border="0" alt="Excluir Arquivo" title="Excluir Arquivo" /> (lixeira azul). Uma mensagem de confirmação será exibida e o arquivo será apagado tanto fisicamente como da base de dados.</p>

<br />

<p><strong># Estrutura da tabela utilizada no Mysql (banco de dados: mt4):</strong></p>
<pre>
CREATE TABLE `auditoria` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`path` VARCHAR(200) NULL DEFAULT NULL,
	`url` VARCHAR(200) NULL DEFAULT NULL,
	`nome_arquivo` VARCHAR(100) NULL DEFAULT NULL,
	`extensao` VARCHAR(4) NULL DEFAULT NULL,
	`tamanho` INT(20) NULL DEFAULT NULL,
	`tipo` VARCHAR(50) NULL DEFAULT NULL,
	`data` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;
</pre>