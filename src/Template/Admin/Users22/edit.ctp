<?php $this->assign('title', $title); ?>
<?php $site_url = $this->Url->build('/',true); ?> 
      <!--admin right start-->
     <div class="adminright cp_form admin-sign-agent admin_contact_Page  admin_contact-sec adm-edit-contactt radiobutton">
        <div class="admin-heading">
          <div class="admin-icon"> <?php echo $this->Html->image("../images/admin-request.png" )?>  </div>
          <h2> 
        Edit Contact
   </h2>
          <div class="clearfix"></div>
            <span class="error"><?= $this->Flash->render('message') ?></span>
            <?php
			 if(isset($error) && $error != ''){?>
              <span class="error"><?=$error ?></span>
              <?php } ?>
        	<?php echo $this->Form->create($User ,['class' => "acc_form cp_form form-request" ] ); ?>
            <input type="hidden" name="process" id="process" value="0" >
         
   <p>       
         Edit contact information below and click "Submit":
  </p>
   
   </div>         
               <div class="rp-half-control">
                        <div class="rp-half">
                            <label class="blue-bold">First Name</label>
                            <?php echo $this->Form->text('first_name', [ 'required' => true,  'class'=>'fn blue_inp', "size" => "20"]); ?>
                           
                            <div class="clearfix"></div>
                        </div>
                        <div class="rp-half addclass-rphalf">
                            <label class="blue-bold">Last Name</label>
                            <?php echo $this->Form->text('last_name', [ 'required' => true,  'class'=>'ln blue_inp', "size" => "20"]); ?>
                           <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div> 
                     <div class="accounting-formconttrol">
            	<div class="width-control">
                   <label class="blue-bold label-margin">Email</label>
                   <?php echo $this->Form->text('email', [ 'required' => true,  'class'=>'account blue_inp', "size" => "20"]); ?>
                  <div class="clearfix"></div>
                 </div>
            </div>
            
  
                <div class="rp-half-control">
                        <div class="rp-half">
                            <label class="blue-bold label-margin">Password</label>
                           <?=$User['password_confirm']?> (<a href="<?=$site_url?>admin/users/change_password/<?=$User['id']?>/?returnto=edit_employee">change password</a>)
                            <div class="clearfix"></div>
                        </div>
                        <div class="rp-half addclass-rphalf">
                             <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
  

   <div>
                  <p>
