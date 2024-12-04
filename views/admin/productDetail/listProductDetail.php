

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
                <label>Search:<i class="fas fa-search"></i><input type="search" class="form-control form-control-sm" placeholder="Tìm kiếm từ khoá " aria-controls="example1"></label>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <a href="?act=add-product-detail&id=<?= $id ?>"><button class="btn btn-success">Thêm sản phẩm</button></a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>STT</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>RAM</th>
                                    <th>Màu</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày sửa</th>
                                    <th>Trạng thái</th>
                                    <th>Album ảnh</th>
                                    <th>Tùy chọn</th>
                                </thead>
                                <tbody>
                                    <?php $index = 1 ?>
                                    <?php foreach ($productDetails as $product): ?>
                                        <tr>
                                            <td><?= $index ?></td>
                                            <td><?= $product['amount'] ?></td>
                                            <td><?= number_format($product['price'] )?> VNĐ</td>
                                            <td><?= $product['ram'] ?></td>
                                            <td><?= $product['color'] ?></td>
                                            <td><?= epochTimeToDateTime($product['created_at']) ?></td>
                                            <td><?= epochTimeToDateTime($product['updated_at']) ?></td>
                                            <td><?= $product['status'] == 1 ? "Chưa xóa" : "Đã xóa" ?></td>
                                            <td>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="product_detail_id" value="<?= $product['id'] ?>">
                                                    <button name="btn_listImages" class="btn btn-warning">Xem</button>
                                                </form>
                                            </td>
                                            <td>

                                                <a href="?act=update-product-detail&id=<?= $product['id'] ?>&product_id=<?= $product['product_id'] ?>" ><button class="btn btn-info">Sửa</button></a>
                                                <?php if ($product['status'] == 1) : ?>
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=delete-product-detail&id=<?= $product['id'] ?>&product_id=<?= $product['product_id'] ?>"><button class="btn btn-danger">Xóa</button></a>
                                                <?php else: ?>
                                                    <a href="?act=undo-delete-product-detail&id=<?= $product['id'] ?>&product_id=<?= $product['product_id'] ?>"><button class="btn btn-success">Bỏ xóa</button></a>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                        <?php $index++ ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>

                            <?php if ($isPost): ?>
                                <div class="card card-primary mt-4">
                                    <div class="card-header">
                                        <h3 class="card-title">Thêm ảnh sản phẩm</h3>
                                    </div>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="card-body row">
                                            <div class="form-group  col-md-12">
                                                <label for="discountAmount">Thêm ảnh sản phẩm</label>
                                                <input  type="hidden" name="product_detail_id" value="<?= $productDetailId ?>">
                                                <input class="form-control" type="file" multiple name="image[]">
                                            </div>
                                        </div>
                                        <div class="card-footer">

                                            <button name="btn_addImages" class="btn btn-primary">Thêm album</button>
                                        </div>


                                    </form>
                                </div>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <th>STT</th>
                                        <th>Ảnh</th>
                                        <th>Tùy chọn</th>
                                    </thead>
                                    <tbody>
                                        <?php $count = 1;
                                        foreach ($images as $image): ?>
                                            <tr>
                                                <td><?= $count ?></td>
                                                <td><img src="assets/img/<?= $image['image'] ?>" alt="" width="100px" height="100px"></td>
                                                <td>
    
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <input type="file" name="img" >
                                                        <input type="hidden" name="id" value="<?= $image['id'] ?>">
                                                        <button name="btn_updateImage" class="btn btn-info">Sửa</button>
                                                    </form>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="id" value="<?= $image['id'] ?>">
                                                        <button name="btn_deleteImage" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php $count++;
                                        endforeach ?>
                                    </tbody>
                                </table>
                            <?php endif ?>



                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<?php
include './views/admin/layouts/footer.php'; ?>
</body>
<script>
    document.querySelector('input[aria-controls="example1"]').addEventListener('keyup', function(e) {
        const searchValue = e.target.value.toLowerCase();
        const table = document.getElementById('example1');
        const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

        for (let row of rows) {
            const cells = row.getElementsByTagName('td');
            let found = false;

            for (let cell of cells) {
                if (cell.textContent.toLowerCase().includes(searchValue)) {
                    found = true;
                    break;
                }
            }

            row.style.display = found ? '' : 'none';
        }
    });
</script>

</html>