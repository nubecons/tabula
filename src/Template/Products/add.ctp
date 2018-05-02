<?php

$site_url = $this->Url->build('/',true); ?> 
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 page-content">
                <div class="inner-box category-content">
                    <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post Add</strong></h2>
                    <div class="row">
                    <?= $this->Flash->render() ?>
                        <div class="col-sm-12">
                            <?php echo $this->Form->create('' ,['class' => "form-horizontal" ,'enctype' => 'multipart/form-data' ] ); ?>
                            <div class="subhead">PROPERTY TYPE AND LOCATION</div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Purpose: </label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input"  onClick="check_purpose('Sale')" type="radio" name="purpose" value="Sale" <?php if($this->request->data['purpose'] == "Sale"){?> checked <?php } ?>> For Sale
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input"  onClick="check_purpose('Rent')" type="radio" name="purpose"  value="Rent" <?php if($this->request->data['purpose'] == "Rent"){?> checked <?php } ?>> Rent
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input"  onClick="check_purpose('Wanted')" type="radio" name="purpose"  value="Wanted" <?php if($this->request->data['purpose'] == "Wanted"){?> checked <?php } ?>> Wanted
                                        </label>
                                    </div>


                                </div>
                            </div>

                            <div class="form-group row" id="wanted_type_div" style="display:none">
                                <label for="" class="col-sm-3 col-form-label">Wanted For: </label>
                                <div class="col-sm-8">

									   <?php 
									    $wanted_type = '' ;
									    if(isset($this->request->data['wanted_type'])){
										   $wanted_type =$this->request->data['wanted_type'];
										   }
									   ?>

                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input"  type="radio" name="wanted_type" value="Buy" <?php if($wanted_type == "Buy"){?> checked <?php } ?>> Buy
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="wanted_type"  value="Sale" <?php if($wanted_type == "Sale"){?> checked <?php } ?>> Sale
                                        </label>
                                    </div>




                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label">Type: </label>
                                <div class="col-sm-8">
                                 <?php 
									    $product_type_id = '' ;
									    if(isset($this->request->data['product_type_id'])){
										   $product_type_id =$this->request->data['product_type_id'];
										   }
									
										 foreach($ProductTypes as $key => $ProductType){?>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" onClick="$('.SubProductTypes').hide();
                                                    $('#SubProductTypes<?=$key?>').show()" 
                                                   name="product_type_id" id="ProductType<?=$key?>" value="<?=$key?>" <?php if($product_type_id == $key){?> checked <?php } ?>> <?=$ProductType?>
                                        </label>
                                    </div>
                                            <?php }?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-sm-3 col-form-label"></label>
                                       <?php
									    
										$sub_product_type_id = '' ;
									    if(isset($this->request->data['sub_product_type_id'])){
										   $sub_product_type_id =$this->request->data['sub_product_type_id'];
										   }
										   
										 foreach($ProductTypes as $Mainkey => $ProductType){
											 ?>
                                <div class="col-sm-8 SubProductTypes "  id="SubProductTypes<?=$Mainkey?>" style="display:none">
	                                      <?php
											 foreach($SubProductTypes[$Mainkey]  as $key => $sProductType){?>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="sub_product_type_id" id="ProductType<?=$key?>"
                                                   value="<?=$key?>" <?php if($sub_product_type_id == $key){?> checked <?php } ?> > <?=$sProductType?>
                                        </label>
                                    </div>
                                            <?php }?>
                                </div>
                                         <?php }?> 
                            </div>

                            <div class="form-group row">
                                <label  class="col-sm-3 col-form-label">City:</label>
                                <div class="col-sm-4">
                                        <?php echo $this->Form->input('city_id', ['required' => true, 'empty' =>'-- Select --','options' => $Cities ,'id'=>'city_id','onchange' => "get_locations()", 'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
                                </div>

                            </div>

                            <div class="form-group row" >
                                <label  class="col-sm-3 col-form-label">Location:</label>
                                <div class="col-sm-4" id="locations_div">
                                        <?php echo $this->Form->input('location_id', [ 'required' => true, 'empty' =>'-- Select --', 'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
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
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('double_glazed_windows', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Central Air Conditioning</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('central_air_conditioning', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Central Heating</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('central_heating', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Furnished</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('furnished', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6 ">Electricity Backup</div>
                                                        <div class="col-lg-6">
                                                        <?php echo $this->Form->input('electricity_backup', [ 'empty' => '-- Select --' ,  'options' => $ElectricityBackup ,  'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
                                                        </div>
                                                    </div>      
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Flooring</div>
                                                        <div class="col-lg-6">
                                                        <?php echo $this->Form->input('flooring', [ 'empty' => '-- Select --' ,   'options' => $Flooring ,  'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Built in year</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('built_in_year', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">View</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('view', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Parking Spaces</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('parking_spaces', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Floors</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('floors', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Other Main Features</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('other_main_features', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="subhead">Rooms</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Drawing Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('drawing_room', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Dining Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('dining_room', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Study Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('study_room', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Prayer Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('prayer_room', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Powder Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('powder_room', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Gym</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('gym', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Sitting Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('sitting_room', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Laundry  Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('laundry_room', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Steam  Room</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('steam_room', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Bedrooms</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('f_bedrooms', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Bathroom</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('f_bathroom', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Servant Quarters</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('servant_quarters', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Kitchens</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('kitchens', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Store Rooms</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('store_rooms', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Other Rooms</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('other_rooms', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                </div>  

                                                <div class="col-lg-4">
                                                    <div class="subhead">Business and Communication</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Broadband Internet Access</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('broadband_internet_access', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Satellite or Cable TV Ready</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('satellite_cable_tv_ready', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Intercom</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('intercom', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Others</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('c_others', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 

                                                    <div class="subhead">Healthcare Recreational</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Lawn or Garden</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('lawn_or_garden', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Swimming Pool</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('swimming_pool', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Jacuzzi</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('jacuzzi', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Others</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('h_others', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 
                                                    <div class="subhead">Other Facilities</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Maintenance Staff</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('maintenance_staff', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Security Staff</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('security_staff', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Facilities for Disabled</div>
                                                        <div class="col-lg-3"><?php echo $this->Form->checkbox('facilities_for_disabled', []); ?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Others</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('of_others', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="subhead">Nearby Locations</div>
                                                <div class="col-lg-4">
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">School</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('n_c_school', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>

                                                        <div  class="col-lg-6">Hospital</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('n_c_hospital', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Restaurants</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('n_c_restaurants', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>

                                                        <div  class="col-lg-6">Shopping Malls</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('n_c_shopping_malls', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
                                                    </div> 
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Distance From Airport (kms)</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('n_c_distance_from_airport', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>

                                                        <div  class="col-lg-6">Others</div>
                                                        <div class="col-lg-6"><?php echo $this->Form->text('n_c_others', [ 'class'=>'form-control','style' => 'width:100%;height:80%']); ?></div>
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

                              <?php  if(!$sUser) { ?>

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

                            <?php }?>

                            <div id="new_member_div">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="textinput-name">First Name</label>

                                    <div class="col-sm-4">
                                        <?php echo $this->Form->text('contact_first_name', ['class'=>'form-control']); ?>
                                    </div>
                                </div>



                                <!-- Text input-->
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="seller-Number">Last Name
                                    </label>

                                    <div class="col-sm-4">
                                          <?php echo $this->Form->text('contact_last_name', ['class'=>'form-control']); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="seller-Number">Cell
                                    </label>

                                    <div class="col-sm-4">
                                         <?php echo $this->Form->text('contact_mobile', ['class'=>'form-control']); ?>
                                    </div>
                                </div>


                                  <?php  if(!$sUser) { ?>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="seller-Number">Email</label>

                                    <div class="col-sm-4">
                                           <?php echo $this->Form->email('contact_email', ['class'=>'form-control']); ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="seller-Number">Password</label>

                                    <div class="col-sm-4">
                                           <?php echo $this->Form->password('contact_password', ['class'=>'form-control']); ?>
                                    </div>
                                </div>
                                <?php }?>

                            </div>


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
    function get_locations(){
        var CityId = $('#city_id option:selected').val();
        $.ajax({
            type: "POST",
            url: "<?php echo $site_url?>Products/get_locations/" + CityId,
                    success: function (data) {
                        if (data != '')
                        {
                            $('#locations_div').html(data);
                        }
                    }
        });
    }
    function check_member(val) {

        if (val == '2') {

            $('#already_member_div').hide();
            $('#new_member_div').show();

        } else {

            $('#already_member_div').show();
            $('#new_member_div').hide();

        }


    }

    function check_purpose(val) {

        if (val == 'Wanted') {
            $('#wanted_type_div').show();
        } else {
            $('#wanted_type_div').hide();
        }
    }

    $(document).ready(function () {
        check_member('<?=$this->request->data['membership_status']?>');
        check_purpose('<?=$this->request->data['purpose']?>');
        $('#SubProductTypes<?=$product_type_id?>').show();
    });


</script>