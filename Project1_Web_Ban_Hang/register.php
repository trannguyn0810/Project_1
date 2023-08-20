<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/all.css">

<div class="container">

    <h3 class="text-success">Đăng Ký Tài Khoản</h3>
    <form action="register_save.php" method="post">
        <div class="mb-3 mt-3">
            Họ Tên <input type="text" required class="form-control" name="customer_name">
        </div>
        <div class="mb-3 mt-3">
            Số Điện Thoại <input type="text" required class="form-control" name="phone">
        </div>
        <div class="mb-3 mt-3">
            Email <input type="text" required class="form-control" name="email">
        </div>
        <div class="mb-3 mt-3">
            Mật Khẩu <input type="text" required class="form-control" name="password">
        </div>
        <div class="mb-3 mt-3">
            Nhập Lại Mật Khẩu <input type="text" required class="form-control" name="re_password">
        </div>
        <div class="mb-3 mt-3">
            Địa chỉ <input type="text" required class="form-control" name="address">
        </div>
        <div class="mb-3 mt-3">
            Giới Tính <input type="text" required class="form-control" name="gender">
        </div>
        <button type="submit" class="btn btn-success float-end">Đăng Ký</button>
    </form>
</div>


