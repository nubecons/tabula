<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-5">
  
<button class="btn m-b-xs w-xl btn-default" data-toggle="modal" data-target="#ModeladdProject"> <i class="glyphicon glyphicon-plus"></i></button>
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
	  <?php foreach($Projects as $Project){?>
            <article class="media">
                <div class="pull-right">
					<?php /*?>  <div class="pull-left">
                    <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-bold fa-stack-1x text-white"></i>
                    </span>
                    </div><?php */?>
                    <span class="fa-stack fa-lg" data-toggle="modal" data-target="#AddReq">
                    Edit 
                    </span>
                </div>
                <div class="media-body">                        
                    <a href = "#" class="h4" onClick="getDetail('<?=$Project['id']?>')" ><?=$Project['name']?></a>
                    <small class="block m-t-xs"></small>
                    <em class="text-xs"> Muzammil Created on <span class="text-danger"><?=date('M d, Y', strtotime($Project['created']))?></span></em>
                </div>
            </article>
           <?php }?>
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


      
 <div id="AddReq" class="modal fade" role="dialog">
          <div class="modal-dialog" style="width:500px">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Requirment</h4>
              </div>
              <div class="modal-body">
                <form role="form">
            <div class="form-group">
              <label>Select Project</label>
               <select class="form-control" >
                <option> Project 1 </option>
                <option> Project 2 </option>
                <option> Project 2 </option>
               </select>
             
            </div>
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" >
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" id="req_field"></textarea>
            </div>
           
           
            <div class="form-group">
              <label>Followres</label>
             <select class="form-control" multiple >
                <option> User 1 </option>
                <option> User 2 </option>
                <option> User 3 </option>
               </select>
            </div>
           
           
        
            <button type="submit" class="btn btn-sm btn-primary"  data-dismiss="modal">Submit</button>
          </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
          </div>
        </div>     