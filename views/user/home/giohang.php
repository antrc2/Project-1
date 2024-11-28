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
                                    <th><input type="checkbox" name="" id=""></th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Xoá</th>
                                </tr>
                            </thead>
                            <?php if (boolval($cartDetailByCartId)): ?>
                            <tbody>
                                <?php $total = 0?>
                                <?php foreach ($cartDetailByCartId as $cart): ?>
                                <tr class="text-center">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" for="flexCheckDefault">
                                        </div>
                                    </td>

                                    <td><img src="assets/img/<?= $cart['image']?>" style="width: 200px;"></img></td>

                                    <td class="product-name">
                                        <h3><?= $cart['name']?></h3>
                                    </td>

                                    <td class="price"><?= number_format($cart['cart_detail_price'])?> đ</td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <button type="button" class="quantity-left-minus"><i class="fa fa-minus"
                                                    aria-hidden="true"></i></button>
                                            <input type="text" name="quantity"
                                                class="quantity form-control input-number" value="<?= $cart['cart_detail_amount']?>" min="1" max="100">
                                            <button type="button" class="quantity-right-plus"><i class="fa fa-plus"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </td>

                                    <td class="total"><?= number_format($cart['total'])?> đ</td>
                                    <td>
                                        <buttonc class="btn btn-warning">xoá</buttonc>
                                    </td>
                                </tr>
                                <?php $total += $cart['total'] ?>
                                <?php endforeach?>
                            
                            <tr>
                                <th colspan="4">Tổng Đơn Hàng</th>
                                <th colspan="2"><?= number_format($total)?> đ</th>

                            </tr>
                            <tr>
                              
                                <th colspan="3"> <a href="index.php?act=deletecart"><input type="button" value="Xoá Giỏ Hàng"></a></th>
                                <th colspan="4"><a href="index.php?act=thanh-toan"><button type="button" class="btn btn-danger">Đặt Hàng</button></a></th>
                            </tr>
                            </tbody>
                            <?php else: ?>
                        <h1>Không tìm thấy sản phẩm trong giỏ hàng</h1>
                        <?php endif ?>
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