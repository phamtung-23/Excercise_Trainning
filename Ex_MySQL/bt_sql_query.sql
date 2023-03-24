CREATE table KHACHHANG (
	MAKH CHAR(4) NOT NULL,
	HOTEN VARCHAR(40),
	DCHI VARCHAR(50),
	SODT VARCHAR(20),
	NGSINH DATE,
	NGDK DATE,
	DOANHSO FLOAT,
	PRIMARY KEY (MAKH)
)

CREATE table NHANVIEN (
	MANV CHAR(4) NOT NULL,
	HOTEN VARCHAR(40),
	SODT VARCHAR(20),
	NGVL DATE,
	PRIMARY KEY (MANV)
)

CREATE table SANPHAM (
	MASP CHAR(4) NOT NULL,
	TENSP VARCHAR(40),
	DVT VARCHAR(20),
	NUOCSX VARCHAR(40),
	GIA FLOAT,
	PRIMARY KEY (MASP)
)


CREATE table HOADON (
	SOHD INT NOT NULL,
	NGHD DATE,
	MAKH CHAR(4),
	MANV CHAR(4),
	TRIGIA FLOAT,
	PRIMARY KEY (SOHD)
)

CREATE table CTHD (
	SOHD INT NOT NULL,
	MASP CHAR(4),
	SL INT,
	PRIMARY KEY (SOHD,MASP)
)

-- 1.Tạo các quan hệ và khai báo các khóa chính, khóa ngoại của quan hệ---
-- TẠO KHÓA NGOẠI CHO THUỘC TÍNH MAKH CHO BẢNG HOADON
ALTER TABLE HOADON
ADD CONSTRAINT fk_MAKH
FOREIGN KEY (MAKH)
REFERENCES KHACHHANG (MAKH);
-- TẠO KHÓA NGOẠI CHO THUỘC TÍNH MANV CHO BẢNG HOADON
ALTER TABLE HOADON
ADD CONSTRAINT fk_MANV
FOREIGN KEY (MANV)
REFERENCES NHANVIEN (MANV);
-- TẠO KHÓA NGOẠI CHO THUỘC TÍNH SOHD CHO BẢNG CTHD
ALTER TABLE CTHD
ADD CONSTRAINT fk_SOHD
FOREIGN KEY (SOHD)
REFERENCES HOADON (SOHD);
-- TẠO KHÓA NGOẠI CHO THUỘC TÍNH MASP CHO BẢNG CTHD
ALTER TABLE CTHD
ADD CONSTRAINT fk_MASP
FOREIGN KEY (MASP)
REFERENCES SANPHAM (MASP);

-- Insert dữ liệu vào bảng ----
INSERT INTO NHANVIEN VALUES
('NV01','Nguyen Nhu Nhut','0927345678','2006/04/13'),
('NV02','Le Thi Phi Yen','0987567390','2006/04/21'),
('NV03','Nguyen Van B','0997047382','2006/04/27'),
('NV04','Ngo Thanh Tuan','0913758498','2006/06/24'),
('NV05','Nguyen Thi Truc Thanh','0918590387','2006/07/20');

-- DELETE FROM NHANVIEN WHERE MANV = 'NVO3'


INSERT INTO KHACHHANG VALUES
('KH01','Nguyen Van A','731 Tran Hung Dao, Q5, TpHCM','08823451','1960/10/22','2006/07/22',13060000),
('KH02','Tran Ngoc Han','23/5 Nguyen Trai, Q5, TpHCM','0908256478','1974/04/03','2006/07/30',280000),
('KH03','Tran Ngoc Linh','45 Nguyen Canh Chan, Q1, TpHCM','0938776266','1980/06/12','2006/08/05',3860000),
('KH04','Tran Minh Long','50/34 Le Dai Hanh, Q10, TpHCM','0917325476','1965/03/09','2006/10/02',250000),
('KH05','Le Nhat Minh','34 Truong Chinh, Q3, TpHCM','08246108','1950/03/10','2006/10/28',21000),
('KH06','Le Hoai Thuong','227 Nguyen Van Cu, Q5, TpHCM','08631738','1981/12/31','2006/11/24',915000),
('KH07','Nguyen Van Tam','32/3 Tran Binh Trong, Q5, TpHCM','0916783565','1971/04/06','2006/12/01',12500),
('KH08','Pham Thi Thanh','45/2 An Duong Vuong, Q5, TpHCM','0938435756','1971/01/10','2006/12/13',365000),
('KH09','Le Ha Vinh','873 Le Hong Phong, Q5, TpHCM','08654763','1979/09/03','2007/01/14',70000),
('KH10','Ha Duy Lap','34/34B Nguyen Trai, Q1, TpHCM','08768904','1983/05/02','2007/01/16',67500);

