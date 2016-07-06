 <div class="container">

   
 
 
 



<div class="col-md-4">
</div>
<div class="col-md-4">

	<div class="login-panel panel panel-default">
		<div class="panel-body"> 
		<img src="<?php echo base_url('images/logo.png');?>">
		

			<form method="post" class="form-signin" action="<?php echo site_url('login/forgot');?>">
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
					<label for="inputEmail"  >Email</label> 
					<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
			</div>
			 
			<div class="form-group">	  
					 
					<button class="btn btn-lg btn-primary btn-block" type="submit">Enviar contraseña nueva</button>
			</div>
<?php 
if($this->config->item('user_registration')){
	?>
	<a href="<?php echo site_url('login/registration');?>">Registrar nueva cuenta</a>
	&nbsp;&nbsp;&nbsp;&nbsp;
<?php
}
?>
	<a href="<?php echo site_url('login');?>">Iniciar sesión</a>

			</form>
		</div>
	</div>

</div>
<div class="col-md-4">


</div>



</div>