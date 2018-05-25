<!DOCTYPE html>
<html lang="en" class="">
<head>
<?php $site_url = $this->Url->build('/',true); ?> 
<script>
site_url = '<?=$site_url?>';
</script>
  <meta charset="utf-8" />
  <title><?php echo $SiteInfo['site-title'] ; ?></title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?=$site_url?>libs/assets/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?=$site_url?>libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?=$site_url?>libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="<?=$site_url?>libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />

  <link rel="stylesheet" href="<?=$site_url?>css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?=$site_url?>css/app.css" type="text/css" />
  <link rel="stylesheet" href="<?=$site_url?>css/custom.css" type="text/css" />
  
  <script src="<?=$site_url?>libs/jquery/jquery/dist/jquery.js"></script>
  <script src="<?=$site_url?>libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
    
 <link rel="stylesheet" href="<?=$site_url?>css/datepicker.css" type="text/css" />
 <script src="<?=$site_url?>libs/jquery/bootstrap-datepicker/bootstrap-datepicker.js"></script> 
</head>
<body>
<div class="app app-header-fixed ">
  

    <!-- header -->
  <header id="header" class="app-header navbar" role="menu">
      <!-- navbar header -->
      <div class="navbar-header bg-dark">
        <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
          <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
          <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <!-- brand -->
        <a href="#/" class="navbar-brand text-lt">
          <i class="fa fa-btc"></i>
          <img src="<?=$site_url?>img/logo.png" alt="." class="hide">
          <span class="hidden-folded m-l-xs"><?php echo $SiteInfo['site-name'] ; ?></span>
        </a>
        <!-- / brand -->
      </div>
      <!-- / navbar header -->

      <!-- navbar collapse -->
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
            <i class="fa fa-dedent fa-fw text"></i>
            <i class="fa fa-indent fa-fw text-active"></i>
          </a>
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user">
            <i class="icon-user fa-fw"></i>
          </a>
          
           <a href="<?=$site_url?>Requirments" class="btn no-shadow navbar-btn" >
            <i class="glyphicon glyphicon-list"></i> Requirements
          </a>
          
          <a href="<?=$site_url?>tasks/design" class="btn no-shadow navbar-btn" >
            <i class="fa fa-cubes"></i> Design
          </a>
          
            <a href="<?=$site_url?>tasks/qa" class="btn no-shadow navbar-btn" >
            <i class="fa fa-check"></i> QA VARIFICATION
          </a>
        </div>
        <!-- / buttons -->

        <!-- link and dropdown -->
        <?php /*?><ul class="nav navbar-nav hidden-sm">
        
          
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
              <i class="fa fa-fw fa-plus visible-xs-inline-block"></i>
              <span translate="header.navbar.new.NEW">New</span> <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#" translate="header.navbar.new.PROJECT">Projects</a></li>
              <li>
                <a href>
                  <span class="badge bg-info pull-right">5</span>
                  <span translate="header.navbar.new.TASK">Task</span>
                </a>
              </li>
              <li><a href translate="header.navbar.new.USER">User</a></li>
              <li class="divider"></li>
              <li>
                <a href>
                  <span class="badge bg-danger pull-right">4</span>
                  <span translate="header.navbar.new.EMAIL">Email</span>
                </a>
              </li>
            </ul>
          </li>
        </ul><?php */?>
        <!-- / link and dropdown -->

        <!-- search form -->
	   <?php echo $this->Form->create('' ,['url' =>['controller'=>'projects','action'=>'index'], 'class' => "navbar-form navbar-form-sm navbar-left shift" ] ); ?>
        
          <div class="form-group">
            <div class="input-group">
              <input type="text" name="search"  class="form-control input-sm bg-light no-border rounded padder" placeholder="Search projects...">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
      <?php echo $this->Form->end()?>
        <!-- / search form -->
        
        <!-- nabar right -->
        <ul class="nav navbar-nav navbar-right">
          <li >
            <a href="#" data-toggle="modal" data-target="#AddUser">
              <i class="glyphicon glyphicon-user"></i>
              <i class="glyphicon glyphicon-plus"></i>
              <span class="visible-xs-inline"  >Add User</span>
            </a>
            </li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
              <i class="icon-bell fa-fw"></i>
              <span class="visible-xs-inline">Notifications</span>
              <span class="badge badge-sm up bg-danger pull-right-xs">2</span>
            </a>
            <!-- dropdown -->
            <div class="dropdown-menu w-xl animated fadeInUp">
              <div class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong>You have <span>2</span> notifications</strong>
                </div>
                <div class="list-group">
                  <a href class="list-group-item">
                    <span class="pull-left m-r thumb-sm">
                      <img src="<?=$site_url?>img/a0.jpg" alt="..." class="img-circle">
                    </span>
                    <span class="clear block m-b-none">
                      Use awesome animate.css<br>
                      <small class="text-muted">10 minutes ago</small>
                    </span>
                  </a>
                  <a href class="list-group-item">
                    <span class="clear block m-b-none">
                      1.0 initial released<br>
                      <small class="text-muted">1 hour ago</small>
                    </span>
                  </a>
                </div>
                <div class="panel-footer text-sm">
                  <a href class="pull-right"><i class="fa fa-cog"></i></a>
                  <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                </div>
              </div>
            </div>
            <!-- / dropdown -->
          </li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
				<?php
                if($sUser['image'] != ''){?>
             
                <img src="<?=$site_url?>img/profile_pics/<?=$sUser['image']?>">
            
                <?php }else{?>
                <img src="<?=$site_url?>img/a0.jpg" alt="...">
                <?php }?>
                <i class="on md b-white bottom"></i>
              </span>
              <span class="hidden-sm hidden-md">
              <?php
			   if($sUser['first_name'] != '' || $sUser['last_name'] != ''){
				   echo $sUser['first_name']. ' '.$sUser['last_name'];
			   }else{
				   echo $sUser['email'];
				   }
			   ?>
              </span> <b class="caret"></b>
            </a>
            <!-- dropdown -->
            <ul class="dropdown-menu animated fadeInRight w">
              <li class="wrapper b-b m-b-sm bg-light m-t-n-xs">
                <?php /*?><div>
                  <p>300mb of 500mb used</p>
                </div>
                <div class="progress progress-xs m-b-none dker">
                  <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                </div><?php */?>
              </li>
             <?php /*?> <li>
                <a href="<?=$site_url?>users/help">
                  <span>Help</span>
                </a>
              </li><?php */?>
              <li>
                <a href="<?=$site_url?>users/profile" >Profile</a>
              </li>
               <li>
                <a href="<?=$site_url?>users/change_password" >Change Password</a>
              </li>
              <li>
                <a href="<?=$site_url?>users/help">
                  Help
                </a>
              </li>
                <li>
                <a href="<?=$site_url?>users/notifications">
                  Notifications Settings
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?=$site_url?>users/logout"  ui-sref="access.signin">Logout</a>
              </li>
            </ul>
            <!-- / dropdown -->
          </li>
        </ul>
        <!-- / navbar right -->
      </div>
      <!-- / navbar collapse -->
  </header>
  <!-- / header -->


    <!-- aside -->
  <aside id="aside" class="app-aside hidden-xs bg-dark">
      <div class="aside-wrap">
        <div class="navi-wrap">
          <!-- user -->
          <div class="clearfix hidden-xs text-center hide" id="aside-user">
            <div class="dropdown wrapper">
              <a href="app.page.profile">
                <span class="thumb-lg w-auto-folded avatar m-t-sm">
                <?php
                if($sUser['image'] != ''){?>
             
                <img src="<?=$site_url?>img/profile_pics/<?=$sUser['image']?>" class="img-full">
            
                <?php }else{?>
                 <img src="<?=$site_url?>img/a0.jpg" class="img-full" alt="...">
                <?php }?>
                 
                </span>
              </a>
              <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                <span class="clear">
                  <span class="block m-t-sm">
                    <strong class="font-bold text-lt">
					<?php
			   if($sUser['first_name'] != '' || $sUser['last_name'] != ''){
				   echo $sUser['first_name']. ' '.$sUser['last_name'];
			   }else{
				   echo $sUser['email'];
				   }
			   ?></strong> 
                    <b class="caret"></b>
                  </span>
                
                </span>
              </a>
              <!-- dropdown -->
              <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                 
                
                 
                </li>
                 <li>
                <a href="<?=$site_url?>users/profile" >Profile</a>
              </li>
               <li>
                <a href="<?=$site_url?>users/change_password" >Change Password</a>
              </li>
                <li class="divider"></li>
                <li>
                  <a href="<?=$site_url?>users/logout"  ui-sref="access.signin">Logout</a>
                </li>
              </ul>
              <!-- / dropdown -->
            </div>
            <div class="line dk hidden-folded"></div>
          </div>
          <!-- / user -->

          <!-- nav -->
          <nav ui-nav class="navi clearfix">
            <ul class="nav">
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
              
              </li>
            
              <li>
                <a href="<?=$site_url?>users/dashboard" class="auto">      
                
                  <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                  <span class="font-bold">Dashboard</span>
                </a>
             
              </li>
              <li>
              
              <?php echo $this->element('left_projects')?>
              
              
                <?php /*?><a href class="auto">      
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                  <b class="badge bg-info pull-right" data-toggle="modal" data-target="#ModeladdProject">+</b>
                  <i class="glyphicon glyphicon-th"></i>
                  <span class="font-bold">Projects</span>
                </a>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                   
                      <span>Project 1</span>
                   
                  </li>
                  <li>
                    <a href = "#" >
                      <span>Project 2</span>
                    </a>
                  </li>
                  <li>
                    <a href = "#" >
                      <span>Project 3</span>
                    </a>
                  </li>
                  <li>
                 <a href = "#" >
                      <span>Project 4</span>
                    </a>
                  </li>      
                </ul><?php */?>
              </li>
              
              <li>
                <a href="<?=$site_url?>tasks/myTasks" class="auto">      
                  <i class="glyphicon glyphicon-list"></i>
                  <span class="font-bold">My Task</span>
                </a>
              </li>
              
               <li>
                <a href="<?=$site_url?>pages/calendar" class="auto">      
                  <i class="glyphicon glyphicon-calendar"></i>
                  <span class="font-bold">Calendar</span>
                </a>
              </li>
              
               <li>
                <a href class="auto">      
                  <i class="glyphicon glyphicon-file"></i>
                  <span class="font-bold">File list</span>
                </a>
              </li>
              <li class="line dk"></li>
               <li>
                <a href ="<?=$site_url?>users" class="auto">      
                  <i class="glyphicon glyphicon-user"></i>
                  <span class="font-bold">Users</span>
                </a>
              </li>
              
              
              
              <li class="line dk"></li>
            </ul>
          </nav>
          <!-- nav -->

          <!-- aside footer -->
   <?php /*?>       <div class="wrapper m-t">
            <div class="text-center-folded">
              <span class="pull-right pull-none-folded">60%</span>
              <span class="hidden-folded">Milestone</span>
            </div>
            <div class="progress progress-xxs m-t-sm dk">
              <div class="progress-bar progress-bar-info" style="width: 60%;">
              </div>
            </div>
            <div class="text-center-folded">
              <span class="pull-right pull-none-folded">35%</span>
              <span class="hidden-folded">Release</span>
            </div>
            <div class="progress progress-xxs m-t-sm dk">
              <div class="progress-bar progress-bar-primary" style="width: 35%;">
              </div>
            </div>
          </div><?php */?>
          <!-- / aside footer -->
        </div>
      </div>
  </aside>
  <!-- / aside -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
  
  <?php /*?><?php */?>
