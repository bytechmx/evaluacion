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
				Nombre del grupo: <?php echo $result['group_name'];?> 
				</div>
				
				
		
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only">E-mail</label> 
					<input type="email" id="inputEmail" name="email" value="<?php echo $result['email'];?>" class="form-control" placeholder="E-mail" required autofocus>
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
					<input type="text"   name="last_name"  class="form-control"  value="<?php echo $result['last_name'];?>"  placeholder="Apellido"   autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail" class="sr-only">Número de teléfono</label> 
					<input type="text" name="contact_no"  class="form-control"  value="<?php echo $result['contact_no'];?>"  placeholder="Número de teléfono"   autofocus>
			</div>
				<div class="form-group">	 
					<label   >Seleccionar grupo</label> 
					<select class="form-control" name="gid"  onChange="getexpiry();" id="gid">
					<?php 
					foreach($group_list as $key => $val){
						?>
						
						<option value="<?php echo $val['gid'];?>" <?php if($result['gid']==$val['gid']){ echo 'selected';}?> ><?php echo $val['group_name'];?> (<?php echo $this->lang->line('price_');?>: <?php echo $val['price'];?>)</option>
						<?php 
					}
					?>
					</select>
			</div>
			<div class="form-group">	 
					<label for="inputEmail"  >Subscripción expira</label> 
					<input type="text" name="subscription_expired"  id="subscription_expired" class="form-control" value="<?php if($result['subscription_expired']!='0'){ echo date('Y-m-d',$result['subscription_expired']); }else{ echo '0';} ?>" placeholder="Subscripción expira"  value=""  autofocus>
			</div>


				<div class="form-group">	 
					<label   >Tipo de cuenta</label> 
					<select class="form-control" name="su">
						<option value="0" <?php if($result['su']==0){ echo 'selected';}?>  >Usuario</option>
						<option value="1" <?php if($result['su']==1){ echo 'selected';}?>  >Administrador</option>
					</select>
			</div>

 
	<button class="btn btn-default" type="submit">Enviar</button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>





 



</div>