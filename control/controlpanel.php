<!DOCTYPE html>
<html lang="en">
<head>
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/php/head.php') ?>
</head>
<body>
<!-- Sidebar -->
<?php include ($_SERVER['DOCUMENT_ROOT'].'/php/menu.php') ?>

<!-- Main content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row well">
            <div class="col-lg-6">
                <a href="../forumcreation.php"><button name="Create Forum" class="btn btn-primary">Create Forum</button></a>
                <h4 class="text-primary">Current Forums:</h4>
                <?php include ($_SERVER['DOCUMENT_ROOT']."/control/list-forums.php")?>
            </div>
            <div class="col-lg-6"></div>
        </div>
    </div>
</div>
</body>
</html>