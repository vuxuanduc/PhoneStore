<?php
    require './views/admin/navAdmin.php' ;
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Chỉnh sửa loại hàng</th>
        </tr>
    </thead>
</table>
<form action="" method="post" onsubmit="return validateUpdateSector();">
    <div class="form-group">
        <label for="" class=""><strong>ID loại hàng</strong></label>
        <input type="text" name="idSector" class="form-control my-2" value="<?php echo $sectorId -> idsectors ?>" readonly>
    </div>
    <div class="form-group">
        <label for="" class=""><strong>ID loại hàng</strong></label> 
        <span style="color : red; " id="update_sector_err">
            
        </span>
        <input type="text" name="sector" id="" class="form-control my-2 input_sector" value="<?php echo $sectorId -> sectors ?>">
    </div>
    <tr>
        <button type="submit" class="btn sectors" name="update_sector">Cập nhật</button>
        <a class="btn retype_sector sectors">Nhập lại</a>
        <a href="?action=sectors" class="btn update_sectors sectors">Danh sách</a>
    </tr>
</form>
<script>
    const retype = document.querySelector('.retype_sector') ;
    const input_sector = document.querySelector('.input_sector') ;
    retype.addEventListener('click' , () => {
        input_sector.value = "" ;
    })
    const update_sector_err = document.querySelector('#update_sector_err') ;
    function validateUpdateSector() {
        let check = true ;
        if(input_sector.value == "") {
            update_sector_err.innerText = "Vui lòng nhập loại sản phẩm" ;
            check = false ;
        }else {
            update_sector_err.innerText = "" ;
        }
        return check ;
    }
</script>