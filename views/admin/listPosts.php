<?php
require './views/admin/navAdmin.php';

?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Quản lí bài viết</th>
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
                        <th>ID bài viết</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Mô tả ảnh</th>
                        <th>Nội dung bài viết</th>
                        <th>Số lượt xem</th>
                        <th>Sản phẩm liên quan</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($listPosts as $key => $value) : ?>
                        <tr>
                            <td><input type="checkbox" name="checkPost[]" id="checkPost" value="<?php echo $value -> idpost ?>"></td>
                            <td><?php echo $value -> idpost ?></td>
                            <td><?php echo $value -> title ?></td>
                            <td><img src="<?php echo $value -> image ?>" width="40px" height="40px" alt=""></td>
                            <td><?php echo $value -> illustration ?></td>
                            <td ><?php echo substr($value -> content , 0 , 50) .'...' ?></td>
                            <td><?php echo $value -> views ?></td>
                            <td>
                                <?php
                                    if($value -> idproduct != 0 && $value -> idproduct != "") {
                                        $nameProduct = getProductsId($value -> idproduct) -> nameproduct ;
                                        echo $nameProduct ;
                                    }else {
                                        echo "" ;
                                    }
                                ?>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="?action=updatePost&&idUpdatePost=<?php echo $value -> idpost ?>">Sửa</a>
                                <a class="btn btn-danger" href="?action=listPosts&&idDeletePost=<?php echo $value -> idpost ?>" onclick="return confirm('Bạn chắc chắn xóa chứ ?');">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tr>
                    <a class="btn open_checked_posts products">Chọn tất cả</a>
                    <a class="btn close_checked_posts products mx-2">Bỏ chọn tất cả</a>
                    <button type="submit" class="btn delete_posts products" name="delete_posts">Xóa mục đã chọn</button>
                    <a href="?action=addPost" class="btn add_post products mx-2">Thêm mới</a>
                </tr>
            </table>
        </div>
    </form>
</div>
<script>
    const open_checked_posts = document.querySelector('.open_checked_posts') ;
    const close_checked_posts = document.querySelector('.close_checked_posts') ;
    const checkPost = document.querySelectorAll('#checkPost') ;
    open_checked_posts.addEventListener('click' , () => {
        checkPost.forEach(index => {
            index.checked = true ;
        })
    })
    close_checked_posts.addEventListener('click' , () => {
        checkPost.forEach(index => {
            index.checked = false ;
        })
    })
</script>