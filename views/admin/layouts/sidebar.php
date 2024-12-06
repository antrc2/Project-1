<aside class="main-sidebar sidebar-primary elevation-4" style="background-color: #663265;">
    <!-- Brand Logo -->
    <a href="index.php?act/" class="brand-link">
        <button class="btn btn-primary"><span class="brand-text font-weight-light">Quay lại</span></button>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info" style="color: white">

                <?php  
                $acc = new accountModel;
                $userInfo = $acc->getInformationUserByUsername($_SESSION['username']);
                echo $userInfo['fullname'];
                ?>
            </div>
        </div>

        <!-- SidebarSearch Form -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="index.php?act=thong-ke" class="nav-link">
                    <a href="?act=statistic" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Thống kê
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="<?= 'index.php?act=list-category' ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh mục sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= 'index.php?act=danh-sach-admin-san-pham' ?>" class="nav-link">
                        <i class="fas fa-tv"></i>
                        <p>
                            Sản Phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= 'index.php?act=danh-sach-don-hang' ?>" class="nav-link">
                        <i class="fas fa-folder"></i>
                        <p>
                            Đơn hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= 'index.php?act=list-discount' ?>" class="nav-link">
                        <i class="fas fa-percent"></i>
                        <p>
                            Khuyến mãi
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user"></i>
                        <p>
                            Quản lí tài khoản
                        </p>
                        <i class="fas fa-angle-left right"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= 'index.php?act=danh-sach-quan-tri' ?>" class="nav-link">
                                <i class="far fa-user"></i>
                                <p>tài khoản quản trị</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?act=danh-sach-khach-hang" class="nav-link">
                                <i class="far fa-user"></i>
                                <p>tài khoản khách hàng</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<style>
    .nav-item a p {
        color: azure;
    }
</style>