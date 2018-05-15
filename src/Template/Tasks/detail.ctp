<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-7">
  

<div class="panel panel-default">
        <div class="panel-heading">
          <h4> <?=$Task['title']?> </h4>                  
        </div>
        <div class="panel-body">
      
      
           <?php if(!$Task){ ?>
      <div class="alert alert-success">
        <p>No task found!</p>
      </div>
      <?php }else{?>
     
     <div class="panel-body">
          <article class="media">
          <small class="block m-t-xs select_text" >
          <?=$Task['description']?>
          </small>
            <div class="media-body">                        
            
              <small class="block m-t-xs"></small>
              <em class="text-xs">  Created on <span class="text-danger"><?=date('M d, Y', strtotime($Task['created']))?></span></em>
            </div>
            <br>
        
            <br>
          
          <div class="panel-body">
          <?php
			foreach($TaskComments as $TaskComment){
		 ?>		
         
          <?php include('save_comment.ctp');?>
			
            
            <?php
			 } ?>
             
               <div id="comments_div">
        
        		</div>
             
            </div>
        
         <div class="panel b-a bg-light ">
        
            <div class="panel panel-default m-t-md m-b-n-sm pos-rlt">
                 <form role="form" id="form_addComment" >
                 <select><option>asdad</option></select>
                 <input type="hidden" class="form-control" name="task_id" value="<?=$Task['id']?>" >
                 <input type="hidden" class="form-control" name="project_id" value="<?=$Task['project_id']?>" >
                 <input type="hidden" class="form-control" name="requirment_id" value="<?=$Task['id']?>" >
                 
                 <textarea class="form-control no-border" rows="2" name="message" placeholder="Your comment..."></textarea>
                
                <div class="panel-footer bg-light lter">
                  <button type="button"  class="btn btn-sm btn-warning pull-right btnload btn_loader"  >
                  	<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Working...
                   </button>
                  <button type="button"  class="btn btn-info pull-right btn-sm btn_submit"  >Comment</button>
                  <br> <br>
                </div>
                </form>
              </div>
              
        </div>      
              
              
           </article>
        </div>
        
        
     <?php }?>   
        <script>
		$(document).ready(function() {
		


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
		url:'<?=$site_url?>tasks/saveComment',
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
				
				
			  
			   }
		}
	  });
	  
	  return false;
	  
	});
	

    /*add comment*/	
	
	});
	
	
	
	</script> 
          
          
       
       
        </div>
      </div>
      
      </div>
    
     <div class="col-sm-5">
  

      
      </div>

</div>

 