# Portfolio Theme Setup

Tài liệu này hướng dẫn cấu hình thông tin cá nhân và mail mà **không hardcode** trong source code.

## 1) Cấu hình trong `wp-config.php`

Thêm các dòng sau vào file `wp-config.php` (trước dòng `/* That's all, stop editing! */`):

```php
define('PORTFOLIO_BRAND_NAME', 'Your Portfolio');
define('PORTFOLIO_OWNER_NAME', 'Your Name');
define('PORTFOLIO_BRAND_ROLE', 'Backend Developer | IT Student');
define('PORTFOLIO_PROFILE_SUBTITLE', 'Software Developer / IT Student');

define('PORTFOLIO_PUBLIC_EMAIL', 'you@example.com');
define('PORTFOLIO_PUBLIC_PHONE', '0123456789');
define('PORTFOLIO_PUBLIC_ADDRESS', 'Your Address');
define('PORTFOLIO_PUBLIC_GITHUB', 'https://github.com/your-username');
define('PORTFOLIO_PUBLIC_FACEBOOK', 'https://facebook.com/your-profile');
define('PORTFOLIO_PUBLIC_MAP_EMBED', 'https://www.google.com/maps/embed?pb=...');

define('PORTFOLIO_CONTACT_TO', 'you@example.com');

// Optional SMTP fallback (nếu KHÔNG dùng plugin WP Mail SMTP)
define('PORTFOLIO_SMTP_USER', 'you@gmail.com');
define('PORTFOLIO_SMTP_PASS', 'your-app-password');
define('PORTFOLIO_SMTP_HOST', 'smtp.gmail.com');
define('PORTFOLIO_SMTP_PORT', '587');
define('PORTFOLIO_SMTP_SECURE', 'tls');
define('PORTFOLIO_SMTP_FROM', 'you@gmail.com');
define('PORTFOLIO_SMTP_FROM_NAME', 'Your Portfolio');
```

## 2) Nếu dùng plugin WP Mail SMTP

- Có thể **bỏ trống** các biến `PORTFOLIO_SMTP_*`.
- Chỉ cần cấu hình trong plugin WP Mail SMTP.

## 3) Trước khi đẩy Git

- Không commit mật khẩu/app password.
- Không commit email/sđt cá nhân nếu repo public.
- Dùng giá trị placeholder trong code, giữ thông tin thật ở `wp-config.php` trên server.

## 4) Sau khi cập nhật

- Vào trang Contact gửi thử form.
- Nếu chưa đổi giao diện, hard refresh: `Ctrl + F5`.
- Nếu permalink lỗi, vào **Settings > Permalinks** và bấm **Save Changes**.
