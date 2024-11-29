<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Biến thể</th>
                <th>Phần trăm giảm giá</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Từ giá</th>
                <th>Đến giá</th>
                <th>Sửa</th>
                <th>Xóa / Bỏ xóa</th>
            </tr>
            <?php foreach ($discounts as $discount): ?>
                <tr>
                    <td><?= $discount['discount_id'] ?></td>
                    <td>RAM: <?= $discount['ram'] ?> - Màu: <?= $discount['color'] ?> - Số lượng: <?= $discount['amount'] ?> - Giá: <?= $discount['price'] ?></td>
                    <td><?= $discount['discount_amount'] ?></td>
                    <td><?= epochTimeToDateTime($discount['start_date']) ?></td>
                    <td><?= epochTimeToDateTime($discount['end_date']) ?></td>
                    <td><?= $discount['start_price'] ?></td>
                    <td><?= $discount['end_price'] ?></td>
                    <td><a href="?act=update-discount&id=<?= $discount['discount_id'] ?>"><button>Sửa</button></a></td>
                    <td>
                        <?php if ($discount['status'] == 1): ?>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=delete-discount&id=<?= $discount['discount_id'] ?>"><button class="btn btn-danger">Xóa</button></a>
                        <?php else: ?>
                            <a onclick="return confirm('Bạn có chắc chắn muốn bỏ xóa không?')" href="?act=undo-delete-discount&id=<?= $discount['discount_id'] ?>"><button class="btn btn-danger">Bỏ xóa</button></a>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>
 -->


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
                    <h1>Quản lí giảm giá</h1>
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
                            <a href="index.php?act=add-discount">
                                <button class="btn btn-success">Thêm giảm giá</button>
                            </a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>ID</th>
                                    <th>Biến thể</th>
                                    <th>Phần trăm giảm giá</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Từ giá</th>
                                    <th>Đến giá</th>
                                    <th>Sửa</th>
                                    <th>Xóa / Bỏ xóa</th>
                                </tr>
                                <?php foreach ($discounts as $discount): ?>
                                    <tr>
                                        <td><?= $discount['discount_id'] ?></td>
                                        <td>RAM: <?= $discount['ram'] ?> - Màu: <?= $discount['color'] ?> - Số lượng: <?= $discount['amount'] ?> - Giá: <?= $discount['price'] ?></td>
                                        <td><?= $discount['discount_amount'] ?></td>
                                        <td><?= epochTimeToDateTime($discount['start_date']) ?></td>
                                        <td><?= epochTimeToDateTime($discount['end_date']) ?></td>
                                        <td><?= $discount['start_price'] ?></td>
                                        <td><?= $discount['end_price'] ?></td>
                                        <td><a href="?act=update-discount&id=<?= $discount['discount_id'] ?>"><button class="btn btn-warning">Sửa</button></a></td>
                                        <td>
                                            <?php if ($discount['status'] == 1): ?>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=delete-discount&id=<?= $discount['discount_id'] ?>"><button class="btn btn-danger">Xóa</button></a>
                                            <?php else: ?>
                                                <a onclick="return confirm('Bạn có chắc chắn muốn bỏ xóa không?')" href="?act=undo-delete-discount&id=<?= $discount['discount_id'] ?>"><button class="btn btn-danger">Bỏ xóa</button></a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
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