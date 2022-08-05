## Kebutuhan aplikasi;
- PHP versi >8.0
- MySQL
- composer
- internet

## Deskripsi
- crud data poli
- crud data pegawai
- crud data jadwal dokter + export data ke pdf

## cara install
- clone github
- install package lewat composer dengan command composer install
- copy env.example me jadi .env
- setup database di .env
- run command php artisan key:generate untuk kunci encrypt aplikasi
- migrate data dengan command php artisan migrate:fresh --seed
- sambungkan storage dengan symlink dengan menjalankan command php artisan storage:link
- langkah terakhir run command php artisan serve 
- biasanya aplikasi alan berjalan ke http://localhost:8000
