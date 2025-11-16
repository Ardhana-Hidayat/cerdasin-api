<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kelas1 = Classroom::where('name', 'Kelas 1')->first();
        $kelas2 = Classroom::where('name', 'Kelas 2')->first();

        if ($kelas1) {

            $quiz1 = Quiz::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Kuis Penjumlahan Dasar',
                'description' => 'Tes pemahaman penjumlahan angka 1–10.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz1->id,
                    'question' => 'Berapa hasil dari 2 + 3?',
                    'option_a' => '4',
                    'option_b' => '5',
                    'option_c' => '6',
                    'option_d' => '7',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz1->id,
                    'question' => '1 + 6 = ...',
                    'option_a' => '6',
                    'option_b' => '7',
                    'option_c' => '8',
                    'option_d' => '9',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz1->id,
                    'question' => '5 + 2 = ...',
                    'option_a' => '6',
                    'option_b' => '7',
                    'option_c' => '8',
                    'option_d' => '9',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz2 = Quiz::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Kuis Pengurangan Dasar',
                'description' => 'Tes pengurangan angka kecil untuk pemula.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz2->id,
                    'question' => '5 - 2 = ...',
                    'option_a' => '2',
                    'option_b' => '3',
                    'option_c' => '4',
                    'option_d' => '5',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz2->id,
                    'question' => '8 - 3 = ...',
                    'option_a' => '4',
                    'option_b' => '5',
                    'option_c' => '6',
                    'option_d' => '7',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz2->id,
                    'question' => '10 - 7 = ...',
                    'option_a' => '2',
                    'option_b' => '3',
                    'option_c' => '4',
                    'option_d' => '5',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz3 = Quiz::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Kuis Warna dan Bentuk',
                'description' => 'Mengenal warna primer dan bentuk dasar.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz3->id,
                    'question' => 'Warna merah, kuning, dan biru disebut ...',
                    'option_a' => 'Warna sekunder',
                    'option_b' => 'Warna primer',
                    'option_c' => 'Warna netral',
                    'option_d' => 'Warna pelangi',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz3->id,
                    'question' => 'Bola termasuk bentuk ...',
                    'option_a' => 'Persegi',
                    'option_b' => 'Lingkaran',
                    'option_c' => 'Segitiga',
                    'option_d' => 'Persegi panjang',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz3->id,
                    'question' => 'Langit biasanya berwarna ...',
                    'option_a' => 'Biru',
                    'option_b' => 'Hijau',
                    'option_c' => 'Kuning',
                    'option_d' => 'Hitam',
                    'correct_answer' => 'a',
                ],
            ]);

            $quiz4 = Quiz::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Kuis Huruf dan Membaca',
                'description' => 'Tes pengenalan huruf dasar.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz4->id,
                    'question' => 'Huruf pertama dalam abjad adalah ...',
                    'option_a' => 'B',
                    'option_b' => 'A',
                    'option_c' => 'C',
                    'option_d' => 'Z',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz4->id,
                    'question' => 'Huruf setelah D adalah ...',
                    'option_a' => 'E',
                    'option_b' => 'F',
                    'option_c' => 'C',
                    'option_d' => 'G',
                    'correct_answer' => 'a',
                ],
                [
                    'quiz_id' => $quiz4->id,
                    'question' => 'Huruf sebelum C adalah ...',
                    'option_a' => 'A',
                    'option_b' => 'B',
                    'option_c' => 'D',
                    'option_d' => 'E',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz5 = Quiz::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Kuis Hewan dan Tumbuhan',
                'description' => 'Mengenal hewan dan tumbuhan di sekitar kita.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz5->id,
                    'question' => 'Hewan yang bisa terbang adalah ...',
                    'option_a' => 'Ayam',
                    'option_b' => 'Burung',
                    'option_c' => 'Kucing',
                    'option_d' => 'Ikan',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz5->id,
                    'question' => 'Pohon menghasilkan ... untuk kita bernapas.',
                    'option_a' => 'Oksigen',
                    'option_b' => 'Air',
                    'option_c' => 'Minyak',
                    'option_d' => 'Batu',
                    'correct_answer' => 'a',
                ],
                [
                    'quiz_id' => $quiz5->id,
                    'question' => 'Hewan yang hidup di air adalah ...',
                    'option_a' => 'Ikan',
                    'option_b' => 'Kelinci',
                    'option_c' => 'Burung',
                    'option_d' => 'Kucing',
                    'correct_answer' => 'a',
                ],
            ]);

            $quiz6 = Quiz::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Kuis Cuaca dan Musim',
                'description' => 'Belajar mengenal cuaca dan musim di Indonesia.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz6->id,
                    'question' => 'Indonesia memiliki berapa musim utama?',
                    'option_a' => '2',
                    'option_b' => '3',
                    'option_c' => '4',
                    'option_d' => '5',
                    'correct_answer' => 'a',
                ],
                [
                    'quiz_id' => $quiz6->id,
                    'question' => 'Musim hujan ditandai dengan ...',
                    'option_a' => 'Panas terik',
                    'option_b' => 'Sering turun hujan',
                    'option_c' => 'Salju turun',
                    'option_d' => 'Daun berguguran',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz6->id,
                    'question' => 'Saat musim kemarau, biasanya cuaca terasa ...',
                    'option_a' => 'Dingin',
                    'option_b' => 'Panas',
                    'option_c' => 'Lembab',
                    'option_d' => 'Berangin',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz7 = Quiz::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Kuis Kebersihan dan Etika',
                'description' => 'Belajar menjaga kebersihan diri dan lingkungan.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz7->id,
                    'question' => 'Kita harus mencuci tangan sebelum ...',
                    'option_a' => 'Makan',
                    'option_b' => 'Tidur',
                    'option_c' => 'Belajar',
                    'option_d' => 'Main',
                    'correct_answer' => 'a',
                ],
                [
                    'quiz_id' => $quiz7->id,
                    'question' => 'Sampah harus dibuang ke ...',
                    'option_a' => 'Tanah kosong',
                    'option_b' => 'Tempat sampah',
                    'option_c' => 'Jalan',
                    'option_d' => 'Sungai',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz7->id,
                    'question' => 'Jika teman berbicara, kita harus ...',
                    'option_a' => 'Berteriak',
                    'option_b' => 'Mendengarkan',
                    'option_c' => 'Pergi',
                    'option_d' => 'Memotong pembicaraan',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz8 = Quiz::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Kuis Anggota Tubuh',
                'description' => 'Mengenal fungsi bagian-bagian tubuh manusia.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz8->id,
                    'question' => 'Kita menggunakan mata untuk ...',
                    'option_a' => 'Berjalan',
                    'option_b' => 'Melihat',
                    'option_c' => 'Mendengar',
                    'option_d' => 'Berbicara',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz8->id,
                    'question' => 'Kita mendengar menggunakan ...',
                    'option_a' => 'Mata',
                    'option_b' => 'Hidung',
                    'option_c' => 'Telinga',
                    'option_d' => 'Mulut',
                    'correct_answer' => 'c',
                ],
                [
                    'quiz_id' => $quiz8->id,
                    'question' => 'Kita berjalan menggunakan ...',
                    'option_a' => 'Tangan',
                    'option_b' => 'Kaki',
                    'option_c' => 'Mata',
                    'option_d' => 'Telinga',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz9 = Quiz::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Kuis Transportasi',
                'description' => 'Mengenal alat transportasi darat, laut, dan udara.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz9->id,
                    'question' => 'Mobil berjalan di ...',
                    'option_a' => 'Laut',
                    'option_b' => 'Udara',
                    'option_c' => 'Darat',
                    'option_d' => 'Angkasa',
                    'correct_answer' => 'c',
                ],
                [
                    'quiz_id' => $quiz9->id,
                    'question' => 'Pesawat terbang di ...',
                    'option_a' => 'Darat',
                    'option_b' => 'Air',
                    'option_c' => 'Udara',
                    'option_d' => 'Tanah',
                    'correct_answer' => 'c',
                ],
                [
                    'quiz_id' => $quiz9->id,
                    'question' => 'Kapal berlayar di ...',
                    'option_a' => 'Udara',
                    'option_b' => 'Air',
                    'option_c' => 'Tanah',
                    'option_d' => 'Hutan',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz10 = Quiz::create([
                'classroom_id' => $kelas1->id,
                'title' => 'Kuis Profesi',
                'description' => 'Mengenal berbagai macam pekerjaan di sekitar kita.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz10->id,
                    'question' => 'Dokter bekerja di ...',
                    'option_a' => 'Sekolah',
                    'option_b' => 'Rumah sakit',
                    'option_c' => 'Pasar',
                    'option_d' => 'Kebun',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz10->id,
                    'question' => 'Guru mengajar di ...',
                    'option_a' => 'Sekolah',
                    'option_b' => 'Rumah sakit',
                    'option_c' => 'Kantor polisi',
                    'option_d' => 'Pasar',
                    'correct_answer' => 'a',
                ],
                [
                    'quiz_id' => $quiz10->id,
                    'question' => 'Petani bekerja di ...',
                    'option_a' => 'Ladang atau sawah',
                    'option_b' => 'Kantor',
                    'option_c' => 'Pabrik',
                    'option_d' => 'Toko',
                    'correct_answer' => 'a',
                ],
            ]);
        }

        if ($kelas2) {

            $quiz1 = Quiz::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Kuis Penjumlahan Dasar | Kelas 2',
                'description' => 'Tes pemahaman penjumlahan angka 1–10.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz1->id,
                    'question' => 'Berapa hasil dari 2 + 3?',
                    'option_a' => '4',
                    'option_b' => '5',
                    'option_c' => '6',
                    'option_d' => '7',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz1->id,
                    'question' => '1 + 6 = ...',
                    'option_a' => '6',
                    'option_b' => '7',
                    'option_c' => '8',
                    'option_d' => '9',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz1->id,
                    'question' => '5 + 2 = ...',
                    'option_a' => '6',
                    'option_b' => '7',
                    'option_c' => '8',
                    'option_d' => '9',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz2 = Quiz::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Kuis Pengurangan Dasar | Kelas 2',
                'description' => 'Tes pengurangan angka kecil untuk pemula.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz2->id,
                    'question' => '5 - 2 = ...',
                    'option_a' => '2',
                    'option_b' => '3',
                    'option_c' => '4',
                    'option_d' => '5',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz2->id,
                    'question' => '8 - 3 = ...',
                    'option_a' => '4',
                    'option_b' => '5',
                    'option_c' => '6',
                    'option_d' => '7',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz2->id,
                    'question' => '10 - 7 = ...',
                    'option_a' => '2',
                    'option_b' => '3',
                    'option_c' => '4',
                    'option_d' => '5',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz3 = Quiz::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Kuis Warna dan Bentuk | Kelas 2',
                'description' => 'Mengenal warna primer dan bentuk dasar.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz3->id,
                    'question' => 'Warna merah, kuning, dan biru disebut ...',
                    'option_a' => 'Warna sekunder',
                    'option_b' => 'Warna primer',
                    'option_c' => 'Warna netral',
                    'option_d' => 'Warna pelangi',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz3->id,
                    'question' => 'Bola termasuk bentuk ...',
                    'option_a' => 'Persegi',
                    'option_b' => 'Lingkaran',
                    'option_c' => 'Segitiga',
                    'option_d' => 'Persegi panjang',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz3->id,
                    'question' => 'Langit biasanya berwarna ...',
                    'option_a' => 'Biru',
                    'option_b' => 'Hijau',
                    'option_c' => 'Kuning',
                    'option_d' => 'Hitam',
                    'correct_answer' => 'a',
                ],
            ]);

            $quiz4 = Quiz::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Kuis Huruf dan Membaca | Kelas 2',
                'description' => 'Tes pengenalan huruf dasar.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz4->id,
                    'question' => 'Huruf pertama dalam abjad adalah ...',
                    'option_a' => 'B',
                    'option_b' => 'A',
                    'option_c' => 'C',
                    'option_d' => 'Z',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz4->id,
                    'question' => 'Huruf setelah D adalah ...',
                    'option_a' => 'E',
                    'option_b' => 'F',
                    'option_c' => 'C',
                    'option_d' => 'G',
                    'correct_answer' => 'a',
                ],
                [
                    'quiz_id' => $quiz4->id,
                    'question' => 'Huruf sebelum C adalah ...',
                    'option_a' => 'A',
                    'option_b' => 'B',
                    'option_c' => 'D',
                    'option_d' => 'E',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz5 = Quiz::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Kuis Hewan dan Tumbuhan | Kelas 2',
                'description' => 'Mengenal hewan dan tumbuhan di sekitar kita.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz5->id,
                    'question' => 'Hewan yang bisa terbang adalah ...',
                    'option_a' => 'Ayam',
                    'option_b' => 'Burung',
                    'option_c' => 'Kucing',
                    'option_d' => 'Ikan',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz5->id,
                    'question' => 'Pohon menghasilkan ... untuk kita bernapas.',
                    'option_a' => 'Oksigen',
                    'option_b' => 'Air',
                    'option_c' => 'Minyak',
                    'option_d' => 'Batu',
                    'correct_answer' => 'a',
                ],
                [
                    'quiz_id' => $quiz5->id,
                    'question' => 'Hewan yang hidup di air adalah ...',
                    'option_a' => 'Ikan',
                    'option_b' => 'Kelinci',
                    'option_c' => 'Burung',
                    'option_d' => 'Kucing',
                    'correct_answer' => 'a',
                ],
            ]);

            $quiz6 = Quiz::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Kuis Cuaca dan Musim | Kelas 2',
                'description' => 'Belajar mengenal cuaca dan musim di Indonesia.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz6->id,
                    'question' => 'Indonesia memiliki berapa musim utama?',
                    'option_a' => '2',
                    'option_b' => '3',
                    'option_c' => '4',
                    'option_d' => '5',
                    'correct_answer' => 'a',
                ],
                [
                    'quiz_id' => $quiz6->id,
                    'question' => 'Musim hujan ditandai dengan ...',
                    'option_a' => 'Panas terik',
                    'option_b' => 'Sering turun hujan',
                    'option_c' => 'Salju turun',
                    'option_d' => 'Daun berguguran',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz6->id,
                    'question' => 'Saat musim kemarau, biasanya cuaca terasa ...',
                    'option_a' => 'Dingin',
                    'option_b' => 'Panas',
                    'option_c' => 'Lembab',
                    'option_d' => 'Berangin',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz7 = Quiz::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Kuis Kebersihan dan Etika | Kelas 2',
                'description' => 'Belajar menjaga kebersihan diri dan lingkungan.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz7->id,
                    'question' => 'Kita harus mencuci tangan sebelum ...',
                    'option_a' => 'Makan',
                    'option_b' => 'Tidur',
                    'option_c' => 'Belajar',
                    'option_d' => 'Main',
                    'correct_answer' => 'a',
                ],
                [
                    'quiz_id' => $quiz7->id,
                    'question' => 'Sampah harus dibuang ke ...',
                    'option_a' => 'Tanah kosong',
                    'option_b' => 'Tempat sampah',
                    'option_c' => 'Jalan',
                    'option_d' => 'Sungai',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz7->id,
                    'question' => 'Jika teman berbicara, kita harus ...',
                    'option_a' => 'Berteriak',
                    'option_b' => 'Mendengarkan',
                    'option_c' => 'Pergi',
                    'option_d' => 'Memotong pembicaraan',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz8 = Quiz::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Kuis Anggota Tubuh | Kelas 2',
                'description' => 'Mengenal fungsi bagian-bagian tubuh manusia.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz8->id,
                    'question' => 'Kita menggunakan mata untuk ...',
                    'option_a' => 'Berjalan',
                    'option_b' => 'Melihat',
                    'option_c' => 'Mendengar',
                    'option_d' => 'Berbicara',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz8->id,
                    'question' => 'Kita mendengar menggunakan ...',
                    'option_a' => 'Mata',
                    'option_b' => 'Hidung',
                    'option_c' => 'Telinga',
                    'option_d' => 'Mulut',
                    'correct_answer' => 'c',
                ],
                [
                    'quiz_id' => $quiz8->id,
                    'question' => 'Kita berjalan menggunakan ...',
                    'option_a' => 'Tangan',
                    'option_b' => 'Kaki',
                    'option_c' => 'Mata',
                    'option_d' => 'Telinga',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz9 = Quiz::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Kuis Transportasi | Kelas 2',
                'description' => 'Mengenal alat transportasi darat, laut, dan udara.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz9->id,
                    'question' => 'Mobil berjalan di ...',
                    'option_a' => 'Laut',
                    'option_b' => 'Udara',
                    'option_c' => 'Darat',
                    'option_d' => 'Angkasa',
                    'correct_answer' => 'c',
                ],
                [
                    'quiz_id' => $quiz9->id,
                    'question' => 'Pesawat terbang di ...',
                    'option_a' => 'Darat',
                    'option_b' => 'Air',
                    'option_c' => 'Udara',
                    'option_d' => 'Tanah',
                    'correct_answer' => 'c',
                ],
                [
                    'quiz_id' => $quiz9->id,
                    'question' => 'Kapal berlayar di ...',
                    'option_a' => 'Udara',
                    'option_b' => 'Air',
                    'option_c' => 'Tanah',
                    'option_d' => 'Hutan',
                    'correct_answer' => 'b',
                ],
            ]);

            $quiz10 = Quiz::create([
                'classroom_id' => $kelas2->id,
                'title' => 'Kuis Profesi | Kelas 2',
                'description' => 'Mengenal berbagai macam pekerjaan di sekitar kita.'
            ]);

            Question::insert([
                [
                    'quiz_id' => $quiz10->id,
                    'question' => 'Dokter bekerja di ...',
                    'option_a' => 'Sekolah',
                    'option_b' => 'Rumah sakit',
                    'option_c' => 'Pasar',
                    'option_d' => 'Kebun',
                    'correct_answer' => 'b',
                ],
                [
                    'quiz_id' => $quiz10->id,
                    'question' => 'Guru mengajar di ...',
                    'option_a' => 'Sekolah',
                    'option_b' => 'Rumah sakit',
                    'option_c' => 'Kantor polisi',
                    'option_d' => 'Pasar',
                    'correct_answer' => 'a',
                ],
                [
                    'quiz_id' => $quiz10->id,
                    'question' => 'Petani bekerja di ...',
                    'option_a' => 'Ladang atau sawah',
                    'option_b' => 'Kantor',
                    'option_c' => 'Pabrik',
                    'option_d' => 'Toko',
                    'correct_answer' => 'a',
                ],
            ]);
        }
    }
}
