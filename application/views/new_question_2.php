 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('qbank/new_question_2/'.$nop);?>">
	
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
					 
Opción múltiple respuesta multiple
			</div>

			
			<div class="form-group">	 
					<label   >Seleccionar categoría</label> 
					<select class="form-control" name="cid">
					<?php 
					foreach($category_list as $key => $val){
						?>
						
						<option value="<?php echo $val['cid'];?>"><?php echo $val['category_name'];?></option>
						<?php 
					}
					?>
					</select>
			</div>
			
			
			<div class="form-group">	 
					<label   >Seleccionar dificultad</label> 
					<select class="form-control" name="lid">
					<?php 
					foreach($level_list as $key => $val){
						?>
						
						<option value="<?php echo $val['lid'];?>"><?php echo $val['level_name'];?></option>
						<?php 
					}
					?>
					</select>
			</div>

			
			

			<div class="form-group">	 
					<label for="inputEmail"  >Pregunta</label> 
					<textarea  name="question"  class="form-control"   ></textarea>
			</div>
			<div class="form-group">	 
					<label for="inputEmail"  >Descripción</label> 
					<textarea  name="description"  class="form-control"></textarea>
			</div>
		<?php 
		for($i=1; $i<=$nop; $i++){
			?>
			<div class="form-group">	 
					<label for="inputEmail"  >Opción <?php echo $i;?>)</label> <br>
					<input type="checkbox" name="score[]" value="<?php echo $i-1;?>" <?php if($i==1){ echo 'checked'; } ?> > Seleccionar la opción correcta
					<br><textarea  name="option[]"  class="form-control"   ></textarea>
			</div>
		<?php 
		}
		?>

 
	<button class="btn btn-default" type="submit">Enviar</button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>