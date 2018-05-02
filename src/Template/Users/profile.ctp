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
                            <h3 class="page-sub-header2 clearfix no-padding">Hello <?=$sUser['first_name']?> <?=$sUser['last_name']?> </h3>
                            <span class="page-sub-header-sub small"></span>
                        </div>
                        <div id="accordion" class="panel-group">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="#collapseB1" > My
                                        details </a></h4>
                                </div>
                                <div class="panel-collapse show" id="collapseB1">
                                    <div class="card-body">
                                    <?php echo $this->Form->create($user, ["class" => "form-horizontal" , 'enctype' => 'multipart/form-data']); ?>
                                     
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">First Name</label>

                                                <div class="col-sm-9">
                                                    <?php echo $this->Form->text('first_name', ['class'=>'form-control' ,'required' => true]); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Last name</label>

                                                <div class="col-sm-9">
                                                    <?php echo $this->Form->text('last_name', ['class'=>'form-control' ,'required' => true]); ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email</label>

                                                <div class="col-sm-9">
                                                <?php echo $this->Form->email('email', ['class'=>'form-control' ,'required' => true]); ?>
                                                 </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Mdobile</label>

                                                <div class="col-sm-9">
                                                     <?php echo $this->Form->text('mobile', ['class'=>'form-control input-md' ,'required' => true]); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Phone" class="col-sm-3 control-label">Phone</label>

                                                <div class="col-sm-9">
                                                   <?php echo $this->Form->text('phone', ['class'=>'form-control input-md']); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Fax</label>

                                                <div class="col-sm-9">
                                                    <?php echo $this->Form->text('fax', ['class'=>'form-control']); ?>
                                                </div>
                                            </div>
                                            
                                            
                                             <div class="form-group">
                                                <label class="col-sm-3 control-label">Address</label>

                                                <div class="col-sm-9">
                                                    <?php echo $this->Form->text('address', ['class'=>'form-control']); ?>
                                                </div>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="col-sm-3 control-label">Zip Code</label>

                                                <div class="col-sm-9">
                                                    <?php echo $this->Form->text('zip_code', ['class'=>'form-control' ,'required' => true]); ?>
                                                </div>
                                            </div>
                                            
                                             <div class="form-group">
                                                <label class="col-sm-3 control-label">Country</label>

                                                <div class="col-sm-9">
                                                     <?php echo $this->Form->input('country_id', ['empty' =>'Select', 'options' => $Countries,  'class'=>'form-control' ,'required' => true ,'dev' => false, 'label' => false]); ?>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9"></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           <?php /*?> <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="#collapseB2"  > Settings </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse" id="collapseB2">
                                    <div class="card-body">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">
                                                            Comments are enabled on my ads </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">New Password</label>

                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Confirm Password</label>

                                                <div class="col-sm-9">
                                                    <input type="password" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-default">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-default">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="#collapseB3"  >
                                        Preferences </a></h4>
                                </div>
                                <div class="panel-collapse" id="collapseB3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        I want to receive newsletter. </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox">
                                                        I want to receive advice on buying and selling. </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><?php */?>
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