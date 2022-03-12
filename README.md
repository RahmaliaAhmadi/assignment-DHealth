# assignment-DHealth

Tata Cara Instalasi :
1. Cloning Dari Github https://github.com/RahmaliaAhmadi/assignment-DHealth.git
2. Setelah Selesai Di github Pada File .env, Ubah bagian Berikut :
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=dhealth-test
	DB_USERNAME=root
	DB_PASSWORD=
3. Composer Install
4. Import Sql dhealth-test.sql pada database
5. Buka Terminal Jalankan Aplikasi Dengan Perintah "php artisan serve"
6. Buka Browser lalu ketikan localhost:8000

Tata Cara Penggunaan Aplikasi
1. Ada 2 cara Login Aplikasi ,
a. Bisa Dengan Mendaftar Terlebih Dahulu 
b. Langsung Login Dengan Akun :
   Username : rahma@gmail.com
   Password : rahma
2. Pilih Menu Transaksi
3. Pilih Menu Create Untuk Menginput Resep Obat
4. Pada Halaman Penginputan Bisa Memilih Tipe Racikan/Non Racikan Dengan Cara Mengklik Checkbox Typenya
5. Isikan Form Yang Telah Tersedia
6. Jika sudah Terisi Bisa Mengklik Tombol Save, dan data berhasil di simpan
7. di halaman list data resep Terdapat Button Delete Untuk Menghapus data Dengan Cara :
a. Klik Checkbox data Yang akan di hapus
b. Klik Delete
8. Terdapat Button Cetak Resep Yang apabila di klik akan mengarah ke new tab dan bisa di simpan

