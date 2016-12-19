<!DOCTYPE html>
<html lang="en">
<head>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/php/head.php') ?>
</head>
<body>
<div id="wrapper">
    <!--Sidebar-->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/php/menu.php') ?>

    <!--Main content-->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row well">
                <div class="col-lg-6">
                    <form action="php/functions/create-thread.php" method="get">
                        <label for="name">Thread Name:</label>
                        <input type="text" class="form-control" id="name" name="name"/>
                        <label for="content">First Post Content:</label>
                        <textarea rows="14" class="form-control" id="content" name="content"></textarea>
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="author">Author:</label>
                                <input type="text" class="form-control" id="author" name="author"/>
                            </div>
                            <div class="col-lg-9"></div>
                        </div>
                        <div class="text-center" style="padding-top: 10px">
                            <button type="submit" class="btn btn-primary">Create Thread!</button>
                        </div>
                        <input type="hidden" id="dataDir" name="dataDir" value="<?php $_GET['dataDir']; echo $_GET['dataDir']?>">
                    </form>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

