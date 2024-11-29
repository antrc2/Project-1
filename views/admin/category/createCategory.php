


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
                    <h1>Sửa danh mục</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin danh mục </h3>
                    </div>

                    <form action="" method="POST">
                        <div class="card-body row">
                            <div class="form-group col-md-6">
                                <label for="">Tên danh mục</label>
                                <input type="text" name="cate_name" class="form-control">
                        
                            </div>
                        </div>
                        <div class="card-footer">
                        <button name="btn_addCategory" class="btn btn-primary">Thêm danh mục</button>
                           
                        </div>

                    </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-12">

                <!-- /.card -->
            </div>
        </div>

    </section>

</div>
<?php
include './views/admin/layouts/footer.php'; ?>

</body>
<script>
    var faqs_row = <?= count($listAnhSanPham) ?>
    function addfaqs() {
        html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td><img src="./uploads/th.jpg"  style="width: 100px; height:100px " alt=""></td>';
        html += '<td><input type="file" name="img_array[]"  class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';
        html += '</tr>';

        $('#faqs tbody').append(html);
        faqs_row++;
    }

    function removeRow(rowId, imgId) {
        $('#faqs-row-' + rowId).remove();
        if (imgId != null) {
            var imgDeleteInput = document.getElementById('img_delete');
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>

</html>