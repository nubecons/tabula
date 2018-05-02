<!-- File: src/Template/Users/login.ctp -->

<?php /*?><div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div><?php */?>

<?php $site_url = $this->Url->build('/',true); ?> 
<section class="wellcome_area clearfix" id="home" style="height:550px;">
<div class="main-container">
   
        <div class="container">
            <div class="row">
            <div class="col-sm-3">
            </div>
                <div class="col-sm-5 login-box" style="margin-top:35px;">
                    <div class="card card-default">
                        <div class="panel-intro text-center" style="padding-top:10px;">
                            <h2 class="logo-title">
                                <!-- Original Logo will be placed here  -->
                                <span class="logo-icon"><i
                                        class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> LOGIN<span></span>
                            </h2>
                        </div>
                        <?= $this->Flash->render() ?>
					    <div class="card-body">
                           <?= $this->Form->create() ?>
                                <div class="form-group">
                                    <label for="sender-email" class="control-label">Email:</label>
                                    <div class="input-icon">
                                    <?= $this->Form->text('email' ,[  "id" => "sender-email" ,  "class" => "form-control email" , "placeholder"=>"Email"]) ?>
                                      
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="user-pass" class="control-label">Password:</label>

                                    <div class="input-icon">
                                    <?= $this->Form->password('password' ,[  "id" => "user-passl" ,  "class" => "form-control" , "placeholder"=>"Password"]) ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn submit-btn">Submit</button>
                                    
                                </div>
                            <?= $this->Form->end() ?>
                        </div>
                        <div class="card-footer">

                            <div class="checkbox pull-left">
                                <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description"> Keep me logged in</span>
                                </label>
                            </div>


                            <p class="text-center pull-right"><a href="#"> Lost your password? </a>
                            </p>

                            <div style=" clear:both"></div>
                        </div>
                    </div>
                    <div class="login-box-btm text-center">
                        <p style="color:#fff"> Don't have an account? <br>
                            <a href="<?=$site_url?>users/signup"><strong>Sign Up !</strong> </a></p>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
     </section>   
   
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
    