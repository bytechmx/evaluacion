 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('quiz/update_quiz/'.$quiz['quid']);?>">
	
<div class="col-md-12">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
		
		 			<div class="form-group">	 
					<label for="inputEmail" class="sr-only">Nombre de la evaluación</label> 
					<input type="text"  name="quiz_name"  value="<?php echo $quiz['quiz_name'];?>" class="form-control" placeholder="Nombre de la evaluación"  required autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Descripción</label> 
					<textarea   name="description"  class="form-control tinymce_textarea" ><?php echo $quiz['description'];?></textarea>
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Fecha de inicio</label> 
					<input type="text" name="start_date"  value="<?php echo date('Y-m-d H:i:s',$quiz['start_date']);?>" class="form-control" placeholder="Fecha de inicio</label> 
					<input type="text" name="start_date"  val"   required >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Fecha de terminación</label> 
					<input type="text" name="end_date"  value="<?php echo date('Y-m-d H:i:s',$quiz['end_date']);?>" class="form-control" placeholder="Fecha de terminación"   required >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Duración (En minutos)</label> 
					<input type="text" name="duration"  value="<?php echo $quiz['duration'];?>" class="form-control" placeholder="Duración (En minutos)"  required  >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Número de intentos</label> 
					<input type="text" name="maximum_attempts"  value="<?php echo $quiz['maximum_attempts'];?>" class="form-control" placeholder="Número de intentos"   required >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Porcentaje necesario para aprobar</label> 
					<input type="text" name="pass_percentage" value="<?php echo $quiz['pass_percentage'];?>" class="form-control" placeholder="Porcentaje necesario para aprobar"   required >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Puntuación correcta</label> 
					<input type="text" name="correct_score"  value="<?php echo $quiz['correct_score'];?>" class="form-control" placeholder="Puntuación correcta"   required >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Puntuación incorrecta</label> 
					<input type="text" name="incorrect_score"  value="<?php echo $quiz['incorrect_score'];?>" class="form-control" placeholder="Puntuación incorrecta"  required  >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Permitir dirección IP para intentar esta prueba . Para permitir todo , dejar en blanco</label> 
					<input type="text" name="ip_address"  value="<?php echo $quiz['ip_address'];?>" class="form-control" placeholder="Permitir dirección IP para intentar esta prueba . Para permitir todo , dejar en blanco"    >
			</div>
				<div class="form-group">	 
					<label for="inputEmail" >Permitir ver respuestas al finalizar el examen</label> <br>
					<input type="radio" name="view_answer"    value="1" <?php if($quiz['view_answer']==1){ echo 'checked'; } ?>  > Si&nbsp;&nbsp;&nbsp;
					<input type="radio" name="view_answer"    value="0"   <?php if($quiz['view_answer']==0){ echo 'checked'; } ?>  > No
			</div>
						<?php 
			if($this->config->item('webcam')==true){
				?>
				<div class="form-group">	 
					<label for="inputEmail" >Capturar imagen</label> <br>
					<input type="radio" name="camera_req"    value="1"   <?php if($quiz['camera_req']==1){ echo 'checked'; } ?>  > Si&nbsp;&nbsp;&nbsp;
					<input type="radio" name="camera_req"    value="0"   <?php if($quiz['camera_req']==0){ echo 'checked'; } ?>    > No
			</div>
			
						<?php 
			}else{
				?>
				<input type="hidden" name="camera_req" value="0">
				
				<?php 
			}
			?>
			
			
				<div class="form-group">	 
					<label   >Seleccionar Grupo</label> <br>
					 <?php 
					foreach($group_list as $key => $val){
						?>
						
						 <input type="checkbox" name="gids[]" value="<?php echo $val['gid'];?>" <?php if(in_array($val['gid'],explode(',',$quiz['gids']))){ echo 'checked'; } ?> > <?php echo $val['group_name'];?> &nbsp;&nbsp;&nbsp;
						<?php 
					}
					?>
					 
			</div>
			
			
							<div class="form-group">	 
					<label for="inputEmail" >Generar Constancia</label> <br>
					<input type="radio" name="gen_certificate"    value="1"   <?php if($quiz['gen_certificate']==1){ echo 'checked'; } ?> > Si<br>
					<input type="radio" name="gen_certificate"    value="0"    <?php if($quiz['gen_certificate']==0){ echo 'checked'; } ?> > No
			</div>
			 
				<div class="form-group">	 
					<label for="inputEmail"  >Constancia Html</label> 
					<textarea   name="certificate_text"  class="form-control" style="height:250px;"><?php echo $quiz['certificate_text'];?></textarea><br>
					Puedes usar las siguientes tags: <?php echo htmlentities("<br>  <center></center>  <b></b>  <h1></h1>  <h2></h2>  <h3></h3>  <font></font>");?><br>
					{email}, {first_name}, {last_name}, {quiz_name}, {percentage_obtained}, {score_obtained}, {result}, {generated_date}, {result_id}, {qr_code}
			
			<br><br>
			<a href="<?php echo site_url('result/preview_certificate/'.$quiz['quid']);?>" target="preview_cert" class="btn btn-warning">Vista previa</a>
			 
			<span style="color:#ff0000">
Primero haga clic en el botón enviar para ver la vista previa actualizada</span>
			</div>

			
			

		<hr>
