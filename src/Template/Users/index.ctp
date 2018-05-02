<?php 
	echo $this->Html->script(['ui/jquery.ui.core.js', 'ui/jquery.ui.datepicker.js','jquery.maskedinput.js'], ['block' => true]);
	echo $this->Html->css(['/css/themes/base/jquery.ui.all.css']);
?>
<script type="text/javascript">
	$(function() {
		$("#UserGovtIdExpiryDate").datepicker();
		jQuery('#UserGovtIdExpiryDate').datepicker('option', {dateFormat: 'yy-mm-dd', changeMonth:true, changeYear:true, minDate: '0Y', maxDate: '+40Y', yearRange: '-40:+40' });	
		<?php if(isset($this->request->data['govt_id_expiry_date']) && $this->request->data['govt_id_expiry_date'] != "") { ?>
		jQuery('#UserGovtIdExpiryDate').datepicker( 'setDate', '<?php echo $this->request->data['govt_id_expiry_date'];?>' );
		<?php } ?>
	});
</script>
<?php 
	echo $this->Html->css('validationEngine.jquery.css');
	echo $this->Html->script('languages/jquery.validationEngine-en.js');
	echo $this->Html->script('jquery.validationEngine.js');
?>
<script>
	jQuery(document).ready(function(){
		// binds form submission and fields to the validation engine
		jQuery("#UserSignupForm").validationEngine();
	});
			
	function load_states()
	{
		var country_code = jQuery("#country").val();
		jQuery.ajax({
			type: "POST",
			url: "<?php echo $this->Url->build('/ajax/loadstates', true);?>",
			data: "country_code=" + country_code+"&fieldName=state&class=inputwid-2",
			cache: false,
			dataType: "html",
			success: function(data){
				jQuery("#OrderStateTD").html(data);
				jQuery("#UserSignupForm").validationEngine();  
			}
		});
	}
</script>			
<div class="wrapper sign-up">
   <h1>Sign Up</h1>
   <div class="pageSection">
      <?php echo $this->Form->create($user, ['id' => 'UserSignupForm', 'enctype' => 'multipart/form-data']); ?>
      <div class="widget_content">
         <ul>
            <li class="padded paide">
               <table>
                  <tr>
                     <td width="180"><label>First Name*</label></td>
                     <td><?php echo $this->Form->text('first_name', ['class'=>'validate[required] inputwid-2']); ?></td>
                  </tr>
                  <tr>
                     <td width="90"><label>Last Name*</label></td>
                     <td><?php echo $this->Form->text('last_name', ['class'=>'validate[required] inputwid-2','label'=>false]); ?></td>
                  </tr>
                  <tr>
                     <td width="90"><label>Email*</label></td>
                     <td><?php echo $this->Form->text('email', ['class' => 'validate[required,custom[email]] inputwid-1']); ?></td>
                  </tr>
                  <tr>
                     <td width="90"><label>Password:</label></td>
                     <td><?php echo $this->Form->password('new_password', ['type'=>'password', 'class' => 'validate[required] inputwid-2', 'id' => 'UserNewPassword']); ?></td>
                  </tr>
                  <tr>
                     <td width="90"><label>Confirm Password:</label></td>
                     <td><?php echo $this->Form->password('confirm_password', ['class' => 'validate[required,equals[UserNewPassword]] inputwid-2', 'id' => 'ConfirmPassword']); ?></td>
                  </tr>
                  <input type="submit">
               </table>
            </li>
         </ul>
      </div>
      <?php echo $this->Form->end();?>
   </div>
</div>