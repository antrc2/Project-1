

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
                    <h1>Thêm  sản phẩm</h1>
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
                            <h3 class="card-title">Thêm sản phẩm</h3>
                        </div>
                        <form action="" method="POST">
                            <div class="card-body row">
                                <div class="form-group  col-md-6">
                                    <label for="discountAmount">Số lượng</label>
                                    <input type="number" name="amount" placeholder="Số lượng" class="form-control">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="discountAmount">Ram</label>
                                    <input type="number" name="ram" placeholder="RAM" class="form-control">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="discountAmount">Màu</label>
                                    <input type="text" name="color" placeholder="Màu"class="form-control">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="discountAmount">Giá</label>
                                    <input type="number" name="price" placeholder="Giá" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                              
                                <button name="btn_addProductDetail" class="btn btn-primary">Thêm</button>
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