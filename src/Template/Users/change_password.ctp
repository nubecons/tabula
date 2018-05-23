<?php $site_url = $this->Url->build('/',true); ?> 
<div class="wrapper-md col-sm-7" >
  
  
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      Change Password 
    </div>
    <div class="panel-body">
      
        <?php echo $this->Form->create($user, ["class" => "form-horizontal" , 'enctype' => 'multipart/form-data']); ?>
       
        <div class="form-group">
          <label class="col-sm-4 control-label" for="input-id-1">Enter Existing Password</label>
          <div class="col-sm-8">
            <?php echo $this->Form->input('old_password', ['class'=>'form-control' ,'required' => true,'label'=>false,'div'=>false,'type'=>'password']); ?>
          </div>
        </div>
        
         <div class="form-group">
          <label class="col-sm-4 control-label" for="input-id-1">Enter New Password</label>
          <div class="col-sm-8">
           <?php echo $this->Form->input('new_password', ['class'=>'form-control' ,'required' => true,'label'=>false,'div'=>false,'type'=>'password']); ?>
          </div>
        </div>
        
         <div class="form-group">
          <label class="col-sm-4 control-label" for="input-id-1">Re-type New Password</label>
          <div class="col-sm-8">
           <?php echo $this->Form->input('confirm_password', ['class'=>'form-control' ,'required' => true ,'label'=>false,'div'=>false,'type'=>'password']); ?>
          </div>
        </div>
        
        
      
        <div class="line line-dashed b-b line-lg pull-in"></div>
        <div class="form-group">
         <div class="col-sm-2">
         </div>
          <div class="col-sm-6 col-sm-offset-2">
           
            <button type="submit" class="btn btn-primary">Change Password</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
