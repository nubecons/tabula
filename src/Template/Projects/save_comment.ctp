<?php $site_url = $this->Url->build('/',true); ?> 
  <div class="m-l-lg">
          <a class="pull-left thumb-sm avatar">
            <img src="<?=$site_url?>img/a5.jpg" alt="...">
          </a>          
          <div class="m-l-xxl panel b-a">
            <div class="panel-heading pos-rlt">
              <span class="arrow left pull-up"></span>
              <span class="text-muted m-l-sm pull-right">
                <?=date('M d, Y h:i a', strtotime($ProjectComment['created']))?>
              </span>
              <a href></a>
              <?=$ProjectComment['message']?>                      
            </div>
          </div>
        </div>

      
      