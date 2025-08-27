# TODO - Implementasi Enkripsi Tautan Lengkap

## Progress yang Akan Diselesaikan:

### 🔄 Admin Controllers - Konversi ke Enkripsi Penuh

-   [sudah] `AdminArtikelController.php` - ubah semua metode untuk menggunakan enkripsi
-   [ ] `AdminTipsController.php` - ubah semua metode untuk menggunakan enkripsi
-   [ ] `AdminVideoController.php` - ubah semua metode untuk menggunakan enkripsi
-   [ ] `AdminPortofolioController.php` - ubah semua metode untuk menggunakan enkripsi
-   [ ] `AdminClientController.php` - ubah semua metode untuk menggunakan enkripsi
-   [ ] `AdminCategoryController.php` - ubah semua metode untuk menggunakan enkripsi
-   [ ] `AdminTestimoniController.php` - ubah semua metode untuk menggunakan enkripsi

### 🔄 Routes - Update Parameter

-   [ ] `routes/web.php` - ubah parameter routes admin untuk menerima encrypted IDs

### 🔄 Admin Views - Update Links

-   [ ] Perbarui semua tampilan admin untuk menggunakan `encrypt($id)`

## Rencana Implementasi:

### 1. Ubah Admin Controllers:

-   Ganti route model binding dengan parameter manual
-   Tambahkan `Crypt::decrypt()` di semua metode
-   Tambahkan error handling dengan `DecryptException`

### 2. Ubah Routes:

-   Ubah parameter dari `{artikel}` menjadi `{encryptedId}` atau similar
-   Pastikan konsistensi naming

### 3. Ubah Admin Views:

-   Update semua links untuk menggunakan `encrypt($model->id)`

## Keamanan:

-   Enkripsi menggunakan fitur bawaan Laravel
-   Error handling yang tepat untuk tautan tidak valid
-   Konsistensi antara frontend dan admin

## Testing:

-   Test semua CRUD operations
-   Test error handling untuk tautan invalid
-   Test pagination dan links
