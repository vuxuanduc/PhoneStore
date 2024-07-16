<?php
require './views/admin/navAdmin.php';
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Chỉnh sửa sản phẩm</th>
        </tr>
    </thead>
</table>
<form action="" method="post" onsubmit="" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" name="idproduct" value="<?php echo $productId -> idproduct ?>" id="" class="form-control my-2" value="Auto number" readonly>
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Tên sản phẩm</strong></label><span id="nameProduct_err" style="color:red;"></span>
        <input type="text" name="name" value="<?php echo $productId -> nameproduct ?>" id="nameProduct" class="form-control my-2">
    </div>
    <div class="form-group">
        <label for=""><strong>Ảnh sản phẩm cũ</strong></label> <br>
        <tr>
            <td>
                <?php foreach(explode(',' , $productId -> image) as $images => $image) : ?>
                    <img src="<?php echo $image ?>" alt="Lỗi tải ảnh" width="50px" height="auto">
                <?php endforeach ; ?>
            </td>
        </tr>
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Ảnh sản phẩm</strong></label><span id="imageProduct_err" style="color:red;"></span>
        <input type="file" name="image[]" id="imageProduct" class="form-control my-2" accept="image/*" multiple>
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Giá sản phẩm</strong></label><span id="priceProduct_err" style="color:red;"></span>
        <input type="number" value="<?php echo $productId -> price ?>" name="price" id="priceProduct" class="form-control my-2" min="1">
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Giảm giá</strong></label><span id="discountProduct_err" style="color:red;"></span>
        <input type="number" value="<?php echo $productId -> discount ?>" name="discount" id="discountProduct" class="form-control my-2" min="1">
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Mô tả</strong></label><span id="descriptionProduct_err" style="color:red;"></span>
        <input type="text" value="<?php echo $productId -> description ?>" name="description" id="descriptionProduct" class="form-control my-2">
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Ngày nhập kho</strong></label><span id="dateProduct_err" style="color:red;"></span>
        <input type="date" value="<?php echo $productId -> dateaddes ?>" name="date" id="dateProduct" class="form-control my-2">
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Trạng thái</strong></label>
        <select name="status" class="form-control my-2">
            <option value="Sẵn hàng" <?php echo $productId -> status == "Sẵn hàng" ? "selected" : "" ; ?>>Sẵn hàng</option>
            <option value="Không sẵn hàng" <?php echo $productId -> status == "Không sẵn hàng" ? "selected" : "" ; ?>>Không sẵn hàng</option>
            <option value="Còn hàng" <?php echo $productId -> status == "Còn hàng" ? "selected" : "" ; ?>>Còn hàng</option>
            <option value="Hết hàng" <?php echo $productId -> status == "Hết hàng" ? "selected" : "" ; ?>>Hết hàng</option>
        </select>
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Loại hàng</strong></label>
        
        <select name="idsector" class="form-control my-2">
            <?php foreach($category as $key => $value) : ?>
                <option <?php echo $value -> idsectors == $productId -> idsectors ? "selected" : "" ; ?> value="<?php echo $value -> idsectors ?>"><?php echo $value -> sectors ?></option>
            <?php endforeach ; ?>
        </select>
    </div>
    <tr>
        <button type="submit" class="btn products" name="update_product">Cập nhật</button>
        <a href="?action=updateProduct&&idUpdateProduct=<?php echo $productId -> idproduct ?>" class="btn retype_product products">Nhập lại</a>
        <a href="?action=products" class="btn add_products products">Danh sách</a>
    </tr>
</form>