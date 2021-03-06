<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url();?>bower_components/bootstrap/dist/css/bootstrap.min.css">	
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendors/font-awesome-4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	<script src="<?php echo base_url();?>bower_components/bootstrap/dist/js/bootstrap.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
	<script src="<?php echo base_url();?>bower_components/sweetalert2/dist/sweetalert2.all.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-waitingfor/1.2.4/bootstrap-waitingfor.js" crossorigin="anonymous"></script>

	<!-- Include a polyfill for ES6 Promises (optional) for IE11 and Android browser -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
	<title>Editar producto</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
		background-image: url("https://i.pinimg.com/originals/36/0f/21/360f215f621652608f877c7790324c1d.jpg");
	}
	body { padding-top: 70px; }
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
		padding: 20px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
		background-color: #fff;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">
	      <div class="navbar-header">
	        <a class="navbar-brand" href="<?php echo base_url(); ?>">
	          <i class="fa fa-leaf fa-6" aria-hidden="true" style="color: green;"></i><big> <big> <big>Jardineria La Floral</big> </big> </big>
	        </a>
	      </div>	      
	    </div>
	</nav>
<div id="container">
	<h1>Jardinera</h1>
	<p>Editar Producto:</p>
	<?php
		$id=$this->input->get("id");
		$this->db->select("*");
		$this->db->join("proveedor","proveedor.Id_proveedor=producto.Id_proveedor");
		$this->db->join("categoria","categoria.Id_categoria=producto.Id_categoria");
		$this->db->join("estado_producto","estado_producto.Id_estado_producto=producto.Id_estado_producto");
		$data=$this->db->get_where("producto",array("producto.Id_producto"=>$id))->row();
	?>	
	<form id="needs-validation">
		<div class="row">
		    <div class="col-md-4 mb-2">
			    <label for="validationCustom01">ID de producto</label>
			    <input type="text" class="form-control" id="id_producto" placeholder="ID producto" value="<?php echo $data->Id_producto?>" required disabled>
		    </div>
		    <div class="col-md-4 mb-2">
			    <label for="validationCustom01">Nombre de producto</label>
			    <input type="text" class="form-control" id="nombre_producto" placeholder="Nombre producto" value="<?php echo $data->Nombre_producto?>" required>
		    </div>
		    <div class="col-md-4 mb-2">
		      <label for="validationCustom02">Nombre en latin</label>
		      <input type="text" class="form-control" id="nombre_latin" placeholder="Nombre latin" value="<?php echo $data->Nombre_latin?>" required>
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-4 mb-2">
			    <label for="validationCustom01">Precio compra</label>
			    <input type="number" class="form-control" id="precio_compra" placeholder="0.0" value="<?php echo $data->Precio_compra_producto?>" required>
		    </div>
		    <div class="col-md-4 mb-2">
			    <label for="validationCustom01">Precio venta</label>
			    <input type="number" class="form-control" id="precio_venta" placeholder="0.0"  value="<?php echo $data->Precio_venta_producto?>"required>
		    </div>
		    <div class="col-md-4 mb-2">
		      <label for="validationCustom02">Unidades</label>
		      <input type="number" class="form-control" id="unidades" placeholder="0" value="<?php echo $data->Unidades_stock?>" required>
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-6 mb-3">
			    <label for="validationCustom01">Minimo de stock</label>
			    <input type="number" class="form-control" id="minimo_stock" placeholder="0" value="<?php echo $data->Minimo_stock?>" required>
		    </div>
		    <div class="col-md-6 mb-3">
			    <label for="validationCustom01">Descripción</label>
			    <input type="text" class="form-control" id="descripcion" placeholder="Descripción" value="<?php echo $data->Descripcion_producto?>" required>
		    </div>		    
		</div>
		<div class="col-md-6 mb-2">
		  <label for="validationCustom02">Proveedor</label>
		  <select id="provedor" class="form-control" required>
		  	<?php
		  		$provedore=$this->db->get('proveedor')->result();
		  		foreach ($provedore as $key => $value) {
		  			$sel="";
		  			if ($value->Id_proveedor==$data->Idproveedor) {
		  				$sel="selected";
		  			}
		  			echo "<option value='$value->Id_proveedor' $sel>$value->Nombre_proveedor </option>";
		  		}
		  	?>
		  </select>		  
		</div>
		<div class="col-md-6 mb-2">
		  <label for="validationCustom02">Categoria</label>		
		  <select id="categoria" class="form-control" required>
		  	<?php
		  		$categorias=$this->db->get('categoria')->result();
		  		foreach ($categorias as $key => $value) {
		  			$sel="";
		  			if ($value->Id_categoria==$data->Id_categoria) {
		  				$sel="selected";
		  			}
		  			echo "<option value='$value->Id_categoria' $sel>$value->Nombre_categoria </option>";
		  		}
		  	?>
		  </select>	  
		</div>
		<div class="col-md-6 mb-2">
		  <label for="validationCustom02">Estado</label>
		  <select id="estado" class="form-control" required>
		  	<?php
		  		$estado=$this->db->get('estado_producto')->result();
		  		foreach ($estado as $key => $value) {
		  			$sel="";
		  			if ($value->Id_estado_producto==$data->Id_estado_producto) {
		  				$sel="selected";
		  			}
		  			echo "<option value='$value->Id_estado_producto' $sel>$value->Nombre_estado_producto </option>";
		  		}
		  	?>
		  </select>		  
		</div>
		<a href="<?php echo base_url(); ?>" class='btn btn-danger btn-sm'>Cancelar</a>	
		<button id="save" type="button" class='btn btn-success btn-sm'>Guardar</button>	
	</form>	
</div>

</body>
<script type="text/javascript">
	var form = document.getElementById('needs-validation');
	$("#save").click(function() {		
		if (form.checkValidity() === false) {
		  swal("Ooops..","Faltan datos por ingresar.","warning")
		}else{
			waitingDialog.show('Editando producto..',{dialogSize: 'sm',progressType: 'success'})
			$.ajax({
			  method: "POST",
			  url: "<?php echo base_url()?>index.php/welcome/editP",
			  data: { 
			  	Id_producto: $('#id_producto').val(), 
			  	Nombre_producto:$('#nombre_producto').val(),
			  	Nombre_latin:$('#nombre_latin').val(),
			  	Precio_compra_producto:$('#precio_compra').val(),
			  	Precio_venta_producto:$('#precio_venta').val(),
			  	Unidades_stock:$('#unidades').val(),
			  	Minimo_stock:$('#minimo_stock').val(),
			  	Descripcion_producto:$('#descripcion').val(),
			  	Id_proveedor:$('#provedor').val(),
			  	Id_categoria:$('#categoria').val(),
			  	Id_estado_producto:$('#estado').val()
			  }
			})
			.done(function( msg ) {
				console.log(msg)
				waitingDialog.hide()
			    if (msg=="true") {
			    	swal({
			    	  title: 'Bien',
			    	  text: "Producto editado correctamente!",
			    	  type: 'success',
			    	  confirmButtonColor: '#3085d6',			    	  
			    	  confirmButtonText: 'Ok'
			    	}).then((result) => {
			    	  if (result.value) {
			    	    window.location.replace("<?php echo base_url();?>");
			    	  }
			    	})	
			    }
			    else{
			    	swal("Error","Error al editar el producto.","error")
			    }
			})
			.fail(function() {
				waitingDialog.hide()
				swal("Error","Error al editar el producto.","error")
			});
		}
		form.classList.add('was-validated');
	})
</script>
</html>