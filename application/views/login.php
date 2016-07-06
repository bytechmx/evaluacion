 <div class="container">

   
 
 
 



<div class="col-md-4">
</div>
<div class="col-md-4">

	<div class="login-panel panel panel-default">
		<div class="panel-body"> 
		<img src="<?php echo base_url('images/logo.png');?>">
		

			<form class="form-signin" method="post" action="<?php echo site_url('login/verifylogin');?>">
					<h2 class="form-signin-heading">Iniciar sesión</h2>
		<?php 
		if($this->session->flashdata('message')){
			?>
			<div class="alert alert-danger">
			<?php echo $this->session->flashdata('message');?>
			</div>
		<?php	
		}
		?>				  
			<div class="form-group">	 
					<label for="inputEmail" class="sr-only">Email</label> 
					<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
			</div>
			<div class="form-group">	  
					<label for="inputPassword" class="sr-only">Contraseña</label>
					<input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required >
			 </div>
			<div class="form-group">	  
					 
					<button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
			</div>

	

			</form>
		</div>
	</div>

</div>
<div class="col-md-4">


</div>



</div>