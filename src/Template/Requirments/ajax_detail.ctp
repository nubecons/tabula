<?php $site_url = $this->Url->build('/',true); ?> 
   
     <?php if(!$Requirment){ ?>
      <div class="alert alert-success">
        <p>No Requirment found!</p>
      </div>
      <?php }else{?>
     
     <div class="panel-heading">
  		<h4> <i class="glyphicon glyphicon-list"></i> <?=$Requirment['title']?> </h4>                  
		</div>
     
     <div class="panel-body">
  
          
         <?php /*?>   <i class="glyphicon glyphicon-list"></i> <?=$Requirment['title']?>  &nbsp;&nbsp;
            <i class="glyphicon glyphicon-user"></i> Muzammil
         <?php */?>
          <article class="media">
          <small class="block m-t-xs select_text" >
          <?=$Requirment['description']?>
          </small>
            <div class="media-body">                        
            
              <small class="block m-t-xs"></small>
              <em class="text-xs">Created on <span class="text-danger"><?=date('M d, Y', strtotime($Requirment['created']))?></span></em>
            </div>
       
            <br>
             <div class="panel-body">
          <?php
			foreach($RequirmentComments as $RequirmentComment){
		 ?>		
         
          <?php include('save_comment.ctp');?>
			
            
            <?php
			 } ?>
             
               <div id="comments_div">
        
        		</div>
             
            </div>
         
            <div class="panel panel-default m-t-md m-b-n-sm pos-rlt">
                 <form role="form" id="form_addComment" >
                  <input type="hidden" class="form-control" name="project_id" value="<?=$Requirment['project_id']?>" >
                  <input type="hidden" class="form-control" name="requirment_id" value="<?=$Requirment['id']?>" >
                  <textarea class="form-control no-border" rows="2" name="message" placeholder="Your comment..."></textarea>
                
                <div class="panel-footer bg-light lter">
                  <button type="button"  class="btn btn-sm btn-warning pull-right btnload btn_loader"  >
                  	<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Working...
                   </button>
                  <button type="button"  class="btn btn-info pull-right btn-sm btn_submit"  >Comment</button>

                  <ul class="nav nav-pills nav-sm">
                  <?php /*?> <li><button type="button" class="btn btn-primary btn-addon btn-sm" data-toggle="modal" data-target="#AddFollowers"><i class="fa fa-plus"></i>Followers</button><?php */?>
				 
				   <?php /*?><i class="fa fa-camera text-muted"></i><?php */?></li>
                   <?php /*?>  <li><a href><i class="fa fa-video-camera text-muted"></i></li><?php */?>
                  </ul>
                </div>
                </form>
              </div>
           </article>
        </div>
        
        
     <?php }?>  
        <link rel="stylesheet" href="<?=$site_url?>css/datepicker.css" type="text/css" />
        <script src="<?=$site_url?>libs/jquery/bootstrap-datepicker/bootstrap-datepicker.js"></script> 
        
		
		<script>
		/* repeaded funcion which need on this page */
			function RequirmentReady(){
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
				
				
		
			if(confirm("Do you want to create task")){
				$('#AddTask').modal('show');
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
		
		 RequirmentReady();
		
		/* add requirment */
		$('#form_AddTask  .btn_submit').click(
		 addTask();
		/*function(e) {
			
			if($('#form_AddTask [name=title]').val() == '')
			   {
				alert('Pleae enter title');   
				return;
				}
			if($('#form_AddTask [name=description]').val() == '')
			   {
				alert('Pleae enter description');   
				return;
				}	
				
		  
		  e.preventDefault();
		  var dataString = $( '#form_AddTask' ).serialize();
		  $.ajax({
				type:'POST',
				data:dataString,
				url:'<?=$site_url?>requirments/saveTask',
				beforeSend: function() {
					$('#form_AddTask .btn_submit').hide();
					$('#form_AddTask .btn_loader').show();
					},
				success:function(data) {
					
					$('#form_AddTask .btn_submit').show();
						$('#form_AddTask .btn_loader').hide();
					
				if(data == 'false')
				   {
						
						 alert('Task could not created');
				   }else{
					   
					   $('#AddTask').modal('hide');
					   alert('Task created successfully.');
						//window.location.href = '<?=$site_url?>Projects/index/'+data; 	   
				  }
				  
				}
			  });
			  return false;
			}*/);
		/* add requirment */	

		
		/* add comment */
		$('#form_addComment .btn_submit').click(function(e) {
			
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
				url:'<?=$site_url?>requirments/saveComment',
				beforeSend: function() {
					
					$('#form_addComment .btn_submit').hide();
					$('#form_addComment .btn_loader').show();
					
					},
					
				success:function(data) {
					
					$('#form_addComment .btn_submit').show();
					$('#form_addComment .btn_loader').hide();
					
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
	
		$('#dp3').datepicker();
	
	});
	
	
	
	</script>
    
    
    
    
        
        
    