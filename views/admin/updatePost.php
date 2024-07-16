<?php
require './views/admin/navAdmin.php';

?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Chỉnh sửa bài viết</th>
        </tr>
    </thead>
</table>
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateAddPost();">
    <div class="form-group">
        <input type="hidden" name="idpost" value="<?php echo $getPostIdUpdate -> idpost ?>" class="form-control my-2 title">
    </div>
    <div class="form-group">
        <label style="font-weight: 500;" for=""><strong>Tiêu đề bài viết</strong></label>
        <input type="text" name="title" value="<?php echo $getPostIdUpdate -> title ?>" class="form-control my-2 title">
    </div>
    <div class="form-group">
        <label style="font-weight: 500;" for=""><strong>Ảnh cũ</strong></label>
        <input type="text" readonly name="oldimage"  value="<?php echo $getPostIdUpdate -> image ?>" class="form-control my-2 title">
    </div>
    <div class="form-group">
        <label style="font-weight: 500;" for=""><strong>Ảnh</strong></label>
        <input type="file" name="image" accept="image/*" class="form-control my-2 image">
    </div>
    <div class="form-group">
        <label style="font-weight: 500;" for=""><strong>Mô tả hình ảnh</strong></label>
        <input type="text" value="<?php echo $getPostIdUpdate -> illustration ?>" name="illustration" class="form-control my-2 illustration">
    </div>
    <div class="form-group">
        <label style="font-weight: 500;" for=""><strong>Nội dung bài viết</strong></label>
        <input name="content" value="<?php echo $getPostIdUpdate -> content ?>" id="" class="form-control my-2 content"></input>
    </div>
    <div class="form-group">
        <label style="font-weight: 500;" for=""><strong>Sản phẩm liên quan</strong></label>
        <select name="idproduct" id="" class="form-control my-2">
            <option value="0">Không có</option>
            <?php foreach(getProducts() as $key => $value) : ?>
                <option <?php echo $value -> idproduct == $getPostIdUpdate -> idproduct ? "selected" : "" ; ?> value="<?php echo $value -> idproduct ?>"><?php echo $value -> nameproduct ?></option>
            <?php endforeach ; ?>
        </select>
    </div>
    <tr>
        <button type="submit" class="btn products" name="update_post">Cập nhật</button>
        <button type="reset" class="btn products">Nhập lại</button>
        <a href="?action=listPosts" class="btn list_posts products">Danh sách</a>
    </tr>
</form>