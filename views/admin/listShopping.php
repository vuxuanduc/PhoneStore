<?php
require './views/admin/navAdmin.php';
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Quản lí danh sách mua hàng</th>
        </tr>
    </thead>
</table>
<form action="" method="post">
    <div class="table-responsive">
        <div class="table-responsive">
            <table class="table">
                <thead class="table-success">
                    <tr>
                        <th>Chọn</th>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Ngày mua</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($shoppingList as $key => $value) : ?>
                        <tr>
                            <td><input type="checkbox" name="checkList[]" id="checkList" value="<?php echo $value -> uid ?>"></td>
                            <td><?php echo $value -> uid ?></td>
                            <td><?php echo $value -> fullname ?></td>
                            <td><?php echo $value -> address ?></td>
                            <td><?php echo $value -> phone ?></td>
                            <td><?php echo $value -> purchasedate ?></td>
                            <td><?php echo $value -> nameproduct ?></td>
                            <td><?php echo number_format($value -> price) ?></td>
                            <td><?php echo $value -> quantity ?></td>
                            <td><?php echo number_format($value -> totalamount) ?></td>
                            <td>
                                <a class="btn btn-danger" href="?action=listshopping&&uidDelete=<?php  echo $value -> uid ?>" onclick="return confirm('Bạn chắc chắn xóa chứ ?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <a class="btn open_checked_shopping sectors">Chọn tất cả</a>
                    <a class="btn close_checked_shopping sectors mx-2">Bỏ chọn tất cả</a>
                    <button type="submit" class="btn delete_shopping sectors" name="delete_shopping">Xóa mục đã chọn</button>
                </tr>
            </table>
        </div>
    </div>
</form>
<script>
    const checkList = document.querySelectorAll('#checkList') ;
    const openCheck = document.querySelector('.open_checked_shopping') ;
    const closeCheck = document.querySelector('.close_checked_shopping') ;

    openCheck.addEventListener('click' , () => {
        checkList.forEach(index => {
            index.checked = true ;
        })
    }) ;
    closeCheck.addEventListener('click' , () => {
        checkList.forEach(index => {
            index.checked = false ;
        })
    })
</script>
    
