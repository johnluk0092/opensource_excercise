<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "milk_db";
    $conn = new mysqli($servername, $username, $password, $db);
    if($conn->connect_error) {
        die("Failure!!! Error: ".$conn->connect_error);
    }

    //Xoá
    if(isset($_GET['action']) && $_GET['action'] == 'delete') {
        $mahs = $_GET['Ma_HS'];
        $sql = "DELETE FROM COMPANY WHERE Ma_HS = '$mahs'";
        if($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    //Thêm mới / Cập nhật
    $mahs           = @$_POST['Ma_HS'];
    $company_name   = @$_POST['Company_Name'];
    $address        = @$_POST['Address'];
    $phone          = @$_POST['Phone'];
    $email          = @$_POST['Email'];
    if($mahs != "" && $company_name != "" && $address != "" && $phone != "" && $email != "") {
        $sql        = "SELECT * FROM MilkCompanies WHERE MaHS = '$mahs'";
        $result     = $conn->query($sql);
        if($result->num_rows > 0) {
            echo "Mã HS đã tồn tại";
            $sql = "UPDATE MilkCompanies SET TenHangSua = '$company_name', DiaChi = '$address', DienThoai = '$phone', Email = '$email' WHERE MaHS = '$mahs'";
            if($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Ma HS chưa tồn tại";
            $sql = "INSERT INTO MilkCompanies(MaHS, TenHangSua, DiaChi, DienThoai, Email) VALUES ('$mahs', '$company_name', '$address', '$phone', '$email')";
            if($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
    //Phân trang
    $limit = 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;

    //Hiển thị dữ liệu
    $result = $conn->query("SELECT * FROM MilkCompanies LIMIT $limit OFFSET $start");
    $result1 = $conn->query("SELECT count(*) AS total FROM MilkCompanies");
    $companyCount = $result1->fetch_assoc()['total'];
    $total_pages = ceil($companyCount / $limit);
 ?>
<html>
    <body>
        <form action="MySQL_Bai01.php" method="POST">
            <input type="text" name="Ma_HS" placeholder="Mã HS">
            <input type="text" name="Company_Name" placeholder="Tên công ty">
            <input type="text" name="Address" placeholder="Địa chỉ">
            <input type="text" name="Phone" placeholder="Số điện thoại">
            <input type="text" name="Email" placeholder="Email">
            <input type="submit" value="Thêm mới/Cập nhật">
        </form>   
        <table border=1>
            <tr>
                <th>Mã HS</th>
                <th>Tên hãng sữa</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Thực thi</th>
            </tr>
    <?php
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td> ". $row["MaHS"] ."</td>
                    <td> ". $row["TenHangSua"] ." </td>
                    <td> ". $row["DiaChi"] ." </td>
                    <td> ". $row["DienThoai"] ." </td>
                    <td> ". $row["Email"] ." </td>
                    <td> <a href='MySQL_Bai01.php?action=delete&MaHS=". $row["MaHS"] ."'>Xoá</a> </td>
                    </tr>";
            }
        } else {
            echo "Empty";
        }
    ?>
    </table>
    <div>
        <?php
            for ($i=1; $i <= $total_pages; $i++) { 
                echo "<a href='MySQL_Bai01.php?page=". $i ."'>". $i ."</a>";
            }
        ?>
    </div>
    </body>
</html>