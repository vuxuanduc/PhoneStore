<?php
    require './views/admin/navAdmin.php' ;
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Thêm mới sản phẩm</th>
        </tr>
    </thead>
</table>
<form action="" method="post" onsubmit="return validateAddProduct();" enctype="multipart/form-data">
    <div class="form-group">
        <label for="" class=""><strong>ID sản phẩm</strong></label>
        <input type="text" name="" id="" class="form-control my-2" value="Auto number" readonly>
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Tên sản phẩm</strong></label><span id="nameProduct_err" style="color:red;"></span>
        <input type="text" name="name" id="nameProduct" class="form-control my-2">
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Ảnh sản phẩm</strong></label><span id="imageProduct_err" style="color:red;"></span>
        <input type="file" name="image[]" id="imageProduct" class="form-control my-2" accept="image/*" multiple>
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Giá sản phẩm</strong></label><span id="priceProduct_err" style="color:red;"></span>
        <input type="number" name="price" id="priceProduct" class="form-control my-2" min="1">
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Giảm giá</strong></label><span id="discountProduct_err" style="color:red;"></span>
        <input type="number" name="discount" id="discountProduct" class="form-control my-2" min="1">
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Mô tả</strong></label><span id="descriptionProduct_err" style="color:red;"></span>
        <input type="text" name="description" id="descriptionProduct" class="form-control my-2">
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Ngày nhập kho</strong></label><span id="dateProduct_err" style="color:red;"></span>
        <input type="date" name="date" id="dateProduct" class="form-control my-2">
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Trạng thái</strong></label>
        <select name="status" class="form-control my-2">
            <option value="Sẵn hàng">Sẵn hàng</option>
            <option value="Không sẵn hàng">Không sẵn hàng</option>
            <option value="Còn hàng">Còn hàng</option>
            <option value="Hết hàng">Hết hàng</option>
        </select>
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Loại hàng</strong></label>
        
        <select name="idsector" class="form-control my-2">
            <?php foreach($category as $key => $value) : ?>
                <option value="<?php echo $value -> idsectors ?>"><?php echo $value -> sectors ?></option>
            <?php endforeach ; ?>
        </select>
    </div>
    <tr>
        <button type="submit" class="btn products" name="add_product">Thêm mới</button>
        <a class="btn retype_product products">Nhập lại</a>
        <a href="?action=products" class="btn list_products products">Danh sách</a>
    </tr>
</form>
<script>
    const nameProduct = document.getElementById('nameProduct') ;   
    const imageProduct = document.getElementById('imageProduct') ;
    const priceProduct = document.getElementById('priceProduct') ;
    const discountProduct = document.getElementById('discountProduct') ;
    const descriptionProduct = document.getElementById('descriptionProduct') ;
    const dateProduct = document.getElementById('dateProduct') ;
    
    function validateAddProduct() {
        let check = true ;
        if(nameProduct.value.trim() == "" || imageProduct.value.trim() == "" || priceProduct.value.trim() == "" || 
         descriptionProduct.value.trim() == "" || dateProduct.value.trim() == "") {
            alert("Vui lòng điền đầy đủ thông tin sản phẩm") ;
            check = false ;
        }
        return check ;
    }

    const retype_product = document.querySelector('.retype_product') ;
    const input = document.querySelectorAll('input') ;
    retype_product.addEventListener('click' , () => {
        input.forEach(index => {
            index.value = "" ;
        })
    })
</script>
