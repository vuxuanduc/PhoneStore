<?php
require './views/admin/navAdmin.php';
$idproduct = $_GET['idproduct'] ;
if(isset($_GET['iddeleteComment'])) {
    deleteComment($_GET['iddeleteComment']) ;
}
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Chi tiết bình luận</th>
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
                        <th>Nội dung bình luận</th>
                        <th>Ngày bình luận</th>
                        <th>Tên người dùng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach (getComment($idproduct) as $key => $value) : ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="checkComment[]" value="<?php echo $value -> idcomment ?>" id="checkComment">
                            </td>
                            <td><?php echo $value -> content ?></td>
                            <td><?php echo $value -> commentdate ?></td>
                            <td><?php echo $value -> fullname ?></td>
                            <td>
                                <a href="?action=detailsComment&&iddeleteComment=<?php echo $value -> idcomment ?>&&idproduct=<?php echo $idproduct ?>" onclick="return confirm('Bạn chắc chắn xóa chứ ?')" class="btn btn-danger delete">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <a class="btn open_checked_comments products">Chọn tất cả</a>
                    <a class="btn close_checked_comments products mx-2">Bỏ chọn tất cả</a>
                    <button type="submit" class="btn delete_comments products" name="btn_delete_comments">Xóa mục đã chọn</button>
                </tr>
            </table>
        </div>
    </form>
</div>

<script>
    const open_check_comments = document.querySelector('.open_checked_comments') ;
    const close_check_comments = document.querySelector('.close_checked_comments') ;
    const checkComments = document.querySelectorAll('#checkComment') ;

    open_check_comments.addEventListener('click' , () => {
        checkComments.forEach(index => {
            index.checked = true ;
        })
    })

    close_check_comments.addEventListener('click' , () => {
        checkComments.forEach(index => {
            index.checked = false ;
        })
    })
</script>