If a user moves companies/branches make them inactive and then create a new account.<br>DO NOT change their company and branch info.<br><br>
                  </p>
                  </div>

                <div class="accounting-formconttrol">
              <label class="accounting-label admin-source">Company</label>
              <div class="sr-top-select">
                <div class="admin-half">
                <input type="hidden" name="change_company" value=0> 
                <?php echo $this->Form->select('companyID',$Companies,  [  "onchange" => "this.form.submit();"]);?>
               
                      <div class="plus_sign"><a href="<?= $site_url?>admin/companies/add"><span><?php echo $this->Html->image("../images/add.gif",[ "width"=>"16" ,"height"=>"16", "border"=>"0" , "align"=>"absmiddle"] )?></span></a> 
                      <a href="<?= $site_url?>admin/companies/add">Add new</a> </div>
                </div>                        
                <div class="clearfix"></div>
              </div>
             
            </div>
            <div class="accounting-formconttrol sign_plus">
              <label class="accounting-label admin-source">Branch Office</label>
              <div class="sr-top-select editcon-brnch">
                <div class="admin-half">                   
               <input type="hidden" name="change_branch" value=0> 
                <?php
						 $is_company_branch = true;
						 if(count($company_branches) == ''){
							  $is_company_branch = false;
							 $company_branches = [ '' => '-populates once a company is selected-' ];
				   			 
							 }
						 echo $this->Form->select('branchOfficeID',$company_branches,  [ 'id' => 'branchOfficeID',  "class"=>"availability avai" ,  "onchange" => "this.form.submit();"]);?>
              
                  
               
                   <div class="plus_sign"><a href="#" onclick="document.location='<?=$site_url?>admin/BranchOffices/add/' + document.forms[0].companyID.options[document.forms[0].companyID.selectedIndex].value;">
                      <span><?php echo $this->Html->image("../images/add.gif",[ "width"=>"16" ,"height"=>"16", "border"=>"0" , "align"=>"absmiddle"] )?></span></a> 
                       <a href="#" onclick="document.location='<?=$site_url?>admin/BranchOffices/add/' + document.forms[0].companyID.options[document.forms[0].companyID.selectedIndex].value;">Add new</a> </div>
                </div>                        
                <div class="clearfix"></div>
              </div>
             
            </div>

                <div class="lonely_p">
                <label class="blue-bold label-margin">Website</label>
                  <p>
                   <?php if($company){ echo $company->website_addr; } ?>
                 <?php /*?> { if ($edit_user_company->getWebsiteAddr()) }
                  { $edit_user_company->getWebsiteAddr() }
                  {else}
                  &nbsp;
                  {/if}<?php */?>
                  </p>
                  </div>
                  
                <div class="rp-half-control text_lable">
                        <div class="rp-half">
                            <label>Bus No.</label>
                            <p>
                            <?php
							if($branch_office){
								echo $branch_office->business_number;
								}
								?>
						  <?php /*?>{ if ($edit_user_branch_office->getBusinessNumber()) }
                          {$edit_user_branch_office->getBusinessNumber()} 
                          {else}
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          {/if}<?php */?>
                  </p>
                 <div class="rp-half addclass-rphalf email_adjust">
                            <label>Ext.</label>
                         <div class="agent_ref1"> <div class="admin-inp">
                          <?php echo $this->Form->text('office_phone_extension', [ 'class'=>'acc-ref blue_inp', "size" => "4",  "maxlength" => "4"] ); ?>
                         
                          </div></div>
                            <div class="clearfix"></div>
                        </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="rp-half addclass-rphalf">
                            <label>Direct No.</label>
                            <?php echo $this->Form->text('direct_phone', [ 'class'=>'ln blue_inp', "size" => "20"] ); ?>
                           <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div class="rp-half-control text_lable">
                        <div class="rp-half">
                            <label>Main Fax.</label>
                            <p>
                             <?php
							  if($branch_office){
								 
								 echo $branch_office->fax_number;
								
								}
								?>
                                
                            
                <?php /*?>  { if ($edit_user_branch_office->getFaxNumber()) }
                  {$edit_user_branch_office->getFaxNumber()}
                  {else}
                  &nbsp;
                  {/if}<?php */?>
                  </p>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="rp-half addclass-rphalf">
                            <label>Direct Fax.</label>
                            <?php echo $this->Form->text('direct_fax', [ 'class'=>'ln blue_inp', "size" => "20"] ); ?>
                            
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="rp-half-control text_lable cell_other">
                        <div class="rp-half">
                            <label>Other No.</label>
                            <?php echo $this->Form->text('other_phone', [ 'class'=>'fn blue_inp', "size" => "20"] ); ?>
                            <div class="clearfix"></div>
                        </div>
                        <div class="rp-half addclass-rphalf">
                            <label>Cell No.</label>
                            <?php echo $this->Form->text('mobile_phone', [ 'class'=>'fn blue_inp', "size" => "20"] ); ?>
                           <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="over_night">
                    <strong>OverNight Delivery Service : </strong>
                    <p>(to change account numbers, please edit the branch office information)</p>
                    <div class="feedex">
                    <div class="feedex_text">
                    <ul class="lab-wrap">
                    <li>FedEx</li>
                     <li>Account <span>#</span>: </li>
                      <li>
					   <?php  if(isset($branch_office->fedex_tracking) && $branch_office->fedex_tracking != ''){ echo $branch_office->fedex_tracking;}else{ echo "N/A";} ?>
					  <?php /*?>{if ($edit_user_branch_office->getFedexTracking())}{$edit_user_branch_office->getFedexTracking()}{else}N/A{/if}<?php */?></li>
                    </ul>
                    
                    </div>
                    <div class="feedex_text">
                    <ul class="lab-wrap">
                    <li>UPS </li>
                     <li>Account<span>#</span>:</li>
                      <li>
					  <?php  if(isset($branch_office->ups_tracking) && $branch_office->ups_tracking != ''){echo $branch_office->ups_tracking;}else{ echo "N/A";} ?>
					  <?php /*?>{if ($edit_user_branch_office->getUpsTracking())}{$edit_user_branch_office->getUpsTracking()}{else}N/A{/if}<?php */?></li>
                    </ul>
                    
                    </div>
                    <div class="feedex_text">
                    <ul class="lab-wrap">
                    <li>GSO</li>
                     <li>Account<span>#</span>:</li>
                      <li>
					  <?php  if(isset($branch_office->gso_tracking) && $branch_office->gso_tracking != ''){echo $branch_office->gso_tracking;}else{ echo "N/A";} ?>
					  <?php /*?>{if ($edit_user_branch_office->getGsoTracking())}{$edit_user_branch_office->getGsoTracking()}{else}N/A{/if}<?php */?></li>
                    </ul>
                    
                    </div>
                    <div class="feedex_text">
                    <ul class="lab-wrap">
                    <li>     Cal & Overnight </li>
                     <li>Account<span>#</span>:</li>
                      <li>
					  <?php  if(isset($branch_office->cal_overnight_tracking) && $branch_office->cal_overnight_tracking != ''){echo $branch_office->cal_overnight_tracking;}else{ echo "N/A";} ?>
					  <?php /*?>{if ($edit_user_branch_office->getCalOvernightTracking())}{$edit_user_branch_office->getCalOvernightTracking()}{else}N/A{/if}<?php */?></li>
                    </ul>
                    
                    </div>
                    <div class="feedex_text">
                    <ul class="lab-wrap">
                    <li>  Transbox</li>
                     <li>Account<span>#</span>:</li>
                      <li>
					  <?php  if(isset($branch_office->transbox_tracking) && $branch_office->transbox_tracking != ''){echo $branch_office->transbox_tracking;}else{ echo "N/A";} ?>
					  <?php /*?>{if ($edit_user_branch_office->getTransboxTracking())}{$edit_user_branch_office->getOtherTracking()}{else}N/A{/if}<?php */?></li>
                    </ul>
                    
                    </div>
                    
                    <div class="feedex_text">
                    <ul class="lab-wrap">
                    <li> Other</li>
                     <li>Explain:</li>
                      <li>
					  <?php  if(isset($branch_office->other_tracking) && $branch_office->other_tracking != '' ){echo $branch_office->other_tracking;}else{ echo "N/A";} ?>
					  <?php /*?>{if ($edit_user_branch_office->getOtherTracking())}{$edit_user_branch_office->getOtherTracking()}{else}N/A{/if<?php */?></li>
                    </ul>
                    </div>
                    </div>
                    </div>
                    <div class="ai-wrap">
            	   <strong class="alphabetical-str sr-add-ins">Special Signing Instructions:</strong>
                		<?php echo $this->Form->textarea('signing_instructions', [ 'class'=>'instruction', "cols" => "60" , "rows" => "4"] ); ?>
                	</div>
                
                    <div class="ai-wrap">
                    <strong class="alphabetical-str sr-add-ins">Internal Notes:</strong>
                       <?php echo $this->Form->textarea('internal_notes', [ 'class'=>'instruction', "cols" => "60" , "rows" => "4"] ); ?>
                    </div>
                     <button type="submit" class="sub_req_btn" value="submit" onClick="$('#process').val(1)">Submit</button>
          	
            </form></div>
      <!--admin right end-->
      <div class="clearfix"></div>
    </div>
   