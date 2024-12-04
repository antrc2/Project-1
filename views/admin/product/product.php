
<a href="?act=add-product"><button>Thêm</button></a>
<table class="table">
    <thead>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Ngày tạo</th>
        <th>Ngày sửa</th>
        <th>Danh mục</th>
        <th>Mô tả</th>
        <th>Trạng thái</th>
        <th>Tùy chọn</th>
    </thead>
    <tbody>
        <?php $index = 1 ?>
        <?php foreach ($products as $product): ?>
            <?php if ($product['category_status'] == 1): ?>
                    <tr>
                        <td><?= $index ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><img class="w-25" src="assets/img/<?= $product['image'] ?>" alt=""></td>
                        <td><?= epochTimeToDateTime($product['product_created_at']) ?></td>
                        <td><?= epochTimeToDateTime($product['product_updated_at']) ?></td>
                        <td><?= $product['cate_name']?></td>
                        <td><?= $product['detail']?></td>
                        <td><?= $product['product_status'] == 1 ? "Chưa xóa":"Đã xóa"?></td>
                        <td>
                            <a href="?act=list-product-detail&id=<?=$product['product_id']?>"><button>Xem chi tiết</button></a>
                            <a href="?act=update-product&id=<?=$product['product_id']?>"><button>Sửa</button></a>
                            <?php if($product['product_status'] ==1): ?>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="?act=delete-product&id=<?=$product['product_id']?>"><button>Xóa</button></a>
                            <?php else: ?>
                            <a href="?act=undo-delete-product&id=<?=$product['product_id']?>"><button>Bỏ xóa</button></a>
                            <?php endif ?>
                        </td>
                    </tr>
            <?php endif ?>
            <?php $index++; ?>
        <?php endforeach ?>
    </tbody>
</table>
