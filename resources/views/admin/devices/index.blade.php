<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Device Management</h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola device CLIForge Agent yang meminta akses login.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">Kembali ke Dashboard</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="rounded-xl bg-emerald-100 px-4 py-3 text-sm font-semibold text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300">{{ session('success') }}</div>
            @endif

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800"><p class="text-sm font-medium text-gray-500">Total Device</p><p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white">{{ $totalCount }}</p></div>
                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800"><p class="text-sm font-medium text-gray-500">Pending</p><p class="mt-2 text-3xl font-bold text-amber-600">{{ $pendingCount }}</p></div>
                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800"><p class="text-sm font-medium text-gray-500">Approved</p><p class="mt-2 text-3xl font-bold text-emerald-600">{{ $approvedCount }}</p></div>
                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800"><p class="text-sm font-medium text-gray-500">Expired</p><p class="mt-2 text-3xl font-bold text-rose-600">{{ $expiredCount }}</p></div>
            </div>

            <form method="GET" action="{{ route('admin.devices.index') }}" class="rounded-2xl bg-white p-4 shadow-sm dark:bg-gray-800">
                <div class="grid gap-3 md:grid-cols-[1fr_180px_auto]">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari device code, hostname, hash, atau user..." class="rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                    <select name="status" class="rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white">
                        <option value="">Semua status</option>
                        <option value="pending" @selected(request('status') === 'pending')>Pending</option>
                        <option value="approved" @selected(request('status') === 'approved')>Approved</option>
                        <option value="expired" @selected(request('status') === 'expired')>Expired</option>
                    </select>
                    <div class="flex gap-2"><button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">Filter</button><a href="{{ route('admin.devices.index') }}" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">Reset</a></div>
                </div>
            </form>

            <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">
                <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700"><h3 class="text-lg font-semibold text-gray-900 dark:text-white">Device Authorization</h3><p class="text-sm text-gray-500">Device dari CLIForge Agent akan muncul saat menjalankan <code class="rounded bg-gray-100 px-1.5 py-0.5 text-xs dark:bg-gray-700">cliforge login</code>.</p></div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900/40"><tr><th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Device Code</th><th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Hostname</th><th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">User</th><th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Status</th><th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Expires</th><th class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500">Action</th></tr></thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($devices as $device)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40">
                                    <td class="whitespace-nowrap px-6 py-4"><div class="font-mono text-sm font-bold text-gray-900 dark:text-white">{{ $device->device_code }}</div><div class="mt-1 max-w-xs truncate text-xs text-gray-500">{{ $device->device_hash ?: '-' }}</div></td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->hostname ?: '-' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-700 dark:text-gray-300"><div class="font-medium text-gray-900 dark:text-white">{{ $device->user?->name ?? '-' }}</div><div class="text-xs text-gray-500">{{ $device->user?->email }}</div></td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        @if($device->approved)
                                            <span class="inline-flex rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700">APPROVED</span>
                                        @elseif($device->is_expired)
                                            <span class="inline-flex rounded-full bg-rose-100 px-3 py-1 text-xs font-bold text-rose-700">EXPIRED</span>
                                        @else
                                            <span class="inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-bold text-amber-700">PENDING</span>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">{{ $device->expires_at?->format('d M Y H:i') ?? '-' }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-right"><div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.devices.show', $device) }}" class="rounded-lg border border-gray-300 px-3 py-2 text-xs font-semibold text-gray-700 hover:bg-gray-50">Detail</a>
                                        @if(! $device->approved)
                                            <form method="POST" action="{{ route('admin.devices.approve', $device) }}">@csrf<button type="submit" class="rounded-lg bg-indigo-600 px-3 py-2 text-xs font-semibold text-white hover:bg-indigo-700">Approve</button></form>
                                            <form method="POST" action="{{ route('admin.devices.reject', $device) }}" onsubmit="return confirm('Tolak device request ini?')">@csrf<button type="submit" class="rounded-lg bg-rose-600 px-3 py-2 text-xs font-semibold text-white hover:bg-rose-700">Reject</button></form>
                                        @else
                                            <form method="POST" action="{{ route('admin.devices.revoke', $device) }}" onsubmit="return confirm('Cabut akses device ini?')">@csrf<button type="submit" class="rounded-lg bg-amber-600 px-3 py-2 text-xs font-semibold text-white hover:bg-amber-700">Revoke</button></form>
                                        @endif
                                    </div></td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="px-6 py-14 text-center text-sm text-gray-500">Belum ada device authorization. Jalankan <code class="rounded bg-gray-100 px-1.5 py-0.5 text-xs dark:bg-gray-700">cliforge login</code> dari VM Linux.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if($devices->hasPages())<div class="border-t border-gray-200 px-6 py-4 dark:border-gray-700">{{ $devices->links() }}</div>@endif
            </div>
        </div>
    </div>
</x-app-layout>