</div>
</div>

<!-- Modal -->
<div id="ModeladdProject" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Project</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="form_addProject" >
            <div class="form-group">
              <label>Name</label>
              <input type="name"  name="name"  class="form-control" placeholder="Enter Name" required>
            </div>
             <div class="form-group">
              <label>Short Name</label>
              <input type="name"  name="code"  class="form-control" placeholder="TP" required>
            </div>
            
            
            <div class="form-group">
             <label>Description</label>
             <textarea  name="description"  class="form-control" placeholder="Enter Description" ></textarea>
            </div>
           
            <button type="button"  class="btn btn-sm btn-warning btnload"  id="btn_addProject_load"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Working...</button>
            <button type="button" class="btn btn-sm btn-primary" id="btn_addProject">Submit</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="AddUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add User</h4>
      </div>
      <div class="modal-body">
        <form role="form" id="form_addUser"  autocomplete="off" >
          
          <div class="form-group">
              <label>First Name</label>
              <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" autocomplete="first_name" >
            </div>
            
          <div class="form-group">
              <label>Last Name</label>
              <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" autocomplete="last_name">
            </div>
                       
            
            <div class="form-group">
              <label>Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email" autocomplete="email">
            </div>
            <div class="form-group">
             <label>Password</label>
              <input type="password" name="new_password"  class="form-control" placeholder="Password" autocomplete="new_password">
            </div>
           
            <button type="button"  class="btn btn-sm btn-warning btnload"  id="btn_loader"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Working...</button>
            <button type="button" class="btn btn-sm btn-primary" id="btn_submit">Submit</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
  
  


