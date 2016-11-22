<!DOCTYPE html>
<html lang="en">
<head>
    <?php include ($_SERVER['DOCUMENT_ROOT'].'/php/head.php') ?>
</head>
<body>
<!-- Sidebar -->
<?php include ($_SERVER['DOCUMENT_ROOT'].'/php/menu.php') ?>

<!-- Main content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row well">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h3 class="text-center text-primary">Forums</h3>
                <?php include ($_SERVER['DOCUMENT_ROOT'].'/php/forum/generate-forums.php') ?>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>
</body>
</html>