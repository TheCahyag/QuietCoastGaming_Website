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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Launch demo modal

                </button>

                <!-- Modal -->
                <div class="modal fade"  role="dialog" aria-hidden="true" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

