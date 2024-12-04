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
                    <h1>Thêm Sản Phẩm</h1>
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
                            <h3 class="card-title">Thêm Sản Phẩm</h3>
                        </div>
                        <form action="index.php?act=them-san-pham" method="post" enctype="multipart/form-data">
                            <div class="card-body row">
                                <div class="form-group col-md-12">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm "
                                        name="name">
                                    <?php
                                    if (isset($_SESSION["error"]['name'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["error"]['name'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" class="form-control" placeholder="Giá sản phẩm"
                                        name="price">
                                    <?php
                                    if (isset($_SESSION["error"]['price'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["error"]['price'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Số lượng sản phẩm</label>
                                    <input type="number" class="form-control" placeholder="Số lượng sản phẩm "
                                        name="amount">
                                    <?php
                                    if (isset($_SESSION["error"]['amount'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["error"]['amount'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="image">
                                    <?php
                                    if (isset($_SESSION["error"]['image'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["error"]['image'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Abum ảnh</label>
                                    <input type="file" class="form-control" name="img_array[]" multiple>
                                </div>

                                <!-- <div class="form-group  col-md-6">
                                    <label>Ngày nhập</label>
                                    <input type="date" class="form-control" placeholder="ngày nhập sản phẩm "
                                        name="updated_at">
                                    <?php
                                    if (isset($_SESSION["error"]['updated_at'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["error"]['updated_at'] ?></p>
                                    <?php } ?>
                                </div> -->
                                <!-- <div class="form-group  col-md-6">
                                    <label>Ngày tạo</label>
                                    <input type="date" class="form-control" placeholder="ngày nhập sản phẩm "
                                        name="created_at">
                                    <?php
                                    if (isset($_SESSION["error"]['created_at'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["error"]['created_at'] ?></p>
                                    <?php } ?>
                                </div> -->
                                <div class="form-group  col-md-6">
                                    <label>Ram</label>

                                    <select name="ram" class="form-control">
                                        <option selected disabled>Chọn ram của sản phẩm</option>
                                        <option value="4">4GB</option>
                                        <option value="8">8GB</option>
                                        <option value="16">16GB</option>
                                        <option value="32">32GB</option>
                                        <option value="64">64GB</option>
                                    </select>
                                    <?php
                                    if (isset($_SESSION["error"]['ram'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["error"]['ram'] ?></p>
                                    <?php } ?>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label>Màu</label>
                                    <select name="color" class="form-control">
                                        <option selected disabled>Chọn màu của sản phẩm</option>
                                        <option value="Xanh">Xanh</option>
                                        <option value="Đen">Đen</option>
                                        <option value="Trắng">Trắng</option>
                                        <option value="Xám">Xám</option>
                                    </select>
                                    <?php
                                    if (isset($_SESSION["error"]['color'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["error"]['color'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group  col-md-6">
                                    <label>Danh mục</label>
                                    <select name="cate_id" class="form-control">
                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <?php
                                        foreach ($listDanhMuc as $danhmuc) {
                                        ?>
                                            <option value="<?= $danhmuc['id'] ?>"><?= $danhmuc['cate_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <?php
                                    if (isset($_SESSION["error"]['cate_id'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["error"]['cate_id'] ?></p>
                                    <?php } ?>
                                </div>
                                <!-- <div class="form-group  col-md-6">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <option value="1">Còn hàng</option>
                                        <option value="2">Hết hàng</option>
                                    </select>
                                    <?php
                                    if (isset($_SESSION["error"]['status'])) { ?>
                                        <p class="text-danger"><?= $_SESSION["error"]['status'] ?></p>
                                    <?php } ?>
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label>Mô tả</label>
                                    <textarea type="text" class="form-control" placeholder="Nhập mô tả"
                                        name="detail"></textarea>
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