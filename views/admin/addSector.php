<?php
    require './views/admin/navAdmin.php' ;
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Thêm mới loại hàng</th>
        </tr>
    </thead>
</table>
<form action="" method="post" onsubmit="return validateAddSector();">
    <div class="form-group">
        <label for="" class=""><strong>ID loại hàng</strong></label>
        
        <input type="text" name="" id="" class="form-control my-2" value="Auto number" readonly>
    </div>
    <div class="form-group">
        <label for="" class=""><strong>Tên loại hàng</strong></label>
        <span style="color : red; " id="add_sector_err">
            
        </span>
        <input type="text" name="sector" id="" class="form-control my-2 input_sector">
    </div>
    <tr>
        <button type="submit" class="btn sectors" name="add_sector">Thêm mới</button>
        <a class="btn retype_sector sectors">Nhập lại</a>
        <a href="?action=sectors" class="btn add_sectors sectors">Danh sách</a>
    </tr>
</form>

<script>
    const retype = document.querySelector('.retype_sector') ;
    const input_sector = document.querySelector('.input_sector') ;
    retype.addEventListener('click' , () => {
        input_sector.value = "" ;
    })

    const add_sector_err = document.querySelector('#add_sector_err') ;
    function validateAddSector() {
        let check = true ;
        if(input_sector.value == "") {
            add_sector_err.innerText = "Vui lòng nhập loại sản phẩm" ;
            check = false ;
        }else {
            add_sector_err.innerText = "" ;
        }
        return check ;
    }
</script>