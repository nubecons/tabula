<!DOCTYPE html>
<html lang="en">
<head>
<?php $site_url = $this->Url->build('/',true);
      $landing_url = $site_url.'landing/';
 ?> 
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title -->
    <title>Tabula</title>

      <link rel="stylesheet" href="<?=$landing_url?>css/style.css" type="text/css" />
      <link rel="stylesheet" href="<?=$landing_url?>css/responsive.css" type="text/css" />
      <link rel="stylesheet" href="<?=$site_url?>css/custom.css" type="text/css" />

</head>
<body>
  <?php echo $this->fetch('content');?> 
</body>
</html>
