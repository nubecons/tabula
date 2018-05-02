<?php $this->assign('title', $title); ?>
<?php $site_url = $this->Url->build('/',true);
?>
<script>
function submit_form(form_id){
	$('#'+form_id).attr('action', '<?=$site_url ?>admin/users/search_result/');
	$('#'+form_id).submit();
	$('#'+form_id).attr('action', '');
	
	}
</script>
 <!--admin right start-->
<?php if($mod == 'maintain_contact'){?>
<div class="adminright radiobutton advancepage">
<?php }else { ?>   
 <div class="wraper portal-page dashboard-wrap admin-wrap adminright admin-client-report src-con-rqprt">
<?php } ?> 
        <div class="admin-heading">
          <div class="admin-icon"> <?php echo $this->Html->image("../images/maintain-contact.png" )?>  </div>
          <h2>
          <?php if($mod == 'maintain_contact'){ echo "Maintain"; }else { echo "Select" ;} ?>
           Contacts</h2>
          <div class="clearfix"></div>
        </div>
        
        
            <span class="error"><?= $this->Flash->render('message') ?></span>
           
           <?php
             if (isset($errors) && $errors != '') {?>
                <span class="errorbig">
                             <?php foreach($errors as $error ){?>
                              <?=$error?><br />
                              <?php }?> <br>
                               </span>
             <?php }?>
             
			 <?php if (isset($messages)) {?>
                <span class="error">
                              <?php foreach ($messages as $message){?>
                               <?=$message?><br />
                              <?php }?> <br>
                               </span>
			<?php }?>
          
          <!--accounting pipeline page start-->
        <div class="accounting-form">
        	<?php echo $this->Form->create('' ,['id' => 'form1', 'class' => "acc_form" ] ); ?>
            <?php echo $this->Form->hidden('mod', [ 'value'=>$mod ]); ?>
            
			<?php /*?><input type="hidden" name="process" value="1">
                      <input type="hidden" name="change_city" value="0"><?php */?>
            
              <div class="accounting-formconttrol">
                	<label class="accounting-label">Name: </label>
                  <div class="admin-fl">
                  		<div class="admin-half">
                        	<label class="light">First</label>
                        	<div class="admin-halfinput">
                            
                             <?php echo $this->Form->text('firstname', [ 'class'=>'fname blue_inp', "size" => "15"]); ?>
                           
