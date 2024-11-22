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
                            <tbody>
                                <tr class="text-center">
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" for="flexCheckDefault">
                                        </div>
                                    </td>

                                    <td><img src="assets/web/img/td2.jpg" style="width: 200px;"></img></td>

                                    <td class="product-name">
                                        <h3>Mi giả 4D</h3>
                                    </td>

                                    <td class="price">100.000 đ</td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <button type="button" class="quantity-left-minus"><i class="fa fa-minus"
                                                    aria-hidden="true"></i></button>
                                            <input type="text" name="quantity"
                                                class="quantity form-control input-number" value="1" min="1" max="100">
                                            <button type="button" class="quantity-right-plus"><i class="fa fa-plus"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </td>

                                    <td class="total">100.000 đ</td>
                                    <td>
                                        <buttonc class="btn btn-warning">xoá</buttonc>
                                    </td>
                                </tr><!-- END TR-->
                            </tbody>
                            <tr>
                                <th colspan="4">Tổng Đơn Hàng</th>
                                <th colspan="2">5000đ</th>

                            </tr>
                            <tr>
                              
                                <th colspan="3"> <a href="index.php?act=deletecart"><input type="button" value="Xoá Giỏ Hàng"></a></th>
                                <th colspan="4"><a href="index.php?act=thanh-toan"><button type="button" class="btn btn-danger">Đặt Hàng</button></a></th>
                            </tr>
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