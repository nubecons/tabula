Hi <?php echo $userdata['first_name']; ?>,<br /><br>
Your Account has been created. You can login using these credentials.<br><br>
Email:    <?php echo $userdata['email']; ?><br>
Password: <?php echo $userdata['password_decoded']; ?><br><br>

Thanks,<br />

<?php echo $site_name;?>