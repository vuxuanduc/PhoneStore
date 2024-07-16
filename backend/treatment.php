<?php
    session_start() ;
    require './controller/controller.php' ;

    // Phần đăng kí ;

    $users = getUser();
    // Kiểm tra dữ liêu trước khi đăng kí ;

    if(isset($_POST['btnSignup'])) {
        $error = [] ;
        foreach($users as $key => $value) {
            if($value -> phone == $_POST['phone_signup']) {
                $error['phone_signup'] = "SĐT đã tồn tại" ;
            }
            if($value -> email == $_POST['email_signup']) {
                $error['email_signup'] = "Email đã tồn tại" ;
            }
            if($value -> username == $_POST['username_signup']) {
                $error['username_signup'] = "Tên đăng nhập đã tồn tại" ;
            }
        }

        if(empty($error)) {
            $image_user = './image_user/' .basename($_FILES['image_signup']['name']) ;
            $file = $_FILES['image_signup']['tmp_name'] ;
            $err = $_FILES['image_signup']['error'] ;

            if($err == 0 && move_uploaded_file($file , $image_user)) {
                signupUser($_POST['fullname_signup'] , $_POST['phone_signup'] , $_POST['email_signup'] , $image_user , $_POST['username_signup'] , $_POST['password_signup'] , $_POST['idrole']) ;
                header("Location:index.php") ;
                exit() ;
            }
        } 
    }
    // Phần login , khi đăng nhập thành công sẽ lấy id của người dùng đấy ra ;
    
    $iduser = null;

if (isset($_POST['btnLogin'])) {
    $error_login = [] ;
    foreach ($users as $key => $value) {
        if($value -> username != $_POST['username_login']) {
            $error_login['username_login'] = "Tên đăng nhập không đúng" ;
        }
        if($value -> password != $_POST['password_login']) {
            $error_login['password_login'] = "Mật khẩu không đúng" ;
        }
        if ($_POST['username_login'] == $value->username && $_POST['password_login'] == $value->password) {
            $_SESSION['login'] = true;
            $_SESSION['iduser'] = $value->iduser; // Lưu iduser vào phiên
            $iduser = $value->iduser;
            header("Location:index.php") ;
            exit() ;
        }
    }
    
}

// Kiểm lỗi phần quên mật khẩu ;
if(isset($_POST['btnForgot'])) {
    $error_forgot = [] ;
    foreach($users as $key => $value) {
        if($_POST['email_forgot'] != $value -> email) {
            $error_forgot['email_forgot'] = "Email không tồn tại" ;
        }
        if($_POST['username_forgot'] != $value -> username) {
            $error_forgot['username_forgot'] = "Tên đăng nhập không tồn tại" ;
        }
        if($_POST['email_forgot'] == $value -> email && $_POST['username_forgot'] == $value -> username) {
            $_SESSION['forgot_password'] = true ;
            $_SESSION['id_forgot_user'] = $value -> iduser ;
            header("Location:index.php") ;
            exit() ;
        }
    }
}

// Đổi mật khẩu trên form quên mật khẩu ;
if(isset($_POST['btnForgot_update'])) {
    changePassword($_SESSION['id_forgot_user'] , $_POST['update_password']) ;
}

