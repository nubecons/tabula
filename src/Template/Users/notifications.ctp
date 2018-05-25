<?php

$site_url = $this->Url->build('/',true); ?> 
<div class="wrapper-md" >


    <div class="panel panel-default">
        <div class="panel-heading font-bold">
            Notifications
        </div>

        <div class="panel-body" style=" padding:40px;">

      <?php echo $this->Form->create($user, ["class" => "form-horizontal" , 'enctype' => 'multipart/form-data']); ?> 

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <?php echo $this->Form->checkbox('new_project', ['hiddenField' => false]);?>
                        <small> Notify me when new Project Created.</small>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <?php echo $this->Form->checkbox('new_req', ['hiddenField' => false]);?>
                        <small> Notify me when new Requirement Created.</small>
                    </label>
                </div>
            </div>

            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <?php echo $this->Form->checkbox('new_task', ['hiddenField' => false]);?>
                        <small> Notify me when new Task Created.</small>
                    </label>
                </div>
            </div>


            <div class="line line-dashed b-b line-lg pull-in"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">

                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
