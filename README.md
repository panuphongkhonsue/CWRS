**ข้อ 2-6 ทำแค่ครั้งแรกครั้งเดียว ครั้งต่อ ๆ ไป เปิดโปรเจกต์แล้ว serve ได้เลย

1. เปิดโปรเจกต์ใน vs code (ผ่าน github desktop)

2. พิมพ์คำสั่ง composer install

3. เปิด admin ของ mysql ใน xampp

4. กด +New สร้าง Schema ใหม่ชื่อว่า welfare_reimbursement (ถ้ามีอยู่แล้วข้ามไปเลย)

5. พิมพ์คำสั่ง php artisan migrate --path=database/migrations/migrate_here
	6.1 ถ้า 6 ไม่ผ่าน พิมพ์คำสั่ง php artisan migrate:refresh --path=database/migrations/migrate_here

6. พิมพ์คำสั่ง php artisan db:seed

7. เปิดเซิฟด้วยคำสั่ง php artisan serve
