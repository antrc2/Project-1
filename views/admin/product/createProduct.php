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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <a href="index.php?act=form-them-san-pham">
                                <button class="btn btn-success">Thêm sản phẩm</button>
                            </a>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['success'])) {
                                echo "<div class='alert alert-success'>{$_SESSION['success']}</div>";
                                unset($_SESSION['success']);
                            }

                            // ... other code
                            ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Hình ảnh</th>
                                        <th>Ngày nhập</th>
                                        <th>Ngày sửa</th>
                                        <th>Màu</th>
                                        <th>Ram</th>
                                        <th>Tên Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Mô tả</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($listSanPham as $key => $sanpham) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?= $key + 1 ?>
                                            </td>
                                            <td>
                                                <?= $sanpham["name"] ?>
                                            </td>
                                            <td>
                                                <?= $sanpham["price"] ?>
                                            </td>
                                            <td>
                                                <?= $sanpham["amount"] ?>
                                            </td>
                                            <td>
                                                <img style="width: 100px;" src="./assets/img/<?= $sanpham["image"] ?>"
                                                    alt="" onerror="this.onerror=null;this.src='https://i5.walmartimages.com/asr/d92cca6d-cb6d-4e4c-b5c0-70d5b39ecdf8.43fbe65bc7884354b2c58c12beea36c8.jpeg';">
                                            </td>
                                            <td>
                                                <?=epochTimeToDateTime($sanpham["updated_at"])  ?>
                                            </td>
                                            <td>
                                                <?=epochTimeToDateTime($sanpham["created_at"])  ?>
                                            </td>
                                            <td>
                                                <?= $sanpham["color"] ?>
                                            </td>
                                            <td>
                                                <?= $sanpham["ram"] ?>
                                            </td>
                                            <td>
                                                <?= $sanpham["cate_name"] ?>
                                            </td>
                                            <td>
                                                <?= $sanpham["amount"] !=0  ? "Còn hàng" : "Hết hàng" ?>
                                            </td>
                                            <td>
                                                <?= $sanpham["detail"] ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a
                                                        href="index.php?act=form-sua-san-pham&id_san_pham=<?= $sanpham["id"] ?>">
                                                        <button class="btn btn-warning"><i
                                                                class="fas fa-cog"></i></button></a>

                                                    <a
                                                        href="index.php?act=chi-tiet-san-pham&id_san_pham=<?= $sanpham["id"] ?>">
                                                        <button class="btn btn-primary"><i
                                                                class="fas fa-eye"></i></button></a>

                                                    <a href="index.php?act=xoa-san-pham&id_san_pham=<?= $sanpham["id"] ?>"
                                                        onclick="return confirm('bạn có chắc chắn xoá không?')">
                                                        <button class="btn btn-danger"><i
                                                                class="fas fa-trash"></i></button></a>
                                                </div>


                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Hình ảnh</th>
                                        <th>Ngày nhập</th>
                                        <th>Màu</th>
                                        <th>Ram</th>
                                        <th>Tên Danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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