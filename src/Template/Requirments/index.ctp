<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-5">
  
<button class="btn m-b-xs w-xl btn-default" data-toggle="modal" data-target="#AddReq"> <i class="glyphicon glyphicon-plus"></i>Create New Requirement</button>
<div class="panel panel-default">
        <div class="panel-heading">
          <h4> Requirments </h4>                  
        </div>
        <div class="panel-body">
        <?php if(count($Requirments) == 0 ){?>
        
      <div class="alert alert-success">
        <p>No Requirment have been created yet!</p>
      </div>
	  
      <?php }else{?>
      
      
      
      
	  <?php 
	  $color_class = ['1' =>'text-info','2' =>'text-primary','3' =>'text-success','4' =>'text-muted'];
	  $counter = 0 ;
	  foreach($Requirments as $Requirment){
		   $counter =  $counter + 1 ;
		    
		  ?>
            <article class="media">
              <?php /*?>  <div class="pull-right">
				
                    <span class="fa-lg">
                    <a href = "<?=$site_url?>requirments/index/<?=$Requirment['id']?>" >
                    Requirments 
                    </a>
                    </span>
                </div><?php */?>
                <div class="media-body">                        
                    <a href = "#" class="h4" onClick="getDetail('<?=$Requirment['id']?>')" ><i class="fa fa-fw fa-circle <?=$color_class[$counter]?>"></i><?=$Requirment['title']?></a>
                    <small class="block m-t-xs"> </small>
                  
                    <em class="text-xs">Project: <span class="label bg-primary m-t-xs"><?=$Requirment['project']['name']?></span></em>
                     &nbsp;
                    <em class="text-success"><i class="fa fa-level-up"> Heath:</i> 20%</em>
                     &nbsp;
                    <em class="text-xs  pull-right">Created on <span class="text-danger"><?=date('M d, Y', strtotime($Requirment['created']))?></span></em>
                   
                    
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
                <h4 class="modal-title">Add Requirment</h4>
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
        
 <?php /*?><script src="<?=$site_url?>libs/jquery/bootstrap/dist/js/daterangepicker.js"></script>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script><?php */?>
 <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
	
	/* add requirment */
$('#form_addRequirment .btn_submit').click(function(e) {
	if($('#form_addRequirment [name=project_id]').val() == '')
	   {
		alert('Pleae select project');   
		return;
		}
	if($('#form_addRequirment [name=title]').val() == '')
	   {
		alert('Pleae enter title');   
		return;
		}
	if($('#form_addRequirment [name=description]').val() == '')
	   {
		alert('Pleae enter description');   
		return;
		}	
		
  
  e.preventDefault();
  var dataString = $( '#form_addRequirment' ).serialize();
  $.ajax({
		type:'POST',
		data:dataString,
		url:'<?=$site_url?>requirments/saveData',
		beforeSend: function() {
			$('#form_addRequirment .btn_submit').hide();
			$('#form_addRequirment .btn_loader').show();
			},
		success:function(data) {
		if(data == 'false')
		   {
				$('#form_addRequirment .btn_submit').show();
				$('#form_addRequirment .btn_loader').hide();
				 alert('Requirment could not created');
		   }else{
			   
			   $('#AddReq').modal('hide');
			  // alert('Requirment created successfully.');
			   // window.location.href = '<?=$site_url?>requiments/index/'+data; 	   
			   location.reload();
	      }
		  
		}
	  });
	  return false;
	});
/* add requirment */	
});
</script>      
<script>
	
function getDetail(id){
	
 
  $.ajax({
		type:'POST',
		
		url:'<?=$site_url?>requirments/ajax_detail/'+id,
		beforeSend: function() {
		//	$('#btn_addProject').hide();
		//	$('#btn_addProject_load').show();
			},
		success:function(data) {
			$('#divRequirmentDetail').html(data);
		}
  });
  return false;

}


</script>  


      
      