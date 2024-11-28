<?php
include './views/user/components/head.php';
include './views/user/components/nav.php';
include './views/user/components/sideshow.php'
?>


<!-- Product Start -->
<main>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h5 class="display-5 mb-3">Sản Phẩm:<?= $products[0]['cate_name'] ?></h5>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow " data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">

                        <li class="nav-item me-2">
                            <select name="sort" id="sort" class="form-se border-2">
                                <option value="">A -> Z</option>
                                <option value="">Z -> A</option>
                                <option value="">-- Giá từ thấp đến cao --</option>
                                <option value="">-- Giá từ cao đến thấp --</option>
                            </select>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php
                        foreach ($products as $key => $product) { ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="./assets/img/<?= $product['image'] ?>" alt="" style="width: 150px; height: 150px;">
                                        <?php
                                        if ($key < 4 ) {
                                            echo '<div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">new</div>';
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                        <!-- <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div> -->
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href=""><?= $product['name'] ?></a>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-100 text-center border-end py-2">
                                            <a class="text-body" href="index.php?act=chi-tiet-san-pham-khach-hang&id=<?= $product['id'] ?>"><i class="fa fa-eye text-red me-2"></i>View
                                                detail</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<!-- Blog End -->

<!-- Footer Start -->
<?php
include './views/user/components/footer.php';
?>