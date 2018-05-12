<?php $site_url = $this->Url->build('/',true); ?> 
   
     <?php if(!$Project){ ?>
      <div class="alert alert-success">
        <p>No project found!</p>
      </div>
      <?php }else{?>
     
     <div class="panel-heading">
  		<h4> <i class="glyphicon glyphicon-th"></i> <?=$Project['name']?> </h4>                  
		</div>
     
     <div class="panel-body">
  
          
           <?php /*?>  <i class="glyphicon glyphicon-th"></i> <?=$Project['name']?>  &nbsp;&nbsp;
           <i class="glyphicon glyphicon-user"></i> <?php */?>
         
          <article class="media">
          <small class="block m-t-xs select_text" >
          <?=$Project['description']?>
          </small>
            <div class="media-body">                        
           
              <small class="block m-t-xs"></small>
              <em class="text-xs"> Created on <span class="text-danger"><?=date('M d, Y', strtotime($Project['created']))?></span></em>
            </div>
            <br>
           <?php /*?> <small class="block m-t-xs">  
            Muzammil created task. <span class="text-danger">9:27pm</span> <br>
            Muzammil added to my test project. <span class="text-danger">9:27pm</span><br>
            Muzammil changed the due date to <span class="text-danger">Apr 19.9:27pm</span><br>
            Muzammil assigned to you.<span class="text-danger">9:27pm</span><br>
            Muzammil unassigned from you. <span class="text-danger">9:27pm</span><br>
            </small><?php */?>
            <br>
            
            <div class="panel-body">
          <?php
			foreach($ProjectComments as $ProjectComment){
		 ?>		
         
          <?php include('save_comment.ctp');?>
			
            
            <?php
			 } ?>
             
               <div id="comments_div">
        
        		</div>
             
            </div>
           
			
      
        
            <div class="panel panel-default m-t-md m-b-n-sm pos-rlt">
                 <form role="form" id="form_addComment" >
                 <input type="hidden" class="form-control" name="project_id" value="<?=$Project['id']?>" >
                  <textarea class="form-control no-border" rows="2" name="message" placeholder="Your comment..."></textarea>
                
                <div class="panel-footer bg-light lter">
                  <button type="button"  class="btn btn-sm btn-warning pull-right btnload"  id="btn_loader">
                  	<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Working...
                   </button>
                  <button type="button"  class="btn btn-info pull-right btn-sm"  id="btn_submit">Comment</button>

                  <ul class="nav nav-pills nav-sm">
                  <?php
				   if($Project['user_id'] == $sUser['id']){?>
                   <li><button type="button" class="btn btn-primary btn-addon btn-sm" data-toggle="modal" data-target="#AddFollowers"><i class="fa fa-plus"></i>Followers</button>
				   <?php }?>
				   <?php /*?><i class="fa fa-camera text-muted"></i><?php */?></li>
                   <?php /*?>  <li><a href><i class="fa fa-video-camera text-muted"></i></li><?php */?>
                  </ul>
                </div>
                </form>
              </div>
           </article>
        </div>
        
        
     <?php }?>   
 
 
 <script>

