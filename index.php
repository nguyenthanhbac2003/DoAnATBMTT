<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: thanhcong.php");
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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<body>
    <header class="header">
        <a href="#" class="logo">
            <ion-icon name="cloud-upload"></ion-icon>SafeStorage</a>
        <nav class="navbar">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Menu</a>
            <a href="#">Contact</a>
            <a href="#">Reviews</a>
            <button class="btnLogin-popup">Đăng Nhập</button>
        </nav>
        
    </header>

    <section class="home">
        <div class="content">
            <h2>Truy cập dễ dàng và an toàn vào nội dung của bạn</h2>
            <p> Lưu trữ, chia sẻ và cộng tác trên các tệp và thư mục từ thiết bị di động, máy tính bảng hoặc máy tính của bạn.</p>
            <a href="#" >Đăng Ký Miễn Phí</a>
           
        </div>
        <div class="note">
            <p> Nếu gặp lỗi hay khó khăn gì trong việc sử dụng hãy góp ý hoặc liên hệ cho tôi --> Email :nguyenthanhbac200903@gmail.com</p>
            <p>Facebook của tôi : <a href="https://www.facebook.com/bacgdj?mibextid=ZbWKwL" title="Nhà phát triển website ">Nguyễn Thành Bắc</a></p>
            
        </div>
          
    </section>
    
    

    <section class="section">
        <div class="wrapper">
            <span class="icon-close">
                <i class='bx bx-x'></i>
            </span>
            <div class="logreg-box">
                <!-- Login form -->
                <div class="form-box login">
                    <div class="logreg-title">
                        <h2>Đăng nhập</h2>
                        <p>Vui lòng đăng nhập để sử dụng nền tảng</p>
                    </div>

                    <?php
                    if (isset($_POST["login"])) {
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        require_once "database.php";
                        $sql ="SELECT * FROM users WHERE email ='$email'";
                        $result = mysqli_query($conn,$sql);
                        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        if ($user) {
                            if (password_verify($password, $user["password"])) {
                                session_start();
                                $_SESSION["user"] = "yes";
                                header("Location: thanhcong.php");
                                die();
                            }else{
                                echo "<div class='alert alert-danger'>Password does not match</div>";
                            }

                        }else{
                            echo "<div class='alert alert-danger'>Email does not match</div>";
                        }

                    }
                    ?>
                    
                    <form action="index.php" method="POST">
                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-envelope'></i></span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>
                        <div class="remember-forgot">
                            <label> <input type="checkbox">Ghi nhớ đăng nhập</label>
                            <a href="#">Quên mật khẩu?</a>
                        </div>
                        <input type="hidden" name="login" value="1">
                        <button type="submit" class="btn">Đăng nhập</button>

                        <div class="logreg-link">
                            <p>Không có tài khoản?<a href="#" class="register-link">Đăng ký</a></p>
                        </div>
                    </form>

                    
                </div>
                 <!--register form -->
                <div class="form-box register">
                    <div class="logreg-title">
                        <h2>Đăng ký</h2>
                        <p>Vui lòng đăng ký để sử dụng nền tảng</p>
                    </div>

                    <?php
                    if (isset($_POST["submit"])) {
                        $fullName = $_POST["fullname"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $passwordRepeat = $_POST["repeat_password"];

                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                        $errors = array();

                        if (empty($fullName) || empty($email) || empty($password) || empty($passwordRepeat)) {
                            array_push($errors, "All fields are required");
                        }
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            array_push($errors, "Email is not valid");
                        }
                        if (strlen($password) < 8) {
                            array_push($errors, "Mật khẩu phải dài ít nhất 8 ký tự");
                        }
                        if ($password !== $passwordRepeat) {
                            array_push($errors, "Mật khẩu không hợp lệ");
                        }
                        require_once "database.php";
                        $sql = "SELECT * FROM users WHERE email ='$email'";
                        $result = mysqli_query($conn, $sql);
                        $rowCount = mysqli_num_rows($result);
                        if ($rowCount > 0) {
                            array_push($errors, "Email đã tồn tại!");
                        }

                        if (count($errors) > 0) {
                            echo "<div class='alert alert-danger'>Đăng ký không thành công</div>";
                            foreach ($errors as $error) {
                                echo "<div class='alert alert-danger'>$error</div>";
                            }
                        } else {
                            $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                            if ($prepareStmt) {
                                mysqli_stmt_bind_param($stmt, "sss", $fullName, $email, $passwordHash);
                                mysqli_stmt_execute($stmt);
                                echo "<div class='alert alert-success'>You are registered successfully.</div>";
                            } else {
                                die("Something went wrong");
                            }
                        }
                    }
                    ?>

                    <form action="index.php" method="post">
                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-user'></i></span>
                            <input type="text"  name="fullname"  required>
                            <label>Full Name</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-envelope'></i></span>
                            <input type="email" name="email" required>
                            <label>Email</label>
                                
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                            <input type="password" name="password" required>
                            <label>Password</label>
                        </div>

                        <div class="input-box">
                            <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                            <input type="password" name="repeat_password"  required><label>Repeat Password</label>
                        </div>

                        <div class="remember-forgot">
                            <label> <input type="checkbox">Đồng ý với các điều khoản & điều kiện</label>
                        </div>

                        <div class="form-btn">
                            <button type="submit" class="btn btn-primary" name="submit">Đăng ký</button>
                        </div>

                        <div class="logreg-link">
                            <p>Đã đăng ký? <a href="#" class="login-link">Đăng nhập</a></p>
                        </div>
                    </form>
                    
                </div>
               


            </div>
            <div class="media-options">
                <a href="#">
                    <i class='bx bxl-google'></i>
                    <span>Login With Google</span>
                </a>
                <a href="#">
                    <i class='bx bxl-facebook-circle'></i>
                    <span>Login With Facebook</span>
                </a>
            </div>
        </div>
    </section>
    





    <script src = "script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   
    
</body>
</html>