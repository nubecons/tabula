<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
      <div class="panel-heading">
          <h2> Calendar </h2>                  
        </div>
    <div id='calendar2'></div>
        </div>  
  
   <link rel="stylesheet" href="<?=$site_url?>libs/jquery/fullcalendar/dist/fullcalendar.css" type="text/css" />
    <script src="<?=$site_url?>libs/jquery/moment/moment.js"></script> 
    <script src="<?=$site_url?>libs/jquery/fullcalendar/dist/fullcalendar.min.js"></script> 
    
  
  <script>
  jQuery(document).ready(function() {
			
			
			
		
			 $('#calendar2').fullCalendar({
		
				 events: <?php echo json_encode($TasksJson) ?>,
				/* dayClick: function(date, jsEvent, view) {
						
						
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
					},*/
				 eventClick: function (event, element) {
			         window.location.href = '<?=$site_url?>tasks/detail/'+event.id;

				},	
				
				
        			// put your options and callbacks here
    			});
				
				
	 			})
	

</script>


<div id= 'new-e' class="col-sm-12" style=" width:700px; display:none ">
    
        <!-- BEGIN FORM-->
        <?php echo $this->Form->create('Cevent', array('id' => 'event_form',  'type' => 'file', 'style' => 'padding:0xp')); ?>
        
          <?php
                    echo $this->Form->hidden('id',
                                        array(
                                                'class' => 'form-control e-id',
                                              ));
                ?>
        
        <div  style="margin-top: 10px">
            <div class="form-group">
                <div class="col-sm-12">
                     <?php
                    echo $this->Form->input('title',
                                        array(
                                                'class' => 'form-control e-title',
                                                'label' => false,
                                                'div' => false));
                ?>
                </div>
            </div>
			
            <?php /*?> <div class="form-group">
                When <br>
                <div class="col-sm-8">
                <?php
                    echo $this->Form->text('start_date',
                                        array(
                                                'class' => 'form-control start_date',
                                                'label' => false,
                                                'div' => false,
												));
                ?>
                </div>
                      
                </div><?php */?>
                     <div class="form-group">
                When <br>
                <div class="col-sm-8">
                <div class="input-icon">
                        <i class="fa fa-calendar"></i>
                        <?php
                        echo $this->Form->text('start_date', array('required'=>true, 'class' => 'form-control form-control-inline date-picker start_date ', 'data-format' => "mm-dd-yyyy"));
                        ?>
                    </div>
                    </div>
                    </div>
              <div >
                 This is <input type="radio" name="data[Cevent][type]" checked value="Event" > an event 
                 <input type="radio" name="data[Cevent][type]" value="Milestone" > a milestone <input type="radio" name="data[Cevent][type]"  value="News" > News
				</div>   
           
            
            
            
             <?php /*?><div class="form-group">
                <label class="col-sm-4 control-label">User:</label>
                <div class="col-sm-8">
                     <?php
                    echo $this->Form->input('user_id',
                                        array( 
										        'options' => $Users,
										        'empty' => 'Select',
                                                'class' => 'form-control',
                                                'label' => false,
                                                'div' => false));
                ?>
                </div>
            </div><?php */?>          
        </div>
        
         <br> <br>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="button" onClick="save_data();" class="btn btn-circle green">save</button>
                   <a  onClick="$('.popover').popover('hide');" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
		</div>