
<?php
header("Access-Control-Allow-Origin: *");
	class conexion{
		private $serverName;
		private $userName;
		private $password;
		private $dataBase;
		public $conexion;
		public function __construct(){
		    $this->serverName = "localhost";
			$this->userName = "root";
			$this->password = "";
			$this->dataBase = "id18482623_iot_curso_itp";
		}
		function conectar(){
			$this->conexion = new mysqli($this->serverName,$this->userName,$this->password,$this->dataBase);
			$this->conexion->set_charset("utf8");
		}
		function cerrar(){
			$this->conexion->close();	
		}
	}
?> 