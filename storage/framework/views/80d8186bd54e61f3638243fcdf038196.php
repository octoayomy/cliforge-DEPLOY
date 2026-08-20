<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                <?php echo e($course->title ?? 'Linux Server'); ?>

            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Learning path DNS Server: materi, kuis, virtual lab, dan hasil validasi CLIForge Agent.
            </p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="min-h-screen bg-gray-100 py-8 dark:bg-gray-900"
         x-data="{
            active: 'intro',
            quizSubmitted: false,
            answers: {},
            correct: { q1: 'b', q2: 'b', q3: 'a', q4: 'b', q5: 'a' },
            score() {
                let total = 0;
                Object.keys(this.correct).forEach((key) => {
                    if (this.answers[key] === this.correct[key]) total++;
                });
                return total;
            }
         }">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-[330px_1fr]">

                <aside class="h-fit rounded-3xl bg-white p-6 shadow-sm dark:bg-gray-800 lg:sticky lg:top-6">
                    <h1 class="text-3xl font-black text-gray-900 dark:text-white">
                        <?php echo e($course->title ?? 'Linux Server'); ?>

                    </h1>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Administrasi Sistem Jaringan
                    </p>

                    <span class="mt-4 inline-flex rounded-full bg-amber-100 px-4 py-1 text-xs font-bold text-amber-700 dark:bg-amber-900/40 dark:text-amber-300">
                        DNS Server
                    </span>

                    <div class="mt-6">
                        <div class="flex justify-between text-sm font-semibold text-gray-700 dark:text-gray-300">
                            <span>Progress</span>
                            <span>0%</span>
                        </div>
                        <div class="mt-2 h-2 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                            <div class="h-full w-0 rounded-full bg-indigo-600"></div>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            Ikuti urutan belajar dari teori sampai validasi lab.
                        </p>
                    </div>

                    <div class="mt-8 space-y-4">
                        <div class="overflow-hidden rounded-2xl border border-gray-200 dark:border-gray-700">
                            <div class="bg-gray-50 px-4 py-3 font-bold text-gray-900 dark:bg-gray-900/40 dark:text-white">
                                Dasar DNS Server
                            </div>

                            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                <button @click="active = 'intro'" :class="active === 'intro' ? 'bg-indigo-50 dark:bg-indigo-900/30' : ''" class="flex w-full items-center gap-3 px-4 py-4 text-left">
                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-500 text-xs font-black text-white">1</span>
                                    <span><span class="block font-semibold text-gray-900 dark:text-white">Pengantar DNS</span><span class="text-xs text-gray-500">theory · 8 min</span></span>
                                </button>

                                <button @click="active = 'workflow'" :class="active === 'workflow' ? 'bg-indigo-50 dark:bg-indigo-900/30' : ''" class="flex w-full items-center gap-3 px-4 py-4 text-left">
                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-500 text-xs font-black text-white">2</span>
                                    <span><span class="block font-semibold text-gray-900 dark:text-white">Cara Kerja DNS</span><span class="text-xs text-gray-500">theory · 10 min</span></span>
                                </button>

                                <button @click="active = 'record'" :class="active === 'record' ? 'bg-indigo-50 dark:bg-indigo-900/30' : ''" class="flex w-full items-center gap-3 px-4 py-4 text-left">
                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-500 text-xs font-black text-white">3</span>
                                    <span><span class="block font-semibold text-gray-900 dark:text-white">DNS Record</span><span class="text-xs text-gray-500">theory · 7 min</span></span>
                                </button>

                                <button @click="active = 'bind'" :class="active === 'bind' ? 'bg-indigo-50 dark:bg-indigo-900/30' : ''" class="flex w-full items-center gap-3 px-4 py-4 text-left">
                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-500 text-xs font-black text-white">4</span>
                                    <span><span class="block font-semibold text-gray-900 dark:text-white">Konfigurasi BIND9</span><span class="text-xs text-gray-500">theory · 12 min</span></span>
                                </button>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-2xl border border-gray-200 dark:border-gray-700">
                            <div class="bg-gray-50 px-4 py-3 font-bold text-gray-900 dark:bg-gray-900/40 dark:text-white">
                                Praktik & Evaluasi
                            </div>

                            <div class="divide-y divide-gray-200 dark:divide-gray-700">
                                <button @click="active = 'quiz'" :class="active === 'quiz' ? 'bg-indigo-50 dark:bg-indigo-900/30' : ''" class="flex w-full items-center gap-3 px-4 py-4 text-left">
                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-yellow-500 text-xs font-black text-white">5</span>
                                    <span><span class="block font-semibold text-gray-900 dark:text-white">Kuis Pemahaman</span><span class="text-xs text-gray-500">quiz · 5 soal</span></span>
                                </button>

                                <button @click="active = 'lab'" :class="active === 'lab' ? 'bg-indigo-50 dark:bg-indigo-900/30' : ''" class="flex w-full items-center gap-3 px-4 py-4 text-left">
                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-purple-500 text-xs font-black text-white">6</span>
                                    <span><span class="block font-semibold text-gray-900 dark:text-white">Virtual Lab DNS</span><span class="text-xs text-gray-500">lab · CLIForge Agent</span></span>
                                </button>

                                <button @click="active = 'result'" :class="active === 'result' ? 'bg-indigo-50 dark:bg-indigo-900/30' : ''" class="flex w-full items-center gap-3 px-4 py-4 text-left">
                                    <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-blue-500 text-xs font-black text-white">7</span>
                                    <span><span class="block font-semibold text-gray-900 dark:text-white">Hasil Assessment</span><span class="text-xs text-gray-500">feedback · evidence</span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </aside>

                <main class="space-y-6">
                    <section class="rounded-3xl bg-white p-8 shadow-sm dark:bg-gray-800">
                        <p class="text-sm font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Learning Path</p>
                        <h2 class="mt-2 text-3xl font-black text-gray-900 dark:text-white">DNS Server dengan BIND9</h2>
                        <p class="mt-2 text-sm leading-6 text-gray-500 dark:text-gray-400">
                            Ikuti materi, jawab kuis, praktik di VM, lalu ambil feedback dari CLIForge Agent.
                        </p>
                    </section>

                    <section x-show="active === 'intro'" class="rounded-3xl bg-white p-8 shadow-sm dark:bg-gray-800">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white">1. Pengantar DNS</h3>
                        <p class="mt-5 leading-8 text-gray-700 dark:text-gray-300">
                            DNS atau <em>Domain Name System</em> adalah layanan jaringan yang menerjemahkan nama domain menjadi alamat IP. Tanpa DNS, pengguna harus mengingat alamat IP setiap server yang ingin diakses. Dalam administrasi sistem jaringan, DNS menjadi salah satu layanan dasar yang sangat penting karena hampir semua layanan server bergantung pada penamaan host yang mudah dikenali.
                        </p>
                        <p class="mt-4 leading-8 text-gray-700 dark:text-gray-300">
                            Contohnya, ketika pengguna mengakses <code>www.sekolah.local</code>, komputer akan bertanya kepada DNS Server untuk mengetahui alamat IP dari nama tersebut. Setelah alamat IP ditemukan, barulah koneksi ke server tujuan dapat dilakukan.
                        </p>
                        <div class="mt-6 rounded-2xl bg-indigo-50 p-5 text-sm leading-7 text-indigo-900 dark:bg-indigo-900/20 dark:text-indigo-200">
                            <strong>Inti konsep:</strong> DNS membuat akses layanan jaringan menjadi lebih mudah, terstruktur, dan mudah dikelola oleh administrator.
                        </div>
                    </section>

                    <section x-show="active === 'workflow'" class="rounded-3xl bg-white p-8 shadow-sm dark:bg-gray-800">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white">2. Cara Kerja DNS</h3>
                        <p class="mt-5 leading-8 text-gray-700 dark:text-gray-300">
                            Proses kerja DNS dimulai ketika client mengirim permintaan resolusi nama domain. Permintaan tersebut diterima resolver. Jika jawaban belum tersedia dalam cache, resolver akan meneruskan permintaan sampai menemukan server yang berwenang atas domain tersebut.
                        </p>
                        <div class="mt-6 grid gap-4 md:grid-cols-2">
                            <div class="rounded-2xl bg-gray-50 p-5 dark:bg-gray-900/50"><h4 class="font-bold text-gray-900 dark:text-white">Resolver</h4><p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-400">Menerima permintaan client dan mencari jawaban DNS.</p></div>
                            <div class="rounded-2xl bg-gray-50 p-5 dark:bg-gray-900/50"><h4 class="font-bold text-gray-900 dark:text-white">Authoritative Server</h4><p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-400">Server yang memiliki data resmi untuk suatu domain atau zone.</p></div>
                            <div class="rounded-2xl bg-gray-50 p-5 dark:bg-gray-900/50"><h4 class="font-bold text-gray-900 dark:text-white">Cache</h4><p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-400">Menyimpan hasil query sementara agar akses berikutnya lebih cepat.</p></div>
                            <div class="rounded-2xl bg-gray-50 p-5 dark:bg-gray-900/50"><h4 class="font-bold text-gray-900 dark:text-white">Zone</h4><p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-400">Bagian domain yang dikelola oleh DNS Server, misalnya <code>tkj.local</code>.</p></div>
                        </div>
                    </section>

                    <section x-show="active === 'record'" class="rounded-3xl bg-white p-8 shadow-sm dark:bg-gray-800">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white">3. DNS Record</h3>
                        <p class="mt-5 leading-8 text-gray-700 dark:text-gray-300">DNS record menyimpan informasi pemetaan nama domain, alamat IP, server email, alias, dan informasi lain dalam sebuah zone.</p>
                        <div class="mt-6 overflow-hidden rounded-2xl border border-gray-200 dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr><td class="px-5 py-4 font-bold dark:text-white">A</td><td class="px-5 py-4 text-sm text-gray-600 dark:text-gray-400">Memetakan nama domain ke alamat IPv4.</td></tr>
                                    <tr><td class="px-5 py-4 font-bold dark:text-white">NS</td><td class="px-5 py-4 text-sm text-gray-600 dark:text-gray-400">Menentukan name server yang bertanggung jawab atas zone.</td></tr>
                                    <tr><td class="px-5 py-4 font-bold dark:text-white">MX</td><td class="px-5 py-4 text-sm text-gray-600 dark:text-gray-400">Menentukan mail server untuk domain.</td></tr>
                                    <tr><td class="px-5 py-4 font-bold dark:text-white">PTR</td><td class="px-5 py-4 text-sm text-gray-600 dark:text-gray-400">Memetakan alamat IP ke nama domain pada reverse zone.</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section x-show="active === 'bind'" class="rounded-3xl bg-white p-8 shadow-sm dark:bg-gray-800">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white">4. Konfigurasi BIND9</h3>
                        <p class="mt-5 leading-8 text-gray-700 dark:text-gray-300">BIND9 adalah perangkat lunak DNS Server pada Linux. Konfigurasi utama berada di direktori <code>/etc/bind</code>.</p>
                        <div class="mt-6 space-y-5">
                            <pre class="overflow-x-auto rounded-2xl bg-gray-950 p-5 text-sm font-semibold text-white"><code>sudo apt update
