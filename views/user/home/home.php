<?php
include './views/user/components/head.php';
include './views/user/components/nav.php';
include './views/user/components/sideshow.php'
?>


<!-- Product Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-0 gx-5 align-items-end">
      <div class="col-lg-6">
        <div
          class="section-header text-start mb-5 wow fadeInUp"
          data-wow-delay="0.1s"
          style="max-width: 500px">
          <h1 class="display-5 mb-3">Sản Phẩm</h1>
        </div>
      </div>
    </div>
    <div class="tab-content">
      <div id="tab-1" class="tab-pane fade show p-0 active">
        <div class="row g-4">
          <!-- vòng lặp forech ở đây -->



          <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="product-item">
              <div class="position-relative bg-light overflow-hidden">
                <img
                  class="img-fluid w-100"
                  src="assets/web/img/nuoccanbang.jpg"
                  alt="" />
                <div
                  class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                  New
                </div>
              </div>
              <div class="text-center p-4">
                <a class="d-block h5 mb-2" href="">Toner dành cho da dầu DermaDS 180ml</a>
                <span class="text-red me-1">499.000 ₫</span>
                <span class="text-body text-decoration-line-through">669.00</span>
              </div>
              <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                  <a class="text-body" href="index.php?act=chi-tiet-san-pham"><i class="fa fa-eye text-red me-2"></i>View
                    detail</a>
                </small>
                <small class="w-50 text-center py-2">
                  <a class="text-body" href=""><i class="fa fa-shopping-bag text-red me-2"></i>Add
                    to cart</a>
                </small>
              </div>
            </div>
          </div>




          <div
            class="col-12 text-center wow fadeInUp"
            data-wow-delay="0.1s">
            <a class="btn btn-red rounded-pill py-3 px-5" href="product.html">Xem thêm sản phẩm</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Product End -->

<!-- Firm Visit Start -->
<div class="container-fluid bg-icon ">
  <div class="container">
    <div class="row g-5 align-items-center">
      <img
        class="nav-img"
        src="assets/img/lap10.jpg"
        alt="" />
    </div>
  </div>
</div>

<!-- Firm Visit End -->

<!-- Testimonial Start -->
<div class="container-fluid bg-light bg-icon py-5 mb-5">
  <div class="container">
    <div
      class="section-header text-center mx-auto mb-5 wow fadeInUp"
      data-wow-delay="0.1s"
      style="max-width: 500px">
      <h1 class="display-5 mb-3">Siêu hot của shop</h1>
    </div>
    <div
      class="owl-carousel testimonial-carousel wow fadeInUp"
      data-wow-delay="0.1s">

      <!-- vòng lặp forech những sản phẩn bán chạy nhất shop -->
      <div class="testimonial-item position-relative   mt-4">
        <i
          class="fa fa-quote-left fa-3x text-red position-absolute top-0 start-0 mt-n4 ms-5"></i>
        <img
          class=""
          src="assets/web/img/sale6.webp"
          alt="" />
        <a
          class="btn btn-outline-red-bg border-2 py-2 px-4 rounded-pill center"
          href="">Xem chi tiết</a>
      </div>




    </div>
  </div>
</div>
<!-- Testimonial End -->

<!-- Blog Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div
      class="section-header text-center mx-auto mb-5 wow fadeInUp"
      data-wow-delay="0.1s"
      style="max-width: 500px">
      <h1 class="display-5 mb-3">Sản phẩm giá rẻ nhất</h1>
      <p>
        Những sản phẩm có giá phù hợp với các sinh học sinh ,sinh viên và các dân văn phòng
      </p>
    </div>
    <div class="row g-4">



    <!-- vòng lặp forech 4 sản phẩm có giá rẻ nhất của shop -->
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <img class="img-fluid" src="assets/web/img/f6.webp" alt="" />
        <div class="bg-light p-4">
          <a class="d-block h5 lh-base mb-4" href="">Từ Điển Sống Khỏe - Wellness</a>
          <div class="text-muted border-top pt-4">
            <small class="me-3"><i class="fa fa-user text-red me-2"></i>Admin</small>
            <small class="me-3"><i class="fa fa-calendar text-red me-2"></i>01 July,
              2022</small>
          </div>
        </div>
      </div>


   
    </div>
  </div>
</div>
<!-- Blog End -->

<!-- Footer Start -->
<?php
include './views/user/components/footer.php';
?>