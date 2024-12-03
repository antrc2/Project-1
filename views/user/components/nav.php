<?php
$cate = new categoryModel;
$categories = $cate->getListCategory();
$acc = new accountModel;
$check = isset($_SESSION['username']);
if ($check){
  $informationOfUser = $acc->getInformationUserByUsername($_SESSION['username']);
}

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
              <a href="">Products<span>&#11167</span></a>
              <div class="sub-menu">
                <ul>
                  <?php foreach ($categories as $category):
                    if ($category['status'] == 1) {

                  ?>
                      <li><a href="?act=san-pham&id_cate=<?= $category['id'] ?>"><button class="btn w-100"><?= $category['cate_name'] ?></button></a></li>
                  <?php }
                  endforeach ?>
                </ul>
              </div>
            </li>
            <li class="drop-two">
              <a href="index.php?act=lien-he">Quy định đổi trả</span></a>
            </li>
          </ul>
        </div>
      </div>
      <div class="d-none d-lg-flex ms-2">
        </a>
        <small style="margin-top:10px; color: red;  padding-right: 10px;">
          
            <?php if ($check): ?>
              <b>Xin chào <?= $informationOfUser['fullname']?></b>
            <?php endif ?>
          
        </small>

        <form action="" id="search-box">
          <input type="text" id="search-text" placeholder="Bạn muốn tìm gì?" required>
          <button id="search-btn"><small class="fa fa-search text-body"></small></button>
        </form>
        <?php if ($check) { ?>

          <a class="btn-sm-square bg-white rounded-circle ms-3" href="index.php?act=logout">
            <small class="fas fa-sign-out-alt"></small>
          </a>
        <?php } else { ?>
          <a class="btn-sm-square bg-white rounded-circle ms-3" href="index.php?act=login">
            <small class="fa fa-user text-body"></small>
          </a>
        <?php } ?>

        <a class="btn-sm-square bg-white rounded-circle ms-3" href="index.php?act=gio-hang">
          <small class="fa fa-shopping-bag text-body"></small>
        </a>
        <?php if ($check): ?>
          <?php if ($informationOfUser['role_id'] ==2): ?>

            <a href="index.php?act=list-category" class="btn-sm-square bg-white rounded-circle ms-3"><i class="fas fa-user-shield"></i></a>
        
            <?php endif ?>
        <?php endif ?>


      </div>
    </div>
  </nav>
</div>
<!-- Navbar End -->
<!-- header -->
<style>
  .menuf {
    position: relative;
    display: flex;
    align-items: center;
  }

  .dropdown {
    position: relative;
  }

  .menuf-item {
    margin-left: 10px;
    text-decoration: none;
    color: black;
    cursor: pointer;
  }

  .submenf {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    border: 1px solid #ccc;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  }

  .submenf a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: black;
    white-space: nowrap;
  }

  .submenf a:hover {
    background: #f0f0f0;
  }

  .dropdown:hover .submenf {
    display: block;
  }
</style>