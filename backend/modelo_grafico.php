<?php
	class modelo_grafico{
		private $conexion;
		function __construct()
		{
			require_once('../backend/conexion.php');
			$this->conexion = new conexion();
			$this->conexion->conectar();
        }


		function TraerDatosGrafico(){
			$sql = "SELECT * FROM statusht";	
			$arreglo = array();
			if ($consulta = $this->conexion->conexion->query($sql)) {

				while ($consulta_VU = mysqli_fetch_array($consulta)) {
					$arreglo[] = $consulta_VU;
				}
				return $arreglo;
				$this->conexion->cerrar();	
			}
		}
	}
?>