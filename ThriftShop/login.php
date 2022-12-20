<?php
// variable pendefinisian kredensial
$usernamelogin = 'admin';
$passwordlogin = 'admin';

// memulai session
session_start();

// mengambil isian dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// pengecekan kredensial login
if ($username == $usernamelogin && $password == $passwordlogin) {
    session_start();
    $_SESSION['username'] = $username;
    header("Location: profil.php");
    echo "
    <script>
        alert('Login Berhasil');
        </script> ";
    
} else {
    header("Location: login_page.php");
    echo "
    <script>
        alert('Login Gagal');
        </script> ";
   
}
