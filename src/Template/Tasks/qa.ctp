<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-5">
  		<button class="btn m-b-xs w-xl btn-default" onClick="createTaskModel()"> <i class="glyphicon glyphicon-plus"></i>Create QA Task</button>
		
        <div class="btn-group pull-right">
	         <a href="<?=$site_url?>tasks/qaList/<?=$requirement_id?>" data-toggle="tooltip" title="List View">  <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-list"></i></button></a>
             <a href="<?=$site_url?>tasks/qakanban/<?=$requirement_id?>" data-toggle="tooltip" title="Kanban View"> <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-blackboard"></i></button></a>
	         </div>
     
        <?php if(count($Requirments) == 0 ){?>
        
      <div class="alert alert-success">
        <p>No QA Task have been created yet!</p>
      </div>
	  
      <?php }else{?>
      
      
      
      
	  <?php 
	  $color_class = ['1' =>'text-info','2' =>'text-primary','3' =>'text-success','4' =>'text-muted'];
	  $counter = 0 ;
	  foreach($Requirments as $Requirment){
		     
			    $counter =  $counter + 1 ;
                            $TaskHealth =0;
		   
				$New_tasks = $this->GetInfo->getCountTasks($Requirment['id'] , 'New','QA');
				$InProgress_tasks = $this->GetInfo->getCountTasks($Requirment['id'] , 'In Progress','QA');
				$Close_tasks = $this->GetInfo->getCountTasks($Requirment['id'] , 'Close','QA');
				$Resolve_tasks = $this->GetInfo->getCountTasks($Requirment['id'] , 'Resolve','QA');
                                $AllTasks = $New_tasks+$InProgress_tasks+$Close_tasks+$Resolve_tasks;
                                $RemainingTasks =$New_tasks+$InProgress_tasks;
                                $DoneTasks =$Close_tasks+$Resolve_tasks;
                                if($AllTasks >0){
                                $TaskHealth = round(($DoneTasks*100)/$AllTasks);
                                }
		    
		  ?>
            <div class="panel panel-default">
            <div class="panel-heading">
            <strong>  <a  href="<?=$site_url?>tasks/qaList/<?=$Requirment['id']?>"  ><i class="fa fa-fw fa-circle <?=$color_class[$counter]?>"></i><?=$Requirment['title']?></a> </strong>
            </div>
            
            <div class="panel-body">
	          <article class="media">
                <div class="pull-right">
				 <small class="m-t-xs">
                 </small>
                    
                </div>
                <div class="media-body">                        
                   <?php /*?> <a  href="<?=$site_url?>tasks/qaList/<?=$Requirment['id']?>" class="h4" ><i class="fa fa-fw fa-circle <?=$color_class[$counter]?>"></i><?=$Requirment['title']?></a><?php */?>
                    <small class="block m-t-xs"> </small>
                  
                    <em class="text-xs">Project: <span class="label bg-primary m-t-xs"><?=$Requirment['project']['name']?></span></em>
                     &nbsp;
                    <?php if($TaskHealth <=33){?>
                        <em class="text-danger"><i class="fa fa-level-down"> Heath:</i> <?=$TaskHealth;?>%</em>
                        <?php }else{?>
                        <em class="text-success"><i class="fa fa-level-up"> Heath:</i> <?=$TaskHealth;?>%</em>
                        <?php }?>
                     &nbsp;
                    <em class="text-xs  pull-right">Created on <span class="text-danger"><?=date('M d, Y', strtotime($Requirment['created']))?></span></em>
                    <br> <br>
                   <small class="m-t-xs">
                    
                    <span class="label bg-info m-t-xs"><a href="#" data-toggle="tooltip" title="New (<?=$New_tasks?>)">New <?=$New_tasks?></a></span>
                    <span class="label bg-warning m-t-xs"><a href="#" data-toggle="tooltip" title="In Progress (<?=$InProgress_tasks?>)">In Progress <?=$InProgress_tasks?></a></span>
                    <span class="label bg-primary m-t-xs"><a href="#" data-toggle="tooltip" title="Closed (<?=$Close_tasks?>)">Closed <?=$Close_tasks?></a></span>
                    <span class="label bg-success m-t-xs"><a href="#" data-toggle="tooltip" title="Resolved (<?=$Resolve_tasks?>)">Resolved <?=$Resolve_tasks?></a></span>
            
                   
                    </small>
                    <br> <br>
                    <small class="text-xs">
                      <a  href="<?=$site_url?>tasks/qaList/<?=$Requirment['id']?>">LIST VIEW </a> &nbsp; | &nbsp; 
                      <a  href="<?=$site_url?>tasks/qakanban/<?=$Requirment['id']?>">BOARD VIEW </a> &nbsp; | &nbsp; 
                      <a onClick="createTaskModel('<?=$Requirment['id']?>' ,'QA')">CREATE QA</a>
                     </small>
                    
                </div>
               <?php /*?> <hr><?php */?>
            </article>
            
             </div>
     		 </div>
           <?php 
		   if($counter >= 4){
			   $counter = 0 ;
			  }
		   }?>
       <?php }?>
         </div>
      </div>
   </div>


 <link rel="stylesheet" href="<?=$site_url?>css/datepicker.css" type="text/css" />
 <script src="<?=$site_url?>libs/jquery/bootstrap-datepicker/bootstrap-datepicker.js"></script>     

 <script>

    function createTaskModel(requirment_it = false , task_type = 'QA'){
		
		 
		  $('#AddTask').modal('show');
		  $('#model_task_type').val(task_type);
		
		  if(requirment_it != false){
		  	$('#model_requirment_id').val(requirment_it);
		  	$('#project_id_div').hide();
		  
		  }else{
			 
			 $('#model_requirment_id').val('');
			 $('#project_id_div').show(); 
			
			  }
		
		}

	$(document).ready(function() {
				
	      $('#form_AddTask  .btn_submit').click(function(e) {
			
			if($('#form_AddTask [name=title]').val() == '')
			   {
				alert('Pleae enter title');   
				return;
				}
			if($('#form_AddTask [name=description]').val() == '')
			   {
				alert('Pleae enter description');   
				return;
				}	
				
		  
		  e.preventDefault();
		  var dataString = $( '#form_AddTask' ).serialize();
		  $.ajax({
				type:'POST',
				data:dataString,
				url:'<?=$site_url?>requirments/saveTask',
				beforeSend: function() {
					$('#form_AddTask .btn_submit').hide();
					$('#form_AddTask .btn_loader').show();
					},
				success:function(data) {
					
					$('#form_AddTask .btn_submit').show();
						$('#form_AddTask .btn_loader').hide();
					
				if(data == 'false')
				   {
						
						 alert('Task could not created');
				   }else{
					   
					   $('#AddTask').modal('hide');
					    window.location.href = '<?=$site_url?>Tasks/qa/'+ null+'/ajax'; 	   
				  }
				  
				}
			  });
			  return false;
			});
			
			$('#dp3').datepicker();
	})
