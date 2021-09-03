<?php
/**
 * @author César Cuéllart
 * @version 1.0
 * @created 31-oct-2013 04:28:23 p.m.
 */
class Empleado
{

	Private $nombre;
	Private $apellidos;
	Private $especialidad;
	Private $telefono;
	Private $identificacion;
	Private $correo;
	private $Conexion;

	//Constructor
	public function Empleado()
	{
		
	}

	public function getApellidos()
	{
		return $this->apellidos;
	}

	public function getCorreo()
	{
		return $this->correo;
	}

	public function getTelefono()
	{
		return $this->telefono;
	}

	public function getEspecialidad()
	{
		return $this->especialidad;
	}

	public function getIdentificacion()
	{
		return $this->identificacion;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function setApellidos($newVal)
	{
		$this->apellidos = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function setCorreo($newVal)
	{
		$this->correo = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function setTelefono($newVal)
	{
		$this->telefono = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function setEspecialidad($newVal)
	{
		$this->especialidad = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function setIdentificacion($newVal)
	{
		$this->identificacion = $newVal;
	}

	/**
	 * 
	 * @param newVal
	 */
	public function setNombre($newVal)
	{
		$this->nombre = $newVal;
	}
	
	public function crearEmpleado($identificacion,$nombre,$apellidos,$especialidad,$telefono,$correo)
	{
		$this->identificacion=$identificacion;
		$this->nombre=$nombre;
		$this->apellidos=$apellidos;
		$this->especialidad=$especialidad;
		$this->telefono=$telefono;
		$this->correo=$correo;
	}
	
	public function agregarEmpleado()
	{	
		$this->Conexion=Conectarse();
		$sql="insert into medicos(medIdentificacion,medNombres,medApellidos, medEspecialidad, medTelefono, medCorreo)  values ('$this->identificacion','$this->nombre','$this->apellidos','$this->especialidad' ,'$this->telefono','$this->correo')";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
	
	public function consultarEmpleados()
	{
		$this->Conexion=Conectarse();
		$sql="select * from medicos";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}
	
	public function consultarEmpleado($identificacion)
	{
		$this->Conexion=Conectarse();
		$sql="select * from medicos where medIdentificacion='$identificacion'";
		$resultado=$this->Conexion->query($sql);
		$this->Conexion->close();
		return $resultado;	
	}

}
?>