<br><br><br>
<?php 
if($quiz['question_selection']=='0'){
 
?>
<h4>Pregunta agregada a la evaluació</h4>
<a href="<?php echo site_url('quiz/add_question/'.$quiz['quid']);?>" class="btn btn-danger"  >Pregunta agregada a la evaluación</a>
  
<table class="table table-bordered" style="margin-top:10px;">
<tr>
   <th>#</th>
 <th>Pregunta</th>
<th>Tipo de pregunta</th>
<th>Categoria</th>
<th>Dificultad</th>
<th>Acciones </th>
</tr>
<?php 
if(count($questions)==0){
	?>
<tr>
 <td colspan="6">Aun no se ha añadido una pregunta</td>
</tr>	
	
	
	<?php
}
foreach($questions as $key => $val){
?>
<tr>
 <td><?php echo $val['qid'];?></td>
 <td><?php echo substr(strip_tags($val['question']),0,50);?></td>
<td><?php echo $val['question_type'];?></td>
<td><?php echo $val['category_name'];?></td>
<td><?php echo $val['level_name'];?></td>
<td>
 
 <a href="<?php echo site_url('quiz/remove_qid/'.$quiz['quid'].'/'.$val['qid']);?>" title="Eliminar de la evaluación"><img src="<?php echo base_url('images/cross.png');?>"></a>
 <?php 
 if($key==0){
	 ?>
	 <img src="<?php echo base_url();?>images/empty.png" title="">
	 <?php 
 }else{
	 ?>
 <a href="javascript:cancelmove('Up','<?php echo $quiz['quid'];?>','<?php echo $val['qid'];?>','<?php echo $key+1;?>');"><img src="<?php echo base_url();?>images/up.png" title="Subir"></a>
<?php 
 }
  
if($key==(count(explode(',',$quiz['qids']))-1)){ 
?>
<?php 
}else{
	?>
<a href="javascript:cancelmove('Down','<?php echo $quiz['quid'];?>','<?php echo $val['qid'];?>','<?php echo $key+1;?>');"><img src="<?php echo base_url();?>images/down.png" title="Bajar"></a>
<?php 
}
?>
</td>
</tr>

<?php 
}
?>
</table>

<?php
}else{
	
	?>
<h4>Pregunta agregada a la evaluación</h4><br> 
	
	<?php 
if(count($qcl)==0){
	   echo ('Aun no se ha añadido una pregunta').'<br><br>'; 

}	
	foreach($qcl as $k => $vall){
		
		?>
		
						<div class="form-group">	 
				 	<select   name="cid[]" >
					<option value="0">Seleccionar Categoria</option>
					<?php 
					foreach($category_list as $key => $val){
						?>
						
						<option value="<?php echo $val['cid'];?>"   <?php if($val['cid']==$vall['cid']){ echo 'selected'; } ?>  ><?php echo $val['category_name'];?></option>
						<?php 
					}
					?>
					</select>
			 	<select  name="lid[]" >
				<option value="0">Seleccionar Dificultad</option>
					<?php 
					foreach($level_list as $key => $val){
						?>
						
						<option value="<?php echo $val['lid'];?>"   <?php if($val['lid']==$vall['lid']){ echo 'selected'; } ?> ><?php echo $val['level_name'];?></option>
						<?php 
					}
					?>
					</select>
					 
					  <?php echo ('Aun no se ha añadido una pregunta');?>
					  <select name="noq[]">
					  <option value="<?php echo $vall['noq'];?>"><?php echo $vall['noq'];?></option>
					  <option value="0">0</option>
					  </select>
			</div>
<hr>
		
		
		
		<?php 
	}
	?>
					<div class="form-group">	 
				 	<select   name="cid[]" id="cid">
					<option value="0">Seleccionar Categoria</option>
					<?php 
					foreach($category_list as $key => $val){
						?>
						
						<option value="<?php echo $val['cid'];?>"   ><?php echo $val['category_name'];?></option>
						<?php 
					}
					?>
					</select>
			 	<select  name="lid[]" onChange="no_q_available(this.value);">
				<option value="0">Seleccionar Dificultad</option>
					<?php 
					foreach($level_list as $key => $val){
						?>
						
						<option value="<?php echo $val['lid'];?>"   ><?php echo $val['level_name'];?></option>
						<?php 
					}
					?>
					</select>
					 <br>
					  <?php echo('Seleccione el número de preguntas que desee añadir de categoría y nivel');?>
					 <span id="no_q_available"></span>
			</div>

	
	
	
	<?php 
	
}

?>	
			 

 
	<button class="btn btn-success" type="submit">Enviar</button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>


<div  id="warning_div" style="padding:10px; position:fixed;z-index:100;display:none;width:100%;border-radius:5px;height:200px; border:1px solid #dddddd;left:4px;top:70px;background:#ffffff;">
<center><b> <?php echo $this->lang->line('to_which_position');?></b><br><input type="text" style="width:30px" id="qposition" value=""><br><br>
<a href="javascript:cancelmove();"   class="btn btn-danger"  style="cursor:pointer;"><?php echo ('Cancelar');?></a> &nbsp; &nbsp; &nbsp; &nbsp;
<a href="javascript:movequestion();"   class="btn btn-info"  style="cursor:pointer;"><?php echo('Mover');?></a>

</center>
</div>