</script> 

 <div id="AddTask" class="modal fade" role="dialog">
          <div class="modal-dialog" >
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Task</h4>
              </div>
              <div class="modal-body">
               <form role="form" id="form_AddTask" >
                
                <input type="hidden" class="form-control" name="requirment_id" id="model_requirment_id"  value="" >
                <input type="hidden" class="form-control" name="task_type" id="model_task_type"  value="QA" >
            
                <div class="form-group" id="project_id_div">
                        <label>Project </label> <br>
               <?php echo $this->Form->input('project_id', ['empty' =>'Select', 'options' => $Projects,  'class'=>'form-control','id'=>'project_id','onchange' => "get_requirements()" ,'required' => true ,'dev' => false, 'label' => false]); ?>
                    </div>  
                    <div class="form-group" >
                        <label>Requirement:</label>
                        <div id="requirement_div">
               <?php echo $this->Form->input('requirment_id', [ 'required' => true, 'empty' =>'-- Select --', 'dev' => false , 'label' => false, 'class'=>'form-control','required' => true]); ?>
                        </div>

                    </div>
            
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" name="title" id="req_field1" >
            </div>
            
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control"  name="description" id="req_field"></textarea>
            </div>
             
             <div class="form-group">
              <label>Due Date</label>
               <div class="input-group date col-sm-5" id="dp3" data-date="2018-06-02-" data-date-format="yyyy-mm-dd">
                  <input class="form-control" name="due_date" size="16" type="text" value="">
                  <span class="add-on input-group-addon"> <span class="glyphicon glyphicon-calendar"></span></span>
                </div>
          
            </div>
     
             <div class="form-group">
              <label>Priority</label>
             <?php echo $this->Form->input('priority', ['empty' =>'Select', 'options' =>$PriortyType,  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
            </div>
            
             
             <div class="form-group">
              <label>Assign To</label>
             <?php echo $this->Form->input('assign_to', ['empty' =>'Select', 'options' => $TeamMembers ,  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
            </div>
            
           
            <button type="button"  class="btn btn-sm btn-warning btnload btn_loader"  ><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Working...</button>
            <button type="button" class="btn btn-sm btn-primary btn_submit">Submit</button>

          </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        
            </div>
          </div>
        </div>
<script>
    function get_requirements() {

        var project_id = $('#project_id option:selected').val();
        $.ajax({
            type: "POST",
            url: "<?php echo $site_url?>Requirments/get_requirements/" + project_id,
            success: function (data) {
                if (data != '')
                {
                    $('#requirement_div').html(data);
                }
            }
        });
    }
</script>