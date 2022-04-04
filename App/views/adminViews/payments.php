<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payments</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Datta Able Admin Template come up with latest Bootstrap 4 framework with basic components, form elements and lots of pre-made layout options" />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template" />
    <meta name="author" content="CodedThemes" />
    <?= require_once("Components/styles.php"); ?>

</head>

<body>

    <?= require_once("Components/navbar.php"); ?>
    <?= require_once("Components/header.php"); ?>

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->

                    <!-- [ breadcrumb ] end -->
                    <div class="main-body">
                        <div class="page-wrapper">
                            <?php require_once("Components/alert.php"); ?>

                            <!-- [ Main Content ] start -->
                            <div class="container-xl">
                                <div class="table-responsive">
                                    <div class="table-wrapper">
                                        <div class="table-title">
                                            <div class="row align-items-center">
                                                <div class="col-3">
                                                    <h2>Avaliable <b>Payments</b></h2>
                                                </div>
                                                <div class="col">
                                                    <div class="search-box">
                                                        <i class="material-icons">&#xE8B6;</i>

                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <a href="#" data-toggle="modal" data-target="#addNewPayment" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Payment</span></a>
                                                </div>
                                            </div>

                                        </div>


                                        <table id="sampleTableA" class="table table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Payment Image</th>
                                                    <th>Payment Name</th>
                                                    <th>Creator</th>
                                                    <th>Creation Time</th>
                                                    <th>Last Update</th>
                                                    <th>State</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (isset($params['data'])) { ?>
                                                    <?php foreach ($params['data'] as $key => $value) { ?>

                                                        <tr class="<?= $value->is_active ? '' : 'table-danger' ?>">
                                                            <td><?= $value->id ?> </td>
                                                            <td><img width="100" src="/uploads/images/payments/<?= $value->image ?>" alt=""></td>
                                                            <td><?= $value->name ?></td>
                                                            <td><?= $value->created_by ?></td>
                                                            <td><?= $value->created_at ?></td>
                                                            <td><?= $value->updated_at ?></td>
                                                            <td data-id="<?= $value->is_active ?>">
                                                                <span class="status text-<?= $value->is_active ? "success" : "danger" ?>">&bull;</span>
                                                                <?= $value->is_active ? "Active" : "Disapled" ?>
                                                            </td>

                                                            <td>
                                                                <a href="#" onclick="prepareUpdate(this)" data-id="<?= $value->id ?>" data-toggle="modal" data-target="#updatePayment" class="edit" title="Edit">
                                                                    <i class="material-icons">&#xE254;</i></a>

                                                                <?php if ($value->is_active) { ?>

                                                                    <a href="#" data-id="<?= $value->id ?>" onclick="prepareDelete(this)" class="delete" title="Delete" data-toggle="modal" data-target="#deletePayment"><i class="material-icons">&#xE872;</i></a>
                                                                <?php } else { ?>
                                                                    <a href="#" data-id="<?= $value->id ?>" onclick="prepareRestore(this)" class="delete text-success" title="Restore" data-toggle="modal" data-target="#restorePayment">
                                                                        <i class="fa-solid fa-rotate-left"></i>
                                                                    </a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                <?php }
                                                } ?>

                                            </tbody>

                                        </table>


                                    </div>
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->


    <?= require_once("Components/scripts.php"); ?>


    <!-- Add New Payment Module  -->
    <div class="modal fade show" id="addNewPayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content p-3">
                <form method="post" action="/admin/addPayment" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title fw-bold text-center" id="exampleModalLabel">Add New Payment</h4>
                        <a href="#" data-dismiss="modal">
                            <i class="far fa-window-close text-danger" style="font-size: 2em;"></i>
                        </a>
                    </div>
                    <div class="modal-body">

                        <!-- Form Group (Payment Name)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputPaymentName">Payment Name </label>
                            <input autofocus name="name" class="form-control" id="inputPaymentName" type="text" placeholder="Enter Payment Name" required>
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="inputPaymentImage">Payment Image </label>
                            <input name="image" class="form-control" id="inputPaymentImage" type="file" required>
                        </div>


                        <!-- Save changes button-->

                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Payment Module  -->
    <div class="modal fade show" id="updatePayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content p-3">
                <form method="post" action="/admin/editPayment" id="updateForm" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title fw-bold text-center" id="exampleModalLabel">Update Payment</h4>
                        <a href="#" data-dismiss="modal">
                            <i class="far fa-window-close text-danger" style="font-size: 2em;"></i>
                        </a>
                        <input type="hidden" name="id" id="updatePaymentId">
                    </div>
                    <div class="row">
                        <div class="col-7 d-flex flex-column">
                            <img src="" id="currentPaymentImage" alt="">
                            <p class="text-center">Current Payment Image</p>
                        </div>
                        <div class="col-5">
                            <div class="modal-body">

                                <!-- Form Group (Payment Name)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="updatePaymentName">Payment Name </label>
                                    <input autofocus name="name" class="form-control" id="updatePaymentName" type="text" placeholder="Enter Payment Name" required>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="updatePaymentImage">Payment Image </label>
                                    <input name="image" class="form-control" id="updatePaymentImage" type="file" required>
                                </div>

                                <!-- Save changes button-->

                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="deletePayment" class="modal fade deleteModal">
        <form action="/admin/deletePayment" id="deleteForm" method="post">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                            <i class="fas fa-trash-alt"></i>
                        </div>
                        <h4 class="modal-title w-100">Are you sure?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Do you really want to delete this Payment ? This process cannot be undone.</p>
                    </div>
                    <input type="hidden" name="id" value="" id="deletePaymentId">
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="restorePayment" class="modal fade deleteModal restoreModal">
        <form action="/admin/restorePayment" id="restoreForm" method="post">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                            <i class="fa-solid fa-rotate-left"> </i>
                        </div>
                        <h4 class="modal-title w-100">Are you sure?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Do you really want to Restore this Payment ? </p>
                    </div>
                    <input type="hidden" name="id" value="" id="restorePaymentId">
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Restore</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function prepareUpdate(item) {
            items = $(item).parent("td").siblings("td");
            $("#updatePaymentId").val($(item).attr('data-id'));
            $("#updatePaymentName").val($(items)[2].innerText);
            $("#currentPaymentImage").attr("src",$($(items)[1]).children("img").attr('src'));
        }

        function prepareDelete(item) {
            $("#deletePaymentId").val($(item).attr('data-id'));
        }

        function prepareRestore(item) {
            $("#restorePaymentId").val($(item).attr('data-id'));
        }




        $(document).ready(function() {

            $('#updatePaymentImage').change(function() {
            var input = this;
            var url = $(this).val();
            var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
            if (input.files && input.files[0] && (ext == "gif" || ext == "svg" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#currentPaymentImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                $('#currentPaymentImage').attr('src', "/uploads/images/payments/<?= $value->image ?>");
            }
        });
            $("#updateForm").on("submit", function(e) {
                e.preventDefault();

                var data = new FormData();
                data.append("id", $("#updatePaymentId").val());
                data.append("name", $("#updatePaymentName").val());
                data.append("image", $('#updatePaymentImage').prop("files")[0]);


                var xhr = (window.XMLHttpRequest) ? new XMLHttpRequest() : new activeXObject("Microsoft.XMLHTTP");

                xhr.open('post', $("#updateForm").attr("action"), true);
                xhr.onload = () => {
                    location.href = "/admin/payments";
                };
                xhr.send(data);

            });

            $("#deleteForm").on("submit", function(e) {
                e.preventDefault();
                $.ajax({
                    url: $("#deleteForm").attr("action"),
                    method: "DELETE",
                    data: {
                        id: $("#deletePaymentId").val(),
                    },
                    success: function(result) {
                        if (result) {
                            location.href = "/admin/payments";
                        } else {
                            alert("Faild");
                        }
                    }
                });

            });

            $("#restoreForm").on("submit", function(e) {
                e.preventDefault();
                $.ajax({
                    url: $("#restoreForm").attr("action"),
                    method: "PUT",
                    data: {
                        id: $("#restorePaymentId").val(),
                    },
                    success: function(result) {
                        if (result) {
                            location.href = "/admin/payments";
                        } else {
                            alert("Faild");
                        }
                    }
                });

            });
        });
    </script>
</body>

</html>