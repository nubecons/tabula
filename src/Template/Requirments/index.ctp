<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-5">
  
<button class="btn m-b-xs w-xl btn-default" data-toggle="modal" data-target="#AddReq"> <i class="glyphicon glyphicon-plus"></i></button>
<div class="panel panel-default">
        <div class="panel-heading">
          <h4> Requirments </h4>                  
        </div>
        <div class="panel-body">
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
              <a href = "#" class="h4" onClick="$('#ReqDetail').show()" >First Requirment</a>
              <small class="block m-t-xs"></small>
              <em class="text-xs"> Muzammil Posted on <span class="text-danger">April 30, 2018</span></em>
            </div>
           
           </article>
           
           <article class="media">
             <div class="pull-right">
              <span class="fa-stack fa-lg" data-toggle="modal" data-target="#AddReq">
               Edit 
              </span>
            </div>
            <div class="media-body">                        
              <a href = "#" class="h4" onClick="$('#ReqDetail').show()" > Requirment 2</a>
              <small class="block m-t-xs"></small>
              <em class="text-xs"> Muzammil Posted on <span class="text-danger">April 30, 2018</span></em>
            </div>
          </article>
          
            <article class="media">
             <div class="pull-right">
              <span class="fa-stack fa-lg" data-toggle="modal" data-target="#AddReq">
               Edit 
              </span>
            </div>
            <div class="media-body">                        
               <a href = "#" class="h4" onClick="$('#ReqDetail').show()" > Requirment 3</a>
              <small class="block m-t-xs"></small>
              <em class="text-xs"> Muzammil Posted on <span class="text-danger">April 30, 2018</span></em>
            </div>
          </article>
          
            <article class="media">
             <div class="pull-right">
              <span class="fa-stack fa-lg" data-toggle="modal" data-target="#AddReq">
               Edit 
              </span>
            </div>
            <div class="media-body">                        
              <a href = "#" class="h4" onClick="$('#ReqDetail').show()" > Requirment 4</a>
              <small class="block m-t-xs"></small>
              <em class="text-xs"> Muzammil Posted on <span class="text-danger">April 30, 2018</span></em>
            </div>
          </article>
          
       
       
        </div>
      </div>
      
      </div>
    
     <div class="col-sm-7">
  
<br> <br>
<div class="panel panel-default" id="ReqDetail" <?php /*?>style="display:none"<?php */?>>
        <div class="panel-heading">
          <h4> First Requirment </h4>                  
        </div>
        <div class="panel-body">
  
          
            <i class="glyphicon glyphicon-th"></i> Project 1  &nbsp;&nbsp;
            <i class="glyphicon glyphicon-user"></i> Muzammil
         
          <article class="media">
          <small class="block m-t-xs select_text" >it is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose </small>
            <div class="media-body">                        
            
              <small class="block m-t-xs"></small>
              <em class="text-xs"> Muzammil Posted on <span class="text-danger">April 30, 2018</span></em>
            </div>
            <br>
            <small class="block m-t-xs">  
            Muzammil Shabir created task. <span class="text-danger">9:27pm</span> <br>
            Muzammil Shabir added to my test project. <span class="text-danger">9:27pm</span><br>
            Muzammil Shabir changed the due date to <span class="text-danger">Apr 19.9:27pm</span><br>
            Muzammil Shabir assigned to you.<span class="text-danger">9:27pm</span><br>
            Muzammil Shabir unassigned from you. <span class="text-danger">9:27pm</span><br>
            </small>
            <br>
            <div class="m-l-lg">
          <a class="pull-left thumb-sm avatar">
            <img src="img/a5.jpg" alt="...">
          </a>          
          <div class="m-l-xxl panel b-a">
            <div class="panel-heading pos-rlt">
              <span class="arrow left pull-up"></span>
              <span class="text-muted m-l-sm pull-right">
                10 m ago
              </span>
              <a href>Muzammil</a>
              good work!!                       
            </div>
          </div>
        </div>
        
        <div class="m-l-lg">
          <a class="pull-left thumb-sm avatar">
            <img src="img/a5.jpg" alt="...">
          </a>          
          <div class="m-l-xxl panel b-a">
            <div class="panel-heading pos-rlt">
              <span class="arrow left pull-up"></span>
              <span class="text-muted m-l-sm pull-right">
                15 m ago
              </span>
              <a href>Muzammil</a>
               this  is helpful                           
            </div>
          </div>
        </div>
        
        <div class="m-l-lg">
          <a class="pull-left thumb-sm avatar">
            <img src="img/a5.jpg" alt="...">
          </a>          
          <div class="m-l-xxl panel b-a">
            <div class="panel-heading pos-rlt">
              <span class="arrow left pull-up"></span>
              <span class="text-muted m-l-sm pull-right">
                30 m ago
              </span>
              <a href>Muzammil</a>
             test comment 1                         
            </div>
          </div>
        </div>
            <div class="panel panel-default m-t-md m-b-n-sm pos-rlt">
                <form>
                  <textarea class="form-control no-border" rows="2" placeholder="Your comment..."></textarea>
                </form>
                <div class="panel-footer bg-light lter">
                  <button class="btn btn-info pull-right btn-sm">Comment</button>
                  <ul class="nav nav-pills nav-sm">
                   <li><button class="btn btn-primary btn-addon btn-sm"><i class="fa fa-plus"></i>Followers</button>
				 </a>   
				   <?php /*?><i class="fa fa-camera text-muted"></i><?php */?></li>
                   <?php /*?>  <li><a href><i class="fa fa-video-camera text-muted"></i></a></li><?php */?>
                  </ul>
                </div>
              </div>
           </article>
           
         
          
       
       
        </div>
      </div>
      
      </div>

</div>
      
<script>
	
	
	$(document).ready(function() {
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
			
			if(confirm("Do you want to create requirment")){
				$('#AddReq').modal('show');
				$('#req_field').val(mytext);
				}
		});
	});

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