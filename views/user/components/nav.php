<?php
$cate = new categoryModel;
$categories = $cate->getListCategory();
?>
<div
  id="spinner"
  class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
  <div class="spinner-border text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Navbar Start -->
<div
  class="container-fluid fixed-top px-0 wow fadeIn"
  data-wow-delay="0.1s"><br>
  <nav
    class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn"
    data-wow-delay="0.1s">
    <a href="?act=/" class="navbar-brand ms-4 ms-lg-0">
      <h1 class="fw-bold text-primary m-0">
        <span class="text-secondary">
          <img class="logo" src="assets/web/img/1.jpg" alt="Image" style="width: 100px; margin-top: 10px;" />
        </span>
      </h1>
    </a>
    <button
      type="button"
      class="navbar-toggler me-4"
      data-bs-toggle="collapse"
      data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav top ms-auto p-lg-0">
        <div class="menu" id="navar">
          <ul>
            <li>
              <a href="index.php?act=/">Home</a>
            </li>
            <li class="drop-menu">
              <a href="?act=san-pham&id_cate=<?= $category['id']?>">Products<span>&#11167</span></a>
              <div class="sub-menu">
                <ul>
                  <?php foreach ($categories as $category): ?>
                    <li><a href="?act=san-pham&id_cate=<?= $category['id']?>"><button class="btn w-100"><?= $category['cate_name']?></button></a></li>
                  <?php endforeach ?>


                </ul>
              </div>
            </li>
            <li class="drop-two">
              <a href="#">About us <span>&#11167</span></a>
              <div class="menu-two">
                <ul>
                  <li><a href="contact.html">Liên hệ với chúng tôi</a> </li>
                  <li><a href="about.html">Về Cosmetics</a></li>
                  <li><a href="lie.html">Đổi trả sản phẩm</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="d-none d-lg-flex ms-2">
        </a>
        <a class="btn-sm-square bg-white rounded-circle ms-3" href="index.php?act=login">
          <small class="fa fa-user text-body"></small>
        </a>
        <a class="btn-sm-square bg-white rounded-circle ms-3" href="index.php?act=gio-hang">
          <small class="fa fa-shopping-bag text-body"></small>
        </a>
      </div>
    </div>
  </nav>
</div>
<!-- Navbar End -->
<!-- header -->
