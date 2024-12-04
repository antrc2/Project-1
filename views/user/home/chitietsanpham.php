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
                    <?php if ($oneProduct):?>
                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="">
                                        <img id="mainImage" src="assets/img/<?= $oneProduct['image'] ?>" style="height: 200px; width: 600px">
                                    </li>
                                </ul>
                                <br>
                                <?php foreach ($anhChitiet as $anh) { ?>
                                    <img src="./assets/img/<?= $anh['image'] ?>" alt="Product Image"
                                        style="width: 100px; height: 100px; cursor: pointer"
                                        onclick="changeMainImage(this.src)">
                                <?php } ?>
                            </div>

                            <div class="details col-md-6">
                                <h3 class="product-title"><?= $oneProduct['name'] ?></h3>
                                <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                    <strong>Uy tín</strong>!
                                </p>
                                <div class="variants">
                                    <div class="variant">
                                        <?php foreach ($detailProducts as $product): ?>
                                            <?php if($product['status'] ==1): ?>
                                            <form action="" method="POST">
                                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                                <input type="hidden" name="ram" value="<?= $product['ram'] ?>">
                                                <input type="hidden" name="color" value="<?= $product['color'] ?>">
                                                <button class="btn btn-outline-primary" name="btn_detailProduct">RAM: <?= $product['ram'] ?> - Màu: <?= $product['color'] ?></button>
                                            </form>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <?php if ($isPost): ?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="product_detail_id" value="<?= isset($_POST['btn_detailProduct']) ? $variant['product_detail_id'] : $detailProducts[0]['id'] ?>">
                                        <input type="hidden" name="product_id" value="<?= $_GET['id'] ?>">
                                        <div class="detail">
                                            <?php if (boolval($check) & $discountAmount != 0) : ?>
                                                <small class="text-muted">Giá cũ: <s><span><?= number_format($variant['price']) ?>đ</span></s></small>
                                            <?php endif ?>
                                            <h4 class="price">Giá hiện tại: <span><?= number_format($variant['price'] - $discountAmount) ?>đ</span></h4>
                                            <input type="hidden" name="price" value="<?= $variant['price'] - $discountAmount ?>">
                                            <h5>Số lượng: <?= $variant['amount'] ?></h5>
                                            <input type="hidden" name="amount" value="<?= $variant['amount'] ?>">
                                        </div>
                                    <?php endif ?>
                                    <div class="form-group ">
                                        <label for="soluong">Số lượng đặt mua:</label>
                                        <input type="number" class="form-control" min="1" value="1" id="soluong" name="soluong">
                                    </div>

                                    <div class="action">
                                        <button class="add-to-cart btn btn-outline-red border-2 py-2 px-4 mt-2" name="btn_addCart">Thêm vào giỏ hàng</button>
                                        <button class="add-to-cart btn btn-outline-red border-2 py-2 px-4 mt-2" name="btn_buyNow">Mua ngay</button>
                                    </div>
                                    </form>
                            </div>
                            <div class="product-info col-md-12">
                                <label for=""><b>Mô tả</b></label>
                                <p><?= $oneProduct['detail'] ?></p>
                            </div>
                            <div>
                                <table class="table">
                                <?php $countComment = count($listBinhLuan) ?>
                                    <b>Bình Luận <?=$countComment ?></b>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td colspan="2">
                                            <form action="index.php?act=commen" method="post" style="display: flex;">
                                                <input type="text" name="id" value="<?= $oneProduct['id'] ?>" hidden>
                                                <input type="text" name="comment" id="comment" class="form-control" placeholder="Bình luận của bạn về sản phẩm" required >
                                                <button type="submit" class="btn btn-primary">Gửi</button>
                                            </form>
                                        </td>
                                        <?php foreach ($listBinhLuan as $binhLuan) { 
                                            if ($binhLuan['star']==1) {?>
                                                <tr>
                                                <td><?= $binhLuan['fullname'] ?></td>
                                                <td><?= $binhLuan['comment'] ?></td>
                                            </tr>
                                        <?php }} ?>

                                    </tbody>

                                </table>
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
<script>
    function changeMainImage(newSrc) {
        document.getElementById('mainImage').src = newSrc;
    }
</script>
<!-- Blog End -->

<!-- Footer Start -->
<?php
include './views/user/components/footer.php';
?>