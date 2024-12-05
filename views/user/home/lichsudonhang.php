<?php
include './views/user/components/head.php';
include './views/user/components/nav.php';
include './views/user/components/sideshow.php'
?>


<!-- Product Start -->
<main role="main">
    <!-- Carousel End -->

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-list">

                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Stt</th>

                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Địa chỉ</th>
                                    <th>Tên người nhận</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <t>Thao tác</t
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($donHangs as $key => $donHang) { ?>
                                    <tr>

                                        <td><?= $key + 1 ?></td>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                        <td><?= $donHang['created_at'] ?></td>
                                        <td><?= $donHang['total'] ?></td>
                                        <td><?= $donHang['address_recieved'] ?></td>
                                        <td><?= $donHang['fullname_recieved'] ?></td>
                                        <td><?= $donHang['ten_trang_thai'] ?></td>
                                        <td>
                                            <?php if ($donHang['status'] == 0): ?>
                                                <a class="btn btn-success" href="?act=pay-method&id=<?= $donHang['id'] ?>">Thanh toán</a>
                                            <?php elseif ($donHang['status'] == 1): ?>
                                                <a href="index.php?act=huy-don-hang&id=<?= $donHang['id'] ?>" class="btn btn-srl" onclick="return confirm('Bạn có muốn huỷ đơn hàng không')">Hủy đơn hàng</a>
                                            <?php else: ?>
                                                <a href="index.php?act=chi-tiet-don-hang-thanh-toan&id=<?=$donHang['id']?>" class="btn btn-srl">Chi tiết</a>
                                            <?php endif ?>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
            <div class=" row mb">

            </div>
        </div>
    </section>
</main>

<!-- Blog End -->

<!-- Footer Start -->
<?php
include './views/user/components/footer.php';
?>