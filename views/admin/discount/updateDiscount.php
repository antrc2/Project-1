<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="" method="POST">

            <div>
                <label for="discountAmount">Phần trăm giảm giá</label>
                <input type="number" min="1" max="99" name="discountAmount" value="<?= $discount['discount_amount'] ?>">
                <div id="discountAmountError" class="error"></div>
            </div>

            <div>
                <label for="start_date">Ngày bắt đầu</label>
                <input type="datetime-local" name="start_date" value="<?= epochTimeToDateTimeLocal($discount['start_date']) ?>">
                <div id="startDateError" class="error"></div>
            </div>

            <div>
                <label for="end_date">Ngày kết thúc</label>
                <input type="datetime-local" name="end_date" value="<?= epochTimeToDateTimeLocal($discount['end_date']) ?>">
                <div id="endDateError" class="error"></div>
            </div>

            <div>
                <label for="start_price">Từ giá</label>
                <input type="number" name="start_price" value="<?= $discount['start_price'] ?>">
                <div id="startPriceError" class="error"></div>
            </div>

            <div>
                <label for="end_price">Đến giá</label>
                <input type="number" name="end_price" value="<?= $discount['end_price'] ?>">
                <div id="endPriceError" class="error"></div>
            </div>
            <button name="btn_updateDiscount">Xác nhận</button>
        </form>
    </div>
</body>

</html> -->



<?php
include './views/admin/layouts/header.php';
include './views/admin/layouts/navbar.php';
include './views/admin/layouts/sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa khuyến mãi sản phẩm</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa khuyến mãi</h3>
                        </div>
                        
                        <form action="" method="POST">
                        <div class="card-body row">
                            <div  class="form-group  col-md-6">
                                <label for="discountAmount">Phần trăm giảm giá</label>
                                <input type="number" min="1" max="99" name="discountAmount" class="form-control" value="<?= $discount['discount_amount'] ?>">
                                <div id="discountAmountError" class="error"></div>
                            </div>

                            <div  class="form-group  col-md-6">
                                <label for="start_date">Ngày bắt đầu</label>
                                <input type="datetime-local" name="start_date" class="form-control" value="<?= epochTimeToDateTimeLocal($discount['start_date']) ?>">
                                <div id="startDateError" class="error"></div>
                            </div  class="form-group  col-md-6">

                            <div  class="form-group  col-md-6">
                                <label for="end_date">Ngày kết thúc</label>
                                <input type="datetime-local" name="end_date" class="form-control" value="<?= epochTimeToDateTimeLocal($discount['end_date']) ?>">
                                <div id="endDateError" class="error"></div>
                            </div  class="form-group  col-md-6">

                            <div>
                                <label for="start_price">Từ giá</label>
                                <input type="number" name="start_price" class="form-control" value="<?= $discount['start_price'] ?>">
                                <div id="startPriceError" class="error"></div>
                            </div  class="form-group  col-md-6">

                            <div  class="form-group  col-md-6">
                                <label for="end_price">Đến giá</label>
                                <input type="number" name="end_price" class="form-control" value="<?= $discount['end_price'] ?>">
                                <div id="endPriceError" class="error"></div>
                            </div>
                            </div>
                            <div class="card-footer">
                            <button name="btn_updateDiscount" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </section>

</div>
<?php
include './views/admin/layouts/footer.php'; ?>

</body>

</html>