sudo apt install bind9 bind9utils</code></pre>
                            <pre class="overflow-x-auto rounded-2xl bg-gray-950 p-5 text-sm font-semibold text-white"><code>zone "tkj.local" {
    type master;
    file "/etc/bind/db.tkj.local";
};</code></pre>
                            <pre class="overflow-x-auto rounded-2xl bg-gray-950 p-5 text-sm font-semibold text-white"><code>named-checkconf
named-checkzone tkj.local /etc/bind/db.tkj.local
systemctl restart bind9
dig @localhost tkj.local</code></pre>
                        </div>
                    </section>

                    <section x-show="active === 'quiz'" class="rounded-3xl bg-white p-8 shadow-sm dark:bg-gray-800">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white">5. Kuis Pemahaman</h3>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Pilih satu jawaban yang paling benar.</p>
                        <div class="mt-6 space-y-5">
                            <div class="rounded-2xl border border-gray-200 p-5 dark:border-gray-700"><h4 class="font-bold text-gray-900 dark:text-white">1. Fungsi utama DNS Server adalah ...</h4><div class="mt-4 space-y-2 text-sm text-gray-700 dark:text-gray-300"><label class="flex gap-2"><input type="radio" name="q1" value="a" x-model="answers.q1">Menyimpan file web</label><label class="flex gap-2"><input type="radio" name="q1" value="b" x-model="answers.q1">Menerjemahkan nama domain menjadi IP</label><label class="flex gap-2"><input type="radio" name="q1" value="c" x-model="answers.q1">Mengatur bandwidth</label></div></div>
                            <div class="rounded-2xl border border-gray-200 p-5 dark:border-gray-700"><h4 class="font-bold text-gray-900 dark:text-white">2. Port default DNS adalah ...</h4><div class="mt-4 space-y-2 text-sm text-gray-700 dark:text-gray-300"><label class="flex gap-2"><input type="radio" name="q2" value="a" x-model="answers.q2">80</label><label class="flex gap-2"><input type="radio" name="q2" value="b" x-model="answers.q2">53</label><label class="flex gap-2"><input type="radio" name="q2" value="c" x-model="answers.q2">22</label></div></div>
                            <div class="rounded-2xl border border-gray-200 p-5 dark:border-gray-700"><h4 class="font-bold text-gray-900 dark:text-white">3. File konfigurasi zone BIND9 biasanya berada pada ...</h4><div class="mt-4 space-y-2 text-sm text-gray-700 dark:text-gray-300"><label class="flex gap-2"><input type="radio" name="q3" value="a" x-model="answers.q3">/etc/bind/named.conf.local</label><label class="flex gap-2"><input type="radio" name="q3" value="b" x-model="answers.q3">/var/www/html</label><label class="flex gap-2"><input type="radio" name="q3" value="c" x-model="answers.q3">/home/student</label></div></div>
                            <div class="rounded-2xl border border-gray-200 p-5 dark:border-gray-700"><h4 class="font-bold text-gray-900 dark:text-white">4. Record DNS untuk alamat IPv4 adalah ...</h4><div class="mt-4 space-y-2 text-sm text-gray-700 dark:text-gray-300"><label class="flex gap-2"><input type="radio" name="q4" value="a" x-model="answers.q4">MX</label><label class="flex gap-2"><input type="radio" name="q4" value="b" x-model="answers.q4">A</label><label class="flex gap-2"><input type="radio" name="q4" value="c" x-model="answers.q4">PTR</label></div></div>
                            <div class="rounded-2xl border border-gray-200 p-5 dark:border-gray-700"><h4 class="font-bold text-gray-900 dark:text-white">5. Perintah untuk mengecek konfigurasi BIND9 adalah ...</h4><div class="mt-4 space-y-2 text-sm text-gray-700 dark:text-gray-300"><label class="flex gap-2"><input type="radio" name="q5" value="a" x-model="answers.q5">named-checkconf</label><label class="flex gap-2"><input type="radio" name="q5" value="b" x-model="answers.q5">ifconfig</label><label class="flex gap-2"><input type="radio" name="q5" value="c" x-model="answers.q5">mkdir</label></div></div>
                        </div>
                        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-center">
                            <button type="button" @click="quizSubmitted = true" class="rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white hover:bg-indigo-700">Cek Jawaban</button>
                            <div x-show="quizSubmitted" class="rounded-xl bg-indigo-50 px-5 py-3 text-sm font-bold text-indigo-700 dark:bg-indigo-900/30 dark:text-indigo-300">Skor kuis: <span x-text="score()"></span>/5</div>
                        </div>
                    </section>

                    <section x-show="active === 'lab'" class="rounded-3xl bg-white p-8 shadow-sm dark:bg-gray-800">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white">6. Virtual Lab DNS</h3>
                        <p class="mt-5 leading-8 text-gray-700 dark:text-gray-300">Praktik konfigurasi dilakukan di VM Linux. Setelah konfigurasi selesai, jalankan CLIForge Agent untuk memvalidasi kondisi sistem.</p>
                        <pre class="mt-6 overflow-x-auto rounded-2xl bg-gray-950 p-5 text-sm font-semibold text-white"><code>cliforge start dns-basic
