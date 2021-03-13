<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Garden Orange</title>
    <link rel="stylesheet" type="text/css" href="../css/style_admin.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <script src="https://kit.fontawesome.com/194e38739f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid" id="body">
        <header class="row header align-items-center">
            <div class="col-4">
                <img src="../img/logo/logo.png" alt="logo" class="header__logo-img" />
            </div>
            <div class="col-6 header__title">
                <h5>TRANG QUẢN LÝ BÁN HÀNG</h5>
            </div>
            <div class="col-2">
                <span class="header__btn-logout">
                    LOGOUT <i class="fas fa-sign-out-alt"></i>
                </span>
            </div>
        </header>
        <hr class="hr">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="row service__list">
                        <span id="revenue">QL DOANH THU</span>
                    </div>
                    <div class="row service__list">
                        <span id="order">QL ĐƠN HÀNG</span>
                    </div>
                    <div class="row service__list">
                        <span id="personnel">QL NHÂN VIÊN</span>
                    </div>
                    <div class="row service__list">
                        <span id="category">QL XUẤT XỨ</span>
                    </div>
                    <div class="row service__list">
                        <span id="product">QL SẢN PHẨM</span>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="row content" id="content"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/script-admin.js"></script>
    <script src="../bootstrap/jquery-3.5.1.min.js"></script>
    <script src="../bootstrap/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>