/* repeaded funcion which need on this page */
function ProjectReady(){
	
	/* select text */
	$('.select_text').bind("mouseup", function() {

			if (!window.x) {
					x = {};
				}
			
				x.Selector = {};
				x.Selector.getSelected = function() {
					var t = '';
					if (window.getSelection) {
						t = window.getSelection();
					} else if (document.getSelection) {
						t = document.getSelection();
					} else if (document.selection) {
						t = document.selection.createRange().text;
					}
					return t;
				}
			var mytext = x.Selector.getSelected();
			if(mytext != ''){
				
				
		
			if(confirm("Do you want to create requirment")){
				$('#AddReq').modal('show');
				$('#req_field').val(mytext);
				$('#req_field1').val(mytext.toString().substring(0, 5));
				
				}
			}
		});
	/*end select text*/
	
	
	
	/*Tool Tip*/	
	 $('[data-toggle="tooltip"]').tooltip();
	 /* end Tool Tip*/

  } 
   
   $(document).ready(function() {
	    
		/* Calling ready function */
	 	ProjectReady();
		
		
	/* add requirment */
	$('#form_addRequirment [id=btn_submit]').click(function(e) {
	
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
			$('#form_addRequirment [id=btn_submit]').hide();
			$('#form_addRequirment [id=btn_loader]').show();
			},
		success:function(data) {
			$('#form_addRequirment [id=btn_submit]').show();
				$('#form_addRequirment [id=btn_loader]').hide();
		if(data == 'false')
		   {
				
				 alert('Requirment could not created');
		   }else{
			   
			   $('#AddReq').modal('hide');
			   alert('Requirment created successfully.');
				//window.location.href = '<?=$site_url?>Projects/index/'+data; 	   
	      }
		  
		}
	  });
	  return false;
	});
	/* end add requirment */
	
	
	/* add comment */
	$('#form_addComment [id=btn_submit]').click(function(e) {
	
	if($('#form_addComment [name=message]').val() == '')
	   {
		alert('Pleae enter comment');   
		return;
	   }
		
  
  e.preventDefault();
  var dataString = $( '#form_addComment' ).serialize();

  $.ajax({
		type:'POST',
		data:dataString,
		url:'<?=$site_url?>projects/saveComment',
		beforeSend: function() {
			
			$('#form_addComment [id=btn_submit]').hide();
			$('#form_addComment [id=btn_loader]').show();
			
			},
			
		success:function(data) {
			
			$('#form_addComment [id=btn_submit]').show();
			$('#form_addComment [id=btn_loader]').hide();
			
			if(data == 'false')
			   {
				 alert('Comments could not created');
			   
			   }else{
				   
				$('#form_addComment [name=message]').val('');
				$( "#comments_div" ).append( data );
				
				//alert('Comments created successfully.');
				//window.location.href = '<?=$site_url?>Projects/index/'+data; 	   
			  
			   }
		}
	  });
	  
	  return false;
	  
	});
	/* end add comment*/		
	
	/* add Follower */
	$('#form_AddFollowers [id=btn_submit]').click(function(e) {
	
	
  
  e.preventDefault();
  var dataString = $( '#form_AddFollowers' ).serialize();
  
  $.ajax({
		type:'POST',
		data:dataString,
		url:'<?=$site_url?>projects/saveFollowers',
		beforeSend: function() {
		
			$('#form_AddFollowers [id=btn_submit]').hide();
			$('#form_AddFollowers [id=btn_loader]').show();
			
			},
			
		success:function(data) {
			
			$('#form_AddFollowers [id=btn_submit]').show();
			$('#form_AddFollowers [id=btn_loader]').hide();
			
			if(data == 'false')
			   {
				 alert('Followers could not updated');
			   
			   }else{
				   
				//$('#form_AddFollowers [name=message]').val('');
				
				 $('#AddFollowers').modal('hide');
				
			   }
		}
	  });
	  
	  return false;
	  
	});	
	/* end add Follower */
    
		
		});
	
	
	
	</script>
    
  
    <div id="AddReq" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
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
             <?php /*?>  <select class="form-control" >
                <option> Project 1 </option>
                <option> Project 2 </option>
                <option> Project 2 </option>
               </select><?php */?>
               <?=$Project['name']?>
                <input type="hidden" class="form-control" name="project_id" value="<?=$Project['id']?>" >
             
            </div>
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" name="title" id="req_field1" >
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea class="form-control" id="req_field" name="description"></textarea>
            </div>
           
           
          <?php /*?>  <div class="form-group">
              <label>Followres</label>
             <select class="form-control" multiple >
                <option> User 1 </option>
                <option> User 2 </option>
                <option> User 3 </option>
               </select>
            </div>
           <?php */?>
           
        
             
            <button type="button"  class="btn btn-sm btn-warning btnload"  id="btn_loader"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Working...</button>
            <button type="button" class="btn btn-sm btn-primary" id="btn_submit">Submit</button>

          </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
          </div>
        </div>
        
   <div id="AddFollowers" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Project Followers</h4>
              </div>
              <div class="modal-body">
               <form role="form" id="form_AddFollowers" >
            <div class="form-group">
              <label><strong> Project:  </strong></label>
            
               <?=$Project['name']?>
                <input type="hidden" class="form-control" name="project_id" value="<?=$Project['id']?>" >
             
            </div>
           
            <div class="form-group">
              <label><strong>Followers:</strong></label>
                <?php echo $this->Form->input('follower_id', [ 'multiple' => 'checkbox','default' =>$ProjectFollowers, 'options' => $TeamMembers,  'label' =>false,]); ?>
            </div>
          
            <button type="button"  class="btn btn-sm btn-warning btnload"  id="btn_loader"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Working...</button>
            <button type="button" class="btn btn-sm btn-primary" id="btn_submit">Save</button>

          </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
          </div>
   </div>    
    