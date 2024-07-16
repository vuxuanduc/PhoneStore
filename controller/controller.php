<?php
    require './backend/connect.php' ;
    // Kiểu người dùng ;
    function getRole() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `role`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
    //Đăng kí người dùng ;

    function signupUser($fullname , $phone , $email , $image , $username , $password , $idrole) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `user` (`fullname` , `phone` , `email` , `image` , `username` , `password` , `idrole`) VALUES('$fullname' , '$phone' , '$email' , '$image' , '$username' , '$password' , '$idrole')" ;
        $result = $conn -> query($sql) ;
    }
    
    // Lấy toàn bộ thông tin người dùng ;

    function getUser() {
        $conn = connectDB() ;
        $sql = "SELECT `user`.* , `role`.`role` FROM `user`
        INNER JOIN `role` ON `user`.`idrole` = `role`.`idrole`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy người dùng theo id ;
    function getIdUser($id) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `user` WHERE iduser = $id" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Xóa người dùng ;
    function deleteUser($id) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `user` WHERE iduser IN ($id)";
        $result = $conn -> query($sql) ;
        header("Location:?action=users") ;
    }

    // Đổi mật khẩu
    function changePassword($id , $password) {
        $conn = connectDB() ;
        $sql = "UPDATE `user` SET `password` = '$password' WHERE iduser = $id" ;
        $result = $conn -> query($sql) ;
        header("Location:index.php") ;
    }

    // Cập nhật tải khoản kèm ảnh ;
    function update_acc($id , $fullname , $phone , $email , $image , $username , $password) {
        $conn = connectDB() ;
        $sql = "UPDATE `user` SET `fullname` = '$fullname' , `phone` = '$phone' , `email` = '$email' , `image` = '$image' , `username` = '$username' , `password` = '$password' WHERE iduser = $id" ;
        $result = $conn -> query($sql) ;
        header("Location:index.php") ;
    }

    // Cập nhật tài khoản không ảnh ;
    function update_acc_noImage($id , $fullname , $phone , $email , $username , $password) {
        $conn = connectDB() ;
        $sql = "UPDATE `user` SET `fullname` = '$fullname' , `phone` = '$phone' , `email` = '$email' , `username` = '$username' , `password` = '$password' WHERE iduser = $id" ;
        $result = $conn -> query($sql) ;
        header("Location:index.php") ;
    }

    // Phần xử lí loại sản phẩm ;

    function createSector($sector) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `sectors` (`sectors`) VALUES('$sector')" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=sectors") ;
    }

    function getSectors() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `sectors`" ;
        $result = $conn -> query($sql) ->fetchAll() ;
        return $result ;
    }

    function getSectorId($id) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `sectors` WHERE idsectors = $id" ;
        $result = $conn -> query($sql) ->fetch() ;
        return $result ;
    }

    function updateSector($id , $sector) {
        $conn = connectDB() ;
        $sql = "UPDATE `sectors` SET `sectors` = '$sector' WHERE idsectors = $id" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=sectors") ;
    }

    // Xóa loại sản phẩm
    function delete_sectors($ids) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `sectors` WHERE idsectors IN ($ids)" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=sectors") ;
        exit();
    }

    // Xử lí hàng hóa ;
    function getProducts() {
        $conn = connectDB() ;
        $sql = "SELECT `product`.* , `sectors`.`sectors` FROM `product` INNER JOIN `sectors` ON `product`.`idsectors` = `sectors`.`idsectors`" ;
        $result = $conn -> query($sql) ->fetchAll() ;
        return $result ;
    }

    function getProductsSector($id) {
        $conn = connectDB() ;
        $sql = "SELECT `product`.* , `sectors`.`sectors` FROM `product` INNER JOIN `sectors` ON `product`.`idsectors` = `sectors`.`idsectors` WHERE `product`.`idsectors` = $id" ;
        $result = $conn -> query($sql) ->fetchAll() ;
        return $result ;
    }

    function getProductsId($id) {
        $conn = connectDB() ;
        $sql = "SELECT `product`.* , `sectors`.`sectors` FROM `product` INNER JOIN `sectors` ON `product`.`idsectors` = `sectors`.`idsectors` WHERE idproduct = $id" ;
        $result = $conn -> query($sql) ->fetch() ;
        return $result ;
    }

    function delete_products($ids) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `product` WHERE idproduct IN ($ids)" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=products") ;
        exit();
    }

    // Thêm sản phẩm ;
    function createProduct($name , $image , $price , $discount , $description , $date , $status , $idsectors) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `product` (`nameproduct` , `image` , `price` , `discount` , `description` , `dateaddes` , `status` , `idsectors`) VALUES('$name' , '$image' , '$price' , '$discount' , '$description' , '$date' , '$status' , '$idsectors')" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=products") ;
    }

    function updateProduct($id , $name , $image , $price , $discount , $description , $date , $status , $idsectors) {
        $conn = connectDB() ;
        $sql = "UPDATE `product` SET `nameproduct` = '$name' , `image` = '$image' , `price` = '$price' , `discount` = '$discount' , `description` = '$description' , `dateaddes` = '$date' , `status` = '$status' , `idsectors` = '$idsectors' WHERE idproduct = $id" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=products") ;
    }

    function updateProductNoImage($id , $name , $price , $discount , $description , $date , $status , $idsectors) {
        $conn = connectDB() ;
        $sql = "UPDATE `product` SET `nameproduct` = '$name' , `price` = '$price' , `discount` = '$discount' , `description` = '$description' , `dateaddes` = '$date' , `status` = '$status' , `idsectors` = '$idsectors' WHERE idproduct = $id" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=products") ;
    }

    // Update số lượt xem sản phẩm ;

    function views($id , $views) {
        $conn = connectDB() ;
        $sql = "UPDATE `product` SET `views` = '$views' WHERE idproduct = $id" ;
        $result = $conn -> query($sql) ;
    }

    // Top 10 sản phẩm có lượt xem nhiều nhất ;
    function topViews() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `product` ORDER BY `views` DESC LIMIT 10";
        $result = $conn -> query($sql) ;
        return $result ;
    }

    // Phần bình luận ;
    function getComment($id) {
        $conn = connectDB() ;
        $sql = "SELECT `comment`.* , `user`.`fullname` , `user`.`image` FROM `comment` INNER JOIN `user` ON `comment`.`iduser` = `user`.`iduser` WHERE idproduct = $id" ;
        $result = $conn -> query($sql) ;
        return $result ;
    }

    // Insert comment ;
    function insertComment($idproduct , $iduser , $content , $date) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `comment` (`content` , `commentdate` , `idproduct` , `iduser`) VALUES('$content' , '$date' , '$idproduct' , '$iduser')" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=productDetails&&idproduct=$idproduct") ;
        exit() ;
    }

    // Thống kê comment ;
    function statisticalComment() {
        $conn = connectDB() ;
        $sql = "SELECT `product`.`idproduct` , `product`.`nameproduct` , COUNT(`comment`.`idcomment`) AS `total_comment`,
            MAX(`comment`.`commentdate`) AS `new_comment`,
            MIN(`comment`.`commentdate`) AS `old_comment`
        FROM `product`
        LEFT JOIN `comment` ON `product`.`idproduct` = `comment`.`idproduct`
        GROUP BY `product`.`nameproduct`
        ORDER BY `total_comment` DESC" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ; 
    }
    

    // Xóa bình luận ;
    function deleteComment($id) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `comment` WHERE idcomment IN ($id)" ;
        $result = $conn -> query($sql) ;

    }

    // Chức năng tìm kiếm ;
    function search($key) {
        $conn = connectDB() ;
        $sql = "SELECT `product`.* , `sectors`.`sectors` FROM `product` LEFT JOIN `sectors` ON `product`.`idsectors` = `sectors`.`idsectors`
        WHERE
            `product`.`nameproduct` LIKE '%$key%' OR
            `product`.`description` LIKE '%$key%' OR
            `sectors`.`sectors` LIKE '%$key%'" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result;
        
    }

    // Phần thống kê ;
    function statistical() {
        $conn = connectDB() ;
        $sql = "SELECT `sectors`.`sectors` , COUNT(`product`.`idproduct`) AS `count_product`,
        (COUNT(`product`.`idproduct`) / (SELECT COUNT(*) FROM `product`)) * 100 AS `percentage`,
        MAX(`product`.`price`) AS `max_price`,
        MIN(`product`.`price`) AS `min_price`,
        AVG(`product`.`price`) AS `avg_price`
        FROM `sectors`
        LEFT JOIN `product` ON `sectors`.`idsectors` = `product`.`idsectors`
        GROUP BY `sectors`.`sectors`
        ORDER BY COUNT(`product`.`idproduct`) DESC" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Phần giỏ hàng ;
    function addToCart($name , $image , $quantity , $price , $color , $capacity , $totalamount , $idproduct , $iduser) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `cart` (`nameproduct` , `image` , `quantity` , `price` , `color` , `capacity` , `totalamount` , `idproduct` , `iduser`) VALUES('$name' , '$image' , '$quantity' , '$price' , '$color' , '$capacity' , '$totalamount' , '$idproduct' , '$iduser')" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=productDetails&&idproduct=$idproduct") ;
    }

    // Lấy số lượng sản phẩm bên trong giỏ hàng theo id người dùng ;
    function quantityProduct($id) {
        $conn = connectDB() ;
        $sql = "SELECT COUNT(*) AS `quantity` FROM `cart` WHERE iduser = $id" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    function getCart($id) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `cart` WHERE iduser = $id" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    function getCartIdCart($id) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `cart` WHERE idcart = $id" ;
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }

    // Xóa sản phẩm trong giỏ hàng ;
    function deleteProductCart($id) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `cart` WHERE idcart = $id" ;
        $result = $conn -> query($sql) ;
    }

    // Phần mua hàng ;
    function buyProduct($name , $address , $phone , $purchasedate , $nameproduct , $image , $price , $quantity , $totalamount , $idproduct , $iduser) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `shoppinglist` (`fullname` , `address` , `phone` , `purchasedate` , `nameproduct` , `image` , `price` , `quantity` , `totalamount` , `idproduct` , `iduser`) VALUES('$name' , '$address' , '$phone' , '$purchasedate' , '$nameproduct' , '$image' , '$price' , '$quantity' , '$totalamount' , '$idproduct' , '$iduser')" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=bought") ;
    }
    
    // Lấy danh sách đã mua hàng ;
    function listShopping() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `shoppinglist`" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
    // Lấy danh sách mua hàng theo iduser và idproduct ;

    function listShoppingId($iduser , $idproduct) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `shoppinglist` WHERE iduser = $iduser AND idproduct = $idproduct" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy danh sách đơn hàng theo iduser ;
    function listShoppingIdUser($iduser) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `shoppinglist` WHERE iduser = $iduser" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Xóa danh sách mua hàng theo id ;

    function deleteShopping($id) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `shoppinglist` WHERE uid IN ($id)" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=listshopping");
    }

    // Thêm mới bài viết ;
    function createPosst($title , $image , $illustration , $content , $idproduct) {
        $conn = connectDB() ;
        $sql = "INSERT INTO `posts` (`title` , `image` , `illustration` , `content` , `idproduct`) VALUES('$title' , '$image' , '$illustration' , '$content' , '$idproduct')" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=listPosts") ;
    }

    // Lấy danh sách bài viết ;
    function getPosts() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `posts` ";
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
    function getPostsTop10() {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `posts` ORDER BY `views` DESC LIMIT 10";
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }

    // Lấy bài viết theo id ;
    function getPostsId($id) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `posts` WHERE idpost = $id";
        $result = $conn -> query($sql) -> fetch() ;
        return $result ;
    }
    // Update số lượt xem của bài viết ;
    function updateViewsPost($id , $views) {
        $conn = connectDB() ;
        $sql = "UPDATE `posts` SET `views` = '$views' WHERE idpost = $id" ;
        $result = $conn -> query($sql) ;
    }

    //Xóa bài viết ;
    function deletePost($id) {
        $conn = connectDB() ;
        $sql = "DELETE FROM `posts` WHERE idpost IN ($id)" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=listPosts") ;
    }
     // Update bài viết ;
    function updatePost($id , $title , $image , $illustration , $content , $idproduct) {
        $conn = connectDB() ;
        $sql = "UPDATE `posts` SET `title` = '$title' , `image` = '$image' , `illustration` = '$illustration' , `content` = '$content' , `idproduct` = '$idproduct' WHERE idpost = $id" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=listPosts") ;
    }
    function updatePostNoImage($id , $title , $illustration , $content , $idproduct) {
        $conn = connectDB() ;
        $sql = "UPDATE `posts` SET `title` = '$title' , `illustration` = '$illustration' , `content` = '$content' , `idproduct` = '$idproduct' WHERE idpost = $id" ;
        $result = $conn -> query($sql) ;
        header("Location:?action=listPosts") ;
    }

    // Lấy danh sách sản phẩm tương tự ;
    function similarProduct($idproduct , $idsectors) {
        $conn = connectDB() ;
        $sql = "SELECT * FROM `product` WHERE idproduct <> $idproduct AND idsectors = $idsectors" ;
        $result = $conn -> query($sql) -> fetchAll() ;
        return $result ;
    }
?>