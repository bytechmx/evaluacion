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
		
		 <form method="post" action="<?php echo site_url('qbank/insert_level/');?>">
	
<table class="table table-bordered">
<tr>
 <th>Dificultad:</th>
<th>Acción</th>
</tr>
<?php 
if(count($level_list)==0){
	?>
<tr>
 <td colspan="3">No encontrado</td>
</tr>	
	
	
	<?php
}

foreach($level_list as $key => $val){
?>
<tr>
 <td><input type="text"   class="form-control"  value="<?php echo $val['level_name'];?>" onBlur="updatelevel(this.value,'<?php echo $val['lid'];?>');" ></td>
<td>
<a href="javascript:remove_entry('qbank/remove_level/<?php echo $val['lid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>

</td>
</tr>

<?php 
}
?>
<tr>
 <td>
 
 <input type="text"   class="form-control"   name="level_name" value="" placeholder="Dificultad"  required ></td>
<td>
<button class="btn btn-default" type="submit"><?php echo $this->lang->line('add_new');?></button>
 
</td>
</tr>
</table>
</form>
</div>

</div>



</div>