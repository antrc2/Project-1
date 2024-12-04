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
                            <img style="width: 400px;" src=" ./assets/img/<?= ($product['image']) ?>" alt="">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <!-- <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div> -->
                            <?php foreach ($anhChitiet as $anh) { ?>
                                <div class="product-image-thumb"><img src="./assets/img/<?= $anh['image'] ?>" alt="Product Image"></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Chi tiết của sản phẩm mua : <?= $product['name'] ?></h3>
                        <hr>
                        <h5><b>Tên sản phẩm :</b> <?= $product['name'] ?></h5>
                        <h5><b>Màu : </b><?= $chiTietSanPham['color'] ?></h5>
                        <h5><b>Giá :</b><?= number_format($chiTietSanPham['price']) ?></h5>
                        <h5><b>Danh mục :</b><?= $danhmuc['cate_name'] ?></h5>
                        <h5><b>Số lượng mua:</b><?= $chiTietSanPham['so_luong'] ?></h5>
                        <h5><b>RAM: </b><?= $chiTietSanPham['ram'] ?>GB</h5>
                        <h5><b>Thành tiền thanh toán: </b><?= number_format($chiTietSanPham['thanh_tien'] )?>GB</h5>
                        <div class="row mt-4">
                            <ul class="nav nav-tabs row mt-4" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Bình luận sản phẩm</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Người bình luận</th>
                                <th>Nội dung</th>
                                <th>Ngày bình luận</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listBinhLuan as $key => $binhLuan) {
                            ?>
                                <tr>
                                    <td>
                                        <?= $key + 1 ?>
                                    </td>
                                    <td>
                                    <a target="_blank" href="index.php?act=chi-tiet-khach-hang&id_khach_hang=<?= $binhLuan["user_id"]?>"><?= $binhLuan["username"] ?></a>
                                    </td>
                                    <td>
                                        <?= $binhLuan["comment"] ?>
                                    </td>
                                    <td>
                                        <?= $binhLuan["updated_at"] ?>
                                    </td>
                                    <td>
                                        <?= $binhLuan["star"] == 1 ? "hiển thị" : "Ẩn" ?>
                                    </td>

                                    <td>
                                        <div class="btn-group">
                                           
                                            <form action="index.php?act=update-trang-thai-binh-luan" method="post">
                                                <input type="hidden" name="id_binh_luan" value="<?= $binhLuan['id'] ?>">
                                                <input type="hidden" name="name_view" value="detail_sanpham">
                                                <input type="hidden" name="id_khach_hang" value="<?= $binhLuan['user_id'] ?>">
                                                <?php if ($binhLuan['star'] == 1): ?>
                                                    <button class="btn btn-danger" onclick="return confirm('Bình luận hiện đang HIỂN THỊ. Bạn có muốn ẨN bình luận này không?')">
                                                        Ẩn
                                                    </button>
                                                <?php else: ?>
                                                    <button class="btn btn-success" onclick="return confirm('Bình luận hiện đang ẨN. Bạn có muốn HIỂN THỊ bình luận này không?')">
                                                        Hiện
                                                    </button>
                                                <?php endif; ?>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
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