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
            <?php if(count($Tasks) >0){ foreach($Tasks as $Task) {?>
              <div class="m-b">
                <span class="label text-base bg-<?=$PriortyTypeClass[$Task['priority']]?> pos-rlt m-r"><i class="arrow right arrow-<?=$PriortyTypeClass[$Task['priority']]?>"></i><?=$PriortyType[$Task['priority']]?></span>
                <a href="<?=$site_url?>tasks/detail/<?=$Task['id']?>"><?=$Task['title'];?></a>
                <span class="label text-base bg-info pos-rlt m-r" style=" float: right;">
                    <i class=" glyphicon glyphicon-calendar "></i> <?=($Task['due_date'] == null)?'N/A':$Task['due_date'];?></span>
            </div>
 
            <?php }}else{?>
              <div class="block panel padder-v bg-primary item" style=" text-align: center;">No Task Assign Yet!</div>
           <?php }?>
          </div>
        </div>
      </div>
        </div>
      </div>


</div>

