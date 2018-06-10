<?php
$site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-12">

        <div class="table-responsive">
            <table class="table table-striped b-t b-light" >
                <thead>
                    <tr>
                        <th>Task Title</th>
                        <th>Requirement</th>
                        <th>File</th>
                        <th>File Created by</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
        <?php
		$req_id = '';
                $project_id = '';
                $task_id = '';
             
		 foreach($Tasks as $Task) {
                     if($Task['file'] !=''){ 
			 if($req_id != $Task['requirment_id'])
			   {
				  $req_id = $Task['requirment_id'];  
				  $req_name = $this->GetInfo->getReqName($Task['requirment_id']);
			 ?>
                    <tr>
                        <td colspan="7" style=" background-color:  bisque;">
                            <b> Project: &nbsp;  <?=$Task['project']['name']?> </b>
                        </td>
                    </tr>

             <?php
			   }
                            if($project_id != $Task['project_id'])
			   {
				  $project_id = $Task['project_id'];  
				  $project_name = $this->GetInfo->getProjectName($Task['project_id']);
                           }
                            if($task_id != $Task['task_id'])
			   {
				  $task_id = $Task['task_id'];  
				  $task_name = $this->GetInfo->getTaskName($Task['task_id']);
                           }
                           $user_name = $this->GetInfo->getUserData($sUser['id']);
	      ?>
                    <tr>

                        <td><?=$task_name['title']?></td>

                        <td><span class="btn btn-xs btn-primary  m-t-xs"> <b><?=$req_name['title']?></b></span></td>

                        <td class="text-success"><a href="<?=$site_url.'img/tasks_file/'.$Task['file']?>" download>Download</a></td>

                        <td><?=$user_name['email'];?></td>
                        <td><span class="text-danger"><?=date('M d, Y h:i A', strtotime($Task['modified']))?></span></td>

                    </tr>
                 <?php }}?>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>



