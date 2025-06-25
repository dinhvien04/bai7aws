<?php
$servername = "database-server-lab7.cjxzvwl8ifcx.us-east-1.rds.amazonaws.com"; // Thay endpoint
$username = "admin";
$password = "dinhvien";
$dbname = "diem_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Kết nối không thành công: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['masv'])) {
    $masv = $_GET['masv'];
    $sql = "SELECT MaMonHoc, Diem FROM Diem WHERE MaSV = '$masv'";
    $result = $conn->query($sql);
    echo "<h2>Điểm của $masv</h2>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Môn: " . $row['MaMonHoc'] . ", Điểm: " . $row['Diem'] . "<br>";
        }
    } else {
        echo "Không có dữ liệu.";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Xem điểm</title></head>
<body>
    <h2>Xem điểm</h2>
    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>MaSV:</label>
        <input type="text" name="masv"><br><br>
        <input type="submit" value="Xem điểm">
    </form>
</body>
</html>