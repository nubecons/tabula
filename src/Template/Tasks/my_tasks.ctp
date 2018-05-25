<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-md-12">
         <div class="panel wrapper">
        <div class="row">
            
          <div class="col-md-12 b-r b-light no-border-xs">
            <h4 class="font-thin m-t-none m-b-md text-muted">My Tasks 
             <span class="text-xs text-muted pull-right">
                <i class="fa fa-circle text-info m-r-xs m-l-sm"></i> New (<?=$this->GetInfo->getCountTasks(null ,'New',null,$sUser['id'],$ProjectIdz);?>)
                <i class="fa fa-circle text-warning m-r-xs m-l-sm"></i>In-Progress(<?=$this->GetInfo->getCountTasks(null, 'In Progress',null,$sUser['id'],$ProjectIdz);?>)
                <i class="fa fa-circle text-success m-r-xs m-l-sm"></i>Resolve(<?=$this->GetInfo->getCountTasks(null, 'Resolve',null,$sUser['id'],$ProjectIdz);?>)
              </span>
            </h4>
            
    <div class="table-responsive">
      <table class="table table-striped b-t b-light" >
        <thead>
          <tr>
             <th>Id</th>
            <th>Title</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Assign To</th>
            <th>Due Date</th>
           <?php /*?> <th>Action</th><?php */?>
          </tr>
        </thead>
        <tbody>
        <?php
		$req_id = '';
		 foreach($Tasks as $Task) {?>
          <tr>
		    <td><a href="<?=$site_url?>tasks/detail/<?=$Task['id']?>"  ><?=$Task['id']?></a></td>
            <td><a href="<?=$site_url?>tasks/detail/<?=$Task['id']?>"  ><?=$Task['title']?></a></td>

            <td >
			<span class="btn btn-xs btn-<?=$PriortyTypeClass[$Task['priority']]?> m-t-xs"><?=$PriortyType[$Task['priority']]?></span>
			</td>
            <td>  
            <span class="btn btn-xs btn-<?=$ProjectStatusClass[$Task['status']]?> m-t-xs"><?=$Task['status']?></span>
		
			</td>

            

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
        </div>
      </div>


</div>

