 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('user/insert_user/');?>">
	
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
		
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only">Email</label> 
					<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
			</div>
			<div class="form-group">	  
					<label for="inputPassword" class="sr-only">Contraseña</label>
					<input type="password" id="inputPassword" name="password"  class="form-control" placeholder="Contraseña" required >
			 </div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only">Nombre</label> 
					<input type="text"  name="first_name"  class="form-control" placeholder="Nombre"   autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only">Apellido</label> 
					<input type="text"   name="last_name"  class="form-control" placeholder="Apellido"   autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only">Número de teléfono</label> 
					<input type="text" name="contact_no"  class="form-control" placeholder="Número de teléfono"   autofocus>
			</div>
				<div class="form-group">	 
					<label   >Seleccionar grupo</label> 
					<select class="form-control" name="gid" id="gid" onChange="getexpiry();">
					<?php 
					foreach($group_list as $key => $val){
						?>
						
						<option value="<?php echo $val['gid'];?>"><?php echo $val['group_name'];?> </option>
						<?php 
					}
					?>
					</select>
			</div>
			<div class="form-group">	 
					<label for="inputEmail"  >Subscripción expira</label> 
					<input type="text" name="subscription_expired"  id="subscription_expired" class="form-control" placeholder="Subscripción expira"    autofocus>
			</div>

				<div class="form-group">	 
					<label   >Tipo de cuenta</label> 
					<select class="form-control" name="su">
						<option value="0">Usuario</option>
						<option value="1">Administrador</option>
					</select>
			</div>

 
	<button class="btn btn-default" type="submit">Enviar</button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>
<script>
getexpiry();
</script>