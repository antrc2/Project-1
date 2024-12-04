

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
                    <h1>Quản lí sản phẩm</h1>
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body row">
                                <div class="form-group  col-md-6">
                                    <label for="discountAmount">Tên sản phẩm</label>
                                    <input type="text" name="name" placeholder="Tên" class="form-control">
                                </div>
                                 

                                <div class="form-group  col-md-6">
                                    <label for="discountAmount">Ảnh sản phẩm</label>
                                    <input type="file" name="image" placeholder="Ảnh" class="form-control">
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="discountAmount">Mô tả sản phẩm</label>
                                    <textarea  name="detail" placeholder="Mô tả" class="form-control"></textarea>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="product_detail_id">Sản phẩm</label>
                                    <select name="cate_id" class="form-control">
                                        <?php foreach ($cates as $cate): ?>
                                            <option value="<?= $cate['id'] ?>"><?= $cate['cate_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <div id="productDetailIdError" class="error"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button name="btn_addProduct" class="btn btn-primary">Thêm</button>

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