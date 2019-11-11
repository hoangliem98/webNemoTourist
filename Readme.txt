Máy ảo VMWARE 15.1.0 build-13591040 để demo trang web 

B1: Cài đặt Xampp. Tải xampp tại https://www.apachefriends.org/download.html
B2: Copy thư  mục MyLaravel(giải nén sourecode) dán vào thư mục xampp\htdocs
B3: Mở xampp-control.exe -> Khởi động Apache và MySQL(Khi sử dụng máy ảo chỉ cần làm bước này trước khi truy cập B5, B6 bỏ qua B1, B2, B4 vì đã cài đạt Xampp)
B4: Truy cập http://localhost/phpmyadmin/ -> Tạo mới cơ sở (*đặt tên demotour) dữ liệu với mã hóa utf8_general_ci -> Nhập (Import) cơ sở dữ liệu demotour

B5: Truy cập localhost/MyLaravel/public/admin/login và đăng nhập để sử dụng trang admin
B6: Truy cập localhost/MyLaravel/public/home để sử dụng người dùng

User admin: ou@ou.edu.vn. Password: daihocmo

Xampp v3.2.4

phpMyAdmin 4.9.0.1