<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?= $this->Html->charset() ?>
<?php /*?><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><?php */?>
<title><?php echo $this->fetch('title');?></title>
<?php $site_url = $this->Url->build('/',true); ?> 
<link href="<?=$site_url?>css/stylesheet2.css" rel="stylesheet" type="text/css">

 <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	
	 <?= $this->Html->css(['style.css','adminstyle.css','../fonts/stylesheet.css' ,'owl.carousel.css' ,'tablesaw.css']) ?>
      <?= $this->fetch('css') ?>
      <!--Internet Explorer 9-->
        
        <!--[if IE 9]>
        <?= $this->Html->css('ie9.css')?>
        <![endif]-->
        
         
        
        <!--Internet Explorer 8-->
        
        <!--[if IE 8]>
         <?= $this->Html->css('ie8.css')?>
        <![endif]-->
        
        
        
        <!--Internet Explorer 7-->
        
        <!--[if IE 7]>
        <?= $this->Html->css('ie7.css')?>
        <![endif]-->
        
        <!--[if lt IE 9]>
        
         <?php echo $this->Html->script(['html5shiv.min.js' ,'respond.js']); ?>
            
        <![endif]-->
        
     
    

      <?php echo $this->Html->script(['../scripts/dhtml_scripts.js','jslab.js'  ,'menu.js' , 'jquery.magnific-popup.js' ,'owl.carousel.js']); ?>
      
      <?= $this->fetch('script') ?>

 <script>
   function MM_openBrWindow(theURL,winName,features) { //v2.0
      window.open(theURL,winName,features);
	}
	
	
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
   </script>
<!--<style type="text/css" media="print">
{literal}
body { visibility: hidden; display: none }
</style>-->
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->

</style>
 
</head>
<body onLoad="">
<?php  echo $this->fetch('content') ?>
</body>
</html>

