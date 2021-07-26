# CodeIgniter 4 Framework

## ขั้นตอนการติดตั้ง
git clone https://gitlab.com/srayuth/exam-synerry.git

จากนั้น ลง vender
composer install

เชื่อม db import จากไฟล์ schema.sql

แก้ไข app/Config/Database.php ให้เป็นไปตาม ของระบบ
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => 'root',
		'database' => 'exam',

รันงาน 
php spark serve

เปิด เว็บ เข้าไปดู 

http://localhost:8080