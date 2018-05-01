Marketplace
โดยกลุ่ม I love music so much
ขั้นตอนการติดตั้ง
1. หลังจากที่ Download file มาจาก github แล้ว ให้ทำการแยก file ไปวางไว้ที่ ที่เราต้องการ 
2. ทำการเปิดโปรแกรม xampp โดย Start Apache และ MySQL
3. ให้สร้าง Database ที่ชื่อ market แล้วเลือก Collation เป็น UTF8mb4-unicode-ci
5. ทำการ Import Database จากไฟล์ชื่อ market.sql
6. เมื่อทำการติดตั้งเสร้จสิ้นให้ทำการเข้าไปในตารางที่ชื่อ market แล้วทำการกดไปที่ Privileges แล้วกด Add user account เพื่อสร้าง user ขึ้นมา และการอนุญาติ ดังนี้
6.1 Admin สามารถทำได้ทุกอย่างในระบบ ให้ทำการสร้าง Admin โดยมี ID และ Password คือ ID: admin และ Password: password เลือก Hostname เป็น localhost และทำการ Grant ให้มีสามารถทำได้ทุกอย่างในระบบ
6.2 User เป็นผู้ใช้งานในระบบ ให้ทำการสร้าง User โดยให้มี ID และ Password คือ ID: user1 และ Password: user1 เลือก Hostname เป็น localhost และทำการ Grant ให้มีความสามารถคือ SELECT, INSERT, UPDATE และ DELETE คือสามารถดูข้อมูลตลาดต่างๆ ทำการสร้างตลาด เข้าร่วมตลาด และตั้งกระทู้ต่างๆได้ รวมถึงสามารถดูว่าตนเองสร้างตลาดอะไร และมีใครเข้ามาจองตลาดที่สร้างขึ้น
6.3 Guest เป็นผู้ใช้งานที่ไม่อยู่ในระบบ หรือในฐานข้อมููล ให้ทำการสร้าง Guest โดยให้มี ID และ Password คือ ID: guest และ Password: ไม่ต้องใส่ เลือก Hostname เป็น localhost และทำการ Grant ให้มีความสามารถคือ SELECT และ INSERT คือสามารถดูข้อมูลตลาดต่างๆ ได้และสมัครสมาชิกเพื่อทำการเข้าสู่ระบบได้
7.แก้ไขที่ไฟล์ .env ในโฟลเดอร์  Marketplace ในส่วนของ  DB_DATABASE=the_marketplace  DB_USERNAME  และ  DB_PASSWORD ใส่ตามกรณีที่เราต้องการเข้าถึง เช่น  Admin ให้ใส่ DB_USERNAME=admin และ DB_PASSWORD=password

เริ่มการทำงาน
1. ทำการเปิด Command Prompt (CMD)
2. cd ไปที่โปรเจค
3. พิมพ์คำสั่ง php artisan storage:link
4. พิมพ์คำสั่ง php artisan serve
5. เข้าไปที่ 127.0.0.1:8000
6. สามารถใช้งานเว็บได้ปกติ

ความสามารถของระบบ
1. สร้างตลาด
2. สร้างกระทู้ของเว็บบอร์ด
3. จองตลาดเพื่อทำการขายของ
4. แสดงตลาดที่ใกล้จะเปิด
5. แสดงตลาดที่มียอดดูมากที่สุด
6. ค้นหาตลาด
7. เช็คอินตลาดที่ได้จองไว้
8. ส่ง E-mail และสร้าง PDF
