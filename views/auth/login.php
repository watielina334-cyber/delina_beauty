<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body { font-family: Arial; }
.form-box {
    width: 300px;
    padding: 20px;
    margin: 100px auto;
    border: 1px solid #ccc;
    border-radius: 5px;
}
input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
}
button {
    width: 100%;
    padding: 10px;
    background: blue;
    color: white;
}
.register {
    text-align: center;
    margin-top: 15px;
}
.register a{
    color: #ff4f9a;
    text-decoration: none;
    font-weight: bold;
}

</style>
</head>
<body>

<div class="form-box">
    <h3>Login</h3>
    <form action="index.php?page=login_proses" method="POST">
        <input type="email" name="email" placeholder="Email aktif anda" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
    <div class="register">Belum Punya Akun?
        <a href="index.php?page=register"> Register</a>
    </div>
</div>

</body>
</html>
