# Student Management System - Laravel Project

## 👤 Thông tin sinh viên:
- Họ và tên: Tiêu Hải Nam  
- Mã sinh viên: 23010214

## 📘 Mô tả dự án:
Đây là dự án quản lý học sinh được phát triển bằng Laravel phục vụ bài kiểm tra giữa kỳ môn Lập trình Web.

### ✅ Các chức năng chính:
1. Sử dụng **Laravel UI** để triển khai chức năng xác thực (đăng ký / đăng nhập).
2. Gồm các thực thể chính:
   - `Student`: Thông tin học sinh
   - `Teacher`: Thông tin giáo viên
   - `Class`: Lớp học
3. Hệ thống hỗ trợ đầy đủ các chức năng:
   - **CRUD** học sinh và giáo viên
   - **Giao diện đẹp, dễ sử dụng**
4. Đảm bảo đầy đủ các yếu tố **bảo mật**:
   - CSRF Token
   - XSS Protection
   - SQL Injection Prevention
   - Middleware bảo vệ route
5. Sử dụng:
   - **Eloquent ORM**
   - **Migration**, **Seeding**
   - **Auth Scaffold** từ Laravel UI

## 🛠 Hướng dẫn chạy dự án:
```bash
git clone https://github.com/khanhlinh107/studentManagement.git
public aiven: https://console.aiven.io/account/a540f2d0eaf3/project/studentmanagement123/services/mysql-35231c0e/databases
public link(codespaces): https://silver-tribble-69wxqxxg7vjq2rxp9-5173.app.github.dev/
Link video demo: https://youtu.be/8a1BNCHEG20
cd C:\xampp\htdocs\studentManagement
composer install
npm install && npm run dev   # Nếu có
Test thử:
+ Student: tester@gmail.com; pass: 123456789
+ Teacher: thaynam@gmail.com; pass: 123456789