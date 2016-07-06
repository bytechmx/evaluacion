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
		
		 <form method="post" action="<?php echo site_url('qbank/insert_category/');?>">
	
<table class="table table-bordered">
<tr>
 <th>Categoría</th>
<th>Acción</th>
</tr>
<?php 
if(count($category_list)==0){
	?>
<tr>
 <td colspan="3">No encontrado</td>
</tr>	
	
	
	<?php
}

foreach($category_list as $key => $val){
?>
<tr>
 <td><input type="text"   class="form-control"  value="<?php echo $val['category_name'];?>" onBlur="updatecategory(this.value,'<?php echo $val['cid'];?>');" ></td>
<td>
<a href="javascript:remove_entry('qbank/remove_category/<?php echo $val['cid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>

</td>
</tr>

<?php 
}
?>
<tr>
 <td>
 
 <input type="text"   class="form-control"   name="category_name" value="" placeholder="Categoría"  required ></td>
<td>
<button class="btn btn-default" type="submit">Agregar</button>
 
</td>
</tr>
</table>
</form>
</div>

</div>



</div>