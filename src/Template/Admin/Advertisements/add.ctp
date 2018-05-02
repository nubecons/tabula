<?php $site_url = $this->Url->build('/',true); ?> 
<h3><?php echo __('Create New Advertisement');?></h3>
<div class="maps form">
<?php echo $this->Form->create('' ,['class' => "form-horizontal" ,'enctype' => 'multipart/form-data' ] ); ?>
	<?php
		echo $this->Form->input('title',array('required'=>true,'style' => 'width:350px'));
		echo $this->Form->input('description',array('required'=>true,'type'=>'textarea','style' => 'width:350px'));
                echo $this->Form->input('link',array('required'=>true,'style' => 'width:350px'));
                echo $this->Form->input('is_paid', ['required' => true, 'empty' =>'-- Select --','options' => $AdvertisementPaidStatus]);
                echo $this->Form->input('status', ['required' => true, 'empty' =>'-- Select --','options' => $AdvertisementStatus]);
		echo $this->Form->file('image_file', ['required' => true,"id"=>"input-upload-img1" , "type" => "file" , "class" => "file" , "data-preview-file-type" => "text"]); ?>
              
                 
    <div class="btns">
	  <?php echo $this->Form->submit('Submit', array('div' => false,'class'=>'small button'));?>
    </div>
<?php echo $this->Form->end()?>
</div>


