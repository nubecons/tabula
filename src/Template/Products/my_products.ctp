<?php $site_url = $this->Url->build('/',true);?> 

<div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-3 page-sidebar">
                    <?=$this->element('user_property_management')?>
                </div>
                <!--/.page-sidebar-->

                <div class="col-md-9 page-content">
                    <div class="inner-box">
                        <h2 class="title-2"><i class="icon-hourglass"></i> Listing </h2>

                        <div class="table-responsive">
                            <div class="table-action">
                                <label for="checkAll">
                                    <input type="checkbox" id="checkAll">
                                    Select: All | <a href="#" class="btn btn-sm btn-danger">Delete <i
                                        class="glyphicon glyphicon-remove "></i></a> </label>

                                <div class="table-search pull-right col-sm-7">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-5 control-label text-right">Search <br>
                                                <a title="clear filter" class="clear-filter" href="#clear">[clear]</a>
                                            </label>

                                            <div class="col-sm-7 searchpan">
                                                <input type="text" class="form-control" id="filter">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
							  if(count($Products) == 0 ){
								  echo "No Listings Found!";
								  }else{ ?>
                            
                            <table id="addManageTable"
                                   class="table table-striped table-bordered add-manage-table table demo"
                                   data-filter="#filter" data-filter-text-only="true">
                                <thead>
                                <tr>
                                    <th data-type="numeric" data-sort-initial="true"></th>
                                    <th> Photo</th>
                                    <th data-sort-ignore="true"> Adds Details</th>
                                    <th data-type="numeric"> Price</th>
                                    <th> Option</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach($Products as $Product){?>
                                <tr>
                                    <td style="width:2%" class="add-img-selector">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </td>
                                    <td style="width:14%" class="add-img-td"><a href="#"><img
                                            class="thumbnail  img-responsive"
                                            src="<?=$site_url?>images/item/FreeGreatPicture.com-46407-nexus-4-starts-at-199.jpg"
                                            alt="img"></a></td>
                                    <td style="width:58%" class="ads-details-td">
                                        <div>
                                            <p><strong> <a href="#" title="Brand New Nexus 4"><?=$Product['title']?></a> </strong></p>

                                            <p><strong> Posted On </strong>:
                                               <?= date('d M Y m:i A', strtotime($Product['created']))?>  </p>

                                            <p><strong>Visitors </strong>: 221 <strong>Located In:</strong> 
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
                                            
                                            </p>
                                        </div>
                                    </td>
                                    <td style="width:16%" class="price-td">
                                        <div><strong> Rs:<?=$Product['price']?></strong></div>
                                    </td>
                                    <td style="width:10%" class="action-td">
                                        <div>
                                            <p><a class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Edit </a>
                                            </p>

                                            <p><a class="btn btn-danger btn-sm"> <i class=" fa fa-trash"></i> Delete
                                            </a></p>
                                        </div>
                                    </td>
                                </tr>
                               <?php }?>
                               
                                </tbody>
                            </table>
                            
                             <?php }?>
                        </div>
                        <!--/.row-box End-->

                    </div>
                </div>
                <!--/.page-content-->
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->
    </div>