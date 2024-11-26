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
                    <h1>Quản lí tài khoản</h1>
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
                                        <th>Stt</th>
                                        <th>Họ và tên</th>
                                        <th>Tên tài khoản</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Ngày tạo</th>
                                        <th>Trạng thái</th>
                                        <th>Chức vụ</th>
                                        <th>Sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listAccount as $key => $taiKhoan): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $taiKhoan['fullname'] ?></td>
                                            <td><?= $taiKhoan['username'] ?></td>
                                            <td><?= $taiKhoan['email'] ?></td>
                                            <td><?= $taiKhoan['address'] ?></td>
                                            <td><?= $taiKhoan['phone'] ?></td>
                                            <td><?= epochTimeToDateTime($taiKhoan['created_at']) ?></td>
                                            <td><?= $taiKhoan["status"] == 1 ? "Hoạt động" : "Bị khoá" ?></td>
                                            <td><?= $taiKhoan['role_name'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="?act=form-sua-tai-khoan-khach-hang&id=<?= $taiKhoan['id'] ?>"><button class="btn btn-warning">Sửa</button></a>
                                                    <a href="?act=reset-tai-khoan&id=<?= $taiKhoan['id'] ?>"
                                                        onclick="return confirm('bạn có muốn reset mật khẩu không?')">
                                                        <button class="btn btn-danger">reset</button></a>
                                                    <a
                                                        href="index.php?act=chi-tiet-khach-hang&id=<?= $taiKhoan["id"] ?>">
                                                        <button class="btn btn-primary"><i
                                                                class="fas fa-eye"></i></button></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
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