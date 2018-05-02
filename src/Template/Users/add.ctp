<?php

$site_url = $this->Url->build('/',true); ?> 
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-content">
                <div class="inner-box category-content">
                    <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post Add</strong></h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo $this->Form->create('' ,['class' => "form-horizontal" ,'enctype' => 'multipart/form-data' ] ); ?>
                            <div class="subhead">PROPERTY TYPE AND LOCATION</div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Purpose: </label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="purpose" value="For Sale"> For Sale
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="purpose"  value="Rent"> Rent
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="purpose"  value="Wanted"> Wanted
                                        </label>
                                    </div>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Type: </label>
                                <div class="col-sm-8">
                                      <?php
										 foreach($ProductTypes as $key => $ProductType){?>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" onClick="$('.SubProductTypes').hide();
                                                    $('#SubProductTypes<?=$key?>').show()" name="product_type_id" id="ProductType<?=$key?>" value="<?=$key?>"> <?=$ProductType?>
                                        </label>
                                    </div>
                                            <?php }?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"></label>
                                       <?php
										 foreach($ProductTypes as $Mainkey => $ProductType){
											 ?>
                                <div class="col-sm-8 SubProductTypes "  id="SubProductTypes<?=$Mainkey?>" style="display:none">
	                                      <?php
											 foreach($SubProductTypes[$Mainkey]  as $key => $ProductType){?>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="sub_product_type_id" id="ProductType<?=$key?>" value="<?=$key?>"> <?=$ProductType?>
                                        </label>
                                    </div>
                                            <?php }?>
                                </div>
                                         <?php }?> 
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">City:</label>
                                <div class="col-sm-4">
                                        <?php echo $this->Form->input('city_id', ['empty' =>'-- Select --','options' => $Cities , 'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Location:</label>
                                <div class="col-sm-4">
                                        <?php echo $this->Form->input('location_id', ['empty' =>'-- Select --','options' => $Cities , 'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
                                </div>

                            </div>   


                            <div class="subhead">DETAILS</div>
                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-8">
                                        <?php echo $this->Form->text('title', ["required" => true, 'class'=>'form-control']); ?>
                                    <small id="" class="form-text text-muted">
                                        A great title needs at least 60 characters
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-8"><?php echo $this->Form->textarea('description', ["required" => true, 'class'=>'form-control']); ?></div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">RS</span><?php echo $this->Form->text('price', ["required" => true, "aria-label"=>"Price" , 'class'=>'form-control']); ?></div>
                                </div>
                                <div class="col-sm-3">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Land Area:</label>
                                <div class="col-sm-4">
                                          <?php echo $this->Form->text('area', ["required" => true,'class'=>'form-control']); ?>
                                </div>
                                <label  class="col-sm-1 col-form-label">Unit:</label>
                                <div class="col-sm-3">
                                        <?php echo $this->Form->input('area_unit', ['options' => $UnitOptoins , "required" => true, 'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Bedrooms:</label>
                                <div class="col-sm-4">
                                        <?php echo $this->Form->input('bedrooms', ['empty' =>'-- Select --','options' => $BedRooms , 'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Bathrooms:</label>
                                <div class="col-sm-4">
                                        <?php echo $this->Form->input('bathrooms', ['empty' =>'-- Select --',  'options' => $BathRooms , 'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">Expires After:</label>
                                <div class="col-sm-4">
                                        <?php echo $this->Form->input('expiry_days', [ 'options' => $ExpiryDays , "required" => true, 'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
                                </div>

                            </div>

                            <div id="accordion">
                                <div class="card ">
                                    <div class="subhead" id="headingOne" style=" padding:  0px 0px !important; margin-top:  0px; width: 100%">
                                        <h5 class="mb-0">
                                            <div class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Property Features
                                            </div>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body" style=" padding-top:0px !important;">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="subhead">Main Features</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Double Glazed Windows</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Central Air Conditioning</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Central Heating</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Furnished</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6 ">Electricity Backup</div>
                                                        <div class="col-lg-6">
                                                            <select class=" form-control" ><option value="">Select</option><option value="None">None</option><option value="Generator">Generator</option><option value="Ups">Ups</option><option value="Solar">Solar</option><option value="Other">Other</option></select>
                                                        </div>
                                                    </div>      
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Flooring</div>
                                                        <div class="col-lg-6">
                                                            <select class=" form-control"><option value="">Select</option><option value="Tiles">Tiles</option><option value="Marble">Marble</option><option value="Wooden">Wooden</option><option value="Chip">Chip</option><option value="Cement">Cement</option><option value="Other">Other</option></select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Built in year</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">View</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Parking Spaces</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Floors</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Other Main Features</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="subhead">Rooms</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Drawing Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Dining Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Study Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Prayer Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Powder Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Gym</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Sitting Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Laundry  Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Steam  Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Bedrooms</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Bathroom</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Servant Quarters</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Kitchens</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Store Rooms</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Other Rooms</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                </div>  

                                                <div class="col-lg-4">
                                                    <div class="subhead">Business and Communication</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Broadband Internet Access</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Satellite or Cable TV Ready</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Intercom</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Others</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 

                                                    <div class="subhead">Healthcare Recreational</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Lawn or Garden</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Swimming Pool</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Jacuzzi</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Others</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 
                                                    <div class="subhead">Other Facilities</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Maintenance Staff</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Security Staff</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Facilities for Disabled</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('1', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Others</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="subhead">Nearby Locations</div>
                                                <div class="col-lg-4">
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">School</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>

                                                        <div  class="col-lg-6">Hospital</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Restaurants</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>

                                                        <div  class="col-lg-6">Shopping Malls</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Distance From Airport (kms)</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>

                                                        <div  class="col-lg-6">Others</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('1', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="subhead">ADD IMAGES</div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="textarea">Picture</label>
                                <div class="col-lg-8">
                                    <div class="mb10">
                                             <?php echo $this->Form->file('image_file', ["id"=>"input-upload-img1" , "type" => "file" , "class" => "file" , "data-preview-file-type" => "text"]); ?>
                                    </div>

                                    <p  class="form-text text-muted">

                                    </p>
                                </div>
                            </div>

                            <div class="subhead">Contact Details</div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Membership Status: </label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input onClick="check_member('1')" class="form-check-input" type="radio" name="membership_status"  value="1" 
                                                     <?php if($this->request->data['membership_status'] == 1){?> checked <?php } ?>> Existing Member
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input onClick="check_member('2')"  class="form-check-input" type="radio" name="membership_status"  value="2" <?php if($this->request->data['membership_status'] == 2){?> checked <?php } ?>> New Member 
                                        </label>
                                    </div>




                                </div>
                            </div>

                            <div id="already_member_div">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="textinput-name">Email</label>

                                    <div class="col-sm-4">
                                        <?php echo $this->Form->text('email', ['class'=>'form-control']); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="textinput-name">Password</label>

                                    <div class="col-sm-4">
                                        <?php echo $this->Form->password('password', ['class'=>'form-control']); ?>
                                    </div>
                                </div>

                            </div>

                            <div id="new_member_div">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="textinput-name">First Name</label>

                                    <div class="col-sm-4">
                                        <?php echo $this->Form->text('first_name', ['class'=>'form-control']); ?>
                                    </div>
                                </div>



                                <!-- Text input-->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="seller-Number">Last Name
                                    </label>

                                    <div class="col-sm-4">
                                          <?php echo $this->Form->text('last_name', ['class'=>'form-control']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="seller-Number">Cell
                                    </label>

                                    <div class="col-sm-4">
                                         <?php echo $this->Form->text('contact_mobile', ['class'=>'form-control']); ?>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="seller-Number">Email</label>

                                    <div class="col-sm-4">
                                           <?php echo $this->Form->email('email', ['class'=>'form-control']); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="seller-Number">Password</label>

                                    <div class="col-sm-4">
                                           <?php echo $this->Form->password( ["required" => true,'class'=>'form-control']); ?>
                                    </div>
                                </div>

                            </div>


                            <!-- Text input-->
                                  <?php /*?>  <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="textinput-name">Name</label>

                                        <div class="col-sm-4">
                                        <?php echo $this->Form->text('contact_name', ["required" => true,'class'=>'form-control']); ?>
                                        </div>
                                    </div>

                                 

                                    <!-- Text input-->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="seller-Number">Phone
                                            </label>

                                        <div class="col-sm-4">
                                          <?php echo $this->Form->text('contact_phone', ['class'=>'form-control']); ?>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="seller-Number">Cell
                                            </label>

                                        <div class="col-sm-4">
                                         <?php echo $this->Form->text('contact_mobile', ['class'=>'form-control']); ?>
                                        </div>
                                    </div>
                                    
                                     <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="seller-Number">Fax</label>

                                        <div class="col-sm-4">
                                           <?php echo $this->Form->text('contact_fax', ['class'=>'form-control']); ?>
                                        </div>
                                    </div>


									<div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="seller-Number">Email</label>

                                        <div class="col-sm-4">
                                           <?php echo $this->Form->email('contact_email', ["required" => true,'class'=>'form-control']); ?>
                                        </div>
                                    </div>
                                    <?php */?>

                            <!-- terms -->
                                   <?php /*?> <div class="form-group row">
                                        <label class="col-sm-3 col-form-label p-0">Terms</label>

                                        <div class="col-sm-8">

                                            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-indicator"></span>
                                                <span class="custom-control-description"> Remember above contact information</span>
                                            </label>

                                        </div>
                                    </div><?php */?>

                            <!-- Button  -->
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"></label>

                                <div class="col-sm-8">
                                    <button type="submit"  class="btn btn-primary">Submit </button>
                                </div>
                            </div>

                                     <?php echo $this->Form->end()?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.page-content -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>

<script>
    function check_member(val) {

        if (val == '2') {

            $('#already_member_div').hide();
            $('#new_member_div').show();

        } else {

            $('#already_member_div').show();
            $('#new_member_div').hide();

        }


    }


    $(document).ready(function () {
        check_member('1');
    });

</script>