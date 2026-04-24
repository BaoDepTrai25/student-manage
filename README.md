# Student Manager - WordPress Plugin

Plugin quan ly sinh vien cho WordPress duoc xay dung theo yeu cau bai thuc hanh ngay 24/04/2026.

---

## Thong tin sinh vien

- **Ho ten:** Nguyen Duong The Bao
- **Email:** nguyenduongthebao25@gmail.com

---

## Mo ta

Plugin "Student Manager" cung cap day du chuc nang quan ly sinh vien tren nen tang WordPress, bao gom:

- Dang ky **Custom Post Type** `sinh_vien` voi menu rieng trong Dashboard.
- **Meta Box** nhap thong tin chi tiet: MSSV, Lop/Chuyen nganh, Ngay sinh.
- Bao mat du lieu bang **Nonce** va **Sanitize** khi luu.
- **Shortcode** `[danh_sach_sinh_vien]` hien thi danh sach sinh vien dang bang HTML co CSS.

---

## Cau truc thu muc

```
student-manager/
├── student-manager.php        # File chinh: plugin header, load cac file con
├── includes/
│   ├── cpt.php                # Dang ky Custom Post Type "sinh_vien"
│   ├── meta-box.php           # Meta Box: MSSV, Lop, Ngay sinh + luu Nonce/Sanitize
│   └── shortcode.php          # Shortcode [danh_sach_sinh_vien]
├── assets/
│   └── style.css              # CSS cho bang danh sach sinh vien
├── screenshots/               # Anh chup man hinh ket qua
└── README.md
```

---

## Chuc nang chi tiet

### A. Quan tri he thong (Backend)

| Yeu cau | Thuc hien |
|---|---|
| Custom Post Type "Sinh vien" | `includes/cpt.php` – dang ky CPT `sinh_vien`, ho tro `title` va `editor` |
| Meta Box nhap lieu | `includes/meta-box.php` – 3 truong: MSSV (text), Lop (dropdown), Ngay sinh (date) |
| Bao mat | Nonce (`wp_nonce_field` / `wp_verify_nonce`) + `sanitize_text_field` truoc khi luu |

**Dropdown Lop/Chuyen nganh:** CNTT, Kinh te, Marketing

### B. Hien thi du lieu (Frontend)

Shortcode: `[danh_sach_sinh_vien]`

Ket qua hien thi bang HTML 5 cot:

| STT | MSSV | Ho ten | Lop | Ngay sinh |
|-----|------|--------|-----|-----------|
| 1 | SV001 | Nguyen Van An | CNTT | 12/05/2003 |
| 2 | SV002 | Tran Thi Binh | Kinh te | 24/08/2003 |
| 3 | SV003 | Le Hoang Cuong | Marketing | 30/11/2002 |
| 4 | SV004 | Pham Thi Dung | CNTT | 17/02/2003 |
| 5 | SV005 | Hoang Minh Duc | Kinh te | 09/07/2002 |

---

## Huong dan cai dat

1. Copy thu muc `student-manager` vao `wp-content/plugins/`.
2. Vao **Dashboard -> Plugins -> Kich hoat** plugin **Student Manager**.
3. Vao menu **Sinh vien -> Them moi** de them sinh vien.
4. Tao mot **Page**, chen shortcode `[danh_sach_sinh_vien]` vao noi dung va xuat ban.

---

## Anh chup ket qua

### Backend - Danh sach sinh vien trong Dashboard

![Backend](screenshots/backend.png)

### Backend - Meta Box nhap thong tin sinh vien

![Meta Box](screenshots/meta-box.png)

### Frontend - Bang danh sach sinh vien

![Frontend](screenshots/frontend.png)
