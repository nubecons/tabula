<?php $site_url = $this->Url->build('/',true); ?> 
<div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 login-box">
                    <div class="card card-default">
                        <div class="panel-intro text-center">
                            <h2 class="logo-title">
                                <!-- Original Logo will be placed here  -->
                                <span class="logo-icon"><i
                                        class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> Forgot Password<span></span>
                            </h2>
                        </div>
                        	<?= $this->Flash->render() ?>
							<?= $this->Form->create() ?>
                        
                        <div class="card-body">
                           <?php echo $this->Form->create(null, ['url' => ['action' => 'forgot_password'], 'id' => 'UserForgotPasswordForm']); ?>
                                <div class="form-group">
                                    <label for="sender-email" class="control-label">Email:</label>

                                    <div class="input-icon"><i class="icon-user fa"></i>
                                    <?= $this->Form->text('email' ,[ 'required' => true,  "id" => "sender-email" ,  "class" => "form-control email" , "placeholder"=>"Email"]) ?>
                                      
                                    </div>
                                </div>
                              
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary  btn-block">Submit</button>
                                    
                                </div>
                            <?= $this->Form->end() ?>
                        </div>
                        <div class="card-footer">
                            <p class="text-center pull-right"><a href="<?=$site_url?>users/login"> login? </a>
                            </p>

                            <div style=" clear:both"></div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>