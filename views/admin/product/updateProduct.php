<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Tên" value="<?= $product['name']?>">
    <input type="file" name="image" placeholder="Ảnh" >
    <img src="assets/img/<?= $product['image']?>" alt="">
    <input type="text" name="detail" placeholder="Mô tả" value="<?= $product['detail']?>">
    <select name="cate_id">
        <?php foreach($cates as $cate): ?>
            <option value="<?= $cate['id']?>" <?= $cate['id'] == $product['cate_id'] ? "selected" : "" ?> ><?= $cate['cate_name']?></option>
        <?php endforeach ?>
    </select>
    <button name="btn_updateProduct">Sửa</button>
</form>