INSERT INTO SANPHAM VALUES
('BC01','But chi','cay','Singapore',3000),
('BC02','But chi','cay','Singapore',5000),
('BC03','But chi','cay','Viet Nam',3500),
('BC04','But chi','cay','Viet Nam',30000),
('BB01','But bi','cay','Viet Nam',5000),
('BB02','But bi','cay','Trung Quoc',7000),
('BB03','But bi','cay','Thai Lan',100000),
('TV01','Tap 100 giay mong','quyen','Trung Quoc',2500),
('TV02','Tap 200 giay mong','quyen','Trung Quoc',4500),
('TV03','Tap 100 giay tot','quyen','Viet Nam',3000),
('TV04','Tap 200 giay tot','quyen','Viet Nam',5500),
('TV05','Tap 100 trang','chuc','Viet Nam',23000),
('TV06','Tap 200 trang','chuc','Viet Nam',53000),
('TV07','Tap 100 trang','chuc','Trung Quoc',34000),
('ST01','So tay 500 trang','quyen','Trung Quoc',40000),
('ST02','So tay loai 1','quyen','Viet Nam',55000),
('ST03','So tay loai 2','quyen','Viet Nam',51000),
('ST04','So tay','quyen','Thai Lan',55000),
('ST05','So tay mong','quyen','Thai Lan',20000),
('ST06','Phan viet bang','hop','Viet Nam',5000),
('ST07','Phan khong bui','hop','Viet Nam',7000),
('ST08','Bong bang','cai','Viet Nam',1000),
('ST09','But long','cay','Viet Nam',5000),
('ST10','But long','cay','Trung Quoc',7000);
 
INSERT INTO HOADON VALUES
(1001,'2006/07/23','KH01','NV01',320000),
(1002,'2006/08/12','KH01','NV02',840000),
(1003,'2006/08/23','KH02','NV01',100000),
(1004,'2006/09/02','KH02','NV01',180000),
(1005,'2006/10/20','KH01','NV02',3800000),
(1006,'2006/10/16','KH01','NV03',2430000),
(1007,'2006/10/28','KH03','NV03',510000),
(1008,'2006/10/28','KH01','NV03',440000),
(1009,'2006/10/28','KH03','NV04',200000),
(1010,'2006/11/01','KH01','NV01',5200000),
(1011,'2006/11/04','KH04','NV03',250000),
(1012,'2006/11/30','KH05','NV03',21000),
(1013,'2006/12/12','KH06','NV01',5000),
(1014,'2006/12/31','KH03','NV02',3150000),
(1015,'2007/01/01','KH06','NV01',910000),
(1016,'2007/01/01','KH07','NV02',12500),
(1017,'2007/01/02','KH08','NV03',35000),
(1018,'2007/01/13','KH08','NV03',330000),
(1019,'2007/01/13','KH01','NV03',30000),
(1020,'2007/01/14','KH09','NV04',70000),
(1021,'2007/01/16','KH10','NV03',67500),
(1022,'2007/01/16',NULL,'NV03',7000),
(1023,'2007/01/17',NULL,'NV01',330000);
 
