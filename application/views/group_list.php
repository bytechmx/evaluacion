 <div class="container">

   
 <h3><?php echo $title;?></h3>


  <div class="row">
 
<div class="col-md-12">
<br> 
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		<div id="message"></div>
		
		 <form method="post" action="<?php echo site_url('user/insert_group/');?>">
	
<table class="table table-bordered">
<tr>
 <th>Grupo</th>
 <th>Días de caducidad (Escribir 0 para no limitar)</th>
<th>Acción</th>
</tr>
<?php 
if(count($group_list)==0){
	?>
<tr>
 <td colspan="3">No encontrado</td>
</tr>	
	
	
	<?php
}

foreach($group_list as $key => $val){
?>
<tr>
 <td><input type="text"   class="form-control"  value="<?php echo $val['group_name'];?>" onBlur="updategroup(this.value,'<?php echo $val['gid'];?>');" ></td>
 
 <td><input type="text"   class="form-control"  value="<?php echo $val['valid_for_days'];?>" onBlur="updategroupvalid(this.value,'<?php echo $val['gid'];?>');" ></td>
<td>
<a href="javascript:remove_entry('user/remove_group/<?php echo $val['gid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>

</td>
</tr>

<?php 
}
?>
<tr>
 <td>
 
 <input type="text"   class="form-control"   name="group_name" value="" placeholder="Grupo"  required ></td>

<td>
 
 
 <input type="text"   class="form-control"   name="valid_for_days" value="" placeholder="Valido"  required ></td>
<td>
<button class="btn btn-default" type="submit">Agregar</button>
 
</td>
</tr>
</table>
</form>
</div>

</div>



</div>