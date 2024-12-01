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
                <div class="col-sm-8">
                    <h1>Quản lí danh sách đơn hàng-Đơn hàng:<?= $listChiTietDonHang["ma_don_hang"] ?></h1>
                </div>
                <form action="index.php?act=sua-don-hang" method="post" class="d-flex align-items-center">
                    <input type="hidden" name="id" value="<?= $listDonHang['id'] ?>">
                    <select name="status" class="form-control mr-2">
                        <?php
                        foreach ($listTrangThaiDonHang as $trangThai) {
                        ?>
                            <option
                                <?php
                                if (
                                    $listDonHang['status'] > $trangThai['id']
                                    || $listDonHang['status'] == 9
                                    || $listDonHang['status'] == 10
                                    || $listDonHang['status'] == 11
                                ) {
                                    echo 'disabled';
                                }
                                ?>
                                <?= $trangThai['id'] == $listDonHang['status'] ? 'selected' : '' ?>
                                value="<?= $trangThai['id'] ?>">
                                <?= $trangThai['ten_trang_thai'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <?php
                    if ($listDonHang['status'] < 9) { ?>
                        <button type="submit" class="btn btn-primary" style="height: 40px; width: 150px;">Cập nhật</button>
                    <?php } else { ?>
                        <button type="submit" class="btn btn-primary" style="height: 40px; width: 150px;" disabled>Cập nhật</button>
                    <?php } ?>

                </form>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php
                    if ($listDonHang['status'] == 1) {
                        $coloAlert = 'primary';
                    } elseif ($listDonHang['status'] >= 2 && $listDonHang['status'] <= 10) {
                        $coloAlert = 'warning';
                    } elseif ($listDonHang['status'] == 11) {
                        $coloAlert = 'success';
                    } else {
                        $coloAlert = 'danger';
                    }
                    ?>

                    <div class="alert alert-<?= $coloAlert ?>" role="alert">
                        <h3> Đơn hàng: <?= $listChiTietDonHang['ten_trang_thai']; ?></h3>
                    </div>


                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Shop SUPERBEE
                                    <small class="float-right">Ngày đặt:<?= epochTimeToDateTime($listChiTietDonHang['created_at'])  ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Thông tin người đặt
                                <address>
                                    Tên người đặt: <strong><?= $listChiTietDonHang['username'] ?></strong><br>
                                    Số Điện Thoại: <?= $listChiTietDonHang['phone'] ?><br>
                                    Email: <?= $listChiTietDonHang['email'] ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Người nhận
                                <address>
                                    Tên người nhận: <strong><?= $listChiTietDonHang['fullname_recieved'] ?></strong><br>
                                    Địa chỉ:<?= $listChiTietDonHang['address_recieved'] ?> <br>
                                    Số điện thoại: <?= $listChiTietDonHang['phone_reciedved'] ?><br>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Mã đơn hàng:<?= $listChiTietDonHang['ma_don_hang'] ?></b><br>
                                <b> Tổng tiền:</b><?= $listChiTietDonHang['total'] ?> vnđ<br>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Màu</th>
                                            <th>Ram</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tong_tien = 0;
                                        foreach ($sanPhamDonHang as $key => $sanPham) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $sanPham['name'] ?> </td>
                                                <td><?= $sanPham['price'] ?></td>
                                                <td><?= $sanPham['color'] ?></td>
                                                <td><?= $sanPham['ram'] ?></td>
                                                <td><?= $sanPham['so_luong'] ?></td>
                                                <td><?= $sanPham['thanh_tien'] ?></td>
                                            </tr>
                                            <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Ngày đặt hàng:<?= epochTimeToDateTime($listChiTietDonHang['created_at'])  ?></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Thành tiền:</th>
                                                <td>
                                                    <?= $tong_tien ?> VNĐ
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Vận chuyển:</th>
                                                <td>200.000</td>
                                            </tr>
                                            <tr>
                                                <th>Tổng tiền:</th>
                                                <td><?= $tong_tien + 200.000 ?>.000 VNĐ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
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