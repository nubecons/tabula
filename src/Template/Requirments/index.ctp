<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-5">

        <button class="btn m-b-xs w-xl btn-default" data-toggle="modal" data-target="#AddReq"> <i class="glyphicon glyphicon-plus"></i>Create New Requirement</button>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4> Requirements </h4>                  
            </div>
            <div class="panel-body">
        <?php if(count($Requirments) == 0 ){?>

                <div class="alert alert-success">
                    <p>No Requirement have been created yet!</p>
                </div>

      <?php }else{?>
	  <?php 
	  $color_class = ['1' =>'text-info','2' =>'text-primary','3' =>'text-success','4' =>'text-muted'];
	  $counter = 0 ;
	  foreach($Requirments as $Requirment){
		     
                    $counter =  $counter + 1 ;
                       $TaskHealth=0;
				$New_tasks = $this->GetInfo->getCountTasks($Requirment['id'] , 'New');
				$InProgress_tasks = $this->GetInfo->getCountTasks($Requirment['id'] , 'In Progress');
				$Close_tasks = $this->GetInfo->getCountTasks($Requirment['id'] , 'Close');
				$Resolve_tasks = $this->GetInfo->getCountTasks($Requirment['id'] , 'Resolve');
                                $AllTasks = $New_tasks+$InProgress_tasks+$Close_tasks+$Resolve_tasks;
                                $RemainingTasks =$New_tasks+$InProgress_tasks;
                                $DoneTasks =$Close_tasks+$Resolve_tasks;
                                if($AllTasks >0){
                                $TaskHealth = round(($DoneTasks*100)/$AllTasks);
                                }
		   		    
		  ?>
                <article class="media">
                    <div class="pull-right">
                        <small class="m-t-xs">

                        </small>

                    </div>
                    <div class="media-body">                        
                        <a href = "javascript:void(0)" class="h4" onClick="getDetail('<?=$Requirment['id']?>', '<?=$Requirment['project']['id']?>')"><i class="fa fa-fw fa-circle <?=$color_class[$counter]?>"></i><?=$Requirment['title']?></a>
                        <small class="block m-t-xs"> </small>

                        <em>Project: &nbsp; <span class="label bg-primary m-t-xs"><?=$Requirment['project']['name']?></span></em>
                        &nbsp;
                        <?php if($TaskHealth <=33){?>
                        <em class="text-danger"><i class="fa fa-level-down"> Heath:</i> <?=$TaskHealth;?>%</em>
                        <?php }else{?>
                        <em class="text-success"><i class="fa fa-level-up"> Heath:</i> <?=$TaskHealth;?>%</em>
                        <?php }?>
                        &nbsp;
                        <em class="text-xs  pull-right">Created on <span class="text-danger"><?=date('M d, Y', strtotime($Requirment['created']))?></span></em>


                    </div>
                    <hr>
                </article>
           <?php 
		   if($counter >= 4){
			   $counter = 0 ;
			  }
		   }?>
       <?php }?>    
            </div>
        </div>

    </div>

    <div class="col-sm-7">

        <br> <br>
        <div class="panel panel-default" id="divRequirmentDetail" <?php /*?>style="display:none"<?php */?>>

        </div>

    </div>

</div>
<div id="AddReq" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:500px">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Requirement</h4>
            </div>
            <div class="modal-body">
                <form role="form" id="form_addRequirment" >
                    <div class="form-group">
                        <label>Project</label> <br>

               <?php echo $this->Form->input('project_id', ['empty' =>'Select', 'options' => $Projects,  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>

                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" id="req_field1" >
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="req_field" name="description"></textarea>
                    </div>
                    <button type="button"  class="btn btn-sm btn-warning btnload btn_loader"  ><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Working...</button>
                    <button type="button" class="btn btn-sm btn-primary btn_submit" >Submit</button>

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
                    <input type="hidden" class="form-control" name="requirment_id" id="requirment_id_field"  >
                    <input type="hidden" class="form-control" name="project_id"  id="project_id_field"  >

                    <div class="form-group">
                        <label>Task type</label> <br>

               <?php echo $this->Form->input('task_type', ['empty' =>'Select', 'options' => ['DESIGN' => 'Design' , 'QA' => 'QA'],  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>

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
             <?php echo $this->Form->input('priority', ['empty' =>'Select', 'options' => ['1' => 'Low' , '2' => 'Meduim'  , '3' => 'Heigh'],  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
                    </div>


                    <div class="form-group">
                        <label>Assign To</label>
             <?php echo $this->Form->input('assign_to', ['empty' =>'Select', 'options' => $TeamMembers,  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
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
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('#form_AddTask  .btn_submit').click(function () {

            addTask();
        });
        $('#form_addRequirment .btn_submit').click(function (e) {
            if ($('#form_addRequirment [name=project_id]').val() == '')
            {
                alert('Pleae select project');
                return;
            }
            if ($('#form_addRequirment [name=title]').val() == '')
            {
                alert('Pleae enter title');
                return;
            }
            if ($('#form_addRequirment [name=description]').val() == '')
            {
                alert('Pleae enter description');
                return;
            }


            e.preventDefault();
            var dataString = $('#form_addRequirment').serialize();
            $.ajax({
                type: 'POST',
                data: dataString,
                url: '<?=$site_url?>requirments/saveData',
                beforeSend: function () {
                    $('#form_addRequirment .btn_submit').hide();
                    $('#form_addRequirment .btn_loader').show();
                },
                success: function (data) {
                    if (data == 'false')
                    {
                        $('#form_addRequirment .btn_submit').show();
                        $('#form_addRequirment .btn_loader').hide();
                        alert('Requirment could not created');
                    } else {

                        $('#AddReq').modal('hide');
                        // alert('Requirment created successfully.');
                         window.location.href = '<?=$site_url?>Requirments/index/'+ null+'/ajax'; 	   

                    }

                }
            });
            return false;
        });
        /* add requirment */
    });

    function addTaskModel(req_id, project_id) {

        $('#AddTask').modal('show');
        $('#requirment_id_field').val(req_id);
        $('#project_id_field').val(project_id);

    }

    function addTask()
    {

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
                    window.location.href = '<?=$site_url?>Tasks/design/'+ null+'/ajax';
                }

            }
        });
        return false;
    }

    function getDetail(id, project_id) {
        $.ajax({
            type: 'POST',
            url: '<?=$site_url?>requirments/ajax_detail/' + id,
            success: function (data) {
                $('#divRequirmentDetail').html(data);
                $('#requirment_id_field').val(id);
                $('#project_id_field').val(project_id);
            }
        });
        return false;
    }


</script>  



