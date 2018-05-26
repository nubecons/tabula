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
   $(document).ready(function () {
  $('#calendar').fullCalendar({
  
     events: <?php echo json_encode($TasksJson) ?>,
     dayClick: function(date, jsEvent, view) {
      /*alert('Clicked on: ' + date.format());
      alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
      alert('Current view: ' + view.name);
      // change the day's background color just for fun
      $(this).css('background-color', 'red');*/
      
      $('.popover').popover('hide');
      d = date.format("MM-DD-YYYY");
      $(this).popover({
       html:true,
       content: $('#new-e').html(), 
       title:'New Event',
       placement:'bottom',
       container:'body'
       }).popover('show');
       $('.e-id').val('');
         $('.start_date').val(d);
           $('.date-picker').datepicker();
     },
     eventClick: function (event, element) {
    // element.attr('href', 'javascript:void(0);');
     //element.click(function() {
      d = event.start.format("MM-DD-YYYY");
      $('.popover').popover('hide');
      $(this).popover({
       html:true,
       content: $('#new-e').html(), 
       title:event.title,
       placement:'bottom',
       container:'body'
       }).popover('show');
       
      $('.e-id').val(event.id);
      $('.e-title').val(event.title);
      $('.start_date').val(d); 
      $('.date-picker').datepicker();
     //});
    }, 
    
    
           // put your options and callbacks here
       });
		
    });
	

</script>