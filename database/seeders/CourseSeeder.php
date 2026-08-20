<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Course;
use App\Models\Section;
use App\Models\Lesson;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // =========================
        // USER ADMIN
        // =========================

        User::create([
            'name' => 'admin',
            'email' => 'admin@tkj.local',
            'password' => bcrypt('password')
        ]);

        // =========================
        // COURSE
        // =========================

        $course = Course::create([
            'title' => 'Linux Server',
            'description' => 'Pembelajaran administrasi Linux Server'
        ]);

        // =====================================================
        // SECTION DNS
        // =====================================================

        $dnsSection = Section::create([
            'course_id' => $course->id,
            'title' => 'DNS'
        ]);

        // =========================
        // DNS THEORY
        // =========================

        Lesson::create([
            'section_id' => $dnsSection->id,
            'title' => 'Intro DNS',
            'type' => 'theory',
            'content' => 'Materi pengenalan DNS',
            'duration' => 15,
            'order' => 1
        ]);

        // =========================
        // DNS LAB
        // =========================

        Lesson::create([
            'section_id' => $dnsSection->id,
            'title' => 'DNS Lab',
            'type' => 'lab',

            // DYNAMIC LAB TYPE

            'lab_type' => 'dns',

            'content' => 'Praktikum konfigurasi DNS Server',
            'duration' => 45,
            'order' => 2,

            // CHECKER ENGINE

            'checker_command' => 'dig itsna.net',
            'checker_expected' => '192.168.1.10',
        ]);

        // =========================
        // DNS QUIZ
        // =========================

        Lesson::create([
            'section_id' => $dnsSection->id,
            'title' => 'DNS Quiz',
            'type' => 'quiz',
            'content' => 'Quiz DNS',
            'duration' => 10,
            'order' => 3
        ]);

        // =====================================================
        // SECTION WEB SERVER
        // =====================================================

        $webSection = Section::create([
            'course_id' => $course->id,
            'title' => 'Web Server'
        ]);

        // =========================
        // WEB THEORY
        // =========================

        Lesson::create([
            'section_id' => $webSection->id,
            'title' => 'Intro Apache',
            'type' => 'theory',
            'content' => 'Materi pengenalan Apache Web Server',
            'duration' => 20,
            'order' => 1
        ]);

        // =========================
        // WEB LAB
        // =========================

        Lesson::create([
            'section_id' => $webSection->id,
            'title' => 'Apache Lab',
            'type' => 'lab',

            // DYNAMIC LAB TYPE

            'lab_type' => 'apache',

            'content' => 'Praktikum konfigurasi Apache Web Server',
            'duration' => 45,
            'order' => 2,

            // CHECKER ENGINE

            'checker_command' => 'curl localhost',
            'checker_expected' => 'Apache2 Ubuntu Default Page',
        ]);

        // =========================
        // WEB QUIZ
        // =========================

        Lesson::create([
            'section_id' => $webSection->id,
            'title' => 'Apache Quiz',
            'type' => 'quiz',
            'content' => 'Quiz Apache',
            'duration' => 10,
            'order' => 3
        ]);

        // =====================================================
        // SECTION DHCP
        // =====================================================

        $dhcpSection = Section::create([
            'course_id' => $course->id,
            'title' => 'DHCP'
        ]);

        // =========================
        // DHCP THEORY
        // =========================

        Lesson::create([
            'section_id' => $dhcpSection->id,
            'title' => 'Intro DHCP',
            'type' => 'theory',
            'content' => 'Materi pengenalan DHCP Server',
            'duration' => 15,
            'order' => 1
        ]);

        // =========================
        // DHCP LAB
        // =========================

        Lesson::create([
            'section_id' => $dhcpSection->id,
            'title' => 'DHCP Lab',
            'type' => 'lab',

            // DYNAMIC LAB TYPE

            'lab_type' => 'dhcp',

            'content' => 'Praktikum konfigurasi DHCP Server',
            'duration' => 45,
            'order' => 2,

            // CHECKER ENGINE

            'checker_command' => 'systemctl status isc-dhcp-server',
            'checker_expected' => 'active (running)',
        ]);

        // =========================
        // DHCP QUIZ
        // =========================

        Lesson::create([
            'section_id' => $dhcpSection->id,
            'title' => 'DHCP Quiz',
            'type' => 'quiz',
            'content' => 'Quiz DHCP',
            'duration' => 10,
            'order' => 3
        ]);
    }
}