-- Create the database
CREATE DATABASE IF NOT EXISTS QL_BAN_SUA;
USE QL_BAN_SUA;

-- Create milk brands table (hang_sua)
CREATE TABLE IF NOT EXISTS hang_sua (
    ma_hang_sua VARCHAR(10) PRIMARY KEY,
    ten_hang_sua VARCHAR(100) NOT NULL,
    dia_chi VARCHAR(200) NOT NULL,
    dien_thoai VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Insert sample milk brands
INSERT INTO hang_sua (ma_hang_sua, ten_hang_sua, dia_chi, dien_thoai, email) VALUES
('VNM', 'Vinamilk', '123 Nguyễn Du - Quận 1 - TP.HCM', '8794561', 'vinamilk@vnm.com'),
('NTF', 'Nutfood', 'Khu công nghiệp Sóng Thần Bình Dương', '7895632', 'nutfood@ntf.com'),
('AB', 'Abbott', 'Công ty nhập khẩu Việt Nam', '8741258', 'abbott@ab.com'),
('DS', 'Daisy', 'Khu công nghiệp Sóng Thần Bình Dương', '5789321', 'daisy@ds.com'),
('DL', 'Dutch Lady', 'Khu công nghiệp Biên Hòa - Đồng Nai', '7826451', 'dutchlady@dl.com'),
('DM', 'Dumex', 'Khu công nghiệp Sóng Thần Bình Dương', '6258943', 'dumex@dm.com'),
('MJ', 'Head Jonhson', 'Công ty nhập khẩu Việt Nam', '8741258', 'meadjohn@mj.com');

-- Create milk types table (loai_sua)
CREATE TABLE IF NOT EXISTS loai_sua (
    ma_loai_sua VARCHAR(10) PRIMARY KEY,
    ten_loai VARCHAR(50) NOT NULL
);

-- Insert sample milk types
INSERT INTO loai_sua (ma_loai_sua, ten_loai) VALUES
('ST', 'Sữa tươi'),
('SC', 'Sữa chua'),
('SB', 'Sữa bột'),
('SD', 'Sữa đặc'),
('SK', 'Sữa công thức');

-- Create customers table (khach_hang)
CREATE TABLE IF NOT EXISTS khach_hang (
    ma_khach_hang VARCHAR(10) PRIMARY KEY,
    ten_khach_hang VARCHAR(100) NOT NULL,
    gioi_tinh TINYINT(1) NOT NULL COMMENT '0: Nam, 1: Nữ',
    dia_chi VARCHAR(200) NOT NULL,
    dien_thoai VARCHAR(15) NOT NULL
);

-- Insert sample customers
INSERT INTO khach_hang (ma_khach_hang, ten_khach_hang, gioi_tinh, dia_chi, dien_thoai) VALUES
('kh001', 'Khuất Thùy Phương', 1, 'A21 Nguyễn Oanh quận Gò Vấp', '9874125'),
('kh002', 'Đỗ Lâm Thiên', 0, '357 Lê Hồng Phong Q.10', '8351056'),
('kh003', 'Phạm Thị Nhung', 1, '56 Đinh Tiên Hoàng quận 1', '9745698'),
('kh004', 'Nguyễn Khắc Thiên', 0, '12bis Đường 3-2 quận 10', '8769128'),
('kh005', 'Tô Trần Hồ Giảng', 0, '75 Nguyễn Kiệm quận Gò Vấp', '5792564'),
('kh006', 'Nguyễn Kiến Thi', 1, '357 Lê Hồng Phong Q.10', '9874125'),
('kh008', 'Nguyễn Anh Tuấn', 0, '1/2bis No Trang Long Q.BT TP.HCM', '8753159');

-- Create milk products table (sua)
CREATE TABLE IF NOT EXISTS sua (
    ma_sua VARCHAR(10) PRIMARY KEY,
    ten_sua VARCHAR(100) NOT NULL,
    ma_hang_sua VARCHAR(10) NOT NULL,
    ma_loai_sua VARCHAR(10) NOT NULL,
    trong_luong INT NOT NULL COMMENT 'Weight in grams',
    don_gia INT NOT NULL COMMENT 'Price in VND',
    tp_dinh_duong TEXT NOT NULL,
    loi_ich TEXT NOT NULL,
    hinh VARCHAR(100),
    FOREIGN KEY (ma_hang_sua) REFERENCES hang_sua(ma_hang_sua),
    FOREIGN KEY (ma_loai_sua) REFERENCES loai_sua(ma_loai_sua)
);

-- Insert sample milk products
INSERT INTO sua (ma_sua, ten_sua, ma_hang_sua, ma_loai_sua, trong_luong, don_gia, tp_dinh_duong, loi_ich) VALUES
('S001', 'Fristi', 'DL', 'ST', 180, 3600, 'Sữa tươi nguyên chất, đường, hương liệu tự nhiên', 'Cung cấp canxi và vitamin D cho trẻ em'),
('S002', 'Sữa chua Plus', 'VNM', 'SC', 120, 4000, 'Sữa chua lên men tự nhiên, đường, vi khuẩn có lợi', 'Hỗ trợ tiêu hóa, tăng cường sức khỏe đường ruột'),
('S003', 'Sữa chua Cô Gái Hà Lan', 'DL', 'SC', 100, 3000, 'Sữa chua nguyên chất, men vi sinh', 'Giúp cân bằng hệ vi sinh đường ruột'),
('S004', 'Sữa chua uống Cô Gái Hà Lan', 'DL', 'SC', 110, 2500, 'Sữa chua uống, đường, hương liệu tự nhiên', 'Tiện lợi, bổ sung lợi khuẩn'),
('S005', 'Dielac Sure', 'VNM', 'SB', 400, 90000, 'Sữa bột, vitamin tổng hợp, khoáng chất', 'Dinh dưỡng đầy đủ cho trẻ nhỏ'),
('S006', 'Similac Neo Sure', 'AB', 'SB', 370, 145000, 'Sữa toàn phần, sữa bột không béo, mật bắp, đường lactose', 'Dành cho trẻ sinh non, nhẹ cân'),
('S007', 'Abbott Pedia Sure', 'AB', 'SB', 400, 146000, 'Sữa bột, vitamin, khoáng chất, taurine', 'Bổ sung dinh dưỡng cho trẻ biếng ăn'),
('S008', 'Abbott Grow School', 'AB', 'SB', 400, 87000, 'Sữa bột, DHA, choline, vitamin nhóm B', 'Phát triển trí não và chiều cao'),
('S009', 'Abbott Grow', 'AB', 'SB', 400, 87000, 'Sữa bột GROW được đặc chế và gia tăng thêm các loại Vitamin, khoáng chất', 'Giúp cho việc tăng trưởng chiều cao'),
('S010', 'Gain IQ', 'AB', 'SB', 400, 107000, 'Sữa bột, đạm whey, DHA, AA, prebiotics', 'Phát triển trí não và hệ miễn dịch'),
('S011', 'Gain Advance', 'AB', 'SB', 400, 107000, 'Sữa bột, đạm, chất xơ FOS, vitamin', 'Hỗ trợ tiêu hóa và phát triển toàn diện'),
('S012', 'Sữa đắc Trưởng Sinh', 'NTF', 'SB', 360, 11500, 'Sữa bột, đạm đậu nành, vitamin', 'Dinh dưỡng cho người lớn tuổi'),
('S013', 'Cô Gái Hà Lan 456', 'DL', 'SB', 400, 49500, 'Sữa bột nguyên kem, vitamin A, D, E', 'Cung cấp năng lượng và dinh dưỡng'),
('S014', 'Cô Gái Hà Lan 123', 'DL', 'SB', 400, 52600, 'Sữa bột tách béo, canxi, vitamin D', 'Giúp xương chắc khỏe'),
('S015', 'Erise', 'DM', 'SB', 400, 52000, 'Sữa bột, DHA, ARA, choline', 'Phát triển trí não và thị giác');