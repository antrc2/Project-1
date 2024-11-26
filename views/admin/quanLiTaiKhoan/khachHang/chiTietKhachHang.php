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
                    <h1>Quản lí tài khoản khách hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="container">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Họ và tên:</th>
                                    <td><?= $account["fullname"] ?></td>
                                </tr>
                                <tr>
                                    <th>Tài khoản:</th>
                                    <td><?= $account["username"] ?></td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td><?= $account["email"] ?></td>
                                </tr>
                                <tr>
                                    <th>Số điện thoại:</th>
                                    <td><?= $account["phone"] ?></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ</th>
                                    <td><?= $account["address"] ?></td>
                                </tr>
                                <tr>
                                    <th>Trạng thái</th>
                                    <td><?= $account["status"] == 1 ? "Active" : "Inactive"  ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12">
                        <h2>Lịch sử  mua hàng</h2>
                        <div>
                            <table id="example2" class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Tên Người Nhận</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Ngày đặt</th>
                                        <th>Tống tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listDonHang as $key => $donHang) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $key + 1 ?>
                                            </td>
                                            <td>
                                                <?= $donHang["ma_don_hang"] ?>
                                            </td>
                                            <td>
                                                <?= $donHang["fullname_recieved"] ?>
                                            </td>
                                            <td>
                                                <?= $donHang["phone_reciedved"] ?>
                                            </td>

                                            <td>
                                                <?=epochTimeToDateTime( $donHang["created_at"]) ?>
                                            </td>
                                            <td>
                                                <?= $donHang["total"] ?>
                                            </td>
                                            <td>
                                                <?= $donHang["ten_trang_thai"] ?>
                                            </td>
                                           
                                            <td>
                                                <div class="btn-group">
                                                    <a
                                                        href="index.php?act=chi-tiet-don-hang&id_don_hang=<?=$donHang["id"] ?>">
                                                        <button class="btn btn-primary"><i
                                                            class="fas fa-eye"></i></button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        <h2>Lịch sử bình luận</h2>
                        <div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản phẩm</th>
                                        <th>Nội dung</th>
                                        <th>Ngày bình luận</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listBinhLuan as $key => $binhLuan) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $key + 1 ?>
                                            </td>
                                            <td>
                                                <a target="_blank" href="index.php?act=chi-tiet-san-pham&id_san_pham=<?= $binhLuan["product_id"] ?>"><?= $binhLuan["name"] ?></a>
                                            </td>
                                            <td>
                                                <?= $binhLuan["comment"] ?>
                                            </td>
                                            <td>
                                                <?=epochTimeToDateTime($binhLuan["created_at"]) ?>
                                            </td>
                                            <td>
                                                <?= $binhLuan["star"] == 1 ? "hiển thị" : "Ẩn" ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <form action="index.php?act=update-trang-thai-binh-luan" method="post">
                                                        <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                                        <input type="hidden" name="name_view" value="detail_khach">
                                                        <input type="hidden" name="id_khach_hang" value="<?= $binhLuan['user_id']?>">
                                                        <?php if ($binhLuan['star'] == 1): ?>
                                                            <button class="btn btn-danger" onclick="return confirm('Bình luận hiện đang HIỂN THỊ. Bạn có muốn ẨN bình luận này không?')">
                                                                Ẩn
                                                            </button>
                                                        <?php else: ?>
                                                            <button class="btn btn-success" onclick="return confirm('Bình luận hiện đang ẨN. Bạn có muốn HIỂN THỊ bình luận này không?')">
                                                                Hiện
                                                            </button>
                                                        <?php endif; ?>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

</div>
<?php
include './views/admin/layouts/footer.php'; ?>

</body>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        });
    });
</script>

</html>
<style>

</style>