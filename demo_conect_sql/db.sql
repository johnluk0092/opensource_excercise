CREATE DATABASE milk_db;
USE milk_db;

CREATE TABLE MilkCompanies (
    MaHS VARCHAR(10) PRIMARY KEY,
    TenHangSua VARCHAR(50) NOT NULL,
    DiaChi TEXT NOT NULL,
    DienThoai VARCHAR(15) NOT NULL,
    Email VARCHAR(50) NOT NULL
);

INSERT INTO MilkCompanies (MaHS, TenHangSua, DiaChi, DienThoai, Email) VALUES
('VNM', 'Vinamilk', '123 Nguyễn Du - Quận 1 - TP.HCM', '8794561', 'vinamilk@vnm.com'),
('NTF', 'Nutifood', 'Khu công nghiệp Sóng Thần Bình Dương', '7895632', 'nutfood@ntf.com'),
('AB', 'Abbott', 'Công ty nhập khẩu Việt Nam', '8741258', 'abbott@ab.com'),
('DS', 'Daisy', 'Khu công nghiệp Sóng Thần Bình Dương', '5789321', 'daisy@ds.com'),
('DL', 'Dutch Lady', 'Khu công nghiệp Biên Hòa - Đồng Nai', '7826451', 'dutchlady@dl.com'),
('DM', 'Dumex', 'Khu công nghiệp Sóng Thần Bình Dương', '6528943', 'dumex@dm.com'),
('MJ', 'Mead Johnson', 'Công ty nhập khẩu Việt Nam', '8741258', 'meadjohn@mj.com');