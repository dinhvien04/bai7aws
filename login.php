	<?php
$servername = "myrds.c8wbqwkjtmtx.us-east-1.rds.amazonaws.com"; // Thay bằng Endpoint RDS của bạn
$username = "admin"; // Thay bằng username RDS
$password = "dinhvien"; // Thay bằng mật khẩu RDS
$dbname = "diem_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username_input = $conn->real_escape_string($_POST["username"]);
    $password_input = $conn->real_escape_string($_POST["password"]);
    $sql = "SELECT * FROM User WHERE username='$username_input' AND password='$password_input'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Bạn đã đăng nhập thành công";
    } else {
        echo "Bạn đã đăng nhập không thành công";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Tên đăng nhập:</label>
        <input type="text" name="username"><br><br>
        <label>Mật khẩu:</label>
        <input type="password" name="password"><br><br>
        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>