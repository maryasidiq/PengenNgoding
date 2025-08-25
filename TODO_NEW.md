# Rencana Mengembalikan Sistem Sebelum Tabel Kategori (Revisi)

## Perubahan Rencana:

-   Tetap pertahankan dropdown kategori
-   Hapus sistem tabel kategori terpisah
-   Kembali ke sistem kategori langsung di masing-masing tabel
-   Buat helper baru untuk mendapatkan kategori langsung dari tabel

## File yang Perlu Dihapus:

-   [x] database/migrations/2025_08_22_025631_create_categories_table.php

## File yang Perlu Diubah:

-   [ ] routes/web.php - Hapus rute kategori
-   [ ] app/Helpers/CategoryHelper.php - Ubah untuk ambil kategori langsung dari tabel
-   [ ] resources/views/admin/artikel/create.blade.php - Pastikan menggunakan helper yang baru
-   [ ] resources/views/admin/artikel/edit.blade.php - Pastikan menggunakan helper yang baru
-   [ ] resources/views/admin/tips/create.blade.php - Pastikan menggunakan helper yang baru
-   [ ] resources/views/admin/tips/edit.blade.php - Pastikan menggunakan helper yang baru
-   [ ] resources/views/admin/video/create.blade.php - Pastikan menggunakan helper yang baru
-   [ ] resources/views/admin/video/edit.blade.php - Pastikan menggunakan helper yang baru
-   [ ] resources/views/admin/portofolio/create.blade.php - Pastikan menggunakan helper yang baru
-   [ ] resources/views/admin/portofolio/edit.blade.php - Pastikan menggunakan helper yang baru

## Progress:

-   Mulai implementasi: [timestamp]
-   Migration categories dihapus
-   Rencana diperbarui: tetap pertahankan dropdown kategori
