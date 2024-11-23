<!-- Navbar -->

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php
include './views/admin/layouts/header.php';
include './views/admin/layouts/navbar.php';
include './views/admin/layouts/sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lí sản phẩm</h1>
                </div>
                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img style="width: 500px;" src=" ./assets/img/<?= ($product['image']) ?>" alt="">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <!-- <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div> -->
                            <?php foreach ($anhChitiet as $anh) { ?>
                                <div class="product-image-thumb"><img src="./assets/img/<?= $anh['image'] ?>" alt="Product Image"></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h1 class="my-3">Chi tiết của sản phẩm : <?= $product['name'] ?></h1>
                        <hr>
                        <h5><b>Tên sản phẩm :</b> <?= $product['name'] ?></h5>
                        <h5><b>Màu : </b><?= $chiTietSanPham['color'] ?></h5>
                        <h5><b>Giá :</b><?= $chiTietSanPham['price'] ?></h5>
                        <h5><b>Danh mục :</b><?= $danhmuc['cate_name'] ?></h5>
                        <h5><b>Số lượng :</b><?= $chiTietSanPham['amount'] ?></h5>
                        <h5><b>RAM: </b><?= $chiTietSanPham['ram'] ?>GB</h5>
                        <h5><b>Mô tả::</b>
                            <p><?= $product['detail'] ?></p>
                        </h5>
                        <div class="row mt-4">
                            <ul class="nav nav-tabs row mt-4" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Bình luận sản phẩm</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tên người bình luận</th>
                                                <th>Nội dung</th>
                                                <th>Ngày đăng</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>ANH hiếu</td>
                                                <td>chó lười ăn</td>
                                                <td>30/4/2024</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                                                        <a href="#"><button class="btn btn-danger">Xoá</button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>ANH hiếu dz</td>
                                                <td>chó lười ăn</td>
                                                <td>30/4/2024</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="#"><button class="btn btn-warning">Ẩn</button></a>
                                                        <a href="#"><button class="btn btn-danger">Xoá</button></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<?php
include './views/admin/layouts/footer.php'; ?>
</body>
<script>
    document.querySelector('input[aria-controls="example1"]').addEventListener('keyup', function(e) {
        const searchValue = e.target.value.toLowerCase();
        const table = document.getElementById('example1');
        const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

        for (let row of rows) {
            const cells = row.getElementsByTagName('td');
            let found = false;

            for (let cell of cells) {
                if (cell.textContent.toLowerCase().includes(searchValue)) {
                    found = true;
                    break;
                }
            }

            row.style.display = found ? '' : 'none';
        }
    });
</script>

</html>