// Kiểm tra trạng thái đăng nhập
if (isset($_SESSION['login'])) {
    $userID = getIdUser($_SESSION['iduser']); 
    // Lấy iduser từ phiên
    // Sử dụng $userID để lấy thông tin khách hàng theo id
}
    // Lấy loại sản phẩm ;
    $category = getSectors() ;
    // Lấy sản phẩm ;
    $products = getProducts() ;
    // Top 10 sản phẩm có lượt xem nhiều nhất ;
    $topViews = topViews() ;
    // Danh sách đã mua hàng ;
    $shoppingList = listShopping() ;
    // Lấy sản phẩm theo id loại hàng ;
    if(isset($_GET['sector'])) {
        $categoryId = getSectorId($_GET['sector']) ;
    }
    // Lấy danh sách bài viết ;
    $listPosts = getPosts() ;
    $listPostsTop10 = getPostsTop10() ;

    // Lấy bài viết theo id ;
    if(isset($_GET['idpost'])) {
        $postId = getPostsId($_GET['idpost']) ;
        $postId -> views = $postId -> views + 1 ;
        updateViewsPost($_GET['idpost'] , $postId -> views) ;
    }

    if(isset($_POST['btn-search'])) {
        $key = $_POST['keyword'] ;
        header("Location:?action=searchProduct&&keyword=$key") ;
    }
    
    // Xuất sản phẩm theo id ;
    if(isset($_GET['idproduct'])) {

        // Lấy thông tin sản phẩm ;
        $productId = getProductsId($_GET['idproduct']) ;

        // Tăng lượt xem sản phẩm ;
        $productId -> views = $productId -> views + 1 ;
        views($_GET['idproduct'] , $productId -> views) ;

        // Lấy bình luận theo id sản phẩm ;
        $comment = getComment($_GET['idproduct']) ;
        
    }

    if(isset($_SESSION['login'])) {
        // Đổi mật khẩu khi đã đăng nhập ;
        if(isset($_POST['btn_change_password'])) {
            $error_change = [] ;
            if($_POST['old_password'] != $userID -> password ) {
                $error_change['old_password'] = "Mật khẩu cũ không đúng" ;
            }
            if(empty($error_change)) {
                changePassword($_POST['iduser'] , $_POST['new_password']) ;
            }
        }

        // Cập nhật tài khoản ;
        if(isset($_POST['btn_update_acc'])) {
            $error_update_acc = [] ;
            foreach($users as $key => $value) {
                if($_POST['phone'] == $value -> phone && $_POST['phone'] != $userID -> phone) {
                    $error_update_acc['phone_err'] = "Số điện thoại đã tồn tại" ;
                }
                if($_POST['email'] == $value -> email && $_POST['email'] != $userID -> email) {
                    $error_update_acc['email_err'] = "Email đã tồn tại" ;
                }
                if($_POST['username'] == $value -> username && $_POST['username'] != $userID -> username) {
                    $error_update_acc['username_err'] = "Tên đăng nhập đã tồn tại" ;
                }
            }
            if(empty($error_update_acc)) {
                $image = './image_user/' .basename($_FILES['image']['name']) ;
                $file = $_FILES['image']['tmp_name'] ;
                $err = $_FILES['image']['error'] ;
                if($err == 0 && move_uploaded_file($file , $image)) {
                    if(isset($userID -> image) && $userID -> image != $image) {
                        unlink($userID -> image) ;
                    }
                    update_acc($_POST['iduser'] , $_POST['fullname'] , $_POST['phone'] , $_POST['email'] , $image , $_POST['username'] , $_POST['password']) ;
                }else {
                    update_acc_noImage($_POST['iduser'] , $_POST['fullname'] , $_POST['phone'] , $_POST['email'] , $_POST['username'] , $_POST['password']) ;
                }
            }
            
        }

        

        // Xử lí loại sản phẩm ;

        if(isset($_POST['delete_sectors']) && isset($_POST['check_sectors'])) {
            $deleteSectorsIds = $_POST['check_sectors'] ;
            if(!empty($deleteSectorsIds)) {
                $deleteSectorsIds = implode(',' , $deleteSectorsIds) ;
                delete_sectors($deleteSectorsIds) ;
            }
        }
        if(isset($_GET['iddelete_sector'])) {
            delete_sectors($_GET['iddelete_sector']) ;
        }
    
        // Thêm mới loại hàng ;
        if(isset($_POST['add_sector'])) {
            createSector($_POST['sector']) ;
        }
    
        // Lấy loại hàng theo id ;
        if(isset($_GET['updateSector'])) {
            $sectorId = getSectorId($_GET['updateSector']) ;
        }
        // Update loại hàng
        if(isset($_POST['update_sector'])) {
            updateSector($_POST['idSector'] , $_POST['sector']) ;
        }

        // Xử lí hàng hóa ;
        if(isset($_POST['delete_products']) && isset($_POST['checkProduct'])) {
            $deleteProductsIds = $_POST['checkProduct'] ;
            if(!empty($deleteProductsIds)) {
                $deleteProductsIds = implode(',' , $deleteProductsIds) ;
                delete_products($deleteProductsIds) ;
            }
        }

        if(isset($_GET['iddelete_product'])) {
            delete_products($_GET['iddelete_product']) ;
        }

        // Thêm mới sản phẩm

        if(isset($_POST['add_product'])) {
            foreach($_FILES['image']['tmp_name'] as $key => $value) {
                $image = './image_product/' . basename($_FILES['image']['name'][$key]) ; 
                $file = $_FILES['image']['tmp_name'][$key];
                $err = $_FILES['image']['error'][$key] ;
                if($err == 0 && move_uploaded_file($file , $image)) {
                    $uploadImage[] = $image ;
                }
            }
            if(!empty($uploadImage)) {
                $imagePaths = implode(',' , $uploadImage) ;
                createProduct($_POST['name'] , $imagePaths , $_POST['price'] , $_POST['discount'] , $_POST['description'] , $_POST['date'] , $_POST['status'] , $_POST['idsector']) ;
            }
        }
        // Lấy sản phẩm theo id ;
        if(isset($_GET['idUpdateProduct'])) {
            $productId = getProductsId($_GET['idUpdateProduct']) ;
        }

        if(isset($_POST['update_product'])) {
            if(isset($_FILES['image']) && !empty($_FILES['image']['name']['0'])) {
                foreach($_FILES['image']['tmp_name'] as $key => $value) {
                    $image = './image_product/' . basename($_FILES['image']['name'][$key]) ; 
                    $file = $_FILES['image']['tmp_name'][$key];
                    $err = $_FILES['image']['error'][$key] ;
                    if($err == 0 && move_uploaded_file($file , $image)) {
                        $uploadImage[] = $image ;
                    }
                }
                
                if(!empty($uploadImage)) {
                    $imagePaths = implode(',' , $uploadImage) ;
                    updateProduct($_POST['idproduct'] , $_POST['name'] , $imagePaths , $_POST['price'] , $_POST['discount'] , $_POST['description'] , $_POST['date'] , $_POST['status'] , $_POST['idsector']) ;
                    foreach(explode(',' , $productId->image) as $imageOld) {
                        $isUsed = false;
                        foreach($uploadImage as $newImage) {
                            if($imageOld === $newImage) {
                                $isUsed = true;
                                break;
                            }
                        }
                        
                        // Nếu ảnh cũ không còn được sử dụng, thì xóa nó
                        if(!$isUsed && isset($imageOld)) {
                            unlink($imageOld);
                        }
                    }
                
                }
            }else {
                updateProductNoImage($_POST['idproduct'] , $_POST['name'] , $_POST['price'] , $_POST['discount'] , $_POST['description'] , $_POST['date'] , $_POST['status'] , $_POST['idsector']) ;
            }
        }

        // Chức năng bình luận ;
        if(isset($_POST['btnComment'])) {
            $date = date("Y/m/d") ;
            insertComment($_POST['idproduct'] , $_POST['iduser'] , $_POST['content'] , $date) ;
        }
        // Quản lí bình luận ;
        $statisticalComment = statisticalComment() ;

        // Xóa nhiều bình luận ;
        if(isset($_POST['btn_delete_comments'])) {
            if(isset($_POST['checkComment']) && $_POST['checkComment'] != "")  {
                $listComments = implode(',' , $_POST['checkComment']) ;
                deleteComment($listComments) ;
            }
        }

        // Xử lí người dùng trong admin ;

        // Xóa người dùng ;
        if(isset($_POST['btn_delete_users'])) {
            if(isset($_POST['checkUser']) && $_POST['checkUser'] != "") {
                $listUsers = implode(',' , $_POST['checkUser']) ;
                deleteUser($listUsers) ;
            }
        }
        if(isset($_GET['iddeleteUser'])) {
            if(isset(getIdUser($_GET['iddeleteUser']) -> image)) {
                unlink(getIdUser($_GET['iddeleteUser']) -> image) ;
                deleteUser($_GET['iddeleteUser']) ;
            }
        }


        // Thêm mới người dùng ;
        if(isset($_POST['add_user'])) {
            $error = [] ;
            foreach($users as $key => $value) {
                if($value -> phone == $_POST['phone_signup']) {
                    $error['phone_signup'] = "SĐT đã tồn tại" ;
                }
                if($value -> email == $_POST['email_signup']) {
                    $error['email_signup'] = "Email đã tồn tại" ;
                }
                if($value -> username == $_POST['username_signup']) {
                    $error['username_signup'] = "Tên đăng nhập đã tồn tại" ;
                }
            }
    
            if(empty($error)) {
                $image_user = './image_user/' .basename($_FILES['image_signup']['name']) ;
                $file = $_FILES['image_signup']['tmp_name'] ;
                $err = $_FILES['image_signup']['error'] ;
    
                if($err == 0 && move_uploaded_file($file , $image_user)) {
                    signupUser($_POST['fullname_signup'] , $_POST['phone_signup'] , $_POST['email_signup'] , $image_user , $_POST['username_signup'] , $_POST['password_signup'] , $_POST['idrole']) ;
                    header("Location:?action=users") ;
                    exit() ;
                }
            } 
        }
        if(isset($_GET['idupdateAcount'])) {
            $userAcount = getIdUser($_GET['idupdateAcount']) ;
        }
        // Chỉnh sửa người dùng trong admin ;
        if(isset($_POST['btn_update_acount'])) {
            $error_update_acc = [] ;
            foreach($users as $key => $value) {
                if($_POST['phone'] == $value -> phone && $_POST['phone'] != $userAcount -> phone) {
                    $error_update_acc['phone_err'] = "Số điện thoại đã tồn tại" ;
                }
                if($_POST['email'] == $value -> email && $_POST['email'] != $userAcount -> email) {
                    $error_update_acc['email_err'] = "Email đã tồn tại" ;
                }
                if($_POST['username'] == $value -> username && $_POST['username'] != $userAcount -> username) {
                    $error_update_acc['username_err'] = "Tên đăng nhập đã tồn tại" ;
                }
            }
            if(empty($error_update_acc)) {
                $image = './image_user/' .basename($_FILES['image']['name']) ;
                $file = $_FILES['image']['tmp_name'] ;
                $err = $_FILES['image']['error'] ;
                if($err == 0 && move_uploaded_file($file , $image)) {
                    if(isset($userAcount -> image) && $userAcount -> image != $image) {
                        unlink($userID -> image) ;
                    }
                    update_acc($_POST['iduser'] , $_POST['fullname'] , $_POST['phone'] , $_POST['email'] , $image , $_POST['username'] , $_POST['password']) ;
                    header("Location:?action=users") ;
                }else {
                    update_acc_noImage($_POST['iduser'] , $_POST['fullname'] , $_POST['phone'] , $_POST['email'] , $_POST['username'] , $_POST['password']) ;
                    header("Location:?action=users") ;
                }
            }
        }

        // Phần thống kê ;
        $statistical = statistical();

        // Phần giỏ hàng ;
        if(isset($_POST['add-to-cart'])) {
            addToCart($_POST['name'] , $_POST['image'] , $_POST['quantity'] , $_POST['price'] , $_POST['color'] , $_POST['capacity'] , $_POST['price'] * $_POST['quantity'] , $_POST['idproduct'] , $_SESSION['iduser']) ;
        }

        // Lấy số lượng sản phẩm trong giỏ hàng ;
        $quantityProductInCart = quantityProduct($_SESSION['iduser']) ;
        $getCart = getCart($_SESSION['iduser']) ;
        // Xóa sản phẩm trong giỏ hàng ;
        if(isset($_GET['idDeleteCart'])) {
            deleteProductCart($_GET['idDeleteCart']) ;
        }

        // Phần mua hàng ở trang chi tiết sản phẩm ;
        if(isset($_POST['btn-buy-product'])) {
            $date = date('Y/m/d') ;
            if(empty($_POST['address'])) {
                echo "<script>alert('Bạn chưa nhập địa chỉ.');</script>";
            }else {
                buyProduct($_POST['fullname'] , $_POST['address'] , $_POST['phone'] , $date , $_POST['name'] , $_POST['image'] , $_POST['price'] , $_POST['quantity'] , $_POST['price'] * $_POST['quantity'] , $_POST['idproduct'] , $_SESSION['iduser']) ;
            }
        }

        // Phần mua hàng ở trang giỏ hàng ;
        if(isset($_POST['btn-buy-in-cart'])) {
            $productIdCart = getCartIdCart($_POST['idCart']) ;
            $idCart = $productIdCart -> idcart ;
            $fullname = getIdUser($_SESSION['iduser']) -> fullname ;
            $phone = getIdUser($_SESSION['iduser']) -> phone ;
            $address = $_POST['address'] ;
            $purchasedate = date('Y/m/d') ;
            $nameproduct = $productIdCart -> nameproduct ;
            $image = $productIdCart -> image ;
            $price = $productIdCart -> price ;
            $quantity = $productIdCart -> quantity ;
            $totalamount = $productIdCart -> totalamount ;
            $idproduct = $productIdCart -> idproduct ;
            $iduser = $_SESSION['iduser'] ;
            buyProduct($fullname , $address , $phone , $purchasedate , $nameproduct , $image , $price , $quantity , $totalamount , $idproduct , $iduser) ;
            deleteProductCart($idCart) ;
        }

        // Xóa danh sách mua hàng theo id ;
        if(isset($_GET['uidDelete'])) {
            deleteShopping($_GET['uidDelete']) ;
        }
        // Xóa nhiều ;
        if(isset($_POST['delete_shopping'])) {
            $listDeleteShopping = implode(',' , $_POST['checkList']) ;
            deleteShopping($listDeleteShopping) ;
        }

        // Thêm mới bài viết ;
        if(isset($_POST['add_post'])) {
            $image = './image_posts/' . basename($_FILES['image']['name']) ;
            $file = $_FILES['image']['tmp_name'] ;
            $error = $_FILES['image']['error'] ;
            if(empty($error) && move_uploaded_file($file , $image)) {
                createPosst($_POST['title'] , $image , $_POST['illustration'] , $_POST['content'] , $_POST['idproduct']) ;
            }
        }
        // Xóa một bài viết ;
        if(isset($_GET['idDeletePost'])) {
            deletePost($_GET['idDeletePost']) ;
        }
        // Xóa một hoặc nhiều bài viết ;
        if(isset($_POST['delete_posts'])) {
            $listDeletePosts = implode(',' , $_POST['checkPost']) ;
            deletePost($listDeletePosts) ;
        }
        // Update bài viết ;
        if(isset($_GET['idUpdatePost'])) {
            $getPostIdUpdate = getPostsId($_GET['idUpdatePost']) ;
        }
        if(isset($_POST['update_post'])) {
            $image = './image_posts/' . basename($_FILES['image']['name']) ;
            $file = $_FILES['image']['tmp_name'] ;
            $err = $_FILES['image']['error'] ;
            if(empty($err) && move_uploaded_file($file , $image)) {
                $oldImagePost = getPostsId('idpost') -> image ;
                if(isset($oldImagePost) && $oldImagePost != $image) {
                    unlink($oldImagePost) ;
                }
                updatePost($_POST['idpost'] , $_POST['title'] , $image , $_POST['illustration'] , $_POST['content'] , $_POST['idproduct']) ;
            }else {
                updatePostNoImage($_POST['idpost'] , $_POST['title'] , $_POST['illustration'] , $_POST['content'] , $_POST['idproduct']) ;
            }
        }
    }
    if(!isset($_SESSION['login'])) {
        if(isset($_POST['update_sector']) || isset($_POST['add_sector'])) {
            require './views/home.php' ;
        }
    }
?>