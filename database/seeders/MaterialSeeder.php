<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas1 = Classroom::where('name', 'Kelas 1')->first();
        $kelas2 = Classroom::where('name', 'Kelas 2')->first();

        if ($kelas1) {
            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Belajar Membaca: Huruf A, B, C',
                'material' => '<p>Hari ini kita akan belajar mengenal huruf <strong>A</strong>, <strong>B</strong>, dan <strong>C</strong>.</p><ul><li>A untuk Apel</li><li>B untuk Bola</li><li>C untuk Cicak</li></ul>',
                'thumbnail' => 'thumbnails/belajar-abc.jpg',
                'file_path' => 'materials/belajar-abc.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Berhitung Angka 1 sampai 5',
                'material' => '<p>Mari kita berhitung bersama-sama!</p><p>Satu, Dua, Tiga, Empat, Lima.</p><p>Lihat, ada 5 jari di tanganmu!</p>',
                'thumbnail' => 'thumbnails/berhitung.jpg',
                'file_path' => 'materials/berhitung.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Mengenal Warna Primer',
                'material' => '<p>Ada tiga warna dasar yang harus kamu tahu:</p><ol><li>Merah (seperti api)</li><li>Kuning (seperti matahari)</li><li>Biru (seperti langit)</li></ol>',
                'thumbnail' => 'thumbnails/warna.jpg',
                'file_path' => 'materials/warna.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Bentuk Geometri Dasar',
                'material' => '<p>Mari belajar mengenal bentuk-bentuk dasar di sekitarmu:</p><ul><li>Lingkaran - seperti bola</li><li>Persegi - seperti jendela</li><li>Segitiga - seperti atap rumah</li></ul>',
                'thumbnail' => 'thumbnails/geometri.jpg',
                'file_path' => 'materials/geometri.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Hewan di Sekitar Kita',
                'material' => '<p>Tahukah kamu hewan apa saja yang ada di sekitar rumah?</p><ul><li>Kucing suka bermain</li><li>Ayam berkokok di pagi hari</li><li>Ikan berenang di air</li></ul>',
                'thumbnail' => 'thumbnails/hewan.jpg',
                'file_path' => 'materials/hewan.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Belajar Etika di Sekolah',
                'material' => '<p>Etika itu penting, anak-anak!</p><ul><li>Mengucapkan salam saat datang</li><li>Mendengarkan guru dengan sopan</li><li>Menghormati teman</li></ul>',
                'thumbnail' => null,
                'file_path' => null,
            ]);

            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Menulis Nama Sendiri',
                'material' => '<p>Coba tulis nama kamu di buku tulis. Gunakan huruf besar di awal!</p><p>Contoh: <strong>Budi</strong>, <strong>Siti</strong>.</p>',
                'thumbnail' => null,
                'file_path' => null,
            ]);

            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Belajar Shalat dan Doa Harian',
                'material' => '<p>Kita belajar membaca doa sebelum tidur:</p><blockquote>"Bismika Allahumma ahya wa bismika amut"</blockquote><p>Artinya: Dengan nama-Mu ya Allah aku hidup dan dengan nama-Mu aku mati.</p>',
                'thumbnail' => null,
                'file_path' => null,
            ]);

            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Mengenal Alat Musik',
                'material' => '<p>Beberapa alat musik yang sering kamu dengar:</p><ul><li>Gitar - dipetik</li><li>Drum - dipukul</li><li>Pianika - ditiup dan ditekan</li></ul>',
                'thumbnail' => null,
                'file_path' => null,
            ]);

            Material::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Cuaca dan Musim di Indonesia',
                'material' => '<p>Indonesia memiliki dua musim utama:</p><ul><li>Musim Hujan - biasanya banyak mendung dan turun hujan</li><li>Musim Kemarau - cuaca panas dan cerah</li></ul><p>Jangan lupa pakai payung saat hujan ya!</p>',
                'thumbnail' => null,
                'file_path' => null,
            ]);
        }

        if ($kelas2) {
            Material::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Belajar Membaca: Huruf A, B, C | Kelas 2',
                'material' => '<p>Hari ini kita akan belajar mengenal huruf <strong>A</strong>, <strong>B</strong>, dan <strong>C</strong>.</p><ul><li>A untuk Apel</li><li>B untuk Bola</li><li>C untuk Cicak</li></ul>',
                'thumbnail' => 'thumbnails/belajar-abc.jpg',
                'file_path' => 'materials/belajar-abc.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Berhitung Angka 1 sampai 5 | Kelas 2',
                'material' => '<p>Mari kita berhitung bersama-sama!</p><p>Satu, Dua, Tiga, Empat, Lima.</p><p>Lihat, ada 5 jari di tanganmu!</p>',
                'thumbnail' => 'thumbnails/berhitung.jpg',
                'file_path' => 'materials/berhitung.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Mengenal Warna Primer | Kelas 2',
                'material' => '<p>Ada tiga warna dasar yang harus kamu tahu:</p><ol><li>Merah (seperti api)</li><li>Kuning (seperti matahari)</li><li>Biru (seperti langit)</li></ol>',
                'thumbnail' => 'thumbnails/warna.jpg',
                'file_path' => 'materials/warna.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Bentuk Geometri Dasar | Kelas 2',
                'material' => '<p>Mari belajar mengenal bentuk-bentuk dasar di sekitarmu:</p><ul><li>Lingkaran - seperti bola</li><li>Persegi - seperti jendela</li><li>Segitiga - seperti atap rumah</li></ul>',
                'thumbnail' => 'thumbnails/geometri.jpg',
                'file_path' => 'materials/geometri.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Hewan di Sekitar Kita | Kelas 2',
                'material' => '<p>Tahukah kamu hewan apa saja yang ada di sekitar rumah?</p><ul><li>Kucing suka bermain</li><li>Ayam berkokok di pagi hari</li><li>Ikan berenang di air</li></ul>',
                'thumbnail' => 'thumbnails/hewan.jpg',
                'file_path' => 'materials/hewan.pdf',
            ]);

            Material::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Belajar Etika di Sekolah | Kelas 2',
                'material' => '<p>Etika itu penting, anak-anak!</p><ul><li>Mengucapkan salam saat datang</li><li>Mendengarkan guru dengan sopan</li><li>Menghormati teman</li></ul>',
                'thumbnail' => null,
                'file_path' => null,
            ]);

            Material::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Menulis Nama Sendiri | Kelas 2',
                'material' => '<p>Coba tulis nama kamu di buku tulis. Gunakan huruf besar di awal!</p><p>Contoh: <strong>Budi</strong>, <strong>Siti</strong>.</p>',
                'thumbnail' => null,
                'file_path' => null,
            ]);

            Material::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Belajar Shalat dan Doa Harian | Kelas 2',
                'material' => '<p>Kita belajar membaca doa sebelum tidur:</p><blockquote>"Bismika Allahumma ahya wa bismika amut"</blockquote><p>Artinya: Dengan nama-Mu ya Allah aku hidup dan dengan nama-Mu aku mati.</p>',
                'thumbnail' => null,
                'file_path' => null,
            ]);

            Material::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Mengenal Alat Musik | Kelas 2',
                'material' => '<p>Beberapa alat musik yang sering kamu dengar:</p><ul><li>Gitar - dipetik</li><li>Drum - dipukul</li><li>Pianika - ditiup dan ditekan</li></ul>',
                'thumbnail' => null,
                'file_path' => null,
            ]);

            Material::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Cuaca dan Musim di Indonesia | Kelas 2',
                'material' => '<p>Indonesia memiliki dua musim utama:</p><ul><li>Musim Hujan - biasanya banyak mendung dan turun hujan</li><li>Musim Kemarau - cuaca panas dan cerah</li></ul><p>Jangan lupa pakai payung saat hujan ya!</p>',
                'thumbnail' => null,
                'file_path' => null,
            ]);
        }
    }
}