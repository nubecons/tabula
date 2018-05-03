<?php $site_url = $this->Url->build('/',true); ?> 
<div class="row">
    <div class="col-sm-12">
  
        
<button class="btn m-b-xs w-xl btn-default" data-toggle="modal" data-target="#AddUser"> <i class="glyphicon glyphicon-plus"></i>Create New User</button>
<div class="btn-group pull-right">
	          <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-list"></i></button>
	          <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-blackboard"></i></button>
	        </div>
      <div class="panel panel-default">
    <div class="panel-heading">
      Users
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr> 
<!--  <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>-->
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Created</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
		 foreach($Users as $user) {
	      ?>
          <tr>
            <!--<td><label class="i-checks m-b-none"><input name="post[]" type="checkbox"><i></i></label></td>-->
            <td><?=$user['first_name']?></td>
            <td><?=$user['last_name']?></td>
            <td><?=$user['email']?></td>
            <td><?=date('M d, Y', strtotime($user['created']))?></td>
            <td>
                 <div class="btn-group">
                       <a href="#" data-toggle="tooltip" title="Update"> <button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-pencil"></i></button></a>
                       <?php /*?><a href="#" data-toggle="tooltip" title="Task Detail"><button type="button" class="btn btn-sm btn-bg btn-default"><i class="glyphicon glyphicon-blackboard"></i></button></a><?php */?>

	        </div>
            </td>
          </tr>
          <?php }?>
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

      
   

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>