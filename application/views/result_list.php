 
 <div class="container">
<?php 
$logged_in=$this->session->userdata('logged_in');
?>
   
  

<?php 
if($logged_in['su']=='1'){
	?>
   <div class="row">
 
  <div class="col-lg-12">
    <form method="post" action="<?php echo site_url('result/generate_report/');?>">
	<div class="input-group">
    <h3>Generar reporte</h3> 
<select name="quid">
<option value="0">Seleccionar evaluación</option>
<?php 
foreach($quiz_list as $qk => $quiz){
	?>
	<option value="<?php echo $quiz['quid'];?>"><?php echo $quiz['quiz_name'];?></option>
	<?php 
}
?>
</select>
 	
<select name="gid">
<option value="0">Seleccionar grupo</option>
<?php 
foreach($group_list as $gk => $group){
	?>
	<option value="<?php echo $group['gid'];?>"><?php echo $group['group_name'];?></option>
	<?php 
}
?>
</select>
<input type="text" name="date1" value="" placeholder="Desde">
 
 <input type="text" name="date2" value="" placeholder="Hasta">

 <button class="btn btn-info" type="submit">Generar reporte</button>	
    </div><!-- /input-group -->
	 </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<?php 
}
?>


<h3><?php echo $title;?></h3>
 
  <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('result/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="Buscar...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Buscar...</button>
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
		<?php 
		if($logged_in['su']=='1'){
			?>
				<div class='alert alert-danger'><?php echo('En espera de los resultados.');?></div>		
		<?php 
		}
		?>
<table class="table table-bordered">
<tr>
 <th>Resultados Id:</th>
<th>Nombre:</th>
 <th>Nombre de evaluación:</th>
 <th>Estado:
 <select onChange="sort_result('<?php echo $limit;?>',this.value);">
 <option value="0"><?php echo('Todo');?></option>
 <option value="<?php echo ('Aprobado');?>" <?php if($status==('Aprobado')){ echo 'selected'; } ?> ><?php echo ('Aprobado');?></option>
 <option value="<?php echo ('No-aprobado');?>" <?php if($status==('No-aprobado')){ echo 'selected'; } ?> ><?php echo ('No-aprobado');?></option>
 <option value="<?php echo ('Pendiente');?>" <?php if($status==('Pendiente')){ echo 'selected'; } ?> ><?php echo ('Pendiente');?></option>
 </select>
 </th>
 <th>Porcentaje obtenido</th>
<th>Acciones </th>
</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="6">No encontrado</td>
</tr>	
	
	
	<?php
}

foreach($result as $key => $val){
?>
<tr>
 <td><?php echo $val['rid'];?></td>
<td><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></td>
 <td><?php echo $val['quiz_name'];?></td>
 <td><?php echo $val['result_status'];?></td>

 <td>
<span class="text_percent"><?php echo $val['percentage_obtained'];?>%</span>
 <p class="styled"><progress value="<?php echo $val['percentage_obtained'];?>" max="100"></progress></p></td>
<td>
<a href="<?php echo site_url('result/view_result/'.$val['rid']);?>" class="btn btn-success" >Ver</a>
<?php 
if($logged_in['su']=='1'){
	?>
	<a href="javascript:remove_entry('result/remove_result/<?php echo $val['rid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>
<?php 
}
?>
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

<a href="<?php echo site_url('result/index/'.$back.'/'.$status);?>"  class="btn btn-primary">Regresar</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('result/index/'.$next.'/'.$status);?>"  class="btn btn-primary">Siguiente</a>




