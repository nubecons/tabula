<style>
 body {
 	font-family:helvetica, arial;
	 font-size:12px
  }
.scrumboard{
	margin:0 auto;
	width:835px;
}
h1{
	margin-left:20px;
	font-size:2rem;
}
  .column {
    width: 200px;
    float: left;
		border: solid 4px black;
		height:100vh;
  }
  .portlet {
    margin: 0 1em 1em 0;
    padding: 0.3em;
  }
  .portlet-header {
    padding: 0.2em 0.3em;
    margin-bottom: 0.5em;
    position: relative;
  }
  .portlet-toggle {
    position: absolute;
    top: 50%;
    right: 0;
    margin-top: -8px;
  }
  .portlet-content {
    padding: 0.4em;
  }
  .portlet-placeholder {
    border: 1px dotted black;
    margin: 0 1em 1em 0;
    height: 50px;
  }
  </style>
<div class="scrumboard row">
<div class="column flex">
 <!-- todo -->
	<h1>Todo</h1>
  <div class="portlet">
    <div class="portlet-header">Task</div>
    <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
  </div>
 
  <div class="portlet">
    <div class="portlet-header">Task</div>
    <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
  </div>
 
</div>
 
<div class="column flex">
  <!-- ongoing -->
	<h1>Ongoing</h1>

  <div class="portlet">
    <div class="portlet-header">Task</div>
    <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
  </div>
 
</div>
 


	
	
<div class="column flex">
   <!-- done -->
	<h1>Testing</h1>

  <div class="portlet">
    <div class="portlet-header">Task</div>
    <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
  </div>
 
  <div class="portlet">
    <div class="portlet-header">Task</div>
    <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
  </div>
 
</div>
	
<div class="column flex">
   <!-- done -->
	<h1>Done</h1>

  <div class="portlet">
    <div class="portlet-header">Task</div>
    <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
  </div>
 
  <div class="portlet">
    <div class="portlet-header">Task</div>
    <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
  </div>
 
</div>
</div>
<?php /*?><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script><?php */?>


 <?php /*?><link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" type="text/css" /><?php */?>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script>

alert('i am erer')


 $(function() {
    $( ".column" ).sortable({
      connectWith: ".column",
      handle: ".portlet-header",
     // cancel: ".portlet-toggle",
      placeholder: "portlet-placeholder ui-corner-all"
    });
 
   /* $( ".portlet" )
      .addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
      .find( ".portlet-header" )
      .addClass( "ui-widget-header ui-corner-all" )*/
       
 
    /*$( ".portlet-toggle" ).click(function() {
      var icon = $( this );
      icon.toggleClass( "ui-icon-minusthick ui-icon-plusthick" );
      icon.closest( ".portlet" ).find( ".portlet-content" ).toggle();
    });*/
  });
  </script>