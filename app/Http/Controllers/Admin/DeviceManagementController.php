<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeviceAuthorization;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeviceManagementController extends Controller
{
    public function index(Request $request): View
    {
        $query = DeviceAuthorization::query()->with('user')->latest('id');

        if ($request->filled('search')) {
            $search = trim((string) $request->input('search'));

            $query->where(function ($builder) use ($search) {
                $builder
                    ->where('device_code', 'like', "%{$search}%")
                    ->orWhere('hostname', 'like', "%{$search}%")
                    ->orWhere('device_hash', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery
                            ->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('status')) {
            $status = strtolower((string) $request->input('status'));

            if ($status === 'pending') {
                $query->where('approved', false);
            }

            if ($status === 'approved') {
                $query->where('approved', true);
            }

            if ($status === 'expired') {
                $query->where('approved', false)
                    ->whereNotNull('expires_at')
                    ->where('expires_at', '<', now());
            }
        }

        $devices = $query->paginate(15)->withQueryString();

        $totalCount = DeviceAuthorization::query()->count();
        $pendingCount = DeviceAuthorization::query()->where('approved', false)->count();
        $approvedCount = DeviceAuthorization::query()->where('approved', true)->count();
        $expiredCount = DeviceAuthorization::query()
            ->where('approved', false)
            ->whereNotNull('expires_at')
            ->where('expires_at', '<', now())
            ->count();

        return view('admin.devices.index', compact(
            'devices', 'totalCount', 'pendingCount', 'approvedCount', 'expiredCount'
        ));
    }

    public function show(DeviceAuthorization $device): View
    {
        $device->load('user');
        return view('admin.devices.show', compact('device'));
    }

    public function approve(DeviceAuthorization $device): RedirectResponse
    {
        $device->update([
            'approved' => true,
            'user_id' => auth()->id(),
            'approved_at' => now(),
        ]);

        return redirect()->route('admin.devices.index')->with('success', 'Device berhasil disetujui.');
    }

    public function reject(DeviceAuthorization $device): RedirectResponse
    {
        $device->delete();
        return redirect()->route('admin.devices.index')->with('success', 'Device request berhasil ditolak.');
    }

    public function revoke(DeviceAuthorization $device): RedirectResponse
    {
        $device->update([
            'approved' => false,
            'approved_at' => null,
        ]);

        return redirect()->route('admin.devices.index')->with('success', 'Akses device berhasil dicabut.');
    }
}
