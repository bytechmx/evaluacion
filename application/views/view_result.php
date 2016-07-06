 
 <style>
@media print {
   
   .navbar{
   display:none;
   }
   #footer{
   display:none;
   } 
   .printbtn{
	  display:none; 
   }
   #social_share{
	   display:none;
   }
   #page_break2{
	   
   page-break-after: always;
	}
	

}
 td{
		font-size:14px;
		padding:4px;
	}
	
	
</style>

 <div class="container">
<?php 
$this->load->helper('date');
$this->config->set_item('language', 'spanish');
$this->load->library('calendar');
$logged_in=$this->session->userdata('logged_in');
?>
   
 <h3><?php echo $title;?></h3>
   
 
<a href="javascript:print();" class="btn btn-success printbtn"><?php echo('Imprimir');?></a>

<?php
if($result['result_status']=='Aprobado'){
?>
<a href="<?php echo site_url('result/generate_certificate/'.$result['rid']);?>" class="btn btn-warning printbtn">Descargar constancia</a>
	
<?php
}
?>
  <div class="row">
     
<div class="col-md-12">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	
	
	
		 
<table class="table table-bordered">
<?php 
if($result['camera_req']=='1'){
	?>
<tr><td colspan='2'> <?php if($result['photo']!=''){ ?> <img src ="<?php echo base_url('photo/'.$result['photo']);?>" id="photograph" ><?php } ?></td></tr>
	
	<?php 
}
?>
<tr><td>Nombre:</td><td><?php echo $result['first_name'];?></td></tr>
<tr><td>Apellido:</td><td><?php echo $result['last_name'];?></td></tr>
<tr><td>Email:</td><td><?php echo $result['email'];?></td></tr>
<tr><td>Evaluación:</td><td><?php echo $result['quiz_name'];?></td></tr>
<tr><td>Tiempo:</td><td><?php setlocale(LC_TIME, 'es_AR');

echo strftime("%B %d, %Y", $result['start_time']);?></td></tr>
<tr><td>Tiempo transcurrido en minutos:</td><td><?php echo intval($result['total_time']/60);?></td></tr>
<tr><td>Porcentaje obtenido:</td><td><?php echo $result['percentage_obtained'];?>%</td></tr>
<tr><td>Percentil obtenido</td><td><?php echo substr(((($percentile[1]+1)/$percentile[0])*100),0,5);   ?>%</td></tr>
<tr><td>Puntuación:</td><td><?php echo $result['score_obtained'];?></td></tr>
<tr><td>Estado:</td><td><?php echo $result['result_status'];?></td></tr>

</table>
  
 
		</div>
</div>
<br>


<?php
 
 
  
if($this->config->item('google_chart') == true ){ 
?>


<!-- google chart starts -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $value;?>);

      
    
    </script>
	
<!-- google chart ends -->


<!-- google chart starts -->

    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $qtime;?>);

        var options = {
          title: '<?php echo('Tiempo dedicado a cada pregunta en segundos');?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>
		 <div id="chart_div2" style="width:800px; height: 500px;"></div>
<!-- google chart ends -->




 

<?php 
}

$ind_score=explode(',',$result['score_individual']); 
// view answer
if($result['view_answer']=='1' || $logged_in['su']=='1'){
	
?>

<div class="login-panel panel panel-default">
		<div class="panel-body"> 
<h3>Respuestas</h3>

<?php 
$abc=array(
'0'=>'A',
'1'=>'B',
'2'=>'C',
'3'=>'D',
'4'=>'E',
'6'=>'F',
'7'=>'G',
'8'=>'H',
'9'=>'I',
'10'=>'J',
'11'=>'K'
);
foreach($questions as $qk => $question){
?>
 <hr>
 <div id="q<?php echo $qk;?>" class="" style="<?php if($ind_score[$qk]=='1'){ ?>background-color:#e3f8da;<?php }else if($ind_score[$qk]=='2'){ ?>background-color:#ffe1cb;<?php }else if($ind_score[$qk]=='3'){ ?>background-color:#fdfbcf;<?php }else{ ?>background-color:#ffffff;<?php } ?>">
		
		<div style="padding:10px;" >
		 <?php echo '<b>'.('Pregunta');?> <?php echo $qk+1;?>)</b><br>
		 <?php echo $question['question'];?>
<hr>
		 <?php if($question['description']!='') {
			echo '<b>'.('Descripción').'</b><br>';
			echo $question['description'];
		 }
		 ?> 
		 </div>
		<div style="padding:10px;" >
		 <?php 
		 // multiple single choice
		 if($question['question_type']==('Opcón multiple con respuesta unica')){
			 
			 			 			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			 
			 
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="1">
			 <?php
			$i=0;
			$correct_options=array();
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
					if($option['score'] >= 0.1){
						$correct_options[]=$option['q_option'];
					}
			?>
			 
		<div class="op"><?php echo $abc[$i];?>) <input type="radio" name="answer[<?php echo $qk;?>][]"  id="answer_value<?php echo $qk.'-'.$i;?>" value="<?php echo $option['oid'];?>"   <?php if(in_array($option['oid'],$save_ans)){ echo 'checked'; } ?>  > <?php echo $option['q_option'];?> </div>
			 
			 
			 <?php 
			 $i+=1;
				}else{
				$i=0;	
					
				}
			}
			echo "<br>".('Opciones correctas').': '.implode(', ',$correct_options);
		 }
			