<script src="<?=$site_url?>js/ui-load.js"></script>
<script src="<?=$site_url?>js/ui-jp.config.js"></script>
<script src="<?=$site_url?>js/ui-jp.js"></script>
<script src="<?=$site_url?>js/ui-nav.js"></script>
<script src="<?=$site_url?>js/ui-toggle.js"></script>
<script src="<?=$site_url?>js/ui-client.js"></script>
<script>
$( document ).ready(function() {

$(".message.success,.message.error").fadeOut(10000);	
$('[data-toggle="tooltip"]').tooltip();
 	
$("#btn_addProject").click(function(e) {
	
	if($('#form_addProject [name=name]').val() == '')
	   {
		alert('Pleae enter project name');   
		return;
		}
	if($('#form_addProject [name=description]').val() == '')
	   {
		alert('Pleae enter project description');   
		return;
		}	
		
  
  e.preventDefault();
  var dataString = $( '#form_addProject' ).serialize();
  $.ajax({
		type:'POST',
		data:dataString,
		url:'<?=$site_url?>projects/saveData',
		beforeSend: function() {
			$('#btn_addProject').hide();
			$('#btn_addProject_load').show();
			},
		success:function(data) {
		if(data == 'false')
		   {
				$('#btn_addProject').show();
				$('#btn_addProject_load').hide();
				 alert('Project could not created');
		   }else{
			   
				window.location.href = '<?=$site_url?>Projects/index/'+data; 	   
	      }
		  
		}
  });
  return false;
});


   
   
 $('#form_addUser [id=btn_submit]').click(function(e) {
	 
	 if($('#form_addUser [name=first_name]').val() == '')
	   {
		alert('Pleae enter first name');   
		return;
	   }
	   
	   if($('#form_addUser [name=last_name]').val() == '')
	   {
		alert('Pleae enter last name');   
		return;
	   }
	   
	   if($('#form_addUser [name=email]').val() == '')
	   {
		alert('Pleae enter email');   
		return;
	   }
	
	if($('#form_addUser [name=password]').val() == '')
	   {
		alert('Pleae enter password');   
		return;
	   }
		
  
  e.preventDefault();
  var dataString = $( '#form_addUser' ).serialize();

  $.ajax({
		type:'POST',
		data:dataString,
		url:'<?=$site_url?>users/saveData',
		beforeSend: function() {
			$('#form_addUser [id=btn_submit]').hide();
			$('#form_addUser [id=btn_loader]').show();
			},
			
		success:function(data) {
			
			$('#form_addUser [id=btn_submit]').show();
			$('#form_addUser [id=btn_loader]').hide();
			
			if(data != 'true')
			   {
				 alert(data);
			   
			   }else{
				   
				$('#AddUser').modal('hide');
				alert('User created successfully.');
				
			   }
		}
	  });
	  
	  return false;
	  
	});
});

</script>
</body>
</html>
