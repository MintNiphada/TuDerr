TuDerr is an online course management system designed to help students find suitable courses and manage their learning progress.

## ต้องมี

1. Xampp
2. Composer
check: composer -v
3. node js

## Step
1. clone project
2. cd tuderr
3. composer install
4. cp .env.example .env
5. php artisan key:generate
6. เปิด xampp, start MySQL เข้า Admin แล้วสร้าง database ชื่ออะไรก็ได้
7. ตั้งค่า database ใน .env เอา # ออกให้หมด แล้ว DB_DATABASE=ตามชื่อที่สร้าง
8. php artisan migrate
9. npm install
10. npm run dev
11. php artisan serve แล้วลองเปิดเว็บ http://127.0.0.1:8000 เช็คดู
