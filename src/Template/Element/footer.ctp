<?php $site_url = $this->Url->build('/',true); ?>
<footer class="main-footer">
    	<div class="footer-content">
    		<div class="container">
    			<div class="row">

    				<div class=" col-xl-4 col-xl-4 col-md-4 col-6  ">
    					<div class="footer-col">
    						<h4 class="footer-title">About us</h4>
                                                <b>Address:</b> company name, street, city, Country.
                                                <b>Email:</b> <?=$SiteInfo['contact_email']?></br>
                                                <b>Phone:</b> <?=$SiteInfo['phone']?>
    					</div>
    				</div>

    				<div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
    					<div class="footer-col">
    						<h4 class="footer-title">More From Us</h4>
    						<ul class="list-unstyled footer-nav">
    							<li><a href="<?=$site_url?>pages/about">About Us</a></li>
    							<li><a href="<?=$site_url?>pages/contact">Contact Us</a></li>
    							<li><a href="<?=$site_url?>pages/privacy"> Privacy Policy</a></li> 
    						</ul>
    					</div>
    				</div>
    				<div class=" col-xl-2 col-xl-2 col-md-2 col-6  ">
    					<div class="footer-col">
    						<h4 class="footer-title">Account</h4>
    						<ul class="list-unstyled footer-nav">
    							<li><a href="<?=$site_url?>products/add"> Post Add</a></li>
                                 <?php
						    if($sUser){
								?>
    							<li><a href="<?=$site_url?>users/dashboard">My Account</a></li>
    							
    						<?php }else{
								?>
                                <li><a href="<?=$site_url?>users/login">Login</a></li>
    							<li><a href="<?=$site_url?>users/signup">Register</a></li>
                                
								<?php }	?>
    						</ul>
    					</div>
    				</div>
    				<div class=" col-xl-4 col-xl-4 col-md-4 col-12">
    					<!--<div class="footer-col row">

    						<div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
    							<div class="mobile-app-content">
    								<h4 class="footer-title">Mobile Apps</h4>
    								<div class="row ">
    									<div class="col-6  ">
    										<a class="app-icon" target="_blank"  href="https://itunes.apple.com/">
    											<span class="hide-visually">iOS app</span>
    											<img src="<?=$site_url?>images/site/app_store_badge.svg" alt="Available on the App Store">
    										</a>
    									</div>
    									<div class="col-6  ">
    										<a class="app-icon"  target="_blank" href="https://play.google.com/store/">
    											<span class="hide-visually">Android App</span>
    											<img src="<?=$site_url?>images/site/google-play-badge.svg" alt="Available on the App Store">
    										</a>
    									</div>
    								</div>
    							</div>
    						</div>-->

    						<!--<div class="col-sm-12 col-xs-6 col-xxs-12 no-padding-lg">
    							<div class="hero-subscribe"> -->
                                                <div class="footer-col">
    								<h4 class="footer-title">Follow us on</h4>
    								<ul class="list-unstyled list-inline footer-nav social-list-footer social-list-color footer-nav-inline">
    									<li><a class="icon-color fb" title="Facebook" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-facebook"></i> </a></li>
    									<li><a class="icon-color tw" title="Twitter" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-twitter"></i> </a></li>
    									<li><a class="icon-color gp" title="Google+" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-google-plus"></i> </a></li>
    									<li><a class="icon-color lin" title="Linkedin" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-linkedin"></i> </a></li>
    									<li><a class="icon-color pin" title="Linkedin" data-placement="top" data-toggle="tooltip" href="#"><i class="fa fa-pinterest-p"></i> </a></li>
    								</ul>
                                                </div>
    							<!--</div>

    						</div>-->
    					</div>
    				</div>
    				<div style="clear: both"></div>

    				<div class="col-xl-12">
    					<div class="copy-info text-center">
    						<?=$SiteInfo['copy_rights']?>
    					</div>

    				</div>

    			</div>
    		</div>
    	</div>
    </footer>