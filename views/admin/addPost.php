<?php
require './views/admin/navAdmin.php';
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Thêm mới bài viết</th>
        </tr>
    </thead>
</table>
<form action="" method="post" enctype="multipart/form-data" onsubmit="return validateAddPost();">
    <div class="form-group">
        <label style="font-weight: 500;" for=""><strong>Tiêu đề bài viết</strong></label>
        <input type="text" name="title" class="form-control my-2 title">
    </div>
    <div class="form-group">
        <label style="font-weight: 500;" for=""><strong>Ảnh</strong></label>
        <input type="file" name="image" accept="image/*" class="form-control my-2 image">
    </div>
    <div class="form-group">
        <label style="font-weight: 500;" for=""><strong>Mô tả hình ảnh</strong></label>
        <input type="text" name="illustration" class="form-control my-2 illustration">
    </div>
    <div class="form-group">
        <label style="font-weight: 500;" for=""><strong>Nội dung bài viết</strong></label>
        <textarea name="content" id="" class="form-control my-2 content"></textarea>
    </div>
    <div class="form-group">
        <label style="font-weight: 500;" for=""><strong>Sản phẩm liên quan</strong></label>
        <select name="idproduct" id="" class="form-control my-2">
            <option value="0">Không có</option>
            <?php foreach(getProducts() as $key => $value) : ?>
                <option value="<?php echo $value -> idproduct ?>"><?php echo $value -> nameproduct ?></option>
            <?php endforeach ; ?>
        </select>
    </div>
    <tr>
        <button type="submit" class="btn products" name="add_post">Thêm mới</button>
        <button type="reset" class="btn products">Nhập lại</button>
        <a href="?action=listPosts" class="btn list_posts products">Danh sách</a>
    </tr>
</form>

<script>
    const title = document.querySelector('.title') ;
    const image = document.querySelector('.image') ;
    const illustration = document.querySelector('.illustration') ;
    const content = document.querySelector('.content') ;
    function validateAddPost() {
        let check = true ;
        if(title.value.trim() == "" || image.value.trim() == "" || illustration.value.trim() == "" || content.value.trim() == "") {
            alert("Vui lòng nhập đầy đủ thông tin") ;
            check = false ;
        }
        return check ;
    }
</script>