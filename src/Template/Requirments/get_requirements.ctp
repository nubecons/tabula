<?php  echo $this->Form->input('requirment_id', [ 'required' => true, 'empty' =>'-- Select --','options' => $Requirements , 'dev' => false , 'label' => false, 'class'=>'form-control']); 
           ?>