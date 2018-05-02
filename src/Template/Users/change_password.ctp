<?php $Site_url = $this->Url->build('/',true); ?>
   <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-3 page-sidebar">
                    <?=$this->element('user_profile')?>
                </div>
                <!--/.page-sidebar-->

                <div class="col-md-9 page-content">
                    <div class="inner-box">
                    <?= $this->Flash->render() ?>
                        <div class="welcome-msg">
                            <h3 class="page-sub-header2 clearfix no-padding"></h3>
                            <span class="page-sub-header-sub small"></span>
                        </div>
                        <div id="accordion" class="panel-group">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="#collapseB1" > Change Password </a></h4>
                                </div>
                                <div class="panel-collapse show" id="collapseB1">
                                    <div class="card-body">
                                    <?php echo $this->Form->create($user, ["class" => "form-horizontal" , 'enctype' => 'multipart/form-data']); ?>
                                     
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Enter Existing Password</label>

                                                <div class="col-sm-9">
                                                    <?php echo $this->Form->input('old_password', ['class'=>'form-control' ,'required' => true,'label'=>false,'div'=>false,'type'=>'password']); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Enter New Password:</label>

                                                <div class="col-sm-9">
                                                    <?php echo $this->Form->input('new_password', ['class'=>'form-control' ,'required' => true,'label'=>false,'div'=>false,'type'=>'password']); ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Re-type New Password:</label>

                                                <div class="col-sm-9">
                                                <?php echo $this->Form->input('confirm_password', ['class'=>'form-control' ,'required' => true ,'label'=>false,'div'=>false,'type'=>'password']); ?>
                                                 </div>
                                            </div>
                                          
                                          
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-primary ">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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