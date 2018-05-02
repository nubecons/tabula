<?php $site_url = $this->Url->build('/',true); ?> 


 <?php echo $this->requestAction('/products/search_element' , [ 'post' => [ 'purpose' => isset($purpose)?$purpose:'']]);?>

    <!-- /.search-row -->
    <div class="main-container">
        <div class="container">
            <div class="row">
                <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
                <div class="col-md-3 page-sidebar mobile-filter-sidebar">
                    <aside>
                        <div class="inner-box">
                            <div class="categories-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">All Categories</a></strong></h5>
                                <ul class=" list-unstyled">
                                <?php foreach($ProductTypes as $ProductType){?>
                                    <li><a href="#"><span
                                            class="title"><?=$ProductType?></span><span class="count">&nbsp;<?php echo rand(1000, 5000); ?></span></a>
                                    </li>
                                    <?php }?>
                                   
                                </ul>
                            </div>
                            <!--/.categories-list-->

                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="#"> Atlanta </a></li>
                                    <li><a href="#"> Wichita </a></li>
                                    <li><a href="#"> Anchorage </a></li>
                                    <li><a href="#"> Dallas </a></li>
                                    <li><a href="#">New York </a></li>
                                    <li><a href="#"> Santa Ana/Anaheim </a></li>
                                    <li><a href="#"> Miami </a></li>
                                    <li><a href="#"> Virginia Beach </a></li>
                                    <li><a href="#"> San Diego </a></li>
                                    <li><a href="#"> Boston </a></li>
                                    <li><a href="#"> Houston </a></li>
                                    <li><a href="#">Salt Lake City </a></li>
                                    <li><a href="#"> Other Locations </a></li>
                                </ul>
                            </div>
                            <!--/.locations-list-->

                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>

                                <form role="form" class="form-inline ">
                                    <div class="form-group col-lg-4 col-md-12 no-padding">
                                        <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-1 col-md-12 no-padding text-center hidden-md"> -</div>
                                    <div class="form-group col-lg-4 col-md-12 no-padding">
                                        <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-3 col-md-12 no-padding">
                                        <button class="btn btn-default pull-right btn-block-md" type="submit">GO
                                        </button>
                                    </div>
                                </form>
                                <div style="clear:both"></div>
                            </div>
                            <!--/.list-filter-->
                            <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="#"><strong>All Ads</strong> <span
                                            class="count">228,705</span></a></li>
                                    <li><a href="#">Business <span
                                            class="count">28,705</span></a></li>
                                    <li><a href="#">Personal <span
                                            class="count">18,705</span></a></li>
                                </ul>
                            </div>
                            <!--/.list-filter-->
                           <?php /*?> <div class="locations-list  list-filter">
                                <h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
                                <ul class="browse-list list-unstyled long-list">
                                    <li><a href="#">New <span class="count">228,705</span></a>
                                    </li>
                                    <li><a href="#">Used <span class="count">28,705</span></a>
                                    </li>
                                    <li><a href="#">None </a></li>
                                </ul>
                            </div><?php */?>
                            <!--/.list-filter-->
                            <div style="clear:both"></div>
                        </div>

                        <!--/.categories-list-->
                    </aside>
                </div>
                <!--/.page-side-bar-->
                <div class="col-md-9 page-content col-thin-left">

                    <div class="category-list">
                        <div class="tab-box ">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs add-tabs" role="tablist">
                                <li class="active nav-item"><a href="#allAds" role="tab" data-toggle="tab" class="nav-link">All Ads <span class="badge badge-pill badge-secondary"><?=$this->Paginator->param('count');?></span></a>
                                </li>
                            </ul>
                            <div class="tab-filter">
                                <select title="sort by" class="selectpicker select-sort-by" data-style="btn-select"
                                        data-width="auto">
                                    <option>Sort by</option>
                                    <option>Price: Low to High</option>
                                    <option>Price: High to Low</option>
                                </select>
                            </div>

                        </div>
                        <!--/.tab-box-->
                        <!--/.tab-box-->

                        <div class="listing-filter">
                            <div class="pull-left col-xs-6">
                                <div class="breadcrumb-list"><a href="#" class="current"> <span>All Properties</span></a> in
                                    <!-- cityName will replace with selected location/area from location modal -->
                                    <span class="cityName"> New York </span> <a href="#selectRegion" id="dropdownMenu1"
                                                                                data-toggle="modal"> <span
                                            class="caret"></span> </a></div>
                            </div>
                            <div class="pull-right col-xs-6 text-right listing-view-action"><span
                                    class="list-view active"><i class="  icon-th"></i></span> <span
                                    class="compact-view"><i class=" icon-th-list  "></i></span> <span
                                    class="grid-view "><i class=" icon-th-large "></i></span></div>
                            <div style="clear:both"></div>
                        </div>
                        <!--/.listing-filter-->

                        <!-- Mobile Filter bar-->
                        <div class="mobile-filter-bar col-xl-12  ">
                            <ul class="list-unstyled list-inline no-margin no-padding">
                                <li class="filter-toggle">
                                    <a class="">
                                        <i class="  icon-th-list"></i>
                                        Filters
                                    </a>
                                </li>
                                <li>


                                    <div class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle">Short
                                            by </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" rel="nofollow">Relevance</a></li>
                                            <li><a href="#" rel="nofollow">Date</a></li>
                                            <li><a href="#" rel="nofollow">Company</a></li>
                                        </ul>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="menu-overly-mask"></div>
                        <!-- Mobile Filter bar End-->


                        <div class="adds-wrapper property-list">
                        <?php
						   foreach($Products as $Product){?>
                        
                            <div class="item-list">

                                <div class="row">


                                <div class="col-md-3 no-padding photobox">
                                    <div class="add-image"><span class="photo-count"><i
                                            class="fa fa-camera"></i> 2 </span> <a href="<?=$site_url?>products/detail/<?=$Product['id']?>"><img
                                            class="thumbnail no-margin" src="<?=$site_url?>images/house/thumb/2.jpg"
                                            alt="img"></a></div>
                                </div>
                                <!--/.photobox-->
                                <div class="col-md-6 add-desc-box">
                                    <div class="ads-details">
                                        <h5 class="add-title"><a href="<?=$site_url?>products/detail/<?=$Product['id']?>">
                                            <?=$Product['title']?> </a></h5>
                                        <span class="info-row"> <span class="item-location">
										<?php $Location = $this->GetInfo->getLocation($Product['location_id']) ;
										 if($Location){
											 echo $Location['name'].',';
											 }
										?> 
                                        <?php $City = $this->GetInfo->getCity($Product['city_id']) ;
										 if($City){
											 echo $City['title'].',';
											 }
										?>
                                        |  <a><i
                                                class="fa fa-map-marker"></i> Map</a>  </span> </span>
                                    <div class="prop-info-box">

                                        <div class="prop-info">
                                           <?php /*?> <div class="clearfix prop-info-block">
                                                <span class="title ">4+2</span>
                                                <span class="text">Adults | Children</span>
                                            </div><?php */?>
                                            <div class="clearfix prop-info-block <?php /*?>middle<?php */?>">
                                                <span class="title prop-area"><?=$Product['area']?> <?=$Product['area_unit']?></span>
                                                <span class="text">Area</span>
                                            </div>
                                            <div class="clearfix prop-info-block">
                                                <span class="title prop-room"><?=$Product['bedrooms']?></span>
                                                <span class="text">room </span>
                                            </div>

                                        </div>
                                    </div>

                                    </div>

                                </div>
                                <!--/.add-desc-box-->
                                <div class="col-md-3 text-right  price-box">


                                           <a class="btn btn-border-thin  btn-save"   title="save ads"  data-toggle="tooltip" data-placement="left">
                                        <i class="icon icon-heart"></i>
                                    </a>
                                    <a class="btn btn-border-thin  btn-share ">
                                        <i class="icon icon-export" data-toggle="tooltip" data-placement="left"  title="share"></i>
                                    </a>

                                    <h3 class="item-price "> <strong>Rs:<?=$Product['price']?></strong></h3>
                                     <div style="clear: both"></div>

                                    <a class="btn btn-success btn-sm bold" href="<?=$site_url?>products/detail/<?=$Product['id']?>">
                                        Details
                                    </a>


                                </div>
                                <!--/.add-desc-box-->
                                    </div>
                            </div>
                            <!--/.item-list-->
						  <?php } ?>				


