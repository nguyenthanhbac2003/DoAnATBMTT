<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeStorage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <a href="#" class="logo">
            <ion-icon name="cloud-upload"></ion-icon>SafeStorage
        </a>
    </header>


    <section class="home">
        <div class="content">
            <h2>Chào mừng bạn đến với SafeStorage</h2>
            <p> Xin lỗi vì sự làm phiền này. Dự án đang bị tạm dừng do một số lý do riêng. Chúng tôi sẽ sớm quay lại . Tài khoản của bạn sẽ được lưu và bảo mật trong hệ thống của chúng tôi một cách an toàn.  </p>
            <a href="logout.php" class="btn btn-warning">Đăng Xuất</a>
        </div>
        <div class="note">
            <p> Nếu gặp lỗi hay khó khăn gì trong việc sử dụng hãy góp ý hoặc liên hệ cho tôi --> Email :nguyenthanhbac200903@gmail.com</p>
            <p>Facebook của tôi : <a href="https://www.facebook.com/bacgdj?mibextid=ZbWKwL" title="Nhà phát triển website " >Nguyễn Thành Bắc</a></p>
            
        </div>
            
            
        </div>
    </section>

    <script src = "script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    
</body>
</html>
