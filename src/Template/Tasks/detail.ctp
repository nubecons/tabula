<?php
$site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-7">


        <div class="panel panel-default">
            <div class="panel-heading">
                <h4> <?=$Task['title']?> </h4>                  
            </div>
            <div class="panel-body">


           <?php if(!$Task){ ?>
                <div class="alert alert-success">
                    <p>No task found!</p>
                </div>
      <?php }else{?>

                <div class="panel-body">
                    <article class="media">
                        <small class="block m-t-xs select_text" >
          <?=$Task['description']?>
                        </small>
                        <div class="media-body">                        

                            <small class="block m-t-xs"></small>
                            <em class="text-xs">  Created on <span class="text-danger"><?=date('M d, Y', strtotime($Task['created']))?></span></em>
                        </div>
                        <br>

                        <br>

                        <div class="panel-body">
          <?php
			foreach($TaskComments as $TaskComment){
		 ?>		

          <?php include('save_comment.ctp');?>


            <?php
			 } ?>

                            <div id="comments_div">

                            </div>

                        </div>

                        <div class="panel b-a bg-light ">
                            <div class="panel-body">
          <?php /*?><form role="form" id="form_AddTask" ><?php */?>
            <?php echo $this->Form->create($Task ,['enctype' => 'multipart/form-data' ] ); ?>
                                <div class="form-group">
                                    <label>Status</label>
              <?php echo $this->Form->input('status', ['empty' =>'Select', 'options' => $ProjectStatus,  'class'=>'form-control' ,'dev' => false, 'label' => false]); ?>
                                </div>
            <?php
			 if($Task['created_by'] == $sUser['id'] || $Task['project']['user_id'] == $sUser['id']){ ?>
                                <div class="form-group">
                                    <label>Priority</label>
             <?php echo $this->Form->input('priority', ['empty' =>'Select', 'options' => $PriortyType,  'class'=>'form-control' ,'dev' => false, 'label' => false]); ?>
                                </div>
                                <div class="form-group">
                                    <label>Due Date</label>
              <?php
			  $due_date = '';
			  if($Task['due_date'] != '' && $Task['due_date'] != '0000-00-00'){
				  $due_date = date("Y-m-d", strtotime($Task['due_date']));
				  }
			 ?>

                                    <div class="input-group date col-sm-5" id="dp3" data-date="<?=$due_date?>" data-date-format="yyyy-mm-dd">
              <?php echo $this->Form->input('due_date', ['type' =>'text', "value" => $due_date,   'class'=>'form-control' ,'dev' => false, 'label' => false]); ?>
                                        <span class="add-on input-group-addon"> <span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label>Assign To</label>
             <?php echo $this->Form->input('assign_to', ['empty' =>'Select', 'options' => $ProjectFollowers ,  'class'=>'form-control' ,'dev' => false, 'label' => false]); ?>
                                </div>
            <?php }?>
                                <div class="form-group">
                                    <label>Reply</label>
             <?php echo $this->Form->input('message', ['type' =>'textarea',  'class'=>'form-control' ,'dev' => false, 'label' => false]); ?>
                                </div>
                                <div class="form-group">
                                    <label>Attach File</label>
             <?php echo $this->Form->file('file', ["id"=>"input-upload-img1" , "accept"=>'image/*' , "type" => "file" , "class" => "file" , "data-preview-file-type" => "text"]); ?>
                                </div>                   

                                <button type="button"  class="btn btn-sm btn-warning btnload btn_loader"  ><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Working...</button>
                                <button type="submit" class="btn btn-sm btn-primary btn_submit">Submit</button>

                                <input type="hidden" class="form-control" name="task_id" value="<?=$Task['id']?>" >
                                <input type="hidden" class="form-control" name="project_id" value="<?=$Task['project_id']?>" >
                                <input type="hidden" class="form-control" name="requirment_id" value="<?=$Task['requirment_id']?>" >

                                </form>

                            </div>    

                        </div>      


                    </article>
                </div>


     <?php }?>   
                <script>
                    $(document).ready(function () {

                        $('#dp3').datepicker();

                        /* add comment */
                        $('#form_addComment .btn_submit').click(function (e) {

                            if ($('#form_addComment [name=message]').val() == '')
                            {
                                alert('Pleae enter comment');
                                return;
                            }


                            e.preventDefault();
                            var dataString = $('#form_addComment').serialize();

                            $.ajax({
                                type: 'POST',
                                data: dataString,
                                url: '<?=$site_url?>tasks/saveComment',
                                beforeSend: function () {

                                    $('#form_addComment .btn_submit').hide();
                                    $('#form_addComment .btn_loader').show();

                                },
                                success: function (data) {

                                    $('#form_addComment .btn_submit').show();
                                    $('#form_addComment .btn_loader').hide();

                                    if (data == 'false')
                                    {
                                        alert('Comments could not created');

                                    } else {

                                        $('#form_addComment [name=message]').val('');
                                        $("#comments_div").append(data);



                                    }
                                }
                            });

                            return false;

                        });


                        /*add comment*/



                    });
                </script> 




            </div>
        </div>

    </div>

    <div class="col-sm-5">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="tl-content panel bg-success padder">
 <!--              <span class="arrow arrow-success right pull-up hidden-left"></span>
               <span class="arrow arrow-success right pull-up visible-left"></span>-->
                    <div class="text-lt"><strong><i class=" glyphicon glyphicon-th "></i> Project</strong></div>
                </div>
                &nbsp; &nbsp; &nbsp; &nbsp;
             <?=isset($Task['project']['name'])?$Task['project']['name']:'N/A'?>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="tl-content panel bg-primary padder">
                    <div class="text-lt"><strong><i class=" fa fa-user "></i> Assign To</strong></div>
                </div>
                &nbsp; &nbsp; &nbsp; &nbsp;
             <?php
			  if($Task['assign_to']){
				 $assign_to = $this->GetInfo->getUserData($Task['assign_to'],['id','first_name' ,'last_name','email']);
				 echo $assign_to['first_name'].' '.$assign_to['last_name'].' '.$assign_to['email'];
				  }else{
				  echo "N/A";	  
					  }
			 ?>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="tl-content panel bg-info padder">
 <!--              <span class="arrow arrow-info right pull-up hidden-left"></span>
               <span class="arrow arrow-info right pull-up visible-left"></span>-->
                    <div class="text-lt"><strong><i class=" glyphicon glyphicon-calendar "></i> Due Date</strong></div>
                </div>
                &nbsp; &nbsp; &nbsp; &nbsp;
             <?php
			  if($Task['due_date'] != '' && $Task['due_date'] != '0000-00-00'){
				  echo date("M d, Y", strtotime($Task['due_date']));
				  }
			 ?>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class=" glyphicon glyphicon-paperclip "></i>Files</strong>
            </div>
            <?php if($TaskComments){
                foreach($TaskComments as $TaskComment){ $i=1;
                    if($TaskComment->file !=''){
                       
                ?>
            <div class="panel-body">
                 <em class="text-success"><a href="<?=$site_url.'img/tasks_file/'.$TaskComment->file?>" download>Download</a></em>
                 <em class="text-xs" style=" float: right;">Created: <span class="text-danger"><?=date('M d, Y h:i A', strtotime($Task['modified']))?></span></em>
            </div>

                <?php }}}else{?>
            <div class="panel-body">
                <em class="text-xs text-danger">No Files in this Task</em>
            </div>
               <?php }?>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class=" fa fa-bars "></i>  Activities</strong>
            </div>

            <div class="panel-body">
                <em class="text-xs">Created: <span class="text-danger"><?=date('M d, Y h:i A', strtotime($Task['created']))?></span></em> <br>
                   <?php
				   if(count($AppEvents) > 0){
					   
					   foreach($AppEvents as $AppEvent){
						
						$eventBY = trim($AppEvent['Users']['first_name']. ' '. $AppEvent['Users']['last_name']);

						if($eventBY == ''){
						  $eventBY = trim($AppEvent['Users']['email']);
						}   
						    
				   ?>
                <em class="text-xs"><?=$AppEvent['description']?> by  <span class="label bg-primary m-t-xs"><?=$eventBY?></span> at <span class="text-danger"><?=date('M d, Y h:i A', strtotime($AppEvent['modified']))?></span></em>
                <br>
                   <?php }
				     }else{?>
                <em class="text-xs">Last Updated: <span class="text-danger"><?=date('M d, Y h:i A', strtotime($Task['modified']))?></span></em>
                   <?php }?>
            </div>
        </div>

    </div>

</div>

