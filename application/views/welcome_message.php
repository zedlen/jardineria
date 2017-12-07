<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	.btn-circle {
	  width: 30px;
	  height: 30px;
	  text-align: center;
	  padding: 6px 0;
	  font-size: 12px;
	  line-height: 1.428571429;
	  border-radius: 15px;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>Jardinera</h1>
	<p>Productos dsiponibles:<button type='button' class='btn btn-primary btn-sm btn-circle'><i class='fa fa-plus' aria-hidden='true'></i></button></p>
	<?php
		$this->db->select("*");
		$this->db->join("proveedor","proveedor.Id_proveedor=producto.Id_proveedor");
		$this->db->join("categoria","categoria.Id_categoria=producto.Id_categoria");
		$this->db->join("estado_producto","estado_producto.Id_estado_producto=producto.Id_estado_producto");
		$data=$this->db->get("producto")->result();				

	?>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Nombre Latin</th>
				<th>Precio de compra</th>
				<th>Precio de venta</th>
				<th>Unidades</th>
				<th>Minimo stock</th>
				<th>Descripción</th>
				<th>Proveedor</th>
				<th>Categoria</th>
				<th>Estado</th>
			</thead>
			<tbody>
				<?php
					foreach ($data as $key => $value) {
						echo "
						<tr>
							<td>$value->Id_producto</td>
							<td>$value->Nombre_producto</td>
							<td>$value->Nombre_latin</td>
							<td>$value->Precio_compra_producto</td>
							<td>$value->Precio_venta_producto</td>
							<td>$value->Unidades_stock</td>
							<td>$value->Minimo_stock</td>
							<td>$value->Descripcion_producto</td>
							<td>$value->Nombre_proveedor</td>
							<td>$value->Nombre_categoria</td>
							<td>$value->Nombre_estado_producto</td>
							<td>
								<button type='button' class='btn btn-warning btn-sm btn-circle'><i class='fa fa-pencil' aria-hidden='true'></i></button>
								<button type='button' class='btn btn-danger btn-sm btn-circle'><i class='fa fa-trash' aria-hidden='true'></i></button>
							</td>
						</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>

</body>
</html>