INSERT INTO CTHD VALUES
(1001, 'TV02', 10),
(1001, 'ST01', 5),
(1001, 'BC01', 5),
(1001, 'BC02', 10),
(1001, 'ST08', 10),
(1002, 'BC04', 20),
(1002, 'BB01', 20),
(1002, 'BB02', 20),
(1003, 'BB03', 10),
(1004, 'TV01', 20),
(1004, 'TV02', 10),
(1004, 'TV03', 10),
(1004, 'TV04', 10),
(1005, 'TV05', 50),
(1005, 'TV06', 50),
(1006, 'TV07', 20),
(1006, 'ST01', 30),
(1006, 'ST02', 10),
(1007, 'ST03', 10),
(1008, 'ST04', 8),
(1009, 'ST05', 10),
(1010, 'TV07', 50),
(1010, 'ST07', 50),
(1010, 'ST08', 100),
(1010, 'ST04', 50),
(1010, 'TV03', 100),
(1011, 'ST06', 50),
(1012, 'ST07', 3),
(1013, 'ST08', 5),
(1014, 'BC02', 80),
(1014, 'BB02', 100),
(1014, 'BC04', 60),
(1014, 'BB01', 50),
(1015, 'BB02', 30),
(1015, 'BB03', 7),
(1016, 'TV01', 5),
(1017, 'TV02', 1),
(1017, 'TV03', 1),
(1017, 'TV04', 5),
(1018, 'ST04', 6),
(1019, 'ST05', 1),
(1019, 'ST06', 2),
(1020, 'ST07', 10),
(1021, 'ST08', 5),
(1021, 'TV01', 7),
(1021, 'TV02', 10),
(1022, 'ST07', 1),
(1023, 'ST04', 6);

-- 2. Thêm vào thuộc tính GHICHU có kiểu dữ liệu varchar(20) cho quan hệ SANPHAM.
ALTER TABLE SANPHAM
ADD GHICHU VARCHAR(20)

-- 3. Thêm vào thuộc tính LOAIKH có kiểu dữ liệu là tinyint cho quan hệ KHACHHANG
ALTER TABLE KHACHHANG
ADD LOAIKH TINYINT

-- 4. Cập nhật tên “Nguyễn Văn B” cho dữ liệu Khách Hàng có mã là KH01
-- SELECT * FROM KHACHHANG WHERE MAKH = 'KH01'
UPDATE KHACHHANG SET HOTEN ='Nguyen Van B' where MAKH = 'KH01'

-- 5.Cập nhật tên “Nguyễn Văn Hoan” cho dữ liệu Khách Hàng có mã là KH09 và năm đăng ký là 2007
-- SELECT * FROM KHACHHANG WHERE MAKH = 'KH09' AND YEAR(NGDK) = 2007
UPDATE KHACHHANG SET HOTEN ='Nguyen Van Hoan' WHERE MAKH = 'KH09' AND YEAR(NGDK) = 2007
 
--  6.Sửa kiểu dữ liệu của thuộc tính GHICHU trong quan hệ SANPHAM thành varchar(100).
ALTER TABLE SANPHAM
MODIFY COLUMN GHICHU varchar(100)

-- 7.Xóa thuộc tính GHICHU trong quan hệ SANPHAM.
ALTER TABLE SANPHAM
DROP COLUMN GHICHU
-- SELECT * FROM SANPHAM

-- 8.Xoá tất cả dữ liệu khách hàng có năm sinh 1971
	-- Do có khóa ngoại nên em xóa tất cả các dữ liệu liên quan đến các MAKH có năm sinh là 1971
	-- Xóa dữ liệu bảng CTHD
	DELETE  FROM CTHD WHERE SOHD IN (
		SELECT SOHD FROM HOADON WHERE MAKH in (
			SELECT MAKH FROM KHACHHANG WHERE YEAR(NGSINH) = 1971
			)
		)
	--  xóa dữ liệu bảng HOADON	
	DELETE FROM HOADON WHERE MAKH in (
			SELECT MAKH FROM KHACHHANG WHERE YEAR(NGSINH) = 1971
			)
	-- xóa dữ liệu bảng KHACHHANG
	DELETE FROM KHACHHANG WHERE YEAR(NGSINH) = 1971

