# SIMAS
adalah sebuah sistem informasi yang digunakan untuk membantu dalam mengarsipkan surat. Fitur Sistem Informasi Manajemen Arsip Surat yaitu manajemen surat mulai dari surat masuk, surat keluar, laporan surat keluar dan masuk. SIMAS di kembangankan menggunakan [YII Framework](https://www.yiiframework.com/).

Aplikasi ini merupakan versi _clone_ dari https://github.com/kangbaim/SIMAS.

# Instalasi
- Di folder `htdocs` buat folder baru `simas`
- _clone_ repository ini di folder `simas`
  ```
  git clone https://github.com/madesaguna/SIMAS.git
  ```
- jalankan _composer_ untuk menginstall modul
  ```
  composer install
  ```
- kopi semua berkas di folder `env` di folder `config` dan edit file sesuai kebutuhan
  ```
    ...
    '@frontWeb' => 'path/to/web',
    ...
  ```
- Akses aplikasi di URL:

  [http://localhost/simas/web/](http://localhost/simas/web/)

### Credential
```
username: ibrahim
pasword: 123456
```

