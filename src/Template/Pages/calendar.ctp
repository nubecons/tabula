<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
      <div class="panel-heading">
          <h2> Calendar </h2>                  
        </div>
    <div id='calendar'></div>
        </div>  
  
   <link rel="stylesheet" href="<?=$site_url?>libs/jquery/fullcalendar/dist/fullcalendar.css" type="text/css" />
    <script src="<?=$site_url?>libs/jquery/moment/moment.js"></script> 
     <script src="<?=$site_url?>libs/jquery/fullcalendar/dist/fullcalendar.min.js"></script> 
  <script>
  $(function() {

  // page is now ready, initialize the calendar...

  $('#calendar').fullCalendar({
    // put your options and callbacks here
  })

});
</script>