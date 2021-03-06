<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-12">
  
        
<button class="btn m-b-xs w-xl btn-default" data-toggle="modal" data-target="#AddTask"> <i class="glyphicon glyphicon-plus"></i>Create QA Task</button>
<div class="btn-group pull-right">
	        <a href="<?=$site_url?>tasks/qaList/<?=$requirement_id?>" data-toggle="tooltip" title="List View">  <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-list"></i></button></a>
             <a href="<?=$site_url?>tasks/qakanban/<?=$requirement_id?>" data-toggle="tooltip" title="Kanban View"> <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-blackboard"></i></button></a>
	         </div>
      <div class="panel panel-default">
    <div class="panel-heading">
      <strong> QA Tasks </strong>
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light" >
        <thead>
          <tr>
             <th>Id</th>
            <th>Title</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Project</th>
            <th>Assign To</th>
            <th>Due Date</th>
           <?php /*?> <th>Action</th><?php */?>
          </tr>
        </thead>
        <tbody>
        <?php
		$req_id = '';
		 foreach($Tasks as $Task) {
			 if($req_id != $Task['requirment_id'])
			   {
				  $req_id = $Task['requirment_id'];  
				  $req_name = $this->GetInfo->getReqName($Task['requirment_id']);
			 ?>
             <tr>
             <td colspan="7">
             <b>  <?=$req_name['title']?> </b>
             </td>
             </tr>
             
             <?php
			   }
	      ?>
          <tr>
		    <td><a href="<?=$site_url?>tasks/detail/<?=$Task['id']?>"  ><?=$Task['id']?></a></td>
            <td><a href="<?=$site_url?>tasks/detail/<?=$Task['id']?>"  ><?=$Task['title']?></a></td>

            <td >
			<span class="btn btn-xs btn-<?=$PriortyTypeClass[$Task['priority']]?> m-t-xs"><?=$PriortyType[$Task['priority']]?></span>
			</td>
            <td>  
            <span class="btn btn-xs btn-<?=$ProjectStatusClass[$Task['status']]?> m-t-xs"><?=$Task['status']?></span>
		
			</td>

            <td><span class="btn btn-xs btn-primary  m-t-xs"> <b><?=$Task['project']['name']?></b></span></td>

            <td class="text-success"><?php /*?><i class="fa fa-level-up"></i> 20%<?php */?>
			<?=isset($TeamMembers[$Task['assign_to']])?$TeamMembers[$Task['assign_to']]:'N/A'?></td>
            
            <td><?=$Task['due_date'];?></td>
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
                <input type="hidden" class="form-control" name="task_type"  value="QA" >
            
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
