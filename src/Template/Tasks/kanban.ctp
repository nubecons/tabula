<?php

$site_url = $this->Url->build('/',true); ?> 
<div class="row" style="padding:15px;">
<?php /*?><button class="btn m-b-xs w-xl btn-default" data-toggle="modal" data-target="#AddTask"> <i class="glyphicon glyphicon-plus"></i>Create New Task</button><?php */?>
    <div class="btn-group pull-right">
        <a href="<?=$site_url?>tasks/designList/<?=$requirement_id?>" data-toggle="tooltip" title="List View">  <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-list"></i></button></a>
        <a href="<?=$site_url?>tasks/kanban/<?=$requirement_id?>" data-toggle="tooltip" title="Kanban View"> <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-blackboard"></i></button></a>

    </div>
</div>           
<div class="row">
    <div class="col-sm-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>   New </h4>                  
            </div>

        </div>

        <div class="drag_body"  id="New"  style="padding-bottom:25px;">
        <?php if(count($NewTasks) == 0 ){?>

            <div class="alert alert-success">
                <p>No task have been created yet!</p>
            </div>

      <?php }else{?>




	  <?php 
	  $color_class = ['1' =>'text-info','2' =>'text-primary','3' =>'text-success','4' =>'text-muted'];
	  $counter = 0 ;
	  foreach($NewTasks as $Task){
		   $counter =  $counter + 1 ;
		    
		  ?>
            <div class="panel panel-default"  id="<?=$Task['id']?>" >

                <div class="panel-body" >
                    <article class="media" >
                        <div class="pull-right">
					<?php /*?>  <div class="pull-left">
                    <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-bold fa-stack-1x text-white"></i>
                    </span>
                    </div><?php */?>
                            <span class="fa-lg">

                            </span>
                        </div>
                        <div class="media-body">                        
                            <a  href="<?=$site_url?>tasks/detail/<?=$Task['id']?>"  class="h4"  ><?=$Task['title']?></a>
                            <small class="block m-t-xs"><br></small>
                            <em>Project: &nbsp; <span class="btn-xs btn-primary  m-t-xs"><?=$Task['project']['name']?>a</span></em>
                            <br>
                            <em class="text-xs">
                     <?php
					$due_date = '' ;
					if($Task['due_date'] != ''){ $due_date = date("Y-m-d", strtotime($Task['due_date'])) ; }
					?>
                                <a href="#" data-toggle="tooltip" title="Due Date" onClick="updateTaskField('due_date', '<?=$Task['id']?>', '<?=$due_date?>')">  <i class="glyphicon glyphicon-calendar circle-icon"></i><span id="spn_dute_date_<?=$Task['id']?>"><?php if($Task['due_date']!= ''){ echo date("M d, Y", strtotime($Task['due_date'])) ; }else{echo "Due Date" ;}?></span></a>
                                <a href="#" data-toggle="tooltip" title="Estimate" onClick="updateTaskField('estimate', '<?=$Task['id']?>', '<?=$Task['estimate']?>')">  <i class="glyphicon glyphicon-hourglass circle-icon"></i><span id="spn_estimate_<?=$Task['id']?>"><?php if($Task['estimate']!= ''){ echo $Task['estimate']."Hours" ; }else{echo "Estimate" ;}?></span></a>
                                <a href="#" data-toggle="tooltip" title="Priority" onClick="updateTaskField('priority', '<?=$Task['id']?>', '<?=$Task['priority']?>')">  <i class="glyphicon glyphicon-sort circle-icon"></i><span id="spn_priority_<?=$Task['id']?>"><?=$PriortyType[$Task['priority']]?></span></a></em>
                    <?php /*?><em class="text-xs pull-right">Priority: <span class=" btn-xs btn-<?=$PriortyTypeClass[$Task['priority']]?> m-t-xs"><?=$PriortyType[$Task['priority']]?></span></em><?php */?>


                        </div>
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

    <div class="col-sm-3">


        <div class="panel panel-default">
            <div class="panel-heading">
                <!--            -->
                <h4> In Progress </h4>                  
            </div>
        </div>
        <div class="drag_body"  id="In Progress"> 
        <?php if(count($InProgressTasks) == 0 ){?>

            <div class="alert alert-success">
                <p>No task have been created yet!</p>
            </div>

      <?php }else{?>




	  <?php 
	  $color_class = ['1' =>'text-info','2' =>'text-primary','3' =>'text-success','4' =>'text-muted'];
	  $counter = 0 ;
	  foreach($InProgressTasks as $Task){
		   $counter =  $counter + 1 ;
		    
		  ?>
            <div class="panel panel-default" id="<?=$Task['id']?>" >
                <div class="panel-body" >
                    <article class="media" >
                        <div class="pull-right">

                            <span class="fa-lg">

                            </span>
                        </div>
                        <div class="media-body">                        
                            <a  href="<?=$site_url?>tasks/detail/<?=$Task['id']?>"  class="h4"  ><?=$Task['title']?></a>
                            <small class="block m-t-xs"><br></small>
                            <em>Project: &nbsp; <span class="btn-xs btn-primary  m-t-xs"><?=$Task['project']['name']?>a</span></em>
                            <br>
                            <em class="text-xs">
                    <?php
					$due_date = '' ;
					if($Task['due_date'] != ''){ $due_date = date("Y-m-d", strtotime($Task['due_date'])) ; }
					?>
                                <a href="#" data-toggle="tooltip" title="Due Date" onClick="updateTaskField('due_date', '<?=$Task['id']?>', '<?=$due_date?>')">  <i class="glyphicon glyphicon-calendar circle-icon"></i><span id="spn_dute_date_<?=$Task['id']?>"><?php if($Task['due_date']!= ''){ echo date("M d, Y", strtotime($Task['due_date'])) ; }else{echo "Due Date" ;}?></span></a>
                                <a href="#" data-toggle="tooltip" title="Estimate" onClick="updateTaskField('estimate', '<?=$Task['id']?>', '<?=$Task['estimate']?>')">  <i class="glyphicon glyphicon-hourglass circle-icon"></i><span id="spn_estimate_<?=$Task['id']?>"><?php if($Task['estimate']!= ''){ echo $Task['estimate']."Hours" ; }else{echo "Estimate" ;}?></span></a>
                                <a href="#" data-toggle="tooltip" title="Priority" onClick="updateTaskField('priority', '<?=$Task['id']?>', '<?=$Task['priority']?>')">  <i class="glyphicon glyphicon-sort circle-icon"></i><span id="spn_priority_<?=$Task['id']?>"><?=$PriortyType[$Task['priority']]?></span></a>
                            </em>
                    <?php /*?><em class="text-xs pull-right">Priority: <span class=" btn-xs btn-<?=$PriortyTypeClass[$Task['priority']]?> m-t-xs"><?=$PriortyType[$Task['priority']]?></span></em><?php */?>
                        </div>

                    </article>
           <?php 
		   if($counter >= 4){
			   $counter = 0 ;
			  }?>
                </div> 
            </div>
              <?php
		   }?>


       <?php }?>    
        </div>    






    </div>

    <div class="col-sm-3">


        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>   Resolved </h4>                  
            </div>
        </div>
        <div class="drag_body" id="Resolve" style="padding-bottom:25px;"> 
        <?php if(count($ResolvedTasks) == 0 ){?>

            <div class="alert alert-success">
                <p>No task have been created yet!</p>
            </div>

      <?php }else{?>




	  <?php 
	  $color_class = ['1' =>'text-info','2' =>'text-primary','3' =>'text-success','4' =>'text-muted'];
	  $counter = 0 ;
	  foreach($ResolvedTasks as $Task){
		   $counter =  $counter + 1 ;
		    
		  ?>
            <div class="panel panel-default"   id="<?=$Task['id']?>" > 
                <div class="panel-body">
                    <article class="media"  >
                        <div class="pull-right">
					<?php /*?>  <div class="pull-left">
                    <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-bold fa-stack-1x text-white"></i>
                    </span>
                    </div><?php */?>
                            <span class="fa-lg">

                            </span>
                        </div>
                        <div class="media-body">                        
                            <a  href="<?=$site_url?>tasks/detail/<?=$Task['id']?>"  class="h4"  ><?=$Task['title']?></a>
                            <small class="block m-t-xs"><br></small>
                            <em>Project: &nbsp; <span class="btn-xs btn-primary  m-t-xs"><?=$Task['project']['name']?>a</span></em>
                            <br>
                            <em class="text-xs">
                    <?php
					$due_date = '' ;
					if($Task['due_date'] != ''){ $due_date = date("Y-m-d", strtotime($Task['due_date'])) ; }
					?>
                                <a href="#" data-toggle="tooltip" title="Due Date" onClick="updateTaskField('due_date', '<?=$Task['id']?>', '<?=$due_date?>')">  <i class="glyphicon glyphicon-calendar circle-icon"></i><span id="spn_dute_date_<?=$Task['id']?>"><?php if($Task['due_date']!= ''){ echo date("M d, Y", strtotime($Task['due_date'])) ; }else{echo "Due Date" ;}?></span></a>
                                <a href="#" data-toggle="tooltip" title="Estimate" onClick="updateTaskField('estimate', '<?=$Task['id']?>', '<?=$Task['estimate']?>')">  <i class="glyphicon glyphicon-hourglass circle-icon"></i><span id="spn_estimate_<?=$Task['id']?>"><?php if($Task['estimate']!= ''){ echo $Task['estimate']."Hours" ; }else{echo "Estimate" ;}?></span></a>
                                <a href="#" data-toggle="tooltip" title="Priority" onClick="updateTaskField('priority', '<?=$Task['id']?>', '<?=$Task['priority']?>')">  <i class="glyphicon glyphicon-sort circle-icon"></i><span id="spn_priority_<?=$Task['id']?>"><?=$PriortyType[$Task['priority']]?></span></a></em>
                    <?php /*?><em class="text-xs pull-right">Priority: <span class=" btn-xs btn-<?=$PriortyTypeClass[$Task['priority']]?> m-t-xs"><?=$PriortyType[$Task['priority']]?></span></em><?php */?>


                        </div>

                    </article>
           <?php 
		   if($counter >= 4){
			   $counter = 0 ;
			  }?>
                </div>
            </div>
      <?php
		   }?>
       <?php }?>    



        </div>


    </div>

    <div class="col-sm-3">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>   Close </h4>                  
            </div>
        </div>
        <div class="drag_body" id="Close" style="padding-bottom:25px;"> 
        <?php if(count($CloseTasks) == 0 ){?>

            <div class="alert alert-success">
                <p>No task have been created yet!</p>
            </div>

      <?php }else{?>




	  <?php 
	  $color_class = ['1' =>'text-info','2' =>'text-primary','3' =>'text-success','4' =>'text-muted'];
	  $counter = 0 ;
	  foreach($CloseTasks as $Task){
		   $counter =  $counter + 1 ;
		    
		  ?>
            <div class="panel panel-default"   id="<?=$Task['id']?>">
                <div class="panel-body"  >
                    <article class="media">
                        <div class="pull-right">

                            <span class="fa-lg">

                            </span>
                        </div>
                        <div class="media-body">                        
                            <a  href="<?=$site_url?>tasks/detail/<?=$Task['id']?>"  class="h4"  ><?=$Task['title']?></a>
                            <small class="block m-t-xs"><br></small>
                            <em >Project: &nbsp; <span class="btn-xs btn-primary  m-t-xs"><?=$Task['project']['name']?>a</span></em> <br>
                            <em class="text-xs">
                    <?php
					$due_date = '' ;
					if($Task['due_date'] != ''){ $due_date = date("Y-m-d", strtotime($Task['due_date'])) ; }
					?>
                                <a href="#" data-toggle="tooltip" title="Due Date" onClick="updateTaskField('due_date', '<?=$Task['id']?>', '<?=$due_date?>')">  <i class="glyphicon glyphicon-calendar circle-icon"></i><span id="spn_dute_date_<?=$Task['id']?>"><?php if($Task['due_date']!= ''){ echo date("M d, Y", strtotime($Task['due_date'])) ; }else{echo "Due Date" ;}?></span></a>
                                <a href="#" data-toggle="tooltip" title="Estimate" onClick="updateTaskField('estimate', '<?=$Task['id']?>', '<?=$Task['estimate']?>')">  <i class="glyphicon glyphicon-hourglass circle-icon"></i><span id="spn_estimate_<?=$Task['id']?>"><?php if($Task['estimate']!= ''){ echo $Task['estimate']."Hours" ; }else{echo "Estimate" ;}?></span></a>
                                <a href="#" data-toggle="tooltip" title="Priority" onClick="updateTaskField('priority', '<?=$Task['id']?>', '<?=$Task['priority']?>')">  <i class="glyphicon glyphicon-sort circle-icon"></i><span id="spn_priority_<?=$Task['id']?>"><?=$PriortyType[$Task['priority']]?></span></a></em>
                    <?php /*?><em class="text-xs pull-right">Priority: <span class=" btn-xs btn-<?=$PriortyTypeClass[$Task['priority']]?> m-t-xs"><?=$PriortyType[$Task['priority']]?></span></em><?php */?>
                        </div>

                    </article>
           <?php 
		   if($counter >= 4){
			   $counter = 0 ;
			  }?>
                </div>
            </div>
              <?php
		   }?>
       <?php }?>    
        </div> 

    </div>

</div>


<script src="<?=$site_url?>libs/jquery/html5sortable/jquery.sortable.js"></script>  
<script src="<?=$site_url?>libs/jquery/nestable/jquery.nestable.js"></script>  
  
<script>


                                    $(function () {
                                        $(".drag_body").sortable({
                                            connectWith: ".drag_body",
                                            handle: ".panel-body",
                                            forcePlaceholderSize: true,
                                            placeholder: "portlet-placeholder ui-corner-all",
                                        }).bind('sortupdate', function (e, ui) {

                                             status = ui.item.parent(".drag_body").attr("id");
                                             id = ui.item.attr('id');
                                            $.ajax({
                                                type: 'POST',
                                                data: {'status': status, 'id': id},
                                                url: '<?=$site_url?>tasks/updateStatus',
                                                success: function (data) {
                                                    ui.item.next(".alert-success").hide();
                                                    ui.item.closest(".alert-success").hide();
                                                }
                                            });
                                        });
                                    });




                                    function updateTaskField(field, id, value) {

                                        $('#updateTaskField').modal('show');

                                        $('#md_field_name').val(field);

                                        $('#md_field_id').val(id);


                                        $('.up_md_fields').hide();

                                        $('#updateTaskField').show();

                                        $('#md_field_' + field).show();

                                        $('#field_' + field).val(value);

                                    }

                                    $(document).ready(function () {

                                        $('#form_updateTaskField  .btn_submit').click(function (e) {


                                            e.preventDefault();
                                            var dataString = $('#form_updateTaskField').serialize();
                                            $.ajax({
                                                type: 'POST',
                                                data: dataString,
                                                url: '<?=$site_url?>tasks/updateField',
                                                beforeSend: function () {

                                                    $('#form_updateTaskField .btn_submit').hide();
                                                    $('#form_updateTaskField .btn_loader').show();

                                                },
                                                success: function (data) {

                                                    $('#form_updateTaskField .btn_submit').show();
                                                    $('#form_updateTaskField .btn_loader').hide();
                                                    $('#updateTaskField').modal('hide');
                                                    window.location.reload(true);

                                                }
                                            });
                                            return false;
                                        });


                                        $('#form_AddTask  .btn_submit').click(function (e) {

                                            if ($('#form_AddTask [name=title]').val() == '')
                                            {
                                                alert('Pleae enter title');
                                                return;
                                            }
                                            if ($('#form_AddTask [name=description]').val() == '')
                                            {
                                                alert('Pleae enter description');
                                                return;
                                            }


                                            e.preventDefault();
                                            var dataString = $('#form_AddTask').serialize();
                                            $.ajax({
                                                type: 'POST',
                                                data: dataString,
                                                url: '<?=$site_url?>requirments/saveTask',
                                                beforeSend: function () {
                                                    $('#form_AddTask .btn_submit').hide();
                                                    $('#form_AddTask .btn_loader').show();
                                                },
                                                success: function (data) {

                                                    $('#form_AddTask .btn_submit').show();
                                                    $('#form_AddTask .btn_loader').hide();

                                                    if (data == 'false')
                                                    {

                                                        alert('Task could not created');
                                                    } else {

                                                        $('#AddTask').modal('hide');
                                                        // alert('Task created successfully.');
                                                        window.location.reload(true);
                                                        //window.location.href = '<?=$site_url?>Projects/index/'+data; 	   
                                                    }

                                                }
                                            });
                                            return false;
                                        });

                                        $('#dp3').datepicker();
                                        $('#dp4').datepicker();
                                    })
</script> 

<div id="updateTaskField" class="modal fade" role="dialog">
    <div class="modal-dialog" >

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form_updateTaskField" > 

                    <input type="hidden" name="md_field_name" id="md_field_name">
                    <input type="hidden" name="md_field_id" id="md_field_id">

                    <div class="form-group up_md_fields" id="md_field_due_date">
                        <label>Due Date</label>
                        <div class="input-group date col-sm-5" id="dp4" data-date="2018-06-02-" data-date-format="yyyy-mm-dd">
                            <input id="field_due_date" class="form-control" name="due_date" size="16" type="text" value="">
                            <span class="add-on input-group-addon"> <span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>

                    <div class="form-group up_md_fields" id="md_field_priority">
                        <label>Priority</label>
             <?php echo $this->Form->input('priority', ["id" => "field_priority"  , 'empty' =>'Select', 'options' => $PriortyType,  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
                    </div>

                    <div class="form-group up_md_fields" id="md_field_estimate">
                        <label>Estimate</label>
             <?php echo $this->Form->input('estimate', [ "id" => "field_estimate"  ,  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
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
             <?php echo $this->Form->input('priority', ['empty' =>'Select', 'options' => $PriortyType,  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
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



