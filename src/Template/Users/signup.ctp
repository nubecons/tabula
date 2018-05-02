<?php $site_url = $this->Url->build('/',true);
      $landing_url = $site_url.'landing/';
 ?>     
    <!-- ***** Welcome Area Start ***** -->
    <section class="wellcome_area clearfix" id="home" style="height:550px;">
   
    <!-- ***** Contact Us Area Start ***** -->
    <section class="clearfix" id="contact">
    
        <div class="container">
         
     <div class="row">
                <div class="col-md-5 login_box" style="margin-top:35px;" >
                  <div class="panel-intro text-center" style="padding-top:10px;">
                            <h2 class="logo-title">
                                <!-- Original Logo will be placed here  -->
                                <span class="logo-icon"><i
                                        class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> SIGNUP<span></span>
                            </h2>
                        </div>
                        <?= $this->Flash->render() ?>
                 <?= $this->Flash->render() ?>
                    <!-- Form Start-->
                    <div class="contact_from">
                           <?php echo $this->Form->create($user, ["class" => "form-horizontal" ,  'id' => 'UserSignupForm', 'enctype' => 'multipart/form-data']); ?>
                            <!-- Message Input Area Start -->
                            <div class="contact_input_area">
                                <div class="row">
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                           <?php echo $this->Form->text('company', array('required' => true, 'class' => 'form-control', 'placeholder' => 'Company Name', 'title' => 'Company Name', 'id' => 'company','style' => 'background:#fff; padding-left:35px;background-image:url('.$site_url.'img/building.png); background-repeat:no-repeat; background-position: left; ')); ?>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                             <?php echo $this->Form->text('email', array('required' => true, 'class' => 'form-control', 'placeholder' => 'Email ID', 'title' => 'Email ID', 'id' => 'email', 
'style' => 'background:#fff; padding-left:35px;background-image:url('.$site_url.'img/email.png); background-repeat:no-repeat; background-position: left; ')); ?>
                                        </div>
                                    </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-12">
                                        <div class="form-group">
                                              <?php echo $this->Form->password('new_password', array('required' => true,  'class' => 'form-control', 'placeholder' => 'Password', 'title' => 'Password', 'id' => 'password' ,'style' => 'background:#fff; padding-left:35px;background-image:url('.$site_url.'img/key.png); background-repeat:no-repeat; background-position: left; ')); ?>
                                        </div>
                                    </div>
                                     <div class="col-12 form-group">
                                     By signing up you are agree that you have read, understand, and accept the <a href="#">License </a>
                                     </div>
                                    <!-- Single Input Area Start -->
                                    <div class="col-md-12"> 
                                    <div class="col-md-5" style="float:left"> 
                                        <button type="submit" class="btn submit-btn">Sign Up</button>
                                      </div>
                                     <div class="col-md-5" style="float:right; padding-top:10px;"> 
                                     <a href="<?=$site_url?>users/login">Already have an Account</a>
                                     </div> 
                                    </div>
                                </div>
                            </div>
                            <!-- Message Input Area End -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Us Area End ***** -->
    </section>
    <!-- ***** Welcome Area End ***** -->

    




    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-social-icon text-center section_padding_70 clearfix" style="padding-top:0px; padding-bottom:0px;">
        <!-- footer logo -->
        <div class="footer-text">
            <h2>Tabula</h2>
        </div>
        <!-- social icon-->
        <div class="footer-social-icon">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="active fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"> <i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
        </div>
        <div class="footer-menu">
            <nav>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
        <!-- Foooter Text-->
        <div class="copyright-text">
            <!-- ***** Removing this text is now allowed! This template is licensed under CC BY 3.0 ***** -->
            <p>Copyright 2018. Designed by <a href="https://tabula.work" target="_blank">Tabula</a></p>
        </div>
    </footer>
   