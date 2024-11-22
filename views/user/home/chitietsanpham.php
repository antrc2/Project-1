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
                <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post"
                    action="/php/twig/frontend/giohang/themvaogiohang">
                    <input type="hidden" name="sp_ma" id="sp_ma" value="5">
                    <input type="hidden" name="sp_ten" id="sp_ten" value="Samsung Galaxy Tab 10.1 3G 16G">
                    <input type="hidden" name="sp_gia" id="sp_gia" value="10990000.00">
                    <input type="hidden" name="hinhdaidien" id="hinhdaidien" value="samsung-galaxy-tab-10.jpg">

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
                                        <img src="assets/web/img/t3sp9.webp">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title"> Son Dưỡng Có Màu Glow Tint Lip Balm 3.5g</h3>
                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                                <span class="review-no">999 reviews</span>
                            </div>
                            <small class="text-muted">Giá cũ: <s><span>950.000 ₫</span></s></small>
                            <h4 class="price">Giá hiện tại: <span>180.000 ₫</span></h4>
                            <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                <strong>Uy tín</strong>!
                            </p>
                            <h5 class="colors">colors:
                                <span class="color orange not-available" data-toggle="tooltip"
                                    title="Hết hàng"></span>
                                <button class="color">#1</button>
                                <button class="color">#2</button>
                                <button class="color">#3</button>
                                <button class="color">#4</button>
                                <button class="color">#5</button>
                            </h5>
                            <div class="form-group">
                                <label for="soluong">Số lượng đặt mua:</label>
                                <input type="number" class="form-control" id="soluong" name="soluong">
                            </div>
                            <div class="action">
                                <a class="add-to-cart btn btn-outline-red border-2 py-2 px-4 mt-2" id="btnThemVaoGioHang" href="index.php?act=gio-hang">Thêm vào giỏ hàng</a>
                                <a class="add-to-cart btn btn-outline-red border-2 py-2 px-4 mt-2" id="btnMuaNgay" href="">Mua ngay</a>
                                <a class="like btn  border-2 py-2 px-4 mt-2 rounded-pill" href="#"><span class="fa fa-heart"></span></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="container-fluid">
                <h3>Thông tin chi tiết về Sản phẩm</h3>
                <div class="row">
                    <div class="col">
                        LƯU Ý: màu son mỗi người dùng sẽ có mỗi khác mọi người nha.
                        <br>🌺Là 1 thỏi son với hiệu ứng 2 trong 1:
                        <br>➖Lên màu vivid tint cực đẹp lấy cảm hứng từ màu sắc của từng cánh hoa.
                        <br>➖Lần đầu tiên 1 thỏi son tint chứa đựng thành phần dưỡng môi đáng kinh ngạc. Bao gồm rosehip oil, rose water và acacia collagen phục hồi làn môi thâm, nứt nẻ một cách hoàn hảo.
                        <br>🌺Rosehip Oil chính là tinh dầu Tầm Xuân – đây là một loại tinh dầu thích hợp dùng cho làn môi nứt nẻ, hằn sâu, nhiều vết thâm và thường xuyên mất nước.
                        <br>🌺Omega 3, Omega 6 và các a-xít béo thiết yếu: Các hợp chất lipid (chất béo) trong các chất này là nhân tố quan trọng trong quá trình dưỡng ẩm đối với làn môi khô và cải thiện độ mềm mại và độ đàn hồi của môi. Các axit béo thiết yếu rất quan trọng đối với sức khỏe của da của chúng ta, tuy nhiên cơ thể của chúng ta lại không thể tạo ra chúng – vì vậy dưỡng chất này giống như bổ sung những gì còn thiếu cho làn da, làm thỏa mãn “cơn khát”
                        <br>🌺Acacia Collagen : là một kết hợp giữa collagen và Phyto, có tính chất làm se, kích thích các tế bào da sản xuất thêm collagen. Giúp làn da môi phục hồi nhanh chóng và giữ suốt 24h.
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