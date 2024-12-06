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
                                <th colspan="8">Chi tiết sản phẩm</th>
                            </thead>
                            <thead>
                                <tr class="text-center">
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Ram</th>
                                    <th>Màu</th>
                                    <th>Giá tiền</th>
                                    <th>Số lượng </th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tong_tien = 0;
                                foreach ($donHangDetail as $key => $donHang) { ?>
                                    <tr class="text-center">
                                        <td><?= $key + 1 ?></td>
                                        <td><a href="index.php?act=chi-tiet-san-pham-khach-hang&id=<?=$donHang['id'] ?>"><?= $donHang['name'] ?></a></td>
                                        <td><a href="index.php?act=chi-tiet-san-pham-khach-hang&id=<?=$donHang['id'] ?>"><img src="assets/img/<?= $donHang['image'] ?>" width="200px" height="200px"></a></td>
                                        <td><?= $donHang['ram'] ?> GB</td>
                                        <td><?= $donHang['color'] ?></td>
                                        <td><?= number_format($donHang['price']) ?>đ</td>
                                        <td><?= $donHang['so_luong'] ?></td>
                                        <td><?= number_format($donHang['thanh_tien']) ?> VNĐ</td>
                                    </tr>
                                <?php  
                                    $tong_tien += $donHang['thanh_tien'];
                                } ?>
                                <tr>
                                    <td colspan="7" class="text-end"><b>Tổng tiền:</b></td>
                                    <td class="text-center"><b><?= number_format($tong_tien) ?> VNĐ</b></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
                <div class="col-md-12">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <th colspan="7">Thông tin đơn hàng</th>
                            </thead>
                            <thead >
                                <tr class="text-center">
                                    <th>Mã đơn hàng</th>
                                    <th>Tên người nhận</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái đơn hàng</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                             
                                <tr class="text-center">
                                    
                                    <td><?= $donHangs['ma_don_hang'] ?></td> 
                                    <td><?= $donHangs['fullname_recieved'] ?></td>
                                    <td><?= $donHangs['created_at']?></td>
                                    <td><?= number_format($donHangs['total']) ?> VNĐ</td>
                                    <td><?= $donHangs['address_recieved'] ?></td>                                  
                                    <td><?= $donHangs['ten_trang_thai']?></td>
                                </tr>
                            
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