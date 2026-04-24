# Student Manager – WordPress Plugin

Plugin quản lý sinh viên cho WordPress, bao gồm Custom Post Type, Meta Boxes và Shortcode hiển thị danh sách.

## Cấu trúc thư mục

```
student-manager/
├── student-manager.php        # File chính (plugin header + load files)
├── includes/
│   ├── cpt.php                # Đăng ký Custom Post Type "sinh_vien"
│   ├── meta-box.php           # Meta Box: MSSV, Lớp, Ngày sinh
│   └── shortcode.php          # Shortcode [danh_sach_sinh_vien]
├── assets/
│   └── style.css              # CSS cho bảng danh sách
└── README.md
```

## Tính năng

### Backend (Quản trị)
- **Custom Post Type** `sinh_vien`: Xuất hiện trong menu WordPress với icon nhóm người.
- Hỗ trợ **title** (Họ tên) và **editor** (Tiểu sử/Ghi chú).
- **Meta Box** "Thông tin sinh viên" với 3 trường:
  - Mã số sinh viên (text)
  - Lớp/Chuyên ngành (dropdown: CNTT, Kinh tế, Marketing)
  - Ngày sinh (date)
- Lưu dữ liệu an toàn với **Nonce** và **Sanitize**.

### Frontend (Hiển thị)
- Shortcode `[danh_sach_sinh_vien]` hiển thị bảng HTML gồm:
  **STT | MSSV | Họ tên | Lớp | Ngày sinh**

## Hướng dẫn cài đặt

1. Copy thư mục `student-manager` vào `wp-content/plugins/`.
2. Vào **Dashboard → Plugins → Kích hoạt** plugin "Student Manager".
3. Thêm sinh viên tại menu **Sinh viên → Thêm mới**.
4. Tạo một trang (Page) và chèn shortcode `[danh_sach_sinh_vien]` để hiển thị danh sách.

## Ảnh chụp kết quả

> *(Chụp màn hình sau khi cài đặt plugin và thêm dữ liệu thử nghiệm, đặt ảnh vào thư mục này)*

- `screenshot-backend.png` – Giao diện nhập liệu Meta Box trong Dashboard.
- `screenshot-frontend.png` – Bảng danh sách sinh viên hiển thị ngoài trang.
