<?php
    require './views/admin/navAdmin.php' ;
?>
<table class="table">
    <thead class="table-success">
        <tr>
            <th>Quản lí loại hàng</th>
        </tr>
    </thead>
</table>
<form action="" method="post">
    <table class="table">
        <thead class="table-success">
            <tr>
                <th>Chọn</th>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($category as $key => $value) : ?>
                <tr>
                    <td><input type="checkbox" value="<?php echo $value->idsectors ?>" name="check_sectors[]" id="checked_sectors"></td>
                    <td><?php echo $value->idsectors ?></td>
                    <td><?php echo $value->sectors ?></td>
                    <td>
                        <a href="?action=updateSector&&updateSector=<?php echo $value -> idsectors ?>" class="btn btn-primary edit">Sửa</a>
                        <a href="index.php?iddelete_sector=<?php echo $value -> idsectors ?>" onclick="return confirm('Bạn chắc chắc xóa chứ?')" class="btn btn-danger delete">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tr>
            <a class="btn open_checked_sectors sectors">Chọn tất cả</a>
            <a class="btn close_checked_sectors sectors mx-2">Bỏ chọn tất cả</a>
            <button type="submit" class="btn delete_sectors sectors" name="delete_sectors">Xóa mục đã chọn</button>
            <a href="?action=addSector" class="btn add_sectors sectors mx-2">Thêm mới</a>
        </tr>
    </table>
    
</form>
<script>
    const open_checked_sectors = document.querySelector('.open_checked_sectors');
    const close_checked_sectors = document.querySelector('.close_checked_sectors');
    const checked_sectors = document.querySelectorAll('#checked_sectors');
    open_checked_sectors.addEventListener('click', () => {
        checked_sectors.forEach(index => {
            index.checked = true;
        })
    });

    close_checked_sectors.addEventListener('click', () => {
        checked_sectors.forEach(index => {
            index.checked = false;
        })
    })
</script>