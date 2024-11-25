<?php
include './views/user/components/head.php';
include './views/user/components/nav.php';
include './views/user/components/sideshow.php'
?>


<!-- Product Start -->
<main role="main">
    <!-- Block content - Đục lỗ trên giao diện bố cục chung, đặt tên là `content` -->
    <div class="container mt-4">
        <div id="thongbao" class="alert alert-danger d-none face" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="card">
            <div class="container-fliud">
                <div>
                    <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                    <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                    <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                    <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">
                    <?php if ($oneProduct): ?>
                    <div class="wrapper row">
                        <div class="preview col-md-6">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane" id="pic-1">
                                    <!-- <img src="img/t3sp9.webp"> -->
                                </div>
                                <div class="tab-pane" id="pic-2">
                                    <!-- <img src="img/t3sp9.webp"> -->
                                </div>
                                <div class="tab-pane active" id="pic-3">
                                    <!-- <img src="img/t3sp9.webp"> -->
                                </div>
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                <li class="active">
                                    <a data-target="#pic-1" data-toggle="tab" class="">
                                        <!-- <img src="img/t3sp9.webp"> -->
                                    </a>
                                </li>
                                <li class="">
                                    <a data-target="#pic-2" data-toggle="tab" class="">
                                        <!-- <img src="img/t3sp9.webp"> -->
                                    </a>
                                </li>
                                <li class="">
                                    <a data-target="#pic-3 " data-toggle="tab" class="active">
                                        <img src="assets/img/<?= $oneProduct['image'] ?>">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="details col-md-6">
                            <h3 class="product-title"><?= $oneProduct['name'] ?></h3>
                            <!-- <small class="text-muted">Giá cũ: <s><span>950.000 ₫</span></s></small>
                            <h4 class="price">Giá hiện tại: <span>180.000 ₫</span></h4> -->
                            <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                <strong>Uy tín</strong>!
                            </p>
                            <div class="variants">
                                <div class="variant">
                                    <?php foreach ($detailProducts as $product): ?>
                                        <form action="" method="POST">
                                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                            <input type="hidden" name="ram" value="<?= $product['ram'] ?>">
                                            <input type="hidden" name="color" value="<?= $product['color'] ?>">
                                            <button name="btn_detailProduct">RAM: <?= $product['ram'] ?> - Màu: <?= $product['color'] ?></button>
                                        </form>
                                    <?php endforeach ?>
                                </div>

                            </div>
                            <!-- <h5 class="colors">colors:
                                <span class="color orange not-available" data-toggle="tooltip"
                                    title="Hết hàng"></span>
                                <button class="color">#1</button>
                                <button class="color">#2</button>
                                <button class="color">#3</button>
                                <button class="color">#4</button>
                                <button class="color">#5</button>
                            </h5> -->
                            <?php if ($isPost): ?>
                                <div class="detail">
                                    <?php if ($check) : ?>
                                        <small class="text-muted">Giá cũ: <s><span><?= number_format($variant['price']) ?>đ</span></s></small>
                                    <?php endif ?>
                                    <h4 class="price">Giá hiện tại: <span><?= number_format($variant['price'] - $discountAmount) ?>đ</span></h4>
                                    <h5>Số lượng: <?= $variant['amount'] ?></h5>
                                </div>
                            <?php endif ?>
                            <div class="form-group">
                                <label for="soluong">Số lượng đặt mua:</label>
                                <input type="number" class="form-control" id="soluong" name="soluong">
                            </div>
                            <div class="action">
                                <a class="add-to-cart btn btn-outline-red border-2 py-2 px-4 mt-2" id="btnThemVaoGioHang" href="?act=add-cart&id=<?= isset($_POST['btn_detailProduct']) ? $variant['product_detail_id'] : $detailProducts[0]['id'] ?>">Thêm vào giỏ hàng</a>
                                <a class="add-to-cart btn btn-outline-red border-2 py-2 px-4 mt-2" id="btnMuaNgay" href="">Mua ngay</a>
                            </div>
                        </div>
                        <?php else: ?>
                        <h1>Không tìm thấy sản phẩm</h1>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End block content -->
</main>

<!-- Blog End -->

<!-- Footer Start -->
<?php
include './views/user/components/footer.php';
?>