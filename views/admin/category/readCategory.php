
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
                    <h1>Quản lí danh mục</h1>
                </div>
                <label>Search:<i class="fas fa-search"></i><input type="search" class="form-control form-control-sm" placeholder="Tìm kiếm từ khoá " aria-controls="example1"></label>
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
                            <a href="#">
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
                                        <th>ID</th>
                                        <th>Tên danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày sửa</th>
                                        <th>Sửa</th>
                                        <th>Xóa / Bỏ xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $category): ?>
                                        <tr>
                                            <td><?= $category['id'] ?></td>
                                            <td><?= $category['cate_name'] ?></td>
                                            <td><?= $category['status'] == 1 ? "Chưa xóa" : "Đã xóa" ?></td>
                                            <td><?= epochTimeToDateTime($category['created_at']) ?></td>
                                            <td><?= epochTimeToDateTime($category['updated_at']) ?></td>
                                            <td><a href="?act=update-category&id=<?= $category['id'] ?>"><button class="btn btn-warning">Sửa</button></a></td>
                                            <td>
                                                <?php if ($category['status'] == 1): ?>
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=delete-category&id=<?= $category['id'] ?>"><button  class="btn btn-danger">Xóa</button></a>
                                                <?php else: ?>
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn bỏ xóa không?')" href="?act=undo-delete-category&id=<?= $category['id'] ?>"><button  class="btn btn-danger">Bỏ xóa</button></a>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                        <th>ID</th>
                                        <th>Tên danh mục</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày sửa</th>
                                        <th>Sửa</th>
                                        <th>Xóa / Bỏ xóa</th>
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