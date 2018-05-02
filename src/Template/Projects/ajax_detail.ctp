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
  
          
            <i class="glyphicon glyphicon-th"></i> <?=$Project['name']?>  &nbsp;&nbsp;
            <i class="glyphicon glyphicon-user"></i> Muzammil
         
          <article class="media">
          <small class="block m-t-xs select_text" >
          <?=$Project['description']?>
          </small>
            <div class="media-body">                        
            
              <small class="block m-t-xs"></small>
              <em class="text-xs"> Muzammil Created on <span class="text-danger"><?=date('M d, Y', strtotime($Project['created']))?></span></em>
            </div>
            <br>
            <small class="block m-t-xs">  
            Muzammil created task. <span class="text-danger">9:27pm</span> <br>
            Muzammil added to my test project. <span class="text-danger">9:27pm</span><br>
            Muzammil changed the due date to <span class="text-danger">Apr 19.9:27pm</span><br>
            Muzammil assigned to you.<span class="text-danger">9:27pm</span><br>
            Muzammil unassigned from you. <span class="text-danger">9:27pm</span><br>
            </small>
            <br>
            <div class="m-l-lg">
          <a class="pull-left thumb-sm avatar">
            <img src="<?=$site_url?>img/a5.jpg" alt="...">
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
            <img src="<?=$site_url?>img/a5.jpg" alt="...">
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
            <img src="<?=$site_url?>img/a5.jpg" alt="...">
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
     <?php }?>   
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