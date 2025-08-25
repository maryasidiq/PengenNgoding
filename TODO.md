# Rencana Mengembalikan Sistem Sebelum Tabel Kategori

## File yang Perlu Dihapus:

-   [ ] database/migrations/2025_08_22_025631_create_categories_table.php
-   [ ] app/Models/Category.php
-   [ ] app/Http/Controllers/Admin/AdminCategoryController.php
-   [ ] app/Helpers/CategoryHelper.php
-   [ ] resources/views/admin/category/ (seluruh folder)

## File yang Perlu Diubah:

-   [ ] routes/web.php - Hapus rute kategori
-   [ ] resources/views/admin/artikel/create.blade.php - Ganti select dengan input text
-   [ ] resources/views/admin/artikel/edit.blade.php - Ganti select dengan input text
-   [ ] resources/views/admin/tips/create.blade.php - Ganti select dengan input text
-   [ ] resources/views/admin/tips/edit.blade.php - Ganti select dengan input text
-   [ ] resources/views/admin/video/create.blade.php - Ganti select dengan input text
-   [ ] resources/views/admin/video/edit.blade.php - Ganti select dengan input text
-   [ ] resources/views/admin/portofolio/create.blade.php - Ganti select dengan input text
-   [ ] resources/views/admin/portofolio/edit.blade.php - Ganti select dengan input text

## Progress:

-   Mulai implementasi: [timestamp]
