<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-12">
  
        
<button class="btn m-b-xs w-xl btn-default" data-toggle="modal" data-target="#AddReq"> <i class="glyphicon glyphicon-plus"></i>Create New Requirement</button>
<div class="btn-group pull-right">
	          <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-list"></i></button>
	          <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-blackboard"></i></button>
	        </div>
      <div class="panel panel-default">
    <div class="panel-heading">
      Requirements
    </div>
<!--    <div class="row wrapper">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input class="input-sm form-control" placeholder="Search" type="text">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>-->
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
<!--            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>-->
            <th>Requirement</th>
            <th>Design Task</th>
            <th>QA Tasks</th>
            <th>Project</th>
            <th>Health</th>
            <th style="width:30px;">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
		 foreach($Requirments as $Requirment) {
	      ?>
          <tr>
            <!--<td><label class="i-checks m-b-none"><input name="post[]" type="checkbox"><i></i></label></td>-->
            <td><?=$Requirment['title']?></td>
            <td><span class="label bg-danger pull-right m-t-xs">4 Open</span><span class="label bg-primary pull-right m-t-xs">10 in review</span><span class="label bg-warning pull-right m-t-xs">4 in progress</span><span class="label bg-success pull-right m-t-xs">4 left</span></td>
            <td><span class="label bg-danger pull-right m-t-xs">4 Open</span><span class="label bg-primary pull-right m-t-xs">10 in review</span><span class="label bg-warning pull-right m-t-xs">4 in progress</span><span class="label bg-success pull-right m-t-xs">4 left</span></td>
            <td><span class="label bg-primary pull-right m-t-xs">HR</span></td>
            <td class="text-success"><i class="fa fa-level-up"></i> 20%</td>
            <td><div class="btn-group dropdown">
	            <button class="btn btn-default btn-sm btn-bg dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
	              <span class="dropdown-label">Filter</span>                    
	              <span class="caret"></span>
	            </button>
	            <ul class="dropdown-menu text-left text-sm">
                        <li><a  href="#">Edit</a></li>
                      <li><a  href="#">+Create Design Task</a></li>
                      <li><a  href="#">+Create QA Task</a></li>
	            </ul>
	          </div>
            </td>
          </tr>
          <?php }?>

          <tr>
            <!--<td><label class="i-checks m-b-none"><input name="post[]" type="checkbox"><i></i></label></td>-->
            <td>Handling VPS Max Sub Layers in Media 1</td>
            <td><span class="label bg-danger pull-right m-t-xs">4 Open</span><span class="label bg-primary pull-right m-t-xs">10 in review</span><span class="label bg-warning pull-right m-t-xs">4 in progress</span><span class="label bg-success pull-right m-t-xs">4 left</span></td>
            <td><span class="label bg-danger pull-right m-t-xs">4 Open</span><span class="label bg-primary pull-right m-t-xs">10 in review</span><span class="label bg-warning pull-right m-t-xs">4 in progress</span><span class="label bg-success pull-right m-t-xs">4 left</span></td>
            <td><span class="label bg-primary pull-right m-t-xs">HR</span></td>
            <td class="text-success"><i class="fa fa-level-up"></i> 20%</td>
            <td><div class="btn-group dropdown">
	            <button class="btn btn-default btn-sm btn-bg dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
	              <span class="dropdown-label">Filter</span>                    
	              <span class="caret"></span>
	            </button>
	            <ul class="dropdown-menu text-left text-sm">
                        <li><a  href="#">Edit</a></li>
                      <li><a  href="#">+Create Design Task</a></li>
                      <li><a  href="#">+Create QA Task</a></li>
	            </ul>
	          </div>
            </td>
          </tr>
                    <tr>
            <!--<td><label class="i-checks m-b-none"><input name="post[]" type="checkbox"><i></i></label></td>-->
            <td>Requiremnt 1</td>
            <td><span class="label bg-danger pull-right m-t-xs">4 Open</span><span class="label bg-primary pull-right m-t-xs">10 in review</span><span class="label bg-warning pull-right m-t-xs">4 in progress</span><span class="label bg-success pull-right m-t-xs">4 left</span></td>
            <td><span class="label bg-danger pull-right m-t-xs">4 Open</span><span class="label bg-primary pull-right m-t-xs">10 in review</span><span class="label bg-warning pull-right m-t-xs">4 in progress</span><span class="label bg-success pull-right m-t-xs">4 left</span></td>
            <td><span class="label bg-primary pull-right m-t-xs">HR</span></td>
            <td class="text-success"><i class="fa fa-level-up"></i> 20%</td>
            <td><div class="btn-group dropdown">
	            <button class="btn btn-default btn-sm btn-bg dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
	              <span class="dropdown-label">Action</span>                    
	              <span class="caret"></span>
	            </button>
	            <ul class="dropdown-menu text-left text-sm">
                        <li><a  href="#">Edit Requirement</a></li>
                      <li><a  href="#">+Create Design Task</a></li>
                      <li><a  href="#">Design Tasks Detail</a></li>
                      <li><a  href="#">+Create QA Task</a></li>
                      <li><a  href="#">QA Task Detail</a></li>
	            </ul>
	          </div>
            </td>
          </tr>
                    <tr>
            <!--<td><label class="i-checks m-b-none"><input name="post[]" type="checkbox"><i></i></label></td>-->
            <td>Requiremnt 1</td>
            <td><span class="label bg-danger pull-right m-t-xs">4 Open</span><span class="label bg-primary pull-right m-t-xs">10 in review</span><span class="label bg-warning pull-right m-t-xs">4 in progress</span><span class="label bg-success pull-right m-t-xs">4 left</span></td>
            <td><span class="label bg-danger pull-right m-t-xs">4 Open</span><span class="label bg-primary pull-right m-t-xs">10 in review</span><span class="label bg-warning pull-right m-t-xs">4 in progress</span><span class="label bg-success pull-right m-t-xs">4 left</span></td>
            <td><span class="label bg-primary pull-right m-t-xs">HR</span></td>
            <td class="text-success"><i class="fa fa-level-up"></i> 20%</td>
            <td><div class="btn-group dropdown">
	            <button class="btn btn-default btn-sm btn-bg dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
	              <span class="dropdown-label">Filter</span>                    
	              <span class="caret"></span>
	            </button>
	            <ul class="dropdown-menu text-left text-sm">
                        <li><a  href="#">Edit</a></li>
                      <li><a  href="#">+Create Design Task</a></li>
                      <li><a  href="#">+Create QA Task</a></li>
	            </ul>
	          </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-4 hidden-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                  
        </div>
        <div class="col-sm-4 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-4 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
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