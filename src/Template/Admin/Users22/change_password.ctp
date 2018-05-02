<?php $this->assign('title','Central Signing Service &ndash; Change Password'); ?>
<?php $Site_url = $this->Url->build('/',true); ?>


<style>
.error-message{
	clear:both;
	font-size:10px;
	font-weight:100;
	text-align:center;
	}
</style>


<div class="adminright compication_invoicepage edit-add-com-page adm-change-pw"> 
    <strong class="adminstr">Change Password</strong>
          <span class="error"><?= $this->Flash->render('message') ?></span>
		   <?php if($error != '') { ?>
         	<span class="error"><?= $error ?></span>
         	<?php }?>
          <?php echo $this->Form->create($user, array( "class"=>"cp_form"  , 'type'=>'file'));?>
          <input type="hidden" name="submit_pwd" value="1">
          <input type="hidden" name="userID" value="{$userID}">
          <input type="hidden" name="returnto" value="{$returnto}">
          <div class="asd-hafl-right comp-fields"><strong class="portal-label">User Name</strong>
              <p><?=$user->first_name .' '.$user->last_name ?> </p>
           <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
            <div class="asd-hafl-right comp-fields"><strong class="portal-label">Enter New Password:</strong>
              <?php echo $this->Form->input('new_password',array('required' => true , 'class'=>'fst_name blue_inp','label'=>false,'div'=>false,'type'=>'password'));?>
            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                <div class="asd-hafl-right comp-fields">
                <strong class="portal-label">Re-type New Password:</strong>
               <?php echo $this->Form->input('confirm_password',array('required' => true , 'class'=>'fst_name blue_inp','label'=>false,'div'=>false,'type'=>'password'));?>
          	  <div class="clearfix"></div>
                        </div>
                 <div class="clearfix"></div>
          </form>
          <div class="edit-com-btn"><a class="sub_req_btn app-repbtn" href="#" onclick="document.forms[0].submit(); return false">Submit</a> </div>
          </div>



