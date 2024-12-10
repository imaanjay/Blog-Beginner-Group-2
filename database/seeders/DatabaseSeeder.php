<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Article;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Tentukan path sumber dan tujuan  
        $sourcePath = public_path('post-img'); // Folder di public  
        $destinationPath = storage_path('app/public/post-image'); // Folder di storage  

        // Pastikan folder tujuan ada  
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true);
        }

        // Ambil semua file dari folder sumber  
        $files = File::files($sourcePath);

        foreach ($files as $file) {
            // Dapatkan nama file  
            $fileName = $file->getFilename();

            // Pindahkan file ke folder tujuan  
            File::copy($file->getPathname(), $destinationPath . '/' . $fileName);

            // Jika Anda ingin menyimpan informasi file ke database, lakukan di sini  
            // Contoh: DB::table('files')->insert(['name' => $fileName, 'path' => 'images/' . $fileName]);  
        }


        User::insert([
            [
                'name' => 'dandy',
                'email' => 'dandy@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'risma',
                'email' => 'risma@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'bilal',
                'email' => 'bilal@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Seeder untuk tabel categories  
        $categories = Category::insert([
            [
                'name' => 'Technology',
                'slug' => Str::slug('Technology'),
                'created_at' => '2024-11-30 13:00:00',
                'updated_at' => '2024-11-30 13:00:00',
            ],
            [
                'name' => 'Education',
                'slug' => Str::slug('Health'),
                'created_at' => '2024-11-30 13:00:00',
                'updated_at' => '2024-11-30 13:00:00',
            ],
            [
                'name' => 'Lifestyle',
                'slug' => Str::slug('Lifestyle'),
                'created_at' => '2024-11-30 13:00:00',
                'updated_at' => '2024-11-30 13:00:00',
            ],
        ]);

        // Seeder untuk tabel tags  
        $tags = Tag::insert([
            [
                'name' => 'PHP',
                'slug' => Str::slug('PHP'),
                'created_at' => '2024-11-30 13:00:00',
                'updated_at' => '2024-11-30 13:00:00',
            ],
            [
                'name' => 'Laravel',
                'slug' => Str::slug('Laravel'),
                'created_at' => '2024-11-30 13:00:00',
                'updated_at' => '2024-11-30 13:00:00',
            ],
            [
                'name' => 'Health',
                'slug' => Str::slug('Health'),
                'created_at' => '2024-11-30 13:00:00',
                'updated_at' => '2024-11-30 13:00:00',
            ],
            [
                'name' => 'Idol',
                'slug' => Str::slug('Idol'),
                'created_at' => '2024-11-30 13:00:00',
                'updated_at' => '2024-11-30 13:00:00',
            ],
            [
                'name' => 'JKT48',
                'slug' => Str::slug('JKT48'),
                'created_at' => '2024-11-30 13:00:00',
                'updated_at' => '2024-11-30 13:00:00',
            ],
        ]);

        // Seeder untuk tabel articles  
        $articles = Article::insert([
            [
                'title' => 'Introduction to PHP',
                'slug' => Str::slug('Introduction to PHP'),
                'full_text' => 'PHP is a popular general-purpose scripting language...',
                'excerpt' => 'An introduction to PHP.',
                'image' => 'post-image/php.jpg',
                'user_id' => 1, // ID user yang sesuai  
                'category_id' => 1, // ID kategori yang sesuai  
                'created_at' => '2024-12-01 13:00:00',
                'updated_at' => '2024-12-01 13:00:00',
            ],
            [
                'title' => 'Health Benefits of Yoga',
                'slug' => Str::slug('Health Benefits of Yoga'),
                'full_text' => 'Yoga is an ancient practice that offers numerous health benefits...',
                'excerpt' => 'Exploring the benefits of yoga.',
                'image' => 'post-image/yoga.jpg',
                'user_id' => 2, // ID user yang sesuai  
                'category_id' => 3, // ID kategori yang sesuai  
                'created_at' => '2024-12-02 13:00:00',
                'updated_at' => '2024-12-02 13:00:00',
            ],
            [
                'title' => 'Zee Resmi Lulus dari JKT48',
                'slug' => Str::slug('Zee Resmi Lulus dari JKT48'),
                'full_text' => '<div>
Jakarta - Azizi Asadel atau akrab disapa Zee JKT48 resmi lulus dari JKT48. Upacara kelulusan Zee digelar lewat pertunjukan Aturan Anti Cinta.
Acara itu digelar di Teater JKT48, Jakarta Pusat, Minggu (25/8/2024). Momen ini jadi trending di media sosial.
<br>
Lewat akun X Official JKT48, diumumkan upacara kelulusan Zee JKT48. Manajemen memberi dukungan untuk putri presenter Akhmad Fadli dan Nur Ayu Chesty Maharani itu.
<br>
"Meskipun kita akan menjalani jalan kita masing-masin, kami berharap kebaikan dan kebahagiaan selalu menyertai langkahmu," tulis @official JKT48.
<br>
"Terima kasih untuk setiap momen indah yang kita lalui bersama. Semoga di luar sana semangatmu tetap meletup-letup, Zee!" dukungan yang diberikan tim JKT48.
<br>
Dilihat dari channel YouTube JKT4, terlihat Zee menurunkan kabesha atau foto dirinya yang terpajang di Teater JKT48.
<br>
Zee terlihat memakai gaun panjang berwarna hitam lengkap dengan mahkota. Dia sendiri yang menurunkan fotonya di antara deretan foto para member.
<br>
Sambil mendekap kabesha atau pigura fotonya, Zee mengucapkan terima kasih untuk dukungan yang didapat dari JKT48 selama ini.
<br>
"Halo semuanya.... Aku mau berterima kasih banyak atas dukungannya selama ini di JKT48. Sampai bertemu lagi di lain waktu, izin pamit dari JKT48 ya. Mohon dukungannya selalu untuk JKT48 dan juga aku. Terima kasih," ucap Zee sambil membungkukkan tubuhnya.
<br>
Zee bergabung dengan JKT48 karena diceburkan oleh ibunda untuk mengikuti audisi karena dirinya yang dinilai tomboi. Zee masuk sebagai anggota Akademi Kelas B.
<br>
Perempuan berusia 20 tahun itu, kemudian dipromosikan masuk kelas A pada 28 Oktober 2018. Setahun kemudian, ia bergabung di Tim J.
<br>
Zee mempunyai jikoshoukai atau cara memperkenalkan dirinya, yaitu \'Si gadis tomboi yang semangatnya meletup-letup! Halo semuanya, aku Zee\'.
<br>
Selama berkarier di JKT48, Zee didapuk tampil solo dengan membawakan lagu Eureka Milik Kita, sambil memainkan gitar.
<br>
Popularitas Zee makin moncer setelah debut akting pada 2022 dalam film Kalian Pasti Mati yang di-remake dari film Korea Selatan berjudul, Mourning Grave. Sampai akhirnya pada April 2023, Zee menjadi bintang utama dalam film Ancika 1995 dan Ancika: Dia yang Bersamaku di Tahun 1995.
<div>',
                'excerpt' => 'Azizi Asadel atau akrab disapa Zee JKT48 resmi lulus dari JKT48. Upacara kelulusan Zee digelar lewat pertunjukan Aturan Anti Cinta.
Acara itu digelar di Teater JKT48, Jakarta Pusat, Minggu (25/8/2024). Momen ini jadi trending di media sosial.
<br>',
                'image' => 'post-image/zee.jpg',
                'user_id' => 1, // ID user yang sesuai  
                'category_id' => 3, // ID kategori yang sesuai  
                'created_at' => '2024-12-02 13:00:00',
                'updated_at' => '2024-12-02 13:00:00',
            ],
        ]);

        // Seeder untuk tabel article_tags  
        DB::table('article_tags')->insert([
            [
                'article_id' => 1, // ID artikel yang sesuai  
                'tag_id' => 1, // ID tag yang sesuai  
                'created_at' => '2024-12-01 13:00:00',
                'updated_at' => '2024-12-01 13:00:00',
            ],
            [
                'article_id' => 1,
                'tag_id' => 2,
                'created_at' => '2024-12-01 13:00:00',
                'updated_at' => '2024-12-01 13:00:00',
            ],
            [
                'article_id' => 2,
                'tag_id' => 3,
                'created_at' => '2024-12-02 13:00:00',
                'updated_at' => '2024-12-02 13:00:00',
            ],
            [
                'article_id' => 3,
                'tag_id' => 4,
                'created_at' => '2024-12-02 13:00:00',
                'updated_at' => '2024-12-02 13:00:00',
            ],
            [
                'article_id' => 3,
                'tag_id' => 5,
                'created_at' => '2024-12-02 13:00:00',
                'updated_at' => '2024-12-02 13:00:00',
            ],
        ]);
    }
}