// multiple_choice_multiple_answer	

		 if($question['question_type']==('Opción multiple con respuesta multiple')){
			 			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			 
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="2">
			 <?php
			$i=0;
			$correct_options=array();
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
						if($option['score'] >= 0.1){
						$correct_options[]=$option['q_option'];
					}
			?>
			 
		<div class="op"><?php echo $abc[$i];?>) <input type="checkbox" name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk.'-'.$i;?>"   value="<?php echo $option['oid'];?>"  <?php if(in_array($option['oid'],$save_ans)){ echo 'checked'; } ?> > <?php echo $option['q_option'];?> </div>
			 
			 
			 <?php 
			 $i+=1;
				}else{
				$i=0;	
					
				}
			}
			echo "<br>".('Opciones correctas').': '.implode(', ',$correct_options);
		 }
			 
	// short answer	

		 if($question['question_type']==('Respuesta corta')){
			 			 $save_ans="";
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans=$saved_answer['q_option'];
				 }
			 }
			 ?>
			 <input type="hidden"  name="question_type[]"  id="q_type<?php echo $qk;?>" value="3"   >
			 
			 <?php

			 
			
			 ?>
			 
		<div class="op"> 
		<?php echo ('Tu respuesta');?> 
		<input type="text" name="answer[<?php echo $qk;?>][]" value="<?php echo $save_ans;?>" id="answer_value<?php echo $qk;?>"   >  
		</div>
			 
			 
			 <?php 
			 			 foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
					 echo "<br>".('Respuesta correcta').': '.$option['q_option'];
			 }
			 }
			 
		 }
		 
		 
		 	// long answer	

		 if($question['question_type']==('Respuesta larga')){
			 $save_ans="";
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					$save_ans=$saved_answer['q_option'];
				 }
			 }
			 ?>
			 <input type="hidden"  name="question_type[]" id="q_type<?php echo $qk;?>" value="4">
			 <?php
			 ?>
			 
		<div class="op"> 
		<?php echo ('Respuesta');?> <br>
		<?php echo ('Número de palabras');?>  <?php echo str_word_count($save_ans);?>
		<textarea name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk;?>" style="width:100%;height:100%;" onKeyup="count_char(this.value,'char_count<?php echo $qk;?>');"><?php echo $save_ans;?></textarea>
		</div>
		<?php 
		if($logged_in['su']=='1'){
			if($ind_score[$qk]=='3'){
			
		?>
		<div id="assign_score<?php echo $qk;?>">
		<?php echo('Evaluar');?>	
		<a href="javascript:assign_score('<?php echo $result['rid'];?>','<?php echo $qk;?>','1');"  class="btn btn-success" >Correcto</a>	
		<a href="javascript:assign_score('<?php echo $result['rid'];?>','<?php echo $qk;?>','2');"  class="btn btn-danger" >Incorrecto</a>	
		</div>
		<?php 
			}
		}
		?>		
			 
			 <?php 
			 
			 
		 }
			 
		
		
		
		
		
		
		// matching	

		 if($question['question_type']==('Coincidencia')){
			 			 			 $save_ans=array();
			 foreach($saved_answers as $svk => $saved_answer){
				 if($question['qid']==$saved_answer['qid']){
					// $exp_match=explode('__',$saved_answer['q_option_match']);
					$save_ans[]=$saved_answer['q_option'];
				 }
			 }
			 
			 
			 ?>
			 <input type="hidden" name="question_type[]" id="q_type<?php echo $qk;?>" value="5">
			 <?php
			$i=0;
			$match_1=array();
			$match_2=array();
			foreach($options as $ok => $option){
				if($option['qid']==$question['qid']){
					$match_1[]=$option['q_option'];
					$match_2[]=$option['q_option_match'];
			?>
			 
			 
			 
			 <?php 
			 $i+=1;
				}else{
				$i=0;	
					
				}
			}
			?>
			<div class="op">
						<table>
						<tr><td></td><td><?php echo ('Tu respuesta');?></td><td><?php echo ('Respuesta correcta');?></td></tr>
						<?php 
			 
			foreach($match_1 as $mk1 =>$mval){
						?>
						<tr><td>
						<?php echo $abc[$mk1];?>)  <?php echo $mval;?> 
						</td>
						<td>
						
							<select name="answer[<?php echo $qk;?>][]" id="answer_value<?php echo $qk.'-'.$mk1;?>"  >
							<option value="0"><?php echo ('Seleccionar');?></option>
							<?php 
							foreach($match_2 as $mk2 =>$mval2){
								?>
								<option value="<?php echo $mval.'___'.$mval2;?>"  <?php $m1=$mval.'___'.$mval2; if(in_array($m1,$save_ans)){ echo 'selected'; } ?> ><?php echo $mval2;?></option>
								<?php 
							}
							?>
							</select>

						</td>
						
						<td>
						<?php 
							echo $match_2[$mk1];
							?>
						</td>
						
						</tr>
				
						
						<?php 
			}
			
			
			?>
			</table>
			 </div>
			<?php
			
		 }
			
		 ?>

		</div> 
 </div>
 <div id="page_break"></div>
 
 
 <?php
}
?>
</div>
</div>
<?php 
}
// view answer ends
?>





 
 
 
 
</div>
      
</div>

 



</div>

<input type="hidden" id="evaluate_warning" value="<?php echo ('Deseas evaluar esta respuesta?');?>">
 