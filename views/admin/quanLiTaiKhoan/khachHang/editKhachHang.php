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
                    <h1>Quản lí tài khoản quản trị</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa tài khoản quản trị </h3>
                    </div>
                    <form action="index.php?act=sua-tai-khoan-khach-hang" method="post"
                        enctype="multipart/form-data">
                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="tai_khoan_id" value="<?= $account['id'] ?>">
                                <label for="inputName">Họ và tên</label>
                                <input type="text" name="fullname" class="form-control" value="<?= $account["fullname"] ?>">
                                <?php
                                if (isset($_SESSION["error"]['fullname'])) { ?>
                                    <p class="text-danger"><?= $_SESSION["error"]['fullname'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6  ">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username"
                                    value="<?= $account['username'] ?>">
                                <?php
                                if (isset($_SESSION["error"]['username'])) { ?>
                                    <p class="text-danger"><?= $_SESSION["error"]['username'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="address"
                                    value="<?= $account['address'] ?>">
                                <?php
                                if (isset($_SESSION["error"]['address'])) { ?>
                                    <p class="text-danger"><?= $_SESSION["error"]['address'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1" <?= $account['status'] == "1" ? 'selected' : '' ?>>Hoạt động</option>
                                    <option value="0" <?= $account['status'] == "0" ? 'selected' : '' ?>>Khoá</option>
                                </select>
                                <?php
                                if (isset($_SESSION["error"]['status'])) { ?>
                                    <p class="text-danger"><?= $_SESSION["error"]['status'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Số Điện thoại</label>
                                <input type="text" class="form-control" name="phone"
                                    value="<?= $account['phone'] ?>">
                                <?php
                                if (isset($_SESSION["error"]['phone'])) { ?>
                                    <p class="text-danger"><?= $_SESSION["error"]['phone'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="<?= $account['email'] ?>">
                                <?php
                                if (isset($_SESSION["error"]['email'])) { ?>
                                    <p class="text-danger"><?= $_SESSION["error"]['email'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary" name="sua">Sửa thông tin</button>
                </div>

                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-12">
</div>

</section>

</div>
<?php
include './views/admin/layouts/footer.php'; ?>

</body>

</html>