
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
                        <a href="?act=add-product"><button class="btn btn-success">Thêm sản phẩm</button></a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày sửa</th>
                                    <th>Danh mục</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Tùy chọn</th>
                                </thead>
                                <tbody>
                                    <?php $index = 1 ?>
                                    <?php foreach ($products as $product): ?>
                                        <?php if ($product['category_status'] == 1): ?>
                                            <tr>
                                                <td><?= $index ?></td>
                                                <td><?= $product['name'] ?></td>
                                                <td><img class="w-25" src="assets/img/<?= $product['image'] ?>" alt=""></td>
                                                <td><?= epochTimeToDateTime($product['product_created_at']) ?></td>
                                                <td><?= epochTimeToDateTime($product['product_updated_at']) ?></td>
                                                <td><?= $product['cate_name'] ?></td>
                                                <td><?= $product['detail'] ?></td>
                                                <td><?= $product['product_status'] == 1 ? "Chưa xóa" : "Đã xóa" ?></td>
                                                <td>
                                                    <a href="?act=list-product-detail&id=<?= $product['product_id'] ?>"><button class="btn btn-outline-warning">Xem chi tiết</button></a>
                                                    <a href="?act=update-product&id=<?= $product['product_id'] ?>"><button  class="btn btn-outline-success">Sửa</button></a>
                                                    <?php if ($product['product_status'] == 1): ?>
                                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=delete-product&id=<?= $product['product_id'] ?>"><button class="btn btn-outline-danger">Xóa</button></a>
                                                    <?php else: ?>
                                                        <a href="?act=undo-delete-product&id=<?= $product['product_id'] ?>"><button class="btn btn-outline-info">Bỏ xóa</button></a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endif ?>
                                        <?php $index++; ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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