<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-5">
  
<button class="btn m-b-xs w-xl btn-default" data-toggle="modal" data-target="#ModeladdProject"> <i class="glyphicon glyphicon-plus"></i>Create New Project</button>
<div class="panel panel-default">
        <div class="panel-heading">
          <h4> Projects </h4>                  
        </div>
        <div class="panel-body">
        <?php if(count($Projects) == 0 ){?>
        
      <div class="alert alert-success">
        <p>No project have been created yet!</p>
      </div>
	  
      <?php }else{?>
      
      
      
      
	  <?php 
	  $color_class = ['1' =>'text-info','2' =>'text-primary','3' =>'text-success','4' =>'text-muted'];
	  $counter = 0 ;
	  foreach($Projects as $Project){
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
                    <a href = "<?=$site_url?>requirments/index/<?=$Project['id']?>" >
                    Requirments 
                    </a>
                    </span>
                </div>
                <div class="media-body">                        
                    <a href = "#" class="h4" onClick="getDetail('<?=$Project['id']?>')" ><i class="fa fa-fw fa-circle <?=$color_class[$counter]?>"></i><?=$Project['name']?></a>
                    <small class="block m-t-xs"></small>
                    <em class="text-xs"> Muzammil Created on <span class="text-danger"><?=date('M d, Y', strtotime($Project['created']))?></span></em>
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
			},
		success:function(data) {
			$('#divProjectDetail').html(data);
		}
  });
  return false;

}
</script>  


      
      