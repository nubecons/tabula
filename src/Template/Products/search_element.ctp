<div class="search-row-wrapper">
    <div class="container ">
    	<?php echo $this->Form->create('' ,[ 'url' => ['controller' => 'products' ,'action' => 'index'] , 'class' => "form-horizontal" ,'enctype' => 'multipart/form-data' ] ); ?>
<?php echo $this->Form->hidden('purpose', ['class'=>'form-control' ]); ?>
       <?php /*?> <input type="hidden" name ="purpose" value="<?=$purpose?>"><?php */?>
        <div class="row">
        <div class="col-md-9 page-content col-thin-left">
            <div class="category-list">
                <ul id="myTab" class="nav nav-tabs tab-box nav nav-tabs add-tabs" role="tablist">
                    <li class="active nav-item"><a href="#buy" class="nav-link" data-toggle="tab">Buy Property</a></li>
                    <li class="nav-item"><a href="#rent"  class="nav-link"data-toggle="tab">Rent Property</a></li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane in active" id="buy">
                        <div class="container">
                            <div class="row">
                               

                                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                        <label for="cities">Cities</label>
										<?php echo $this->Form->input('city_id',
                                        ['empty' =>'All Citiess',
                                        'options' => $Cities , 'dev' => false , 'label' => false, 
                                        'class'=>'form-control selecter',
                                        ]); ?>

                                    </div>
                                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                        <label for="exampleInputEmail1">Property Type</label>
                                        <select class="form-control selecter" name="product_type_id" id="search-category">
                                            <option selected="selected" value="">All Properties</option>
                           <?php
							foreach($ProductTypes as $Mainkey => $ProductType){
							 ?>

                                            <option value="<?=$Mainkey?>" style="background-color:#E9E9E9;font-weight:bold;">-- <?=$ProductType?> --</option>
                                     <?php
											 foreach($SubProductTypes[$Mainkey]  as $key => $sProductType){?>
                                            <option value="<?=$key?>"><?=$sProductType?></option>

                              <?php }
							}
							 ?>    


                                        </select>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                        <label for="cities">Location</label>
                                        <input type="text" placeholder="Enter Location" name="Location" class="form-control" />
                                    </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                    <label for="exampleInputFile">Price Range</label>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-sm-6 col-md-6 col-lg-6">
                                          <?php echo $this->Form->text('min_price', ['class'=>'form-control']); ?>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-6 col-md-6 col-lg-6">
                                            <?php echo $this->Form->text('max_price', ['class'=>'form-control']); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                    <label for="exampleInputEmail1">Land Area</label>
                                    <?php echo $this->Form->input('area_unit', ['options' => $UnitOptoins , 'default' =>'Marla', 'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
                                  </div>
                                 <div class="col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                    <label for="exampleInputFile">Land Area Range</label>
                                    <div class="row">
                                        <div class="form-group col-xs-10 col-sm-6 col-md-6 col-lg-6">
                                            <?php echo $this->Form->text('min_area', ['class'=>'form-control']); ?>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-6 col-md-6 col-lg-6">
                                             <?php echo $this->Form->text('max_area', ['class'=>'form-control']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="clearfix"></div>
                                 <div class="row">
                                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                    <label for="exampleInputEmail1">Bedroom</label>
                                    <?php echo $this->Form->input('bedrooms', ['empty' =>'Any', 'options' => $BedRooms , 'dev' => false , 'label' => false, 'class'=>'form-control']); ?>
                                   
                                </div>
                                <div class="form-group col-xs-10 col-sm-4 col-md-4 col-lg-4">
                                      <label for="exampleInputEmail1"> &nbsp;</label>
                                      <button type="submit" class="btn btn-block btn-primary fa fa-search">  Find  Property</button>
                                </div>
                               
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="rent">
                        <p>Microsoft Windows is a series of graphical
                            interface operating systems developed, marketed,
                            and sold by Microsoft</p> 
                    </div>
                </div>
    		<?php echo $this->Form->end()?>
            </div>
        </div>
            <?php 
				$city_idz = ['103908'/*Lahore*/ , '103895'/*karachi*/ ,'103952'/*Peshawar*/ ,'103961'/*Rawalpindi*/ ,'103930'/*Multan*/ 
							,'103956'/*Quetta*/ ,'103882'/*Islamabad*/] ;
				$city_products = $this->GetInfo->getProductCityCount(['city_id in' => $city_idz]);
				
				?>
        <div class="col-md-3 ">
			<div class="inner-box">
                            <h3 class="title-3">Papular Locations</h3>
                            <div class="inner-box-content">
                                <ul class="cat-list arrow">
                                <li><a href="#"> Lahore (<?=isset($city_products['103908'])?number_format($city_products['103908']):'0';?>)</a></li>
                                <li><a href="#"> Karachi (<?=isset($city_products['103895'])?number_format($city_products['103895']):'0';?>)</a></li>
                                <li><a href="#"> Islamabad (<?=isset($city_products['103882'])?number_format($city_products['103882']):'0';?>) </a></li>
                                <li><a href="#"> Peshawar (<?=isset($city_products['103952'])?number_format($city_products['103952']):'0';?>) </a></li>
                                <li><a href="#"> Quetta (<?=isset($city_products['103956'])?number_format($city_products['103956']):'0';?>) </a></li>
                                <li><a href="#"> Rawalpindi (<?=isset($city_products['103961'])?number_format($city_products['103961']):'0';?>) </a></li>
                                <li><a href="#"> Multan (<?=isset($city_products['103930'])?number_format($city_products['103930']):'0';?>) </a></li>
                               
                                    
                                </ul>
                            </div>
                        </div>
        </div>
    </div>