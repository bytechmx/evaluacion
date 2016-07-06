 <div class="container">

   
 
  



<div class="row">

<div class="col-md-4">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_users;?></div>
                                    <div>Número de usuarios registrados</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('user');?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lista de usuarios</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>


<div class="col-md-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_quiz;?></div>
                                    <div>Número de evaluaciones disponibles</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('quiz');?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lista de evaluaciones</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>

<div class="col-md-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-question-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $num_qbank;?></div>
                                    <div>Preguntas en la base de datos</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('qbank');?>">
                            <div class="panel-footer">Lista de preguntas</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
 </div>
 
 
 
 

</div>
 
<div class="row"></div>
<div class="row"  > 
<hr><br> 
<h4>Usuarios nuevos</h4>
<table class="table table-bordered" >
<tr>
 <th>Email</th>
<th>Nombre Apellido</th>
<th>Nombre del grupo</th>
<th>Número de teléfono</th>
</tr>
<?php 
if(count($result)==0){
	?>
<tr>
 <td colspan="3">Ninguno fue encontrado</td>
</tr>	
	
	
	<?php
}
foreach($result as $key => $val){
?>
<tr>
 <td><?php echo $val['email'];?></td>
<td><?php echo $val['first_name'];?> <?php echo $val['last_name'];?></td>
 <td><?php echo $val['group_name'];?></td>
<td><?php echo $val['contact_no'];?></td>
</tr>

<?php 
}
?>
</table>


</div>




</div>