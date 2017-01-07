<!DOCTYPE html>
<html lang="en">
<head>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/php/head.php') ?>
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
                <h3 class="text-center text-primary">About</h3>
                <h1 class="text-primary">To Fix:</h1>
                <ul>
                    <li>The most recent post is not correctly displayed, it seems it's just reading the time of the
                        first post in the post object array, alternatively (less likely) the list itself could be
                        sorting itself differently than expected.</li>
                </ul>
                <h1 class="text-primary">To Future:</h1>
                <ul>
                    <li></li>
                </ul>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>
</body>
</html>