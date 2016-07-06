 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('quiz/insert_quiz/');?>">
	
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
					<label for="inputEmail" class="sr-only">Nombre de la evaluacion</label> 
					<input type="text"  name="quiz_name"  class="form-control" placeholder="Nombre de la evaluacion"  required autofocus>
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Descripción</label> 
					<textarea   name="description"  class="form-control tinymce_textarea" ></textarea>
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Fecha de inicio</label> 
					<input type="text" name="start_date"  value="<?php echo date('Y-m-d H:i:s',time());?>" class="form-control" placeholder="<?php echo $this->lang->line('start_date');?>"   required >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Fecha de terminación</label> 
					<input type="text" name="end_date"  value="<?php echo date('Y-m-d H:i:s',(time()+(60*60*24*365)));?>" class="form-control" placeholder="<?php echo $this->lang->line('end_date');?>"   required >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Duración (En minutos)</label> 
					<input type="text" name="duration"  value="10" class="form-control" placeholder="Duración"  required  >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Número de intentos</label> 
					<input type="text" name="maximum_attempts"  value="10" class="form-control" placeholder="Número de intentos"   required >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Porcentaje necesario para aprobar</label> 
					<input type="text" name="pass_percentage" value="50" class="form-control" placeholder="Porcentaje necesario para aprobar"   required >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Puntuación correcta</label> 
					<input type="text" name="correct_score"  value="1" class="form-control" placeholder="Puntuación correcta"   required >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Puntuación incorrecta</label> 
					<input type="text" name="incorrect_score"  value="0" class="form-control" placeholder="Puntuación incorrecta"  required  >
			</div>
				<div class="form-group">	 
					<label for="inputEmail"  >Permitir dirección IP para intentar esta prueba . Para permitir todo , dejar en blanco</label> 
					<input type="text" name="ip_address"  value="" class="form-control" placeholder="<?php echo $this->lang->line('ip_address');?>"    >
			</div>
				<div class="form-group">	 
					<label for="inputEmail" >Permitir ver respuestas al finalizar el examen</label> <br>
					<input type="radio" name="view_answer"    value="1" checked > Si&nbsp;&nbsp;&nbsp;
					<input type="radio" name="view_answer"    value="0"  > No
			</div>
			<?php 
			if($this->config->item('webcam')==true){
				?>
				<div class="form-group">	 
					<label for="inputEmail" >Capturar imagen</label> <br>
					<input type="radio" name="camera_req"    value="1"  > Si&nbsp;&nbsp;&nbsp;
					<input type="radio" name="camera_req"    value="0"  checked > No
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
						
						 <input type="checkbox" name="gids[]" value="<?php echo $val['gid'];?>" <?php if($key==0){ echo 'checked'; } ?> > <?php echo $val['group_name'];?> &nbsp;&nbsp;&nbsp;
						<?php 
					}
					?>
					 
			</div>

				<div class="form-group">	 
					<label for="inputEmail" >Modo selección de preguntas</label> <br>
					<input type="radio" name="question_selection"    value="1"  > Automático - Se seleccionaran las preguntas aleatoriamente<br>
					<input type="radio" name="question_selection"    value="0"  checked > Manual - Se seleccionaran las preguntas manualmente de la Base de datos 
			</div>
				<div class="form-group">	 
					<label for="inputEmail" >Generar Constancia</label> <br>
					<input type="radio" name="gen_certificate"    value="1"  >Si<br>
					<input type="radio" name="gen_certificate"    value="0"  checked > No
			</div>
			 
				<div class="form-group">	 
					<label for="inputEmail"  >Constancia Html</label> 
					<textarea   name="certificate_text"  class="form-control" ></textarea><br>
					Puedes usar las siguientes tags:<?php echo htmlentities("<br>  <center></center>  <b></b>  <h1></h1>  <h2></h2>   <h3></h3>    <font></font>");?><br>
					{email}, {first_name}, {last_name}, {quiz_name}, {percentage_obtained}, {score_obtained}, {result}, {generated_date}, {result_id}, {qr_code}
			</div>

 
	<button class="btn btn-success" type="submit">Siguiente</button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>