cliforge check</code></pre>
                        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                            <a href="<?php echo e(route('lessons.show', 2)); ?>" class="inline-flex flex-1 items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white hover:bg-indigo-700">Masuk ke Lab & Validasi</a>
                            <button type="button" @click="active = 'result'" class="inline-flex flex-1 items-center justify-center rounded-xl border border-gray-300 px-5 py-3 text-sm font-bold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">Lihat Hasil Agent</button>
                        </div>
                    </section>

                    <section x-show="active === 'result'" class="rounded-3xl bg-white p-8 shadow-sm dark:bg-gray-800">
                        <h3 class="text-2xl font-black text-gray-900 dark:text-white">7. Hasil Assessment</h3>
                        <p class="mt-5 leading-8 text-gray-700 dark:text-gray-300">Hasil praktik siswa diambil dari CLIForge Agent. Nilai, status PASS/FAIL, dan detail evidence dapat dilihat pada menu Hasil Saya.</p>
                        <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                            <a href="<?php echo e(route('assessment.index')); ?>" class="inline-flex flex-1 items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white hover:bg-indigo-700">Buka Hasil Saya</a>
                            <a href="<?php echo e(route('leaderboard')); ?>" class="inline-flex flex-1 items-center justify-center rounded-xl border border-gray-300 px-5 py-3 text-sm font-bold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">Lihat Papan Peringkat</a>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\cliforge\resources\views/courses/show.blade.php ENDPATH**/ ?>