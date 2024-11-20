<!-- Navbar -->

<!-- /.navbar -->

<!-- Main Sidebar Container -->
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
                    <h1>Thêm tài khoản quản trị</h1>
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
                            <h3 class="card-title">Thêm tài khoản quản trị</h3>
                        </div>
                        <form action="index.php?act=them-tai-khoan-quan-tri" method="post" enctype="multipart/form-data">
                            <div class="card-body row">
                                <div class="form-group col-md-6">
                                    <label>Họ và tên</label>
                                    <input type="text" class="form-control" placeholder="Nhập họ và tên"
                                        name="fullname">
                                    <?php
                                    if (isset($_SESSION["errors"]['fullname'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["errors"]['fullname'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Nhập username"
                                        name="username">
                                    <?php
                                    if (isset($_SESSION["errors"]['username'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["errors"]['username'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Nhập email"
                                        name="email">
                                    <?php
                                    if (isset($_SESSION["errors"]['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["errors"]['email'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ"
                                        name="address">
                                    <?php
                                    if (isset($_SESSION["errors"]['address'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["errors"]['address'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" placeholder="Nhập số điện thoại"
                                        name="phone">
                                    <?php
                                    if (isset($_SESSION["errors"]['phone'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["errors"]['phone'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="them">Submit</button>
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