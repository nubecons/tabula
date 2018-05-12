<?php $site_url = $this->Url->build('/',true); ?> 
 <?php
    
	if(isset($is_ajax)){

		$commenter = trim($sUser['first_name']. ' '. $sUser['last_name']);

		if($commenter == ''){
			$commenter = trim($sUser['email']);
		}

		$short_name = substr($commenter , 0 ,2);
	
	}else{
     
	 $commenter = trim($ProjectComment['Users']['first_name']. ' '. $ProjectComment['Users']['last_name']);

		if($commenter == ''){
		  $commenter = trim($ProjectComment['Users']['email']);
		}
	
	 $short_name = substr($commenter , 0 ,2);
			
		
		}
	
 	if($ProjectComment['created_by'] == $sUser['id']){
			?>	
            <div class="m-b mt-5">
            <a  class="pull-right thumb-sm avatar"  data-toggle="tooltip" title="You"><button class="btn btn-rounded btn-lg btn-icon btn-default"><?=strtoupper($short_name)?></button></a>
            <div class="m-r-xxl">
              <div class="pos-rlt wrapper bg-light r r-2x">
                <span class="arrow right pull-up arrow-light"></span>
                <p class="m-b-none select_text"><?= nl2br($ProjectComment['message'])?></p>
              </div>
              <em class="text-danger text-xs"> <?=date('M d, Y h:i a', strtotime($ProjectComment['created']))?></em> <br>
            </div>
          </div>         
          	
          <?php }else{ ?>
          <div class="m-b mt-5">
            <a  class="pull-left thumb-sm avatar"  data-toggle="tooltip" title="<?=$commenter?>" >
            <button class="btn btn-rounded btn-lg btn-icon btn-default"><?=strtoupper($short_name)?></button>
           <?php /*?> <img src="img/a2.jpg" alt="..."><?php */?>
        
            </a>
            <div class="m-l-xxl">
              <div class="pos-rlt wrapper b b-light r r-2x">
                <span class="arrow left pull-up"></span>
                <p class="m-b-none select_text"><?= nl2br($ProjectComment['message'])?></p>
              </div>
                 <em class="text-danger text-xs pull-right"> <?=date('M d, Y h:i a', strtotime($ProjectComment['created']))?></em> <br>
            </div>
          </div>
          <?php }?>

   <?php if(isset($is_ajax)){?>
		 <script>
        $(document).ready(function() {
            /* Calling ready function */
            ProjectReady();
        
        });
        </script>
    <?php }?>