<?php
require './views/admin/navAdmin.php';
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Quản lí khách hàng</th>
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
                        <th>Mã KH</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Hình ảnh</th>
                        <th>Vai trò</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $key => $value) : ?>
                        <tr>
                            <td><input type="checkbox" name="checkUser[]" id="checkedUser" value="<?php echo $value -> iduser ?>"></td>
                            <td><?php echo $value -> iduser ?></td>                        
                            <td><?php echo $value -> fullname ?></td>
                            <td><?php echo $value -> email ?></td>
                            <td><?php echo $value -> phone ?></td>
                            <td><img src="<?php  echo $value -> image ?>" width="50px" height="50px" alt="Lỗi tải ảnh"></td>
                            <td><?php echo $value -> role ?></td>
                            <td>
                                <a href="?action=updateAcount&&idupdateAcount=<?php echo $value -> iduser ?>" class="btn btn-primary">Sửa</a>
                                <?php
                                    if($value -> iduser == $_SESSION['iduser']) {                              
                                    }else {
                                ?>
                                    <a href="?action=users&&iddeleteUser=<?php echo $value -> iduser ?>" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn xóa chứ ?');">Xóa</a>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <a class="btn open_checked_users products">Chọn tất cả</a>
                    <a class="btn close_checked_users products mx-2">Bỏ chọn tất cả</a>
                    <button type="submit" class="btn btn_delete_users products" name="btn_delete_users">Xóa mục đã chọn</button>
                    <a href="?action=createUser" class="btn add_user products mx-2">Thêm mới</a>
                </tr>
            </table>
        </div>
    </form>
</div>
<script>
    const open_check_users = document.querySelector('.open_checked_users') ;
    const close_check_users = document.querySelector('.close_checked_users') ;
    const checkedUsers = document.querySelectorAll('#checkedUser') ;
    
    open_check_users.addEventListener('click' , () => {
        checkedUsers.forEach(index => {
            index.checked = true ;
        })
    })
    
    close_check_users.addEventListener('click' , () => {
        checkedUsers.forEach(index => {
            index.checked = false ;
        })
    })
</script>
