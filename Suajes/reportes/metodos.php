<?
include("../../conexiones/base1.php");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?
class metodos
{
	public $select = array();
	
	public function pendientes()
	{
		$sql = "select * from diseno where diseno.numdiseno not in(select Id_diseno from suajes) ";
		$sql1 = mysql_query($sql,conexion::con());
		
		while($sql2 = mysql_fetch_assoc($sql1))
		{
			$this->select[] = $sql2;
		}
		return $this->select;
	}
	public function reportes()
	{
		$sql = "Select diseno.numdiseno, diseno.ident, diseno.tipo, diseno.fecha_i, suajes.Id_diseno, suajes.outs, suajes.maquina, suajes.rack, suajes.planta, suajes.rule, suajes.materiales, suajes.tamano, suajes.Id_diseno FROM diseno INNER JOIN  suajes ON diseno.numdiseno = suajes.Id_diseno ORDER BY numdiseno";
		$sql1 = mysql_query($sql,conexion::con());
		
		while($sql2 = mysql_fetch_assoc($sql1))
		{
			$this->select[] = $sql2;
		}
		return $this->select;
	}
	public function eliminar($id)
	{
		$sql = "delete from suajes where Id_diseno = '$id' ";
		$sql1 = mysql_query($sql,conexion::con());	
		header("Location: reportes.php");
	}
}

?>
</body>
</html>