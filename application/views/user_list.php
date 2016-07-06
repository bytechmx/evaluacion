 <div class="container">

   
 <h3><?php echo $title;?></h3>
    <div class="row">
 
  <div class="col-lg-6">
    <form method="post" action="<?php echo site_url('user/index/');?>">
	<div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="Buscar">
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
		
<table class="table table-bordered">
<tr>
 <th>Email</th>
<th>Nombre Apellido</th>
<th>Acción</th>
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
 <td><?php echo $val['email'];?></td>
<td><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></td>
<td>
<a href="<?php echo site_url('user/edit_user/'.$val['uid']);?>"><img src="<?php echo base_url('images/edit.png');?>"></a>
<a href="javascript:remove_entry('user/remove_user/<?php echo $val['uid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>

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

<a href="<?php echo site_url('user/index/'.$back);?>"  class="btn btn-primary">Regresar</a>
&nbsp;&nbsp;
<?php
 $next=$limit+($this->config->item('number_of_rows'));  ?>

<a href="<?php echo site_url('user/index/'.$next);?>"  class="btn btn-primary">Siguiente</a>





</div>