<?php /*?>
                            <div class="item-list">

                                <div class="row">
                                <div class="col-md-3 no-padding photobox">
                                    <div class="add-image">
                                        <div id="properites-image-slide" class="carousel slide" data-ride="carousel"
                                             data-interval="false">
                                            <!-- Wrapper for slides -->
                                            <div class="carousel-inner" role="listbox">
                                                <div class="item active carousel-item">
                                                    <img src="images/house/thumb/4.jpg" alt="...">
                                                </div>
                                                <div class="item carousel-item">
                                                    <img src="images/house/thumb/5.jpg" alt="...">
                                                </div>
                                                <div class="item carousel-item">
                                                    <img src="images/house/thumb/6.jpg" alt="...">
                                                </div>
                                            </div>
                                            <!-- Controls -->

                                            <a class="left carousel-control" href="#properites-image-slide" role="button"
                                                                 data-slide="prev">

                                            <span class="icon icon-left-open-big icon-prev" aria-hidden="true"></span>

                                            <span class="sr-only">Previous</span>

                                        </a>
                                            <a class="right carousel-control"
                                               href="#properites-image-slide" role="button" data-slide="next">

                                                <span class="icon icon-right-open-big icon-next" aria-hidden="true"></span>

                                                <span class="sr-only">Next</span>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.photobox-->
                                <div class="col-md-6 add-desc-box">
                                    <div class="ads-details">
                                        <h5 class="add-title"><a href="property-details.html">
                                            Wow ! This item has a image slider ! </a></h5>
                                        <span class="info-row"> <span class="item-location">544 Union Avenue, Brooklyn, NY 11211 |  <a><i
                                                class="fa fa-map-marker"></i> Map</a>  </span> </span>
                                        <div class="prop-info-box">

                                            <div class="prop-info">
                                                <div class="clearfix prop-info-block">
                                                    <span class="title ">4+2</span>
                                                    <span class="text">Adults | Children</span>
                                                </div>
                                                <div class="clearfix prop-info-block middle">
                                                    <span class="title prop-area">171 m²</span>
                                                    <span class="text">Area (ca.)</span>
                                                </div>
                                                <div class="clearfix prop-info-block">
                                                    <span class="title prop-room">4</span>
                                                    <span class="text">room </span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--/.add-desc-box-->
                                <div class="col-md-3 text-right  price-box">


                                           <a class="btn btn-border-thin  btn-save"   title="save ads"  data-toggle="tooltip" data-placement="left">
                                        <i class="icon icon-heart"></i>
                                    </a>
                                    <a class="btn btn-border-thin  btn-share ">
                                        <i class="icon icon-export" data-toggle="tooltip" data-placement="left"  title="share"></i>
                                    </a>

                                    <h3 class="item-price "> <strong>$2400 - $4260 </strong></h3>
                                    <div style="clear: both"></div>

                                     <a class="btn btn-success btn-sm bold" href="property-details.html">
                                        Check Availabilty
                                    </a>


                                </div>
                                <!--/.add-desc-box-->
                                 </div>
                            </div>
                            <!--/.item-list--><?php */?>


                        </div>
                        <!--/.adds-wrapper-->

                        <div class="tab-box  save-search-bar text-center"><a href="#"> <i class=" icon-star-empty"></i>
                            Save Search </a></div>
                    </div>
                    <div class="pagination-bar text-center">
                    	<nav aria-label="Page navigation " class="d-inline-b">
                   
                        
                    		<ul class="pagination">
                            
                            
								<?php
                                 if( $this->Paginator->numbers() ){
                                      $this->Paginator->options(['modulus' =>2 , 'url' => ['direction' => null, 'sort' => null]]);
                                    echo $this->Paginator->prev(__('<Last'), array(), null, array('class' => 'prev disabled'));
                                    echo $this->Paginator->numbers(array('modulus' =>4 ));
                                    echo $this->Paginator->next(__('next>') , array(), null, array('class' => 'next disabled'));
                                  }
                                  ?>
                                  </ul>
								
                    	</nav>
                    </div>
                    <!--/.pagination-bar -->

                    <div class="post-promo text-center">
                        <h2> Do you get anything for sell ? </h2>
                        <h5>Sell your products online FOR FREE. It's easier than you think !</h5>
                        <a href="<?=$site_url?>products/add" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a>
                    </div>
                    <!--/.post-promo-->

                </div>
                <!--/.page-content-->

            </div>
        </div>
    </div>
    
    <script>
	function check_member(val){
	
		if(val == '2'){
			
			$('#already_member_div').hide();
			$('#new_member_div').show();
			
			}else{
			
			$('#already_member_div').show();
			$('#new_member_div').hide();	
			
			}
		
		
		}
	

$( document ).ready(function() {
	   check_member('1');
	});	
		
	</script>