<?php $site_url = $this->Url->build('/',true); ?> 
<h3><?php echo __('Update Location Map for '.$Locations[0]['name']);?></h3>
<div class="maps form">
<?php echo $this->Form->create('' ,['class' => "form-horizontal" ,'enctype' => 'multipart/form-data' ] ); ?>
	<?php
		echo $this->Form->input('id',array( 'readonly' => true,'style' => 'width:350px'));
		echo $this->Form->input('name',array( 'required' => true,'style' => 'width:350px'));
		echo $this->Form->file('image_file', ["id"=>"input-upload-img1" , "type" => "file" , "class" => "file" , "data-preview-file-type" => "text"]); ?>
               <?php if($Locations['location_map'] != ''){?>
                <img src="<?=$site_url?>img/maps/<?php echo $Locations['location_map'];?>" alt="img" width="30%" height="30%"/>
               <?php }else{?>
                 <img src="<?=$site_url?>img/maps/awaiting.jpg" alt="img" width="30%" height="30%"/>
               <?php }?>
                 
    <div class="btns">
	  <?php echo $this->Form->submit('Submit', array('div' => false,'class'=>'small button'));?>
    </div>
<?php echo $this->Form->end()?>
</div>


