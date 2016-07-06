 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('qbank/edit_question_2/'.$question['qid']);?>">
	
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
					 
Opción múltiple con respuesta multiple
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
					<label   >Seleccionar dificultad
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
					<label for="inputEmail"  >Opción <?php echo $key+1;?>)</label> <br>
					<input type="checkbox" name="score[]" value="<?php echo $key;?>" <?php if($val['score']>=0.1){ echo 'checked'; } ?> > Select Correct Option 
					<br><textarea  name="option[]"  class="form-control"  ><?php echo $val['q_option'];?></textarea>
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