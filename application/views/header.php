<html lang="en">
  <head>
  <title><?php echo $title;?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
	<title> </title>
	<!-- bootstrap css -->
	<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	
	<!-- custom css -->
	<link href="<?php echo base_url('css/style.css');?>" rel="stylesheet">
	
	<script>
	
	var base_url="<?php echo base_url();?>";

	</script>
	
	<!-- jquery -->
	<script src="<?php echo base_url('js/jquery.js');?>"></script>
	
	<!-- custom javascript -->
	  	<script src="<?php echo base_url('js/basic.js');?>"></script>
		
	<!-- bootstrap js -->
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>
	
	
	
	
 </head>
  <body>
  	
	<?php 
			if($this->session->userdata('logged_in')){
				if($this->uri->segment(2)!='attempt'){
				$logged_in=$this->session->userdata('logged_in');
	?>
	    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://#">CMT</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <?php  
				if($logged_in['su']==1){
			?>
			  
			  <li <?php if($this->uri->segment(1)=='dashboard'){ echo "class='active'"; } ?> ><a href="<?php echo site_url('dashboard');?>"><?php echo $this->lang->line('dashboard');?></a></li>
            
			 
			  <li class="dropdown" <?php if($this->uri->segment(1)=='user'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('user/new_user');?>">Agregar</a></li>
                  <li><a href="<?php echo site_url('user');?>">Lista</a></li>
                  
                </ul>
              </li>
			 
			 
			 
			  <li class="dropdown" <?php if($this->uri->segment(1)=='qbank'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bd preguntas<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('qbank/pre_new_question');?>">Agregar</a></li>
                  <li><a href="<?php echo site_url('qbank');?>">Lista</a></li>
                  
                </ul>
              </li>
			 
			 
			 
		    <?php 
				}else{
			?>
			 <li><a href="<?php echo site_url('user/edit_user/'.$logged_in['uid']);?>">Mi cuenta</a></li>
			<?php 
				}
			?>
     		  <li class="dropdown" <?php if($this->uri->segment(1)=='qbank'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Evaluaciones <span class="caret"></span></a>
                <ul class="dropdown-menu">
                 <?php  
				if($logged_in['su']==1){
			?>     <li><a href="<?php echo site_url('quiz/add_new');?>">Agregar</a></li>
              <?php 
				}
?>				 <li><a href="<?php echo site_url('quiz');?>">Lista</a></li>
               
                </ul>
              </li>
	

	           <li><a href="<?php echo site_url('result');?>">Resultados</a></li>
			 
			 
			  <?php  
				if($logged_in['su']==1){
			?>
						 
			  <li class="dropdown" <?php if($this->uri->segment(1)=='user_group'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ajustes<span class="caret"></span></a>
                <ul class="dropdown-menu">
                 
                  <li><a href="<?php echo site_url('user/group_list');?>">Lista de grupo</a></li>
                  <li><a href="<?php echo site_url('qbank/category_list');?>">Lista de categorías</a></li>
                  <li><a href="<?php echo site_url('qbank/level_list');?>">Lista de dificultad</a></li>
                  
					<li><a href="<?php echo site_url('dashboard/config');?>">Configuración</a></li>
					
					
						  
                  
                </ul>
              </li>
			
			<?php 
				}
				?>
             <li><a href="<?php echo site_url('user/logout');?>">Logout</a></li>
              <!--
			  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                 
                </ul>
              </li>
			  -->
			  
            </ul>
             
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

	<?php 
			}
			}
	?>
	
