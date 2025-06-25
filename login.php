<?php
$servername = "database-server-lab7.cjxzvwl8ifcx.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "dinhvien";
$dbname = "login_db";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Kiểm tra nếu form đã submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Truy vấn lấy dữ liệu từ database
    $sql = "SELECT * FROM User WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);
    // Kiểm tra số lượng bản ghi trả về
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