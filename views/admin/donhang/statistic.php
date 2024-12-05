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
                    <div class="px-5">
                        <form action="" method="POST" class="row g-3">
                            <div class="col-md-6">
                                <label for="fullname" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="buy-from" class="form-label">Mua từ ngày</label>
                                <input type="datetime-local" class="form-control" id="buy-from" name="buy-from" value="<?= isset($_POST['buy-from']) ? $_POST['buy-from'] : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="buy-to" class="form-label">Mua đến ngày</label>
                                <input type="datetime-local" class="form-control" id="buy-to" name="buy-to" value="<?= isset($_POST['buy-to']) ? $_POST['buy-to'] : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="name-product" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name-product" name="name-product" value="<?= isset($_POST['name-product']) ? htmlspecialchars($_POST['name-product']) : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="price-from" class="form-label">Giá từ</label>
                                <input type="number" class="form-control" id="price-from" name="price-from" value="<?= isset($_POST['price-from']) ? $_POST['price-from'] : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="price-to" class="form-label">Giá đến</label>
                                <input type="number" class="form-control" id="price-to" name="price-to" value="<?= isset($_POST['price-to']) ? $_POST['price-to'] : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="amount-from" class="form-label">Số lượng từ</label>
                                <input type="number" class="form-control" id="amount-from" name="amount-from" value="<?= isset($_POST['amount-from']) ? $_POST['amount-from'] : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="amount-to" class="form-label">Số lượng đến</label>
                                <input type="number" class="form-control" id="amount-to" name="amount-to" value="<?= isset($_POST['amount-to']) ? $_POST['amount-to'] : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="total-from" class="form-label">Tổng tiền từ</label>
                                <input type="number" class="form-control" id="total-from" name="total-from" value="<?= isset($_POST['total-from']) ? $_POST['total-from'] : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="total-to" class="form-label">Tổng tiền đến</label>
                                <input type="number" class="form-control" id="total-to" name="total-to" value="<?= isset($_POST['total-to']) ? $_POST['total-to'] : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="ma_don_hang" class="form-label">Mã đơn hàng</label>
                                <input type="text" class="form-control" id="ma_don_hang" name="ma_don_hang" value="<?= isset($_POST['ma_don_hang']) ? htmlspecialchars($_POST['ma_don_hang']) : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="ram" class="form-label">RAM</label>
                                <select class="form-select form-control" id="ram" name="ram">
                                    <option value="">Chọn RAM</option>
                                    <?php foreach ($rams as $value): ?>
                                        <option value="<?= $value['ram'] ?>" <?= isset($_POST['ram']) && $_POST['ram'] == $value['ram'] ? 'selected' : '' ?>>
                                            <?= $value['ram'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="color" class="form-label">Màu</label>
                                <select class="form-select form-control" id="color" name="color">
                                    <option value="">Chọn màu</option>
                                    <?php foreach ($colors as $value): ?>
                                        <option value="<?= $value['color'] ?>" <?= isset($_POST['color']) && $_POST['color'] == $value['color'] ? 'selected' : '' ?>>
                                            <?= $value['color'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success" name="btn_search">Tìm kiếm</button>
                            </div>
                        </form>

                        <table class="table table-bordered table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Họ tên</th>
                                    <th>Ngày mua</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>RAM</th>
                                    <th>Màu</th>
                                    <th>Tổng tiền</th>
                                    <th>Mã đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 1;
                                $total = 0;
                                foreach ($statistics as $statistic): ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $statistic['fullname'] ?></td>
                                        <td><?= epochTimeToDateTime($statistic['bill_created_at']) ?></td>
                                        <td><?= $statistic['name'] ?></td>
                                        <td><?= number_format((int)$statistic['bill_price']) ?> đ</td>
                                        <td><?= $statistic['so_luong'] ?></td>
                                        <td><?= $statistic['ram'] ?></td>
                                        <td><?= $statistic['color'] ?></td>
                                        <td><?= number_format($statistic['thanh_tien']) ?> đ</td>
                                        <td><a href="?act=chi-tiet-don-hang&id_don_hang=<?=$statistic['bill_id']?>"class="btn btn-success"><?= $statistic['ma_don_hang'] ?></a></td>
                                    </tr>
                                <?php $count++;
                                    $total += $statistic['thanh_tien'];
                                endforeach; ?>
                            </tbody>
                        </table>
                        <h3 class="mt-3">Tổng doanh thu: <?= number_format($total) ?> đ</h3>
                    </div>


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