	<?php
$servername = "myrds.c8wbqwkjtmtx.us-east-1.rds.amazonaws.com"; // Thay bằng Endpoint RDS của bạn
$username = "admin"; // Thay bằng username RDS
$password = "dinhvien"; // Thay bằng mật khẩu RDS
$dbname = "diem_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Truy vấn dữ liệu
$sql = "SELECT MaSV, MaMonHoc, Diem FROM Diem";
$result = $conn->query($sql);

// Hiển thị dữ liệu
if ($result->num_rows > 0) {
    echo "<h2>Danh sách điểm</h2>";
    echo "<table border='1'><tr><th>MaSV</th><th>MaMonHoc</th><th>Diem</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["MaSV"] . "</td><td>" . $row["MaMonHoc"] . "</td><td>" . $row["Diem"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 kết quả.";
}

$conn->close();
?>