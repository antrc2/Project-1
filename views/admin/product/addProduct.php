<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Tên" >
    <input type="file" name="image" placeholder="Ảnh" >
    <input type="text" name="detail" placeholder="Mô tả" >
    <select name="cate_id">
        <?php foreach($cates as $cate): ?>
            <option value="<?= $cate['id']?>"><?= $cate['cate_name']?></option>
        <?php endforeach ?>
    </select>
    <button name="btn_addProduct">Sửa</button>
</form>