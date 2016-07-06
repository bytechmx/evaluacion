 <div class="container">

   
 <h3><?php echo $title;?></h3>
    <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('qbank/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="Buscar...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Buscar</button>
      </span>
	 
	  
    </div><!-- /input-group -->
	 </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->


  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
						<div class="form-group">	 
					<form method="post" action="<?php echo site_url('qbank/pre_question_list/'.$limit.'/'.$cid.'/'.$lid);?>">
					<select   name="cid">
					<option value="0">Todas las categorias</option>
					<?php 
					foreach($category_list as $key => $val){
						?>
						
						<option value="<?php echo $val['cid'];?>" <?php if($val['cid']==$cid){ echo 'selected';} ?> ><?php echo $val['category_name'];?></option>
						<?php 
					}
					?>
					</select>
			 	<select  name="lid">
				<option value="0">Todas las dificultades</option>
					<?php 
					foreach($level_list as $key => $val){
						?>
						
						<option value="<?php echo $val['lid'];?>"  <?php if($val['lid']==$lid){ echo 'selected';} ?> ><?php echo $val['level_name'];?></option>
						<?php 
					}
					?>
					</select>
					 <button class="btn btn-default" type="submit">Filtrar</button>
					 </form>
			</div>
	
<table class="table table-bordered">
<tr>
 <th>#</th>
 <th>Pregunta</th>
<th>Tipo de Pregunta</th>
<th>Categoría / Dificultad</th>
 
<th>Porcentaje acertado</th>
<th>Acciones</th>
</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="3">Ninguno encontrado</td>
</tr>	
	
	
	<?php
}
foreach($result as $key => $val){
?>
<tr>
 <td>  <a href="javascript:show_question_stat('<?php echo $val['qid'];?>');">+</a>  <?php echo $val['qid'];?></td>
 <td><?php echo substr(strip_tags($val['question']),0,40);?>
 
 
 <span style="display:none;" id="stat-<?php echo $val['qid'];?>">
  
 
 <table class="table table-bordered">
<tr><td>Intentos correctos</td><td><?php echo $val['no_time_corrected'];?></td></tr>
<tr><td>Intentos incorrectos</td><td><?php echo $val['no_time_incorrected'];?></td></tr>


</table>


 

 </span>
 
 
 
 </td>
<td><?php echo $val['question_type'];?></td>
<td><?php echo $val['category_name'];?> / <span style="font-size:12px;"><?php echo $val['level_name'];?></span></td>
 
<td><?php if($val['no_time_served']!='0'){ $perc=($val['no_time_corrected']/$val['no_time_served'])*100; 
?>
<span class="text_percent"><?php echo intval($perc);?>%</span>

<p class="styled"><progress value="<?php echo intval($perc);?>" max="100"></progress></p>

<?php
}else{ echo ('No se ha utilizado');} ?></td>

<td>
<?php 
$qn=1;
if($val['question_type']==('Opción múltiple con respuesta unica')){
	$qn=1;
}
if($val['question_type']==('Opción múltiple con respuesta multiple')){
	$qn=2;
}
if($val['question_type']==$this->lang->line('match_the_column')){
	$qn=3;
}
if($val['question_type']==$this->lang->line('short_answer')){
	$qn=4;
}
if($val['question_type']==$this->lang->line('long_answer')){
	$qn=5;
}


?>
<a href="<?php echo site_url('qbank/edit_question_'.$qn.'/'.$val['qid']);?>"><img src="<?php echo base_url('images/edit.png');?>"></a>
<a href="javascript:remove_entry('qbank/remove_question/<?php echo $val['qid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>

</td>
</tr>

<?php 
}
?>
</table>
</div>

</div>


<?php
if(($limit-($this->config->item('number_of_rows')))>=0){ $back=$limit-($this->config->item('number_of_rows')); }else{ $back='0'; } ?>

<a href="<?php echo site_url('qbank/index/'.$back.'/'.$cid.'/'.$lid);?>"  class="btn btn-primary">Atras</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('qbank/index/'.$next.'/'.$cid.'/'.$lid);?>"  class="btn btn-primary">Siguiente</a>







<br><br><br><br>
<div class="login-panel panel panel-default">
		<div class="panel-body"> 

<?php echo form_open('qbank/import',array('enctype'=>'multipart/form-data')); ?>
 <h4>Importar Pregunta</h4> 
 <select name="cid"   >
 <option value="0">Seleccionar Categoría</option>
<?php 
					foreach($category_list as $key => $val){
						?>
						
						<option value="<?php echo $val['cid'];?>" <?php if($val['cid']==$cid){ echo 'selected';} ?> ><?php echo $val['category_name'];?></option>
						<?php 
					}
					?></select>
 <select name="did"  >
 <option value="0">Seleccionar dificultad</option>
<?php 
					foreach($level_list as $key => $val){
						?>
						
						<option value="<?php echo $val['lid'];?>"  <?php if($val['lid']==$lid){ echo 'selected';} ?> ><?php echo $val['level_name'];?></option>
						<?php 
					}
					?>
					</select> 

Subir archivo de Excel
	<input type="hidden" name="size" value="3500000">
	<input type="file" name="xlsfile" style="width:150px;float:left;margin-left:10px;">
	<div style="clear:both;"></div>
	<input type="submit" value="Import" style="margin-top:5px;" class="btn btn-default">
	
<a href="<?php echo base_url();?>sample/sample.xls" target="new">Click here</a> Subido correctamente 
</form>

</div>
</div>



</div>

<br><br><br><br>