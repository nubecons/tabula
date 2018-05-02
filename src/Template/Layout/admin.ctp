<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->Html->charset(); ?>
<title> 
		<?php  echo $SiteInfo['site-title']; ?> - Control Panel
</title>
	<?php 
	echo $this->Html->meta('icon');
	echo $this->Html->script(array('admin/jquery-1.7.1.min','admin/ddaccordion','admin/jquery.fancybox'));
	echo $this->Html->css(array('admin/foundation','admin/admin_style','admin/jquery.fancybox'));
	
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	
	?>
	
<script>

jQuery(document).ready(function($) {

    jQuery('.fancybox').fancybox();
	jQuery('.message').fadeOut(10000);
	

 });

</script>

<?php $site_url = $this->Url->build('/',true); ?> 

</head>
<body>
  <header id="header">
  	<div id="logo" class="four columns">
    <?php // echo '<span>'. $this->Html->image('logo.png' , array( 'height' => "100" , 'width' => "100")).'</span>';?>
		
	
    	<div id="pageName"><span><?php echo $SiteInfo['site-name'] ?></span></div>
	</div><!-- #logo END -->
                 
               <?= $this->Flash->render() ?>
           
<?php /*?><div id="notification" class="eight columns">
      <nav>
      	<ul class="menu">
        	<li><a href="#">Messages</a><span class="counter">5</span></li>
            <li><a href="#">Comments</a><span class="counter">10</span></li>
            <li><a href="#">New Reviews</a><span class="counter">5</span></li>
            <li><a href="#">Ect..</a><span class="counter">999</span></li>
        </ul>
      </nav>
    </div><?php */?>
    
    <!-- #topMenu END -->
  </header><!-- #header END -->
  <div id="main">
    <aside id="sidebar" class="three columns">
      <section id="searchBar">
      	<?php /*?><form id="search" action="" method="post">
        	<input class="sh" type="text" placeholder="Search" size="40">
            <input class="sumit b_empty" type="submit" value="Go">
        </form><?php */?>
      </section>
      <?php
	 	echo $this->element('admin_left_menu');
	 ?>
      <!--<section id="mainMenu">
      	<nav>
        	<ul>
            	<li><a href="#">Global Settings</a></li>
                <li><a href="#">Pages</a></li>
                <li><a href="#">Menus</a></li>
                <li><a href="#">Newsletter</a></li>
                <li><a href="#">Users</a></li>
                <li><a href="#">UI Elements</a></li>
                	<ul class="sub">
                    	<li><a href="#">Option 1</a></li>
                        <li><a href="#">Option 2</a></li>
                        <li><a href="#">Option 3</a></li>
                        <li><a href="#">Option 4</a></li>
                        <li><a href="#">Option 5</a></li>
                    </ul>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
      </section>-->
    </aside>
    <aside class="nine columns">
    <div style="background-color:#FFF; padding:20px; margin:0; float:left; border: solid 2px #CCC; -webkit-border-radius: 5px; border-radius: 5px; width:100%;"> 
		<?php echo $this->fetch('content'); ?>
	</div>


		<!--<div class="alert-box">
            This is a standard alert (div.alert-box).
            <a href="" class="close">×</a>
          </div>
          	<div class="alert-box success">
            This is a success alert (div.alert-box.success).
            <a href="" class="close">×</a>
          </div>
          	<div class="alert-box alert">
            This is an alert (div.alert-box.alert).
            <a href="" class="close">×</a>
          </div>
          	<div class="alert-box secondary">
            This is a secondary alert (div.alert-box.secondary).
            <a href="" class="close">×</a>
          </div>-->
          
		<!--<div class="panel widget">
			<h5 class="title">This is a regular panel.</h5>
            <div class="content">
            	<p>getfirebug.com has Firebug 1.10a7 Firebug 1.10a7 fixes 11 issues. Some highlights from this release: This version fixes compatibility problem with Firefox Nightly (issue 5375) Autocompletion for font-family property in the Style panel (issue 5373) displayName function property is now supported also by the Profile (issue 5359) Please post feedback in the newsgroup, thanks. Jan 'Honzagetfirebug.com has Firebug 1.10a7 Firebug 1.10a7 fixes 11 issues. Some highlights from this release: This version fixes compatibility problem with Firefox Nightly (issue 5375) Autocompletion for font-family property in the Style panel (issue 5373) displayName function property is now supported also by the Profile (issue 5359) Please post feedback in the newsgroup, thanks. Jan 'Honzagetfirebug.com has Firebug 1.10a7 Firebug 1.10a7 fixes 11 issues. Some highlights from this release: This version fixes compatibility problem with Firefox Nightly (issue st feedback in the newsgroup, thanks. Jan '</p>
            </div>
          </div> 
      		<div class="progress"></div>    
      		<div class="six columns">
          <p><a href="#" class="small button">Small Button</a></p>
          <p><a href="#" class="button">Medium Button</a></p>
          <p><a href="#" class="large button">Large Button</a></p>

        </div>
        	<div class="six columns">
          <p><a href="#" class="small alert button">Small Alert Button</a></p>
          <p><a href="#" class="success button">Medium Success Button</a></p>
          <p><a href="#" class="large secondary button">Large Secondary Button</a></p>
        </div>-->
    </aside>
    
  </div><!-- #main END -->
  <!-- Included JS Files (Uncompressed) -->
  <!-- 
  <script src="js/jquery.js"></script>
  <script src="js/jquery.foundation.mediaQueryToggle.js"></script>
  <script src="js/jquery.foundation.forms.js"></script>
  <script src="js/jquery.foundation.reveal.js"></script>
  <script src="js/jquery.foundation.orbit.js"></script>
  <script src="js/jquery.foundation.navigation.js"></script>
  <script src="js/jquery.foundation.buttons.js"></script>
  <script src="js/jquery.foundation.tabs.js"></script>
  <script src="js/jquery.foundation.tooltips.js"></script>
  <script src="js/jquery.foundation.accordion.js"></script>
  <script src="js/jquery.placeholder.js"></script>
  <script src="js/jquery.foundation.alerts.js"></script>
  <script src="js/jquery.foundation.topbar.js"></script>
  -->
<?php /*?>  <!-- Included JS Files (Compressed) -->
  <script src="js/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <!-- Initialize JS Plugins -->
  <script src="js/app.js"></script>

<?php */?>
</body>
</html>