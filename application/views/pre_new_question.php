 <div class="container">

   
 <h3><?php echo $title;?></h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('qbank/pre_new_question/');?>">
	
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
					<label   >Seleccionar el tipo de pregunta</label> 
					<select class="form-control" name="question_type" onChange="hidenop(this.value);">
						<option value="1">Opción múltiple con respuesta unica</option>
						<option value="2">Opción múltiple respuesta multiple</option>
						<option value="3">Coincidencia</option>
						<option value="4">Respuesta corta</option>
						<option value="5">Respuesta larga</option>
					
					</select>
			</div>

			<div class="form-group" id="nop" >	 
					<label for="inputEmail"  >Número de opciones</label> 
					<input type="text"   name="nop"  class="form-control" value="4"   >
			</div>


 
	<button class="btn btn-default" type="submit">Siguiente</button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>