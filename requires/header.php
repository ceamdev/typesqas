<?php require_once("settings/app.php"); require_once("settings/server.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title><?php echo APP_NAME_BUSINESS." - ".APP_NAME." ".APP_VERSION;?></title>
</head>
<body>
<script src="assets/js/main.js" type="text/javascript"></script>
<header>
<?php include("menu.php");?>