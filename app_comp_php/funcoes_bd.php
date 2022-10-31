<?php
	
	class banco_dados{
		
		public $host;
		public $user;
		public $pass;
		public $dbname;
			
		function __construct(){
			
			$this->define_data_base(1);
		}
				
		function define_data_base($dbname){
			
			if($dbname == 1){
				
				$this->host = "localhost";
				$this->user = "root";
				$this->pass = "";
				$this->dbname = "teste_php";
				
			}else if($dbname == 2){
				
				$this->host = "localhost";
				$this->user = "";
				$this->pass = "";
				$this->dbname = "";
				
			}else{
				
				echo 'Data base is not define';
				
				die();
			}
		}
		
		function open_connection(){
			
			try {
				$connection = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass, array(PDO::ATTR_PERSISTENT => true));
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} 
			catch (PDOException $e) {
								
				$error = 'n�o foi poss�vel estabelecer uma conex�o';
				$sql = 'n/a';
				$msg_generate = $e->getMessage();
				
				$this->generate_log_error($error, $sql, $msg_generate);
				
				echo '<p>N�o foi poss�vel estabelecer uma conex�o</p>';
				die();	
			}	
				
			return $connection;
		}
		
		function close_connection($connection){
			
			/* Caso a conex�o n�o seja persistente a mesma � fechada automaticamente ap�s a execu��o do script */
		}
				      
		function select($sql){
			
			$connection = $this->open_connection();
			
			try {
				$res = $connection->query($sql);
			} 
			catch (PDOException $e) {
				
				$error = 'n�o foi poss�vel executar a consulta';
				$msg_generate = $e->getMessage();
				
				$this->generate_log_error($error, $sql, $msg_generate);
				
				echo '<p>N�o foi poss�vel executar a consulta --  '.$sql.'  --</p>';
				die();	
			}
			
			return $res;
		}
		
		function insert($sql){
			
			$connection = $this->open_connection();
			
			try {
				$res = $connection->query($sql);
			} 
			catch (PDOException $e) {
				
				$error = 'n�o foi poss�vel executar a consulta';
				$msg_generate = $e->getMessage();
				
				$this->generate_log_error($error, $sql, $msg_generate);
				
				echo '<p>N�o foi poss�vel executar a consulta --  '.$sql.'  --</p>';
				die();	
			}
			
			$id = $connection->lastInsertId();
				
			return $id;
				
		}
		
		function update($sql){
			
			$connection = $this->open_connection();
			
			try {	
				$res = $connection->query($sql);
			} 
			catch (PDOException $e) {
				
				$error = 'n�o foi poss�vel executar a consulta';
				$msg_generate = $e->getMessage();
				
				$this->generate_log_error($error, $sql, $msg_generate);
				
				echo '<p>N�o foi poss�vel executar a consulta --  '.$sql.'  --</p>';
				die();	
			}
			
			return $res;
		}
		
		function delete($sql){
			
			$connection = $this->open_connection();
			
			try {
				$res = $connection->query($sql);
			} 
			catch (PDOException $e) {
				
				$error = 'n�o foi poss�vel executar a consulta';
				$msg_generate = $e->getMessage();
				
				$this->generate_log_error($error, $sql, $msg_generate);
				
				echo '<p>N�o foi poss�vel executar a consulta --  '.$sql.'  --</p>';
				die();	
			}
			
			return $res;
		}
				
		function row($res){
			
			try {
				$row = $res->fetch(PDO::FETCH_ASSOC);
			}	
			catch (PDOException $e) {
				
				$error = 'n�o foi poss�vel recuperar os registros';
				$sql = 'n/a';
				$msg_generate = $e->getMessage();
				
				$this->generate_log_error($error, $sql, $msg_generate);
				
				echo '<p>N�o foi poss�vel recuperar os registros --  '.$sql.'  --</p>';
				die();	
			}
			
			return $row;
		}
		
		function num_rows($res){
			
			try {
				$num_reg = $res->rowCount();
			}	
			catch (PDOException $e) {
				
				$error = 'n�o foi poss�vel contar os registros';
				$sql = 'n/a';
				$msg_generate = $e->getMessage();
				
				$this->generate_log_error($error, $sql, $msg_generate);
				
				echo '<p>N�o foi poss�vel contar os registros --  '.$sql.'  --</p>';
				die();	
			}
			
			return $num_reg;
		}
		
		function generate_log_error($error, $sql, $msg_generate){
			
			if(is_dir('arquivos_rel')){
				$path = 'arquivos_rel/arq_log.txt';	
			}
			else if(is_dir('../arquivos_rel')){
				$path = '../arquivos_rel/arq_log.txt';	
			}
			else{
				$path = '../../arquivos_rel/arq_log.txt';
			}
						
			$break = chr(13).chr(10);				
			
			$arq_log = fopen($path, "w");
			
			$write = fwrite($arq_log, 'Erro: ');
			$write = fwrite($arq_log, $break);
			$write = fwrite($arq_log, $break);
			$write = fwrite($arq_log, $error);
			$write = fwrite($arq_log, $break);
			$write = fwrite($arq_log, $break);
			$write = fwrite($arq_log, 'Sql: ');
			$write = fwrite($arq_log, $break);
			$write = fwrite($arq_log, $break);
			$write = fwrite($arq_log, $sql);
			$write = fwrite($arq_log, $break);
			$write = fwrite($arq_log, $break);
			$write = fwrite($arq_log, 'Mensagem gerada: ');
			$write = fwrite($arq_log, $break);
			$write = fwrite($arq_log, $break);
			$write = fwrite($arq_log, $msg_generate.$break);
			$write = fwrite($arq_log, $break);
			$write = fwrite($arq_log, $break);
				
			fclose($arq_log);	
		}
	}
	
?>