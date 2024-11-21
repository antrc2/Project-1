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
                    <h1>Sửa Sản Phẩm</h1>
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
                        <h3 class="card-title">Thông tin sản phẩm </h3>
                    </div>
                    <form action="index.php?act=sua-san-pham" method="post"
                        enctype="multipart/form-data">
                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="san_pham_id" value="<?= $product['id'] ?>">
                                <label for="inputName">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" value="<?= $product["name"] ?>">
                                <?php
                                if (isset($_SESSION["error"]['name'])) { ?>
                                    <p class="text-danger"><?= $_SESSION["error"]['name'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6  ">
                                <label>Giá sản phẩm</label>
                                <input type="number" class="form-control" name="price"
                                    value="<?= $chiTietSanPham['price'] ?>">
                                <?php
                                if (isset($_SESSION["error"]['price'])) { ?>
                                    <p class="text-danger"><?= $_SESSION["error"]['price'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6  ">
                                <label>Hình ảnh sản phẩm</label>
                                <input type="hidden" name="current_image" value="<?= $product['image'] ?>">
                                <input type="file" class="form-control" name="image">
                                <img style="height: 100px;  " src="./assets/img/<?= $product['image'] ?>" alt="">
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Số lượng sản phẩm</label>
                                <input type="number" class="form-control" name="amount"
                                    value="<?= $chiTietSanPham['amount'] ?>">
                                <?php
                                if (isset($_SESSION["error"]['amount'])) { ?>
                                    <p class="text-danger"><?= $_SESSION["error"]['amount'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Ram</label>
                                <select name="ram" class="form-control">
                                    <option disabled <?= $chiTietSanPham['ram'] ? '' : 'selected' ?>>Chọn ram của sản phẩm</option>
                                    <option value="4" <?= $chiTietSanPham['ram'] == "4" ? 'selected' : '' ?>>4GB</option>
                                    <option value="8" <?= $chiTietSanPham['ram'] == "8" ? 'selected' : '' ?>>8GB</option>
                                    <option value="16" <?= $chiTietSanPham['ram'] == "16" ? 'selected' : '' ?>>16GB</option>
                                    <option value="32" <?= $chiTietSanPham['ram'] == "32" ? 'selected' : '' ?>>32GB</option>
                                    <option value="64" <?= $chiTietSanPham['ram'] == "64" ? 'selected' : '' ?>>64GB</option>
                                </select>
                                <?php
                                if (isset($_SESSION["error"]['ram'])) { ?>
                                    <p class="text-danger"><?= $_SESSION["error"]['ram'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label>Màu</label>
                                <select name="color" class="form-control">
                                    <option selected disabled>Chọn màu của sản phẩm</option>
                                    <option value="Xanh" <?= $chiTietSanPham['color'] == "Xanh" ? 'selected' : '' ?>>Xanh</option>
                                    <option value="Đen" <?= $chiTietSanPham['color'] == "Đen" ? 'selected' : '' ?>>Đen</option>
                                    <option value="Trắng" <?= $chiTietSanPham['color'] == "Trắng" ? 'selected' : '' ?>>Trắng</option>
                                    <option value="Xám" <?= $chiTietSanPham['color'] == "Xám" ? 'selected' : '' ?>>Xám</option>
                                </select>
                                <?php
                                if (isset($_SESSION["error"]['color'])) { ?>
                                    <p class="text-danger"><?= $_SESSION["error"]['color'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>Danh mục</label>
                            <select name="cate_name" class="form-control">
                                <?php
                                foreach ($listDanhMuc as $danhmuc) {
                                ?>
                                    <option <?= $danhmuc['id'] == $product['cate_id'] ? 'selected' : '' ?>
                                        value="<?= $danhmuc['id'] ?>">
                                        <?= $danhmuc['cate_name'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                            <?php
                            if (isset($_SESSION["error"]['cate_name'])) { ?>
                                <p class="text-danger"><?= $_SESSION["error"]['cate_name'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-6 ">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option <?= $chiTietSanPham["status"] == 1 ? 'selected' : '' ?> value="1">Hiện thị
                                </option>
                                <option <?= $chiTietSanPham["status"] == 0 ? 'selected' : '' ?> value="0">Không hiện thị
                                </option>
                            </select>
                            <?php
                            if (isset($_SESSION["error"]['status'])) { ?> <p class="text-danger">
                                    <?= $_SESSION["error"]['status'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Mô tả</label>
                            <textarea type="text" class="form-control"
                                name="detail"><?= $product['detail'] ?></textarea>
                        </div>
                </div>

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                </div>

                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-12">

            <!-- /.card -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Ảnh sản phẩm</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">

                    <form action="index.php?act=sua-album-anh-san-pham" method="post"
                        enctype="multipart/form-data">
                        <div class="table-responsive">
                            <table id="faqs" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ảnh</th>
                                        <th>file</th>
                                        <th>
                                            <div class="text-center"><button onclick="addfaqs();" type="button"
                                                    class="badge badge-success"><i class="fa fa-plus"></i> thêm
                                                </button></div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="san_pham_id" value="<?= $product['id'] ?>">
                                    <input type="hidden" name="img_delete" id="img_delete">
                                    <?php
                                    foreach ($listAnhSanPham as $key => $value) { ?>
                                        <tr id="faqs-row-<?= $key ?>">
                                            <input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
                                            <td><img src="./assets/img/<?= $value['image'] ?>"
                                                    style="width: 100px; height:100px " alt="">
                                            </td>
                                            <td><input type="file" name="img_array[]" class=" form-control">
                                            </td>
                                            <td class="mt-10"><button class="badge badge-danger" type="button"
                                                    onclick="removeRow(<?= $key ?>,<?= $value['id'] ?>)"><i
                                                        class="fa fa-trash"></i>
                                                    Delete</button>
                                            </td>
                                        <?php } ?>
                                        </tr>
                                </tbody>
                            </table>
                        </div>

                </div>

                <!-- /.card-body -->

                <div class=" card-footer text-center">
                    <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
</div>

</section>

</div>
<?php
include './views/admin/layouts/footer.php'; ?>

</body>
<script>
    var faqs_row = <?= count($listAnhSanPham) ?>;


    // function addfaqs() {
    //     html = '<tr id="faqs-row-' + faqs_row + '">';
    //     html += '<td><img src="./uploads/th.jpg"  style="width: 100px; height:100px " alt=""></td>';
    //     html += '<td><input type="file" name="img_array[]"  class="form-control"></td>';
    //     html +=
    //         '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' +
    //         faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';

    //     html += '</tr>';

    //     $('#faqs tbody').append(html);

    //     faqs_row++;
    // }

    function addfaqs() {
    html = '<tr id="faqs-row-' + faqs_row + '">';
    html += '<td><img src="./uploads/th.jpg"  style="width: 100px; height:100px " alt=""></td>';
    html += '<td><input type="file" name="img_array[]"  class="form-control"></td>';
    html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';
    html += '</tr>';

    $('#faqs tbody').append(html);
    faqs_row++;
}

    function removeRow(rowId, imgId) {
        $('#faqs-row-' + rowId).remove();
        if (imgId != null) {
            var imgDeleteInput = document.getElementById('img_delete');
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>

</html>