<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lab;
use Illuminate\Contracts\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::query()
            ->latest('id')
            ->get()
            ->map(function (Course $course, int $index) {
                $themes = [
                    ['label' => 'DNS', 'gradient' => 'from-cyan-500 to-sky-700', 'accent' => 'bg-cyan-300/30'],
                    ['label' => 'Linux', 'gradient' => 'from-amber-400 to-orange-600', 'accent' => 'bg-yellow-200/30'],
                    ['label' => 'Server', 'gradient' => 'from-blue-500 to-indigo-700', 'accent' => 'bg-blue-300/30'],
                ];

                $theme = $themes[$index % count($themes)];

                return [
                    'id' => $course->id,
                    'title' => $course->title ?? 'DNS Server',
                    'description' => $course->description ?? 'Materi dan virtual lab Administrasi Sistem Jaringan.',
                    'category' => $theme['label'],
                    'gradient' => $theme['gradient'],
                    'accent' => $theme['accent'],
                    'total_items' => 4,
                    'completed_items' => 0,
                    'percent' => 0,
                ];
            });

        return view('courses.index', compact('courses'));
    }

    public function show($id): View
    {
        $course = Course::query()->findOrFail($id);

        $labs = Lab::query()
            ->where('course_id', $course->id)
            ->orderBy('id')
            ->get();

        $quizItems = collect([
            [
                'question' => 'Apa fungsi utama DNS Server?',
                'answer' => 'Menerjemahkan nama domain menjadi alamat IP.',
            ],
            [
                'question' => 'File apa yang umum digunakan untuk mendefinisikan zone pada BIND9?',
                'answer' => '/etc/bind/named.conf.local.',
            ],
            [
                'question' => 'Port default layanan DNS adalah?',
                'answer' => 'Port 53.',
            ],
        ]);

        $labSteps = collect([
            [
                'title' => 'Konfigurasi Zone Forward',
                'body' => 'Tambahkan zone forward untuk domain sekolah pada file konfigurasi BIND9.',
                'code' => 'zone "tkj.local" {
    type master;
    file "/etc/bind/db.tkj.local";
};',
            ],
            [
                'title' => 'Konfigurasi Zone Reverse',
                'body' => 'Tambahkan zone reverse untuk jaringan lokal agar resolusi IP ke nama host dapat diuji.',
                'code' => 'zone "10.168.192.in-addr.arpa" {
    type master;
    file "/etc/bind/db.192";
};',
            ],
            [
                'title' => 'Cek Konfigurasi',
                'body' => 'Jalankan validasi konfigurasi BIND9 sebelum melakukan restart service.',
                'code' => 'named-checkconf -p
systemctl restart bind9
systemctl status bind9',
            ],
            [
                'title' => 'Validasi dengan CLIForge Agent',
                'body' => 'Setelah konfigurasi selesai, jalankan Agent untuk mendapatkan umpan balik langsung.',
                'code' => 'cliforge start dns-basic
cliforge check',
            ],
        ]);

        return view('courses.show', compact(
            'course',
            'labs',
            'quizItems',
            'labSteps'
        ));
    }
}