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
                    <form action="php/forum/create-forum.php" method="get">
                        <label for="name">Forum Name:</label>
                        <input type="text" class="form-control" id="name" name="name"/>
                        <div class="text-center" style="padding-top: 10px">
                            <button type="submit" class="btn btn-primary">Create Forum!</button>
                        </div>
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