</div>
                        </div>
                        <div class="admin-half admin-halfright">
                        	<label class="light">Last</label>
                        	<div class="admin-halfinput">
                            <?php echo $this->Form->text('lastname', [ 'class'=>'lname blue_inp', "size" => "15"]); ?>
                            
              </div>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                   <div class="clearfix"></div>
                </div>
                
                <div class="accounting-formconttrol">
                	<label class="accounting-label">Email: </label>
                  <div class="admin-fl">
                  		<div class="admin-half">
                        	<label class="light"></label>
                        	<div class="admin-halfinput">
                            
                            <?php echo $this->Form->text('email', [ 'class'=>'fname blue_inp', "size" => "15"]); ?>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                   <div class="clearfix"></div>
                </div>
                
                <div class="accounting-formconttrol">
                    <div class="admin-state state-selectwidth">
                    <label class="accounting-label">State:</label>
                    <?php echo $this->Form->select('state',$States,  [ 'empty' => 'All States' , 'class'=>'state',  "onchange" => "this.form.submit();"]);?>
                  
                   <div class="clearfix"></div>                        
                    </div>
                    <div class="city-div">
                    	<label class="accounting-label">Cities:</label>
                        <div class="cities-wraper">
							<div class="admin-half">
                            
                             <?php echo $this->Form->input('city',['id' => 'city' , 'multiple' => true, 'options' => $Cities, "size" => "10" , 'div' => false, 'label' => false ,  "onchange" => "this.form.submit();"]);?>
                            <?php /*?><select id="city" name="city[]" size="10" MULTIPLE onchange="document.forms[0].process.value=0; document.forms[0].change_city.value=1; document.forms[0].submit();">
              		
              		
                  				{html_options  values=$cities output=$cities selected=$city}
                  
                 				 </select><?php */?>
                            </div>
							<div class="admin-half selectall">
                                <p><span class="spacedtext">
                                 <?php  echo $this->Form->checkbox('select_all', [  "id" => "select_all" ,"value" => "1", "onclick" => "$('#city option').prop('selected', $(this).is(':checked')); document.forms[0].submit();" ]); ?>
                                
                                <label for="select_all"><span></span>Select All Cities </label>
                                </span>
                                </p>
                                <div class="clearfix"></div>
                                <p>To individually select multiple cities,<br>
                                CTRL-click while making your selections.</p>                            
                            </div>                      	
                        </div>
                        <div class="clearfix"></div>
                    </div>                    
                </div>
                
                <div class="accounting-formconttrol">
                	<label class="accounting-label">Branch <br/>Office:</label>
                    <div class="admin-fl">
                    
                    <?php
						 
						 if(count($BranchOffices) == 0 ){
							 
							 $BranchOffices = [ '' => '-populates with options once a city is selected-' ];
				   			 
							 }
						 echo $this->Form->select('branchOfficeID',$BranchOffices,  [ 'empty' =>'Any',  'id' => 'branchOfficeID',  "onchange" => "this.form.submit();"]);?>
              
              
             <?php /*?> <select name="branchOfficeID">
              
              {if ($city_branches) } 
              
                  <option value="0">Any</option>
              		{html_options options=$city_branches selected=$branchOfficeID}
              
              {else}
              
              		<option value="0" SELECTED>-populates with options once a city is selected-</option>
              
              {/if} 
                                         
              </select><?php */?>
              
            </div>
                </div>
                
                <div class="accounting-formconttrol"><button class="main-con-btn"  type="button" onClick="submit_form('form1')">Search</button>
                </div>
                </form>
                <div class="parent-co-wrap">
                	<strong class="alphabetical-str parent-str">Search by Parent Company:</strong>
                    
                    <div class="accounting-formconttrol">
                    <?php echo $this->Form->create('' ,['class' => "acc_form" , 'id' => 'form2'] ); ?>
                	<label class="accounting-label">Company:</label>
                    <div class="admin-fl">
                    <input type="hidden" name="process" value="1">
                    <input type="hidden" name="change_city" value="0">
                    <?php echo $this->Form->select('company',$Companies,  [ 'empty' => '-select one-' , "onchange" => "this.form.submit();"]);?>
                    
                      
        			</div>
                </div>
                </div>
                
                <div class="accounting-formconttrol">
                	<label class="accounting-label">Branch <br/>Office:</label>
                  <div class="admin-fl">
                  		<div class="admin-half">
                         <?php
						 $is_company_branch = true;
						 if(count($company_branches) == 0){
							  $is_company_branch = false;
							 $company_branches = [ '' => '-none found-' ];
				   			 
							 }
						 echo $this->Form->select('branchOfficeID',$company_branches,  [ 'id' => 'branchOfficeID',  "onchange" => "this.form.submit();"]);?>
              
                        
       
              </div>
                        <div class="clearfix"></div>
                  </div>
                   <div class="clearfix"></div>
                </div>
                
                <div class="accounting-formconttrol">
					<?php if($is_company_branch){ ?>
                    <button class="accounting-btn addnew-branch" type="button" onClick="submit_form('form2')">Search</button>
                    <?php }?>
                    <?php if($mod == 'maintain_contact'){?>
                      <a class="accounting-btn addnew-branch" href="<?= $site_url?>admin/users/add">Add New Contact</a>
                    <?php }?>
         		</div>
         
            </form>
        </div>
        <!--accounting pipeline page end-->

        
      </div>  
      <!--admin right end-->
      