-- 9.Xoá tất cả dữ liệu khách hàng có năm sinh 1971 và năm đăng ký 2006
	-- Do có khóa ngoại nên em xóa tất cả các dữ liệu liên quan đến các MAKH có năm sinh là 1971 và NGDK = 2006
	-- Xóa dữ liệu bảng CTHD
	DELETE  FROM CTHD WHERE SOHD IN (
		SELECT SOHD FROM HOADON WHERE MAKH in (
			SELECT MAKH FROM KHACHHANG WHERE YEAR(NGSINH) = 1971 AND YEAR(NGDK) = 2006
			)
		)
	--  xóa dữ liệu bảng HOADON	
	DELETE FROM HOADON WHERE MAKH in (
			SELECT MAKH FROM KHACHHANG WHERE YEAR(NGSINH) = 1971 AND YEAR(NGDK) = 2006
			)
	-- xóa dữ liệu bảng KHACHHANG
	DELETE FROM KHACHHANG WHERE YEAR(NGSINH) = 1971 AND YEAR(NGDK) = 2006
-- 

-- 10. Xoá tất hoá đơn có mã KH = KH01
	-- Do có khóa ngoại nên em xóa tất cả các dữ liệu liên quan đến các MAKH = 'KH01'
	-- Xóa dữ liệu bảng CTHD
	DELETE  FROM CTHD WHERE SOHD IN (
			SELECT SOHD FROM HOADON WHERE MAKH = 'KH01'
		)
	-- Xóa dữ liệu bảng HOADON 	
	DELETE FROM HOADON WHERE MAKH = 'KH01'
	
-- ################################################################################

-- 1. Bài tập thực hành câu lệnh select
	-- 1.1  In ra danh sách các sản phẩm (MASP,TENSP) do “Trung Quoc” sản xuất.
	SELECT MASP,TENSP FROM SANPHAM WHERE NUOCSX = 'Trung Quoc'
	
	-- 2.In ra danh sách các sản phẩm (MASP, TENSP) có đơn vị tính là “cay”, ”quyen”.
	SELECT MASP,TENSP FROM SANPHAM WHERE DVT = 'cay' or DVT = 'quyen'

	-- 3. In ra danh sách các sản phẩm (MASP,TENSP) có mã sản phẩm bắt đầu là “B” và kết thúc là “01”.
	SELECT MASP,TENSP FROM SANPHAM WHERE MASP LIKE 'B%01'

	-- 4.In ra danh sách các sản phẩm (MASP,TENSP) do “Trung Quốc” sản xuất có giá từ 30.000 đến 40.000.
	SELECT MASP,TENSP FROM SANPHAM WHERE NUOCSX = 'Trung Quoc' AND GIA BETWEEN 30000 and 40000
	
	-- 5.	In ra danh sách các sản phẩm (MASP,TENSP) do “Trung Quoc” hoặc “Thai Lan” sản xuất có giá từ 30.000 đến 40.000.
	SELECT MASP,TENSP FROM SANPHAM WHERE (NUOCSX = 'Trung Quoc' or NUOCSX = 'Thai Lan') AND GIA BETWEEN 30000 and 40000
	
	-- 	6. In ra các số hóa đơn, trị giá hóa đơn bán ra trong ngày 1/1/2007 và ngày 2/1/2007.
		SELECT SOHD, TRIGIA FROM HOADON WHERE NGHD = '2007/1/1' OR NGHD = '2007/1/2'
		
	-- 7.In ra các số hóa đơn, trị giá hóa đơn trong tháng 1/2007, sắp xếp theo ngày (tăng dần) và trị giá của hóa đơn (giảm dần).
		-- 	sắp xếp theo ngày (tăng dần)
		SELECT SOHD, TRIGIA ,NGHD FROM HOADON WHERE MONTH(NGHD)=1 AND YEAR(NGHD)=2007
		ORDER BY NGHD ASC;
		-- 	sắp xếp theo trị giá của hóa đơn (giảm dần)
		SELECT SOHD, TRIGIA ,NGHD FROM HOADON WHERE MONTH(NGHD)=1 AND YEAR(NGHD)=2007
		ORDER BY TRIGIA DESC
		-- sắp xếp theo ngày (tăng dần) và trị giá của hóa đơn (giảm dần).
		SELECT SOHD, TRIGIA ,NGHD FROM HOADON WHERE MONTH(NGHD)=1 AND YEAR(NGHD)=2007
		ORDER BY NGHD ASC, TRIGIA DESC;

	-- 8.In ra danh sách các khách hàng (MAKH, HOTEN) đã mua hàng trong ngày 1/1/2007.
		SELECT MAKH, HOTEN FROM KHACHHANG WHERE MAKH IN (
			SELECT MAKH FROM HOADON WHERE NGHD = '2007/1/1'
		)
	-- 9.In ra số hóa đơn, trị giá các hóa đơn do nhân viên có tên “Nguyen Van B” lập trong ngày 28/10/2006.
		SELECT SOHD, TRIGIA FROM HOADON WHERE MANV IN (
			SELECT MANV FROM NHANVIEN WHERE HOTEN = 'Nguyen Van B'
		) AND NGHD = '2006/10/28'
		
	
	-- 10.In ra danh sách các sản phẩm (MASP,TENSP) được khách hàng có tên “Nguyen Van A” mua trong tháng 10/2006.
		SELECT MASP, TENSP FROM SANPHAM WHERE MASP IN (
			SELECT MASP FROM CTHD WHERE SOHD IN (
				SELECT SOHD FROM HOADON WHERE MANV IN (
					SELECT MANV FROM NHANVIEN WHERE HOTEN = 'Nguyen Van B'
				) 
				AND MONTH(NGHD)=10 AND YEAR(NGHD)=2006
			)
		)

