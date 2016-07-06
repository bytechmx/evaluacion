 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('qbank/edit_question_3/'.$question['qid']);?>">
	
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
					Coincidencia

			</div>

			
			<div class="form-group">	 
					<label   >Seleccionar categoria</label> 
					<select class="form-control" name="cid">
					<?php 
					foreach($category_list as $key => $val){
						?>
						
						<option value="<?php echo $val['cid'];?>"  <?php if($question['cid']==$val['cid']){ echo 'selected'; } ?> ><?php echo $val['category_name'];?></option>
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
						
						<option value="<?php echo $val['lid'];?>" <?php if($question['lid']==$val['lid']){ echo 'selected'; } ?> ><?php echo $val['level_name'];?></option>
						<?php 
					}
					?>
					</select>
			</div>

			
			

			<div class="form-group">	 
					<label for="inputEmail"  >Pregunta</label> 
					<textarea  name="question"  class="form-control"   ><?php echo $question['question'];?></textarea>
			</div>
			<div class="form-group">	 
					<label for="inputEmail"  >Descripción</label> 
					<textarea  name="description"  class="form-control"><?php echo $question['description'];?></textarea>
			</div>

		<?php 
		foreach($options as $key => $val){
			?>
			<div class="form-group">	 
					<label for="inputEmail"  >Opción<?php echo $key+1;?>)</label> <br>
					<input type="text" name="option[]" value="<?php echo $val['q_option'];?>"  > =	<input type="text" name="option2[]" value="<?php echo $val['q_option_match'];?>"  > 
			</div>
		<?php 
		}
		?>

 
	<button class="btn btn-default" type="submit">Enviar</button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
	  
	  <div class="col-md-3">
		
		
			<div class="form-group">	 
			<table class="table table-bordered">
			<tr><td>Intentos correctos</td><td><?php echo $question['no_time_corrected'];?></td></tr>
			<tr><td>Intentos incorrectos</td><td><?php echo $question['no_time_incorrected'];?></td></tr>
			
			</table>

			</div>


	  </div>
</div>

 



</div>