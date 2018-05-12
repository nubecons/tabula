<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-12">
  
        
<button class="btn m-b-xs w-xl btn-default" data-toggle="modal" data-target="#AddTask"> <i class="glyphicon glyphicon-plus"></i>Create New Task</button>
<div class="btn-group pull-right">
	         <?php /*?> <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-list"></i></button><?php */?>
             <a href="<?=$site_url?>tasks/kanban" data-toggle="tooltip" title="Kanban View"> <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-blackboard"></i></button></a>
	        </div>
      <div class="panel panel-default">
    <div class="panel-heading">
      <strong> Design Tasks </strong>
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light" >
        <thead>
          <tr>
            <th>Title</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Project</th>
            <th>Assign To</th>
           <?php /*?> <th>Action</th><?php */?>
          </tr>
        </thead>
        <tbody>
        <?php
		 foreach($Tasks as $Task) {
	      ?>
          <tr>

            <td><?=$Task['title']?></td>
            <td><?=$priorityOptions[$Task['priority']]?></td>
            <td><?=$Task['status']?></td>
            <td><?=$Task['project']['name']?></td>

            <td class="text-success"><?php /*?><i class="fa fa-level-up"></i> 20%<?php */?>
			<?=isset($TeamMembers[$Task['assign_to']])?$TeamMembers[$Task['assign_to']]:'N/A'?></td>
           <?php /*?> <td>
	        <div class="btn-group pull-right">
                       <a href="#" data-toggle="tooltip" title="Create Task"> <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-list"></i></button></a>
                       <a href="#" data-toggle="tooltip" title="Task Detail"><button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-blackboard"></i></button></a>
	        </div>
	          
            </td><?php */?>
          </tr>
          <?php }?>

        </tbody>
      </table>
    </div>
    <?php /*?><footer class="panel-footer">
      <div class="row">
        <div class="col-sm-4 hidden-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                  
        </div>
        <div class="col-sm-4 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-4 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer><?php */?>
  </div>
      </div>


</div>


 <link rel="stylesheet" href="<?=$site_url?>css/datepicker.css" type="text/css" />
 <script src="<?=$site_url?>libs/jquery/bootstrap-datepicker/bootstrap-datepicker.js"></script>     
<script>
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
					    alert('Task created successfully.');
						window.location.reload(true);
						//window.location.href = '<?=$site_url?>Projects/index/'+data; 	   
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
               <?php /*?> <input type="hidden" class="form-control" name="requirment_id" value="<?=$Requirment['id']?>" ><?php */?>
                <input type="hidden" class="form-control" name="task_type"  value="DESIGN" >
            
            <div class="form-group">
              <label>Project </label> <br>
               <?php echo $this->Form->input('project_id', ['empty' =>'Select', 'options' => $Projects,  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
            </div>  
               
          <?php /*?>  <div class="form-group">
              <label>Task type</label> <br>
            
               <?php echo $this->Form->input('task_type', ['default' =>'DESIGN',  'empty' =>'Select', 'options' => ['DESIGN' => 'Design' , 'QA' => 'QA'],  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
             
            </div><?php */?>
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
             <?php echo $this->Form->input('priority', ['empty' =>'Select', 'options' => ['1' => 'Low' , '2' => 'Meduim'  , '3' => 'Heigh'],  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
            </div>
            
             
             <div class="form-group">
              <label>Assign To</label>
             <?php echo $this->Form->input('assign_to', ['empty' =>'Select', 'options' => ['1' => 'User 1' , '2' => 'User 2'  , '2' => 'User 3'],  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
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

