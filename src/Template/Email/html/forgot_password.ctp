<h2>Password Change request</h2>
Dear <?php echo $user['first_name']?>,<br />

Email: <?php echo $user['email']?><br />
<br /><strong>Please open link below to change your password.</strong>

<br /><br />

<a href="<?php echo $this->Url->build('/',true).$confirm_link;?>" target="_blank"><?php echo $this->Url->build('/',true).$confirm_link;?></a>
<br />
<br />
Thanks,<br />

