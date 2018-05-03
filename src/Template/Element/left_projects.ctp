  <?php 
    $Projects = $this->GetInfo->getProjects(['user_id' => $sUser['id'] , 'status' => 'ACTIVE' , 'name !=' => '']);
   ?>
  <?php $site_url = $this->Url->build('/',true); ?> 
  
  <a href class="auto">      
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
                  <b class="badge bg-info pull-right" data-toggle="modal" data-target="#ModeladdProject">+</b>
                  <i class="glyphicon glyphicon-th"></i>
                  <span class="font-bold">Projects</span>
                </a>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                      <span>Project 1</span>
                  </li>
                   <li>
                    <a href = "<?=$site_url?>projects" >
                      <span>All Projects</span>
                    </a>
                  </li>
                 <?php
				  foreach($Projects as $Project){?>
                  <li>
                    <a href = "#" >
                      <span><?=$Project['name']?></span>
                    </a>
                  </li>
                  <?php } ?>
                </ul>