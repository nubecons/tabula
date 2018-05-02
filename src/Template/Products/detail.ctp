<?php $site_url = $this->Url->build('/',true); ?> 

<div class="main-container">
        <div class="container">
            <div class="row">
            <div class="col-md-12">

                <nav aria-label="breadcrumb" role="navigation" class="pull-left">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="icon-home fa"></i></a></li>
                        <li class="breadcrumb-item"><a href="property-list.html">Properties</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Search Results</li>
                    </ol>
                </nav>


                <div class="pull-right backtolist"><a href="property-list.html"> <i
                        class="fa fa-angle-double-left"></i> Back to Results</a></div>

            </div>
        </div>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9 page-content col-thin-right">
                    <div class="inner inner-box ads-details-wrapper">
                        <h1 class="auto-heading"><span
                                class="auto-title left"><?=$Product['title']?></span> <span
                                class="auto-price pull-right"> Rs: <?= number_format($Product['price'])?></span></h1>

                        <div style="clear:both;"></div>
                        <span class="info-row"> <span class="date"><i class=" icon-clock"> </i><?= date('d M Y m:i A', strtotime($Product['created']))?> </span> -
                            <span class="item-location"> <?php if($Location){ echo $Location['name'].',' ;}?> <?php if($City){ echo $City['title'] ;}?> |
                                <a class="scrollto" href="#prop-map"><i
                                        class="fa fa-map-marker"></i> Map</a>  </span> </span>


                        <div class="row ">
                            <div class="col-sm-9 automobile-left-col">

                                <div class="ads-image">
                                    <ul class="bxslider">
                                        <li><img src="<?=$site_url?>images/house/2.jpg" alt="img"/></li>
                                        <li><img src="<?=$site_url?>images/house/4.jpg" alt="img"/></li>
                                        <li><img src="<?=$site_url?>images/house/11.jpg" alt="img"/></li>
                                        <li><img src="<?=$site_url?>images/house/14.jpg" alt="img"/></li>
                                        <li><img src="<?=$site_url?>images/house/b12.jpg" alt="img"/></li>
                                        <li><img src="<?=$site_url?>images/house/13.jpg" alt="img"/></li>
                                        <li><img src="<?=$site_url?>images/house/14.jpg" alt="img"/></li>
                                    </ul>

                                    <div class="product-view-thumb-wrapper">


                                        <ul id="bx-pager" class="product-view-thumb">
                                            <li><a  data-slide-index="0" class="thumb-item-link"  href="#"><img
                                                    src="<?=$site_url?>images/house/thumb/2.jpg" alt="img"/></a></li>
                                            <li  ><a data-slide-index="1" class="thumb-item-link" href="#"><img
                                                    src="<?=$site_url?>images/house/thumb/4.jpg" alt="img"/></a></li>
                                            <li ><a data-slide-index="2" class="thumb-item-link"  href="#"><img
                                                    src="<?=$site_url?>images/house/thumb/11.jpg" alt="img"/></a></li>
                                            <li ><a data-slide-index="3" class="thumb-item-link"  href="#"><img
                                                    src="<?=$site_url?>images/house/thumb/14.jpg" alt="img"/></a></li>
                                            <li  ><a data-slide-index="4" class="thumb-item-link" href="#"><img
                                                    src="<?=$site_url?>images/house/thumb/b12.jpg" alt="img"/></a></li>
                                            <li ><a data-slide-index="5" class="thumb-item-link"  href="#"><img
                                                    src="<?=$site_url?>images/house/thumb/14.jpg" alt="img"/></a></li>
                                        </ul>


                                    </div>

                                </div>
                                <!--ads-image-->
                            </div>
                            <!-- /.automobile-left-col-->

                            <div class="col-sm-3 automobile-right-col">
                                <div class="inner">

                                    <div class="key-features">
                                        <div class="media">

                                            <div class="media-body">
                                                <span class="data-type">Area</span>
                                                <span class="media-heading"><?=$Product['area']?> <?=$Product['area_unit']?></span>
                                              
                                            </div>
                                        </div>

                                        <div class="media">

                                            <div class="media-body">
                                              <span class="data-type">Rooms</span>
                                                <span class="media-heading"><?=$Product['bedrooms']?> Bed, <?=$Product['bathrooms']?>  Bath</span>
                                                
                                            </div>
                                        </div>
                                        
                                          <div class="media">

                                            <div class="media-body">
                                               <span class="data-type">Property Type</span>
                                                <span class="media-heading"><?=$ProductType['title']?></span>
                                               
                                            </div>
                                        </div>
										
                                         <div class="media">

                                            <div class="media-body">
                                               <span class="data-type">Available For</span>
                                                <span class="media-heading"><?=$Product['purpose']?></span>
                                               
                                            </div>
                                        </div>
                                        
                                        
                                        <?php /*?><div class="media">

                                            <div class="media-body">
                                                <span class="media-heading">6 months</span>
                                                <span class="data-type">min. rental period</span>
                                            </div>
                                        </div>

                                      

                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-heading">15.09.2016 </span>
                                                <span class="data-type">available from</span>
                                            </div>
                                        </div>


                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-heading">Covered Parking</span>
                                                <span class="data-type"> Parking</span>
                                            </div>
                                        </div>

                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-heading">Yes</span>
                                                <span class="data-type"> Furnished</span>
                                            </div>
                                        </div>


                                        <div class="media">
                                            <div class="media-body">
                                                <span class="media-heading">CD-TM-5680</span>
                                                <span class="data-type"> Property Reference</span>
                                            </div>
                                        </div><?php */?>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--/.row-->


                        <div class="Ads-Details">
                            <h5 class="list-title"><strong>Property Details</strong></h5>

                            <div class="row">
                                <div class="ads-details-info col-md-8">
                                    <p><?=$Product['description']?>
                                    <h4 class="text-uppercase">Property features</h4>


                                    <ul class="list-circle">
									   			
                                        <li>KfW Efficiency House 70 standard (EnEV 2014)</li>
                                        <li>Controlled ventilation with heat recovery</li>
                                        <li>Floor heating in all rooms</li>
                                        <li>Additional towel radiator in bath and shower products</li>
                                        <li>Shower units with floor-level shower trays</li>
                                        <li>Windows with 3 triple glazing</li>
                                        <li>Utility Room</li>
                                        <li>Three Further Double Bedrooms</li>
                                        <li>Entrance Hall</li>

                                    </ul>
                                    <h4 class="text-uppercase">Property info </h4>
                                    <ul class="list-circle">
                                        <li>3 bathrooms + guest toilet</li>
                                        <li>Furnished</li>
                                        <li>Private garden and terrace - with balcony or winter garden (OG)</li>
                                        <li>Garage and outdoor parking space</li>
                                    </ul>

                                    <h4 class="text-uppercase">Contact Details </h4>
                                    <address>
                                        <p>                                            
                                            Name: <?=$Product['contact_name']?><br>
                                            Phone Number: <?=$Product['contact_mobile']?><br>
                                            E-Mail: <?=$Product['contact_email']?><br>
                                           </p>
                                    </address>


                                </div>
                                <div class="col-md-4">
                                    <aside class="panel panel-body panel-details">
                                        <ul>
                                            <li>
                                                <p class=" no-margin "><strong>Price:</strong> <?= number_format($Product['price'])?> </p>
                                            </li>

                                            <li>
                                                <p class="no-margin"><strong>Property Type:</strong> <?=$ProductType['title']?></p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Size:</strong><?=$Product['area']?> <?=$Product['area_unit']?></p>
                                            </li>

                                            <li>
                                                <p class="no-margin"><strong>Location:</strong> <?php if($Location){ echo $Location['name'].',' ;}?> <?php if($City){ echo $City['title'] ;}?> </p>
                                            </li>
                                            <li>
                                                <p class=" no-margin "><strong>Available For:</strong> <?=$Product['purpose']?></p>
                                            </li>
                                            <li>
                                                <p class="no-margin"><strong>Room:</strong> <?=$Product['bedrooms']?> </p>
                                            </li>
                                           


                                        </ul>
                                    </aside>
                                    <div class="ads-action">
                                        <ul class="list-border">
                                            <li><a href="#"> <i class=" fa fa-user"></i> More ads by User </a></li>
                                            <li><a href="#"> <i class=" fa fa-heart"></i> Save ad </a></li>
                                            <li><a href="#"> <i class="fa fa-share-alt"></i> Share ad </a></li>
                                            <li><a href="#reportAdvertiser" data-toggle="modal"> <i
                                                    class="fa icon-info-circled-alt"></i> Report abuse </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                               
                                    <div class="subhead" id="headingOne" style=" padding:  0px 0px !important; margin-top:  0px; width: 100%">
                                        <h5 class="mb-0">
                                            <div class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Property Features
                                            </div>
                                        </h5>
                                    </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="subhead">Main Features</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Double Glazed Windows</div>
                                                        <div class="col-lg-3"><?=($Product['double_glazed_windows'])?'Yes':'NO'?> </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Central Air Conditioning</div>
                                                        <div class="col-lg-3"><?=($Product['central_air_conditioning'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Central Heating</div>
                                                        <div class="col-lg-3"><?=($Product['central_heating'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Furnished</div>
                                                        <div class="col-lg-3"><?=($Product['furnished'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9 ">Electricity Backup</div>
                                                        <div class="col-lg-3">
                                                        <?=($Product['electricity_backup'])?$Product['electricity_backup']:'NO'?>
                                                        
                                                        </div>
                                                    </div>      
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Flooring</div>
                                                        <div class="col-lg-3">
                                                         <?=($Product['flooring'])?$Product['flooring']:'NO'?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Built in year</div>
                                                        <div class="col-lg-3"><?=($Product['built_in_year'])?$Product['built_in_year']:'NO'?>
														
														</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">View</div>
                                                        <div class="col-lg-3"><?=($Product['view'])?$Product['view']:'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Parking Spaces</div>
                                                        <div class="col-lg-3"><?=($Product['parking_spaces'])?$Product['parking_spaces']:'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Floors</div>
                                                        <div class="col-lg-3"><?=($Product['floors'])?$Product['floors']:'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Other Main Features</div>
                                                        <div class="col-lg-3"><?=($Product['other_main_features'])?$Product['other_main_features']:'NO'?></div>
                                                    </div> 
                                                </div>


                                                <div class="col-lg-4">
                                                    <div class="subhead">Rooms</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Drawing Room</div>
                                                        <div class="col-lg-3"><?=($Product['drawing_room'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Dining Room</div>
                                                        <div class="col-lg-3"><?=($Product['dining_room'])?'YES':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Study Room</div>
                                                        <div class="col-lg-3"><?=($Product['study_room'])?'YES':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Prayer Room</div>
                                                        <div class="col-lg-3"><?=($Product['prayer_room'])?'YES':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Powder Room</div>
                                                        <div class="col-lg-3"><?=($Product['powder_room'])?'YES':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Gym</div>
                                                        <div class="col-lg-3"><?=($Product['gym'])?'YES':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Sitting Room</div>
                                                        <div class="col-lg-3"><?=($Product['sitting_room'])?'YES':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Laundry  Room</div>
                                                        <div class="col-lg-3"><?=($Product['laundry_room'])?'YES':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Steam  Room</div>
                                                        <div class="col-lg-3"><?=($Product['steam_room'])?'YES':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Bedrooms</div>
                                                        <div class="col-lg-3"><?=($Product['f_bedrooms'])?$Product['f_bedrooms']:'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Bathroom</div>
                                                        <div class="col-lg-3"><?=($Product['f_bathroom'])?$Product['f_bathroom']:'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Servant Quarters</div>
                                                        <div class="col-lg-3"><?=($Product['servant_quarters'])?$Product['servant_quarters']:'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Kitchens</div>
                                                        <div class="col-lg-3"><?=($Product['kitchens'])?$Product['kitchens']:'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Store Rooms</div>
                                                        <div class="col-lg-3"><?=($Product['store_rooms'])?$Product['store_rooms']:'NO'?></div>
                                                    </div> 
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Other Rooms</div>
                                                        <div class="col-lg-3"><?=($Product['other_rooms'])?$Product['other_rooms']:'NO'?></div>
                                                    </div>
                                                </div>  

                                                <div class="col-lg-4">
                                                    <div class="subhead">Business and Communication</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Broadband Internet Access</div>
                                                        <div class="col-lg-3"><?=($Product['broadband_internet_access'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Satellite or Cable TV Ready</div>
                                                        <div class="col-lg-3"><?=($Product['satellite_cable_tv_ready'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Intercom</div>
                                                        <div class="col-lg-3"><?=($Product['intercom'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Others</div>
                                                        <div class="col-lg-3"><?=($Product['c_others'])?$Product['c_others']:'NO'?></div>
                                                    </div> 

                                                    <div class="subhead">Healthcare Recreational</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Lawn or Garden</div>
                                                        <div class="col-lg-3"><?=($Product['lawn_or_garden'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Swimming Pool</div>
                                                        <div class="col-lg-3"><?=($Product['swimming_pool'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Jacuzzi</div>
                                                        <div class="col-lg-3"><?=($Product['jacuzzi'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Others</div>
                                                        <div class="col-lg-3"><?=($Product['h_others'])?$Product['h_others']:'NO'?></div>
                                                    </div> 
                                                    <div class="subhead">Other Facilities</div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Maintenance Staff</div>
                                                        <div class="col-lg-3"><?=($Product['maintenance_staff'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Security Staff</div>
                                                        <div class="col-lg-3"><?=($Product['security_staff'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Facilities for Disabled</div>
                                                        <div class="col-lg-3"><?=($Product['facilities_for_disabled'])?'Yes':'NO'?></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div  class="col-lg-9">Others</div>
                                                        <div class="col-lg-3"><?=($Product['of_others'])?$Product['of_others']:'NO'?></div>
                                                    </div> 
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="subhead">Nearby Locations</div>
                                                <div class="col-lg-4">
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">School</div>
                                                        <div class="col-lg-6"><?=($Product['n_c_school'])?$Product['n_c_school']:'NO'?></div>

                                                        <div  class="col-lg-6">Hospital</div>
                                                        <div class="col-lg-6"><?=($Product['n_c_hospital'])?$Product['n_c_hospital']:'NO'?></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Restaurants</div>
                                                        <div class="col-lg-6"><?=($Product['n_c_restaurants'])?$Product['n_c_restaurants']:'NO'?></div>

                                                        <div  class="col-lg-6">Shopping Malls</div>
                                                        <div class="col-lg-6"><?=($Product['n_c_shopping_malls'])?$Product['n_c_shopping_malls']:'NO'?></div>
                                                    </div> 
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group row">
                                                        <div  class="col-lg-6">Distance From Airport (kms)</div>
                                                        <div class="col-lg-6"><?=($Product['n_c_distance_from_airport'])?$Product['n_c_distance_from_airport']:'NO'?></div>

                                                        <div  class="col-lg-6">Others</div>
                                                        <div class="col-lg-6"><?=($Product['n_c_others'])?$Product['n_c_others']:'NO'?></div>
                                                    </div> 
                                                </div>
                                            </div>
                                      
                                
                            
                            <div class="content-footer text-left">
                                <div class="w100 map" id="prop-map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387145.86637487786!2d-74.25819556904787!3d40.70531103651696!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY!5e0!3m2!1sen!2sus!4v1473181424956"
                                            height="350" style="border:0;   width:100%"></iframe>
                                </div>
                                <div style="clear: both"></div>

                                <a class="btn  btn-default" data-toggle="modal"
                                   href="#contactAdvertiser"><i
                                        class=" icon-mail-2"></i> Send a message </a> <a class="btn  btn-info"
                                                                                         href="tel:<?=$Product['contact_mobile']?>"><i
                                    class=" icon-phone-1"></i> <?=$Product['contact_mobile']?> </a></div>
                        </div>
                    </div>
                    <!--/.ads-details-wrapper-->

                </div>
                <!--/.page-content-->

                <div class="col-md-3  page-sidebar-right">
                    <aside>
                        <div class="card sidebar-card card-contact-seller">
                            <div class="card-header">Contact Dealer</div>
                            <div class="card-content user-info">
                                <div class="card-body text-center">
                                    <div class="seller-info">
                                        <div class="company-logo-thumb">
                                            <a><img src="<?=$site_url?>images/property-agency-logo.png" class=" " alt="img"> </a>
                                        </div>
                                        <h3 class="no-margin"> Property Agency </h3>

                                        <p>Location: <strong>New York</strong></p>

                                        <p> Web: <strong>www.demoweb.com</strong></p>
                                    </div>
                                    <div class="user-ads-action">

                                        <a href="#" data-toggle="modal" class="btn   btn-danger btn-block"><i
                                                class=" icon-link"></i> View Details </a>
                                        <a href="#contactAdvertiser" data-toggle="modal"
                                           class="btn   btn-info btn-block"><i class=" icon-mail-2"></i> Send Enquiry
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card sidebar-card">
                            <div class="card-header">Safety Tips for Buyers</div>
                            <div class="card-content">
                                <div class="card-body text-left">
                                    <ul class="list-check">
                                        <li> Meet seller at a public place</li>
                                        <li> Check the item before you buy</li>
                                        <li> Pay only after collecting the item</li>
                                    </ul>
                                    <p><a class="pull-right" href="#"> Know more <i
                                            class="fa fa-angle-double-right"></i> </a></p>
                                </div>
                            </div>
                        </div>
                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
            </div>
        </div>
    </div>
    <!-- Modal contactAdvertiser -->

<div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><i class=" icon-mail-2"></i> Contact advertiser </h4>

				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
						class="sr-only">Close</span></button>
			</div>
			<div class="modal-body">
				<form role="form">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Name:</label>
						<input class="form-control required" id="recipient-name" placeholder="Your name"
							   data-placement="top" data-trigger="manual"
							   data-content="Must be at least 3 characters long, and must only contain letters."
							   type="text">
					</div>
					<div class="form-group">
						<label for="sender-email" class="control-label">E-mail:</label>
						<input id="sender-email" type="text"
							   data-content="Must be a valid e-mail address (user@gmail.com)" data-trigger="manual"
							   data-placement="top" placeholder="email@you.com" class="form-control email">
					</div>
					<div class="form-group">
						<label for="recipient-Phone-Number" class="control-label">Phone Number:</label>
						<input type="text" maxlength="60" class="form-control" id="recipient-Phone-Number">
					</div>
					<div class="form-group">
						<label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
						<textarea class="form-control" id="message-text" placeholder="Your message here.."
								  data-placement="top" data-trigger="manual"></textarea>
					</div>
					<div class="form-group">
						<p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not
							valid. </p>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-success pull-right">Send message!</button>
			</div>
		</div>
	</div>
</div>



<script src="<?=$site_url?>assets/plugins/bxslider/jquery.bxslider.min.js"></script>
<script>

    $(document).ready(function () {

            // Slider
        var $mainImgSlider = $('.bxslider').bxSlider({
            speed:1000,
            pagerCustom: '#bx-pager',
            controls: false,
            adaptiveHeight: true
          });

        // initiates responsive slide
        var settings = function () {
            var mobileSettings = {
                slideWidth: 80,
                minSlides: 2,
                maxSlides: 5,
                slideMargin: 5,
                adaptiveHeight: true,
                pager: false,

            };
            var pcSettings = {
                slideWidth: 100,
                minSlides: 3,
                maxSlides: 5,
                pager: false,
                slideMargin: 10,
                adaptiveHeight: true
            };
            return ($(window).width() < 768) ? mobileSettings : pcSettings;
        }

        var thumbSlider;

        function tourLandingScript() {
            thumbSlider.reloadSlider(settings());
        }

        thumbSlider = $('.product-view-thumb').bxSlider(settings());
        $(window).resize(tourLandingScript);

    });
</script>