<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div><h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">Detail Device</h2><p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Device Code: {{ $device->device_code }}</p></div>
            <a href="{{ route('admin.devices.index') }}" class="inline-flex rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">Kembali</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-5xl space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 md:grid-cols-3">
                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800"><p class="text-sm font-medium text-gray-500">Status</p><div class="mt-3">@if($device->approved)<span class="inline-flex rounded-full bg-emerald-100 px-4 py-2 text-sm font-bold text-emerald-700">APPROVED</span>@elseif($device->is_expired)<span class="inline-flex rounded-full bg-rose-100 px-4 py-2 text-sm font-bold text-rose-700">EXPIRED</span>@else<span class="inline-flex rounded-full bg-amber-100 px-4 py-2 text-sm font-bold text-amber-700">PENDING</span>@endif</div></div>
                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800"><p class="text-sm font-medium text-gray-500">Hostname</p><p class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">{{ $device->hostname ?: '-' }}</p></div>
                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800"><p class="text-sm font-medium text-gray-500">Approved User</p><p class="mt-2 text-lg font-bold text-gray-900 dark:text-white">{{ $device->user?->name ?? '-' }}</p><p class="text-sm text-gray-500">{{ $device->user?->email }}</p></div>
            </div>

            <div class="grid gap-6 lg:grid-cols-3">
                <div class="rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800 lg:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Device Information</h3>
                    <dl class="mt-5 grid gap-4 sm:grid-cols-2">
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/50"><dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">Device Code</dt><dd class="mt-1 font-mono text-base font-bold text-gray-900 dark:text-white">{{ $device->device_code }}</dd></div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/50"><dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">Hostname</dt><dd class="mt-1 text-base font-bold text-gray-900 dark:text-white">{{ $device->hostname ?: '-' }}</dd></div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/50 sm:col-span-2"><dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">Device Hash</dt><dd class="mt-1 break-all font-mono text-sm text-gray-900 dark:text-white">{{ $device->device_hash ?: '-' }}</dd></div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/50"><dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">Created At</dt><dd class="mt-1 text-base font-bold text-gray-900 dark:text-white">{{ $device->created_at?->format('d M Y H:i') ?? '-' }}</dd></div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/50"><dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">Expires At</dt><dd class="mt-1 text-base font-bold text-gray-900 dark:text-white">{{ $device->expires_at?->format('d M Y H:i') ?? '-' }}</dd></div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/50"><dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">Approved At</dt><dd class="mt-1 text-base font-bold text-gray-900 dark:text-white">{{ $device->approved_at?->format('d M Y H:i') ?? '-' }}</dd></div>
                        <div class="rounded-xl bg-gray-50 p-4 dark:bg-gray-900/50"><dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">Updated At</dt><dd class="mt-1 text-base font-bold text-gray-900 dark:text-white">{{ $device->updated_at?->format('d M Y H:i') ?? '-' }}</dd></div>
                    </dl>
                </div>
                <div class="rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Action</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Kelola akses device CLIForge Agent.</p>
                    <div class="mt-5 space-y-3">
                        @if(! $device->approved)
                            <form method="POST" action="{{ route('admin.devices.approve', $device) }}">@csrf<button type="submit" class="w-full rounded-lg bg-indigo-600 px-4 py-3 text-sm font-semibold text-white hover:bg-indigo-700">Approve Device</button></form>
                            <form method="POST" action="{{ route('admin.devices.reject', $device) }}" onsubmit="return confirm('Tolak dan hapus request device ini?')">@csrf<button type="submit" class="w-full rounded-lg bg-rose-600 px-4 py-3 text-sm font-semibold text-white hover:bg-rose-700">Reject Device</button></form>
                        @else
                            <form method="POST" action="{{ route('admin.devices.revoke', $device) }}" onsubmit="return confirm('Cabut akses device ini?')">@csrf<button type="submit" class="w-full rounded-lg bg-amber-600 px-4 py-3 text-sm font-semibold text-white hover:bg-amber-700">Revoke Access</button></form>
                        @endif
                        <a href="{{ route('admin.devices.index') }}" class="block w-full rounded-lg border border-gray-300 px-4 py-3 text-center text-sm font-semibold text-gray-700 hover:bg-gray-50">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