-- ################################################################################

-- 2. Các yêu cầu tạo dữ liệu
	-- 1.Xóa thuộc tính GHICHU trong quan hệ SANPHAM
		ALTER TABLE SANPHAM
		DROP COLUMN GHICHU
	-- 2. Làm thế nào để thuộc tính LOAIKH trong quan hệ KHACHHANG có thể lưu các giá trị là: “Vang lai”, “Thuong xuyen”, “Vip”, … 
-- 	=> Là đổi kiêu dữ liệu của cột LOAIKH
		ALTER TABLE KHACHHANG
		MODIFY COLUMN LOAIKH VARCHAR(100);

	-- 3. Đơn vị tính của sản phẩm chỉ có thể là (“cay”,”hop”,”cai”,”quyen”,”chuc”)
		ALTER TABLE SANPHAM
		ADD CONSTRAINT check_DVT CHECK (DVT IN ('cay','hop','cai','quyen','chuc'));
		
	-- 4. Giá bán của sản phẩm từ 500 đồng trở lên.
		ALTER TABLE SANPHAM
		ADD CONSTRAINT check_GIA CHECK (GIA >= 500);
	-- 5.Mỗi lần mua hàng, khách hàng phải mua ít nhất 1 sản phẩm.
		ALTER TABLE CTHD
		ADD CONSTRAINT CTHD_SL CHECK (SL >= 1)
	-- 6.Ngày khách hàng đăng ký là khách hàng thành viên phải lớn hơn ngày sinh của người đó.
		ALTER TABLE KHACHHANG 
		ADD CONSTRAINT check_NGDK CHECK (NGDK > NGSINH);
		
	-- 7.Ngày mua hàng (NGHD) của một khách hàng thành viên sẽ lớn hơn hoặc bằng ngày khách hàng đó đăng ký thành viên (NGDK).
	CREATE TRIGGER TRIGGER_NGDK_NGHD
	BEFORE INSERT 
	ON HOADON
	FOR EACH ROW
	BEGIN
		DECLARE error_msg VARCHAR(255);  
		SET error_msg = ('NGHD PHAI LON HON NGDK');  
		IF NEW.NGHD < (SELECT NGDK FROM KHACHHANG WHERE KHACHHANG.MAKH=NEW.MAKH) THEN
			SIGNAL SQLSTATE '45000' 
			SET MESSAGE_TEXT = error_msg; 
		END IF;
	END;
	
	-- 8.Ngày bán hàng (NGHD) của một nhân viên phải lớn hơn hoặc bằng ngày nhân viên đó vào làm.

		CREATE TRIGGER TRIGGER_NGVL_NGHD
		BEFORE INSERT 
		ON HOADON
		FOR EACH ROW
		BEGIN
			DECLARE error_msg VARCHAR(255);  
			SET error_msg = ('NGHD PHAI LON HON NGVL');  
			IF NEW.NGHD < (SELECT NGVL FROM NHANVIEN WHERE NHANVIEN.MANV=NEW.MANV) THEN
				SIGNAL SQLSTATE '45000' 
				SET MESSAGE_TEXT = error_msg; 
			END IF;
		END;

