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
  <div class="col">
    <div class="wrapper">
      <ul class="timeline">
        <li class="tl-header">
          <div class="btn btn-info">Now</div>
        </li>
        <li class="tl-item">
          <div class="tl-wrap b-info">
            <span class="tl-date">5s ago</span>
            <div class="tl-content">
              Just a title
            </div>
          </div>
        </li>
        <li class="tl-item">
          <div class="tl-wrap">
            <span class="tl-date">2h ago</span>
            <div class="tl-content panel padder b-a">
              <span class="arrow left pull-up"></span>
              <div>Content in a panel</div>
            </div>
          </div>
        </li>
        <li class="tl-item tl-left">
          <div class="tl-wrap b-success">
            <span class="tl-date">7:30 am</span>
            <div class="tl-content panel bg-success padder">
              <span class="arrow arrow-success left pull-up hidden-left"></span>
              <span class="arrow arrow-success right pull-up visible-left"></span>
              <div class="text-lt">Oh! Colorful</div>
            </div>
          </div>
        </li>
        <li class="tl-item">
          <div class="tl-wrap b-primary">
            <span class="tl-date">04.2014</span>
            <div class="tl-content panel padder b-a w-md w-auto-xs">
              <span class="arrow left pull-up"></span>
              <div class="text-lt m-b-sm">With Title</div>
              <div class="panel-body pull-in b-t b-light">
                <a href="" class="thumb pull-right m-l m-t-xs avatar">
                  <img src="img/a4.jpg" alt="...">
                  <i class="on md b-white bottom"></i>
                </a>
                <div class="clear">
                  <a href="" class="text-primary block m-b-xs">@Mike Mcalidek <i class="icon-twitter"></i></a>
                  <a href="" class="btn btn-addon btn-sm btn-primary m-t-xs"><i class="fa fa-eye"></i> Follow</a>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="tl-item tl-left">
          <div class="tl-wrap b-primary">
            <span class="tl-date">04.2014</span>
            <div class="tl-content panel padder b-a block">
              <span class="arrow left pull-up hidden-left"></span>
              <span class="arrow right pull-up visible-left"></span>
              <div class="text-lt m-b-sm">Block</div>
              <div class="panel-body pull-in b-t b-light">
                <p>I'm working on a realy amazing application, It will be available soon. here is a little tease. </p>
                <div class="m-b m-t">                  
                  <a href="" class="avatar thumb-xs m-r-xs">
                    <img src="img/a7.jpg" alt="...">
                    <i class="on b-white left"></i>
                  </a>
                  <a href="" class="avatar thumb-xs m-r-xs">
                    <img src="img/a8.jpg" alt="...">
                    <i class="busy b-white left"></i>
                  </a>
                  <a href="" class="avatar thumb-xs m-r-xs">
                    <img src="img/a9.jpg" alt="...">
                    <i class="away b-white left"></i>
                  </a>
                  <a href="" class="avatar thumb-xs m-r-xs">
                    <img src="img/a10.jpg" alt="...">
                    <i class="on b-white left"></i>
                  </a>
                  <a href="" class="btn btn-success btn-rounded font-bold"> +152 </a>
                  <span class="h5 m-l-sm">Liked</span>              
                </div>
                <div class="panel panel-default m-t-md m-b-n-sm pos-rlt">
                  <span class="arrow top pull-left"></span>
                  <form>
                    <textarea class="form-control no-border" rows="3" placeholder="Your comment..."></textarea>
                  </form>
                  <div class="panel-footer bg-light lter">
                    <button class="btn btn-info pull-right btn-sm">Comment</button>
                    <ul class="nav nav-pills nav-sm">
                      <li><a href=""><i class="fa fa-camera text-muted"></i></a></li>
                      <li><a href=""><i class="fa fa-video-camera text-muted"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>             
            </div>
          </div>
        </li>
        <li class="tl-header">
          <div class="btn btn-sm btn-default btn-rounded">2014</div>
        </li>
        <li class="tl-item">
          <div class="tl-wrap">
            <span class="tl-date">10.08.2013</span>
            <div class="tl-content panel padder b-a">
              <span class="arrow left pull-up hidden-left"></span>
              <span class="arrow right pull-up visible-left"></span>
              <div class="text-lt">A good story to hear.</div>
            </div>
          </div>
        </li>
        <li class="tl-header">
          <div class="btn btn-icon btn-rounded btn-default"><i class="fa fa-twitter"></i></div>
        </li>
        <li class="tl-item tl-left">
          <div class="tl-wrap b-white">
            <span class="tl-date">5.07.2013</span>
            <div class="tl-content panel padder b-a">
              <span class="arrow left pull-up hidden-left"></span>
              <span class="arrow right pull-up visible-left"></span>
              <div class="text-lt">Yesterday is History</div>
            </div>
          </div>
        </li>
        <li class="tl-header">
          <div class="btn btn-sm btn-default btn-rounded">more</div>
        </li>
      </ul>
    </div>
  </div>

      
      </div>

</div>

 