<style>
    .card-name {
        text-align: justify;
    }
</style>

<?php
require './views/admin/navAdmin.php';
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Quản lí sản phẩm</th>
        </tr>
    </thead>
</table>
<div class="table-responsive">
    <form action="" method="post">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-success">
                    <tr>
                        <th>Chọn</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Giảm giá</th>
                        <th>Mô tả</th>
                        <th>Ngày nhập</th>
                        <th>Trạng thái</th>
                        <th>Tên loại hàng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($products as $key => $value) : ?>
                        <tr>
                            <td><input type="checkbox" value="<?php echo $value->idproduct ?>" name="checkProduct[]" id="checked_product"></td>
                            <td><?php echo $value->idproduct ?></td>
                            <td class="card-name"><?php echo $value->nameproduct ?></td>
                            <td>
                                <?php
                                $listImage = explode(',', $value->image);
                                foreach ($listImage as $images => $image) :
                                ?>
                                    <img src="<?php echo $image ?>" alt="Lỗi tải ảnh" width="50px" height="auto">
                                <?php endforeach; ?>
                            </td>
                            <td><?php echo $value->price ?></td>
                            <td><?php echo $value->discount ?></td>
                            <td class="card-description"><?php echo substr($value->description , 0 , 50) .'...' ?></td>
                            <td><?php echo $value->dateaddes ?></td>
                            <td><?php echo $value->status ?></td>
                            <td><?php echo $value->sectors ?></td>
                            <td>
                                <a href="?action=updateProduct&&idUpdateProduct=<?php echo $value->idproduct ?>" class="btn btn-primary edit">Sửa</a>
                                <a href="?action=products&&iddelete_product=<?php echo $value->idproduct ?>" onclick="return confirm('Bạn chắc chắc xóa chứ?')" class="btn btn-danger delete">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <a class="btn open_checked_products products">Chọn tất cả</a>
                    <a class="btn close_checked_products products mx-2">Bỏ chọn tất cả</a>
                    <button type="submit" class="btn delete_products products" name="delete_products">Xóa mục đã chọn</button>
                    <a href="?action=addProduct" class="btn add_product products mx-2">Thêm mới</a>
                </tr>
            </table>
        </div>
    </form>
</div>
<script>
    const open_checked_products = document.querySelector('.open_checked_products');
    const close_checked_products = document.querySelector('.close_checked_products');
    const checked_product = document.querySelectorAll('#checked_product');
    open_checked_products.addEventListener('click', () => {
        checked_product.forEach(index => {
            index.checked = true;
        })
    });

    close_checked_products.addEventListener('click', () => {
        checked_product.forEach(index => {
            index.checked = false;
        })
    })
</script>