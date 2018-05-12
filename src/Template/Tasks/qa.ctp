<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-5">
  

<div class="panel panel-default">
        <div class="panel-heading">
          <h4> QA Varification </h4>                  
        </div>
        <div class="panel-body">
        <?php if(count($Tasks) == 0 ){?>
        
      <div class="alert alert-success">
        <p>No task have been created yet!</p>
      </div>
	  
      <?php }else{?>
      
      
      
      
	  <?php 
	  $color_class = ['1' =>'text-info','2' =>'text-primary','3' =>'text-success','4' =>'text-muted'];
	  $counter = 0 ;
	  foreach($Tasks as $Task){
		   $counter =  $counter + 1 ;
		    
		  ?>
            <article class="media">
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
                    <a href = "#" class="h4" onClick="getDetail('<?=$Task['id']?>')" ><i class="fa fa-fw fa-circle <?=$color_class[$counter]?>"></i><?=$Task['title']?></a>
                    <small class="block m-t-xs"></small>
                    <em class="text-xs"> Muzammil Created on <span class="text-danger"><?=date('M d, Y', strtotime($Task['created']))?></span></em>
                </div>
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
     <div class="panel panel-default" id="divProjectDetail" <?php /*?>style="display:none"<?php */?>>
       
      </div>
      
      </div>

</div>
      
<script>
	
function getDetail(id){
	
 
  $.ajax({
		type:'POST',
		
		url:'<?=$site_url?>projects/ajax_detail/'+id,
		beforeSend: function() {
		//	$('#btn_addProject').hide();
		//	$('#btn_addProject_load').show();
			},
		success:function(data) {
			$('#divProjectDetail').html(data);
		}
  });
  return false;

}


</script>  


      
      