-- DROP TRIGGER TRIGGER_HOADON

	-- 9.Mỗi một hóa đơn phải có ít nhất một chi tiết hóa đơn.
		CREATE TRIGGER HD_CTHD
		AFTER DELETE
		ON CTHD
		FOR EACH ROW
		BEGIN
			DELETE FROM HOADON WHERE HOADON.SOHD = OLD.SOHD;
		END; 
		
		
-- 		CREATE TRIGGER HD_CTHD_UPDATE
-- 		AFTER UPDATE
-- 		ON CTHD
-- 		FOR EACH ROW
-- 		BEGIN
-- 			DECLARE count_SOHD INT(11); 
-- 			DECLARE error_msg VARCHAR(255);  
-- 			SET error_msg = ('OKOK');   
-- 			SET count_SOHD = (SELECT COUNT(SOHD) FROM CTHD WHERE SOHD = OLD.SOHD);
-- 			IF count_SOHD < 1 THEN
-- 				BEGIN
-- 					DELETE FROM HOADON WHERE HOADON.SOHD = OLD.SOHD;
-- 					SIGNAL SQLSTATE '45000' 
-- 					SET MESSAGE_TEXT = error_msg; 
-- 				END;
-- 			END IF;
-- 		END; 
		
-- 		DROP TRIGGER HD_CTHD_UPDATE
-- 		
-- 		SELECT * FROM CTHD
-- 		SELECT * FROM HOADON
-- 		UPDATE CTHD SET SOHD = 1013 WHERE SOHD = 1020
-- 		


	-- 10.Trị giá của một hóa đơn là tổng thành tiền (số lượng*đơn giá) của các chi tiết thuộc hóa đơn đó.
	
	CREATE TRIGGER INSERT_TRIGIA_HOADON
	BEFORE INSERT 
	ON HOADON
	FOR EACH ROW
	BEGIN
		 SET NEW.TRIGIA = 0;
	END;
	
	CREATE TRIGGER UPDATE_TRIGIA_HOADON
	BEFORE UPDATE 
	ON HOADON
	FOR EACH ROW
	BEGIN
	 SET NEW.TRIGIA = OLD.TRIGIA;
	END;
	
	
	
	CREATE TRIGGER TRIGGER_TRIGIA
	BEFORE INSERT 
	ON CTHD
	FOR EACH ROW
	BEGIN
		DECLARE error_msg VARCHAR(255);
		DECLARE SOLUONG INT(11) DEFAULT 0;
		DECLARE DONGIA FLOAT DEFAULT 0;		
		SET SOLUONG = NEW.SL;
		SET DONGIA = (SELECT GIA FROM SANPHAM WHERE SANPHAM.MASP=NEW.MASP);
		
		UPDATE HOADON SET TRIGIA = TRIGIA+SOLUONG*DONGIA WHERE HOADON.SOHD=NEW.SOHD;
	END;
	
	CREATE TRIGGER TRIGGER_TRIGIA_UPDATE
	BEFORE UPDATE 
	ON CTHD
	FOR EACH ROW
	BEGIN
		DECLARE error_msg VARCHAR(255);
		DECLARE SOLUONGMOI INT(11) DEFAULT 0;
		DECLARE DONGIAMOI FLOAT DEFAULT 0;	
		DECLARE SOLUONGCU INT(11) DEFAULT 0;
		DECLARE DONGIACU FLOAT DEFAULT 0;		
		
		SET SOLUONGMOI = NEW.SL;
		SET DONGIAMOI = (SELECT GIA FROM SANPHAM WHERE SANPHAM.MASP=NEW.MASP);
		SET SOLUONGCU = (SELECT SL FROM CTHD WHERE CTHD.SOHD=NEW.SOHD);
		SET DONGIACU = (SELECT GIA FROM SANPHAM WHERE SANPHAM.MASP=NEW.MASP);
		
		UPDATE HOADON SET TRIGIA = TRIGIA+SOLUONGMOI*DONGIAMOI-SOLUONGCU*DONGIACU WHERE HOADON.SOHD=NEW.SOHD;
	END;
	
	
	CREATE TRIGGER TRIGGER_TRIGIA_DELETE
	BEFORE DELETE 
	ON CTHD
	FOR EACH ROW
	BEGIN
		DECLARE error_msg VARCHAR(255);
		DECLARE SOLUONG INT(11) DEFAULT 0;
		DECLARE DONGIA FLOAT DEFAULT 0;		
		SET SOLUONG = OLD.SL;
		SET DONGIA = (SELECT GIA FROM SANPHAM WHERE SANPHAM.MASP=OLD.MASP);
		
		UPDATE HOADON SET TRIGIA = TRIGIA-SOLUONG*DONGIA WHERE HOADON.SOHD=OLD.SOHD;
	END;
	
	
	
	-- 11.Doanh số của một khách hàng là tổng trị giá các hóa đơn mà khách hàng thành viên đó đã mua.
		CREATE TRIGGER INSERT_DOANHSO_KHACHHANG
		BEFORE INSERT 
		ON KHACHHANG
		FOR EACH ROW
		BEGIN
			 SET NEW.DOANHSO = 0;
		END;
		
		CREATE TRIGGER UPDATE_DOANHSO_KHACHHANG
		BEFORE UPDATE 
		ON KHACHHANG
		FOR EACH ROW
		BEGIN
		 SET NEW.DOANHSO = OLD.DOANHSO;
		END;
		

	CREATE TRIGGER TRIGGER_DOANHSO_HOADON
	BEFORE INSERT 
	ON HOADON
	FOR EACH ROW
	BEGIN
		DECLARE error_msg VARCHAR(255);
		DECLARE TRIGIA_NEW FLOAT DEFAULT 0;
		SET TRIGIA_NEW = NEW.TRIGIA;
		
		UPDATE KHACHHANG SET DOANHSO = DOANHSO + TRIGIA_NEW WHERE KHACHHANG.MAKH = NEW.MAKH;
	END;
		
		
	CREATE TRIGGER UPDATE_DOANHSO_HOADON
	BEFORE UPDATE 
	ON HOADON
	FOR EACH ROW
	BEGIN
		DECLARE TRIGIA_NEW FLOAT DEFAULT 0;
		DECLARE TRIGIA_OLD FLOAT DEFAULT 0;		
		
		SET TRIGIA_NEW = NEW.TRIGIA;
		SET TRIGIA_OLD = OLD.TRIGIA;
		
		
		UPDATE KHACHHANG SET DOANHSO = DOANHSO + TRIGIA_NEW - TRIGIA_OLD WHERE KHACHHANG.MAKH = NEW.MAKH;
	END;
		
	CREATE TRIGGER TRIGGER_DOANHSO_HOADON
	BEFORE DELETE 
	ON HOADON
	FOR EACH ROW
	BEGIN
		DECLARE TRIGIA_OLD FLOAT DEFAULT 0;		
		SET TRIGIA_OLD = OLD.TRIGIA;
		
		UPDATE KHACHHANG SET DOANHSO = DOANHSO - TRIGIA_OLD WHERE KHACHHANG.MAKH = OLD.MAKH;
	END;
		
		
		
		
		
		
		