<!DOCTYPE html>
<html lang="en" class="">
<head>
<?php $site_url = $this->Url->build('/',true); ?> 
<script>
site_url = '<?=$site_url?>';
</script>
  <meta charset="utf-8" />
  <title><?php echo $SiteInfo['site-title'] ; ?></title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
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
            <i class="glyphicon glyphicon-list"></i> Requirments
          </a>
          
          <a href="#" class="btn no-shadow navbar-btn" >
            <i class="fa fa-cubes"></i> Design
          </a>
          
            <a href="#" class="btn no-shadow navbar-btn" >
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
        <form class="navbar-form navbar-form-sm navbar-left shift" ui-shift="prependTo" data-target=".navbar-collapse" role="search" ng-controller="TypeaheadDemoCtrl">
          <div class="form-group">
            <div class="input-group">
              <input type="text" ng-model="selected" typeahead="state for state in states | filter:$viewValue | limitTo:8" class="form-control input-sm bg-light no-border rounded padder" placeholder="Search projects...">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
        </form>
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
                <img src="<?=$site_url?>img/a0.jpg" alt="...">
                <i class="on md b-white bottom"></i>
              </span>
              <span class="hidden-sm hidden-md">John.Smith</span> <b class="caret"></b>
            </a>
            <!-- dropdown -->
            <ul class="dropdown-menu animated fadeInRight w">
              <li class="wrapper b-b m-b-sm bg-light m-t-n-xs">
                <div>
                  <p>300mb of 500mb used</p>
                </div>
                <div class="progress progress-xs m-b-none dker">
                  <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                </div>
              </li>
              <li>
                <a href>
                  <span class="badge bg-danger pull-right">30%</span>
                  <span>Settings</span>
                </a>
              </li>
              <li>
                <a ui-sref="app.page.profile">Profile</a>
              </li>
              <li>
                <a ui-sref="app.docs">
                  <span class="label bg-info pull-right">new</span>
                  Help
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
                  <img src="<?=$site_url?>img/a0.jpg" class="img-full" alt="...">
                </span>
              </a>
              <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                <span class="clear">
                  <span class="block m-t-sm">
                    <strong class="font-bold text-lt">John.Smith</strong> 
                    <b class="caret"></b>
                  </span>
                  <span class="text-muted text-xs block">Art Director</span>
                </span>
              </a>
              <!-- dropdown -->
              <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                  <span class="arrow top hidden-folded arrow-info"></span>
                  <div>
                    <p>300mb of 500mb used</p>
                  </div>
                  <div class="progress progress-xs m-b-none dker">
                    <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                  </div>
                </li>
                <li>
                  <a href>Settings</a>
                </li>
                <li>
                  <a href="page_profile.html">Profile</a>
                </li>
                <li>
                  <a href>
                    <span class="badge bg-danger pull-right">3</span>
                    Notifications
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="page_signin.html">Logout</a>
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
                <a href class="auto">      
                
                  <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                  <span class="font-bold">Dashboard</span>
                </a>
             
              </li>
              <li>
                <a href class="auto">      
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
                </ul>
              </li>
              
              <li>
                <a href class="auto">      
                  <i class="glyphicon glyphicon-list"></i>
                  <span class="font-bold">My Task</span>
                </a>
              </li>
              
               <li>
                <a href class="auto">      
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
            </ul>
          </nav>
          <!-- nav -->

          <!-- aside footer -->
          <div class="wrapper m-t">
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
          </div>
          <!-- / aside footer -->
        </div>
      </div>
  </aside>
  <!-- / aside -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
    
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
             <label>Description</label>
              <input name="description" type="text" class="form-control" placeholder="Enter Description">
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
          <div class="modal-dialog" style="width:500px">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">User</h4>
              </div>
              <div class="modal-body">
               <div class="panel panel-default">
        <div class="panel-heading font-bold">Add User</div>
        <div class="panel-body">
          <form role="form">
            <div class="form-group">
              <label>Email address</label>
              <input type="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="checkbox">
              <label class="i-checks">
                <input type="checkbox" checked disabled><i></i> Check me out
              </label>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
          </form>
        </div>
      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
          </div>
        </div>
  
  <!-- footer -->
  <footer id="footer" class="app-footer" role="footer">
    <div class="wrapper b-t bg-light">
      <span class="pull-right">2.2.0 <a href ui-scroll="app" class="m-l-sm text-muted"><i class="fa fa-long-arrow-up"></i></a></span>
      &copy; 2018 Copyright.
    </div>
  </footer>
  <!-- / footer -->



</div>


<script src="<?=$site_url?>js/ui-load.js"></script>
<script src="<?=$site_url?>js/ui-jp.config.js"></script>
<script src="<?=$site_url?>js/ui-jp.js"></script>
<script src="<?=$site_url?>js/ui-nav.js"></script>
<script src="<?=$site_url?>js/ui-toggle.js"></script>
<script src="<?=$site_url?>js/ui-client.js"></script>
<script>
$("#btn_addProject").click(function(e) {
	
	if($('#form_addProject [name=name]').val() == '')
	   {
		alert('Pleae enter project name');   
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
			   
				window.location.href = '<?=$site_url?>Requirments/index/'+data; 	   
	      }
		  
		}
  });
  return false;
});

</script>
</body>
</html>
