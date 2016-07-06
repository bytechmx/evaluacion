 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('user/update_user/'.$uid);?>">
	
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
				<?php echo('Grupo');?>: <?php echo $result['group_name'];?> 
				</div>
				
				
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only">Email</label> 
					<input type="email" id="inputEmail" name="email" value="<?php echo $result['email'];?>" readonly=readonly class="form-control" placeholder="Email" required autofocus>
			</div>
			<div class="form-group">	  
					<label for="inputPassword" class="sr-only">Contraseña</label>
					<input type="password" id="inputPassword" name="password"   value=""  class="form-control" placeholder="Contraseña"   >
			 </div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only">Nombre</label> 
					<input type="text"  name="first_name"  class="form-control"  value="<?php echo $result['first_name'];?>"  placeholder="Nombre"   autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only">Apellido</label> 
					<input type="text"   name="last_name"  class="form-control"  value="<?php echo $result['last_name'];?>"  placeholder="Apelido"   autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only">Número de teléfono</label> 
					<input type="text" name="contact_no"  class="form-control"  value="<?php echo $result['contact_no'];?>"  placeholder="Número de teléfono"   autofocus>
			</div>
				 
 
	<button class="btn btn-default" type="submit">Enviar</button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>




 



</div>