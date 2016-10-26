<h1>MT4 App</h1>

<br />

<p><h3># INSTRUÇÕES</h3></p>

<br />

<p><strong>-> Console SSH</strong></p>
<p>Neste módulo foi usado a biblioteca para PHP: <strong>libssh2</strong>. (Refs.: <a href="http://php.net/manual/pt_BR/ssh2.installation.php" target="_blank">http://php.net/manual/pt_BR/ssh2.installation.php</a>)</p>

<p><strong>-> Banco de Dados:</strong></p>
<p>Alterar as configurações de conexão do banco de dados no arquivo /config/config.php</p>

<p><strong>-> Estrutura da tabela utilizada no Mysql para o módulo "Auditoria":</strong></p>
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