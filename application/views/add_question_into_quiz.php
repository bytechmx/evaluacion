 <div class="container">

   
 <h3><?php echo $title;?></h3>
  <a href="<?php echo site_url('quiz/edit_quiz/'.$quid);?>" class="btn btn-info"  >Regresar</a><br><br>
  <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('quiz/add_question/'.$quid.'/'.$limit.'/'.$cid.'/'.$lid);?>">
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
		<input type="hidden" id="added" value="Agregado">
		
		
		
					<div class="form-group">	 
					<form method="post" action="<?php echo site_url('quiz/pre_add_question/'.$quid.'/'.$limit.'/'.$cid.'/'.$lid);?>">
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
					 <button class="btn btn-default" type="submit">Filtro</button>
					 </form>
			</div>

	
	
	
<table class="table table-bordered">
<tr>
 <th>#</th>
 <th>Pregunta</th>
<th>Tipo de pregunta</th>
<th>Categoria / Dificultad</th>
<th>Porcentaje correcto</th>
<th>Acciones</th>
</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="3">No encontrado</td>
</tr>	
	
	
	<?php
}
foreach($result as $key => $val){
?>
<tr>
 <td>  <a href="javascript:show_question_stat('<?php echo $val['qid'];?>');">+</a>   <?php echo $val['qid'];?></td>
 <td><?php echo substr(strip_tags($val['question']),0,50);?>
 
 <span style="display:none;" id="stat-<?php echo $val['qid'];?>">
 <table class="table table-bordered">
<tr><td>Intentos correctos</td><td><?php echo $val['no_time_corrected'];?></td></tr>
<tr><td>Intentos incorrectos</td><td><?php echo $val['no_time_incorrected'];?></td></tr>
<tr><td><?php echo $this->lang->line('no_times_unattempted');?></td><td><?php echo $val['no_time_unattempted'];?></td></tr>
</table>
 </span>
 
 
 
 </td>
<td><?php echo $val['question_type'];?></td>
<td><?php echo $val['category_name'];?> / <span style="font-size:12px;"><?php echo $val['level_name'];?></span></td>
 
<td><?php if($val['no_time_served']!='0'){ $perc=($val['no_time_corrected']/$val['no_time_served'])*100; 
?>

<div style="background:#eeeeee;width:100%;height:10px;"><div style="background:#449d44;width:<?php echo intval($perc);?>%;height:10px;"></div>
<span style="font-size:10px;"><?php echo intval($perc);?>%</span>

<?php
}else{ ('No usado');} ?></td>

<td>
 
<a href="javascript:addquestion('<?php echo $quid;?>','<?php echo $val['qid'];?>');" class="btn btn-primary" id='q<?php echo $val['qid'];?>'>
<?php 
if(in_array($val['qid'],explode(',',$quiz['qids']))){
	 echo ('Agregado'); 
}else{
  echo ('Agregar');
}
?>
</a> 


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

<a href="<?php echo site_url('quiz/add_question/'.$quid.'/'.$back.'/'.$cid.'/'.$lid);?>"  class="btn btn-primary">Atras</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('quiz/add_question/'.$quid.'/'.$next.'/'.$cid.'/'.$lid);?>"  class="btn btn-primary">Siguiente</a>





</div>