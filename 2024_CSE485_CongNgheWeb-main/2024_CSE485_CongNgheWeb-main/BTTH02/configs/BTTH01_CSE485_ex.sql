-- truy vấn dữ liệu --
-- a, Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình
SELECT b.ma_bviet, b.tieude, b.tenbhat
FROM baiviet b
JOIN theloai t ON b.ma_tloai = t.ma_tloai
WHERE t.ten_tloai = 'Nhạc trữ tình';

-- b, Liệt kê các bài viết của tác giả “Nhacvietplus”
SELECT b.ma_bviet, b.tieude, b.tenbhat
FROM baiviet b
JOIN tacgia tg ON b.ma_tgia = tg.ma_tgia
WHERE tg.ten_tgia = 'Nhacvietplus';

-- c, Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào
SELECT t.ma_tloai, t.ten_tloai
FROM theloai t
LEFT JOIN baiviet b ON t.ma_tloai = b.ma_tloai
WHERE b.ma_bviet IS NULL;

-- d, Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên
-- thể loại, ngày viết
SELECT b.ma_bviet, b.tieude, b.tenbhat, tg.ten_tgia, t.ten_tloai, b.ngayviet
FROM baiviet b
JOIN tacgia tg ON b.ma_tgia = tg.ma_tgia
JOIN theloai t ON b.ma_tloai = t.ma_tloai;

-- d, Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên
-- thể loại, ngày viết
SELECT t.ten_tloai, COUNT(b.ma_bviet) AS so_bai_viet
FROM theloai t
JOIN baiviet b ON t.ma_tloai = b.ma_tloai
GROUP BY t.ten_tloai
HAVING COUNT(b.ma_bviet) = (
    SELECT MAX(bai_viet_count)
    FROM (
        SELECT COUNT(ma_bviet) AS bai_viet_count
        FROM baiviet
        GROUP BY ma_tloai
    ) AS subquery
);

-- f, Liệt kê 2 tác giả có số bài viết nhiều nhất
SELECT TOP 2 tg.ma_tgia, tg.ten_tgia, COUNT(b.ma_bviet) AS SoBaiViet
FROM tacgia tg
JOIN baiviet b ON tg.ma_tgia = b.ma_tgia
GROUP BY tg.ma_tgia, tg.ten_tgia
ORDER BY SoBaiViet DESC;

-- g,Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”,
-- “em”
SELECT ma_bviet, tieude, tenbhat
FROM baiviet
WHERE tenbhat LIKE '%yêu%' 
   OR tenbhat LIKE '%thương%' 
   OR tenbhat LIKE '%anh%' 
   OR tenbhat LIKE '%em%';

-- h, Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ
-- “yêu”, “thương”, “anh”, “em”
SELECT ma_bviet, tieude, tenbhat
FROM baiviet
WHERE tieude LIKE '%yêu%' 
   OR tieude LIKE '%thương%' 
   OR tieude LIKE '%anh%' 
   OR tieude LIKE '%em%'
   OR tenbhat LIKE '%yêu%' 
   OR tenbhat LIKE '%thương%' 
   OR tenbhat LIKE '%anh%' 
   OR tenbhat LIKE '%em%';


-- i, Tạo 1 view có tên vw_Music để hiển thị thông tin về Danh sách các bài viết kèm theo Tên
-- thể loại và tên tác giả 
CREATE VIEW vw_Music AS
SELECT 
    b.ma_bviet, 
    b.tieude, 
    b.tenbhat, 
    t.ten_tloai, 
    tg.ten_tgia
FROM 
    baiviet b
JOIN 
    theloai t ON b.ma_tloai = t.ma_tloai
JOIN 
    tacgia tg ON b.ma_tgia = tg.ma_tgia;

select * from vw_Music

-- j, Tạo 1 thủ tục có tên sp_DSBaiViet với tham số truyền vào là Tên thể loại và trả về danh sách
-- Bài viết của thể loại đó. Nếu thể loại không tồn tại thì hiển thị thông báo lỗi
DELIMITER $$
CREATE PROCEDURE sp_DSBaiViet(IN ten_tloai VARCHAR(50))
BEGIN
    DECLARE ma_tloai INT;
    SELECT ma_tloai INTO ma_tloai FROM theloai WHERE ten_tloai = ten_tloai;
    IF ma_tloai IS NULL THEN
        SELECT "Thể loại không tồn tại!";
    ELSE
        SELECT * FROM baiviet WHERE ma_tloai = ma_tloai;
    END IF;
END $$
DELIMITER ;

-- k, Thêm mới cột SLBaiViet vào trong bảng theloai. Tạo 1 trigger có tên tg_CapNhatTheLoai để
-- khi thêm/sửa/xóa bài viết thì số lượng bài viết trong bảng theloai được cập nhật theo
ALTER TABLE theloai ADD COLUMN SLBaiViet INT;

DELIMITER $$
CREATE TRIGGER tg_CapNhatTheLoai
AFTER INSERT ON baiviet
FOR EACH ROW
BEGIN
    UPDATE theloai
    SET SLBaiViet = SLBaiViet + 1
    WHERE ma_tloai = NEW.ma_tloai;
END $$
DELIMITER ;