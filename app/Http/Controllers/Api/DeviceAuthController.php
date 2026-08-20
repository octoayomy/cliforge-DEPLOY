<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\DeviceAuthorization;

class DeviceAuthController extends Controller
{
    public function requestCode(Request $request)
    {
        $deviceCode =
            strtoupper(Str::random(4))
            . '-'
            .
            strtoupper(Str::random(4));

        $auth = DeviceAuthorization::create([

            'device_code' => $deviceCode,

            'hostname' => $request->hostname,

            'device_hash' => $request->device_hash,

            'expires_at' => now()->addMinutes(10)
        ]);

        return response()->json([

            'success' => true,

            'device_code' => $deviceCode,

            'expires_at' => $auth->expires_at
        ]);
    }
    public function approve(Request $request)
    {
        $auth = \App\Models\DeviceAuthorization::where(
        'device_code',
        $request->device_code
    )->first();

    if (!$auth) {

        return response()->json([
            'success' => false,
            'message' => 'Device code not found'
        ], 404);
    }

    $auth->update([

        'approved' => true,

        'user_id' => $request->user_id,

        'approved_at' => now()
    ]);

    return response()->json([

        'success' => true,

        'message' => 'Device Approved'
    ]);
    }
    public function status($deviceCode)
    {
    $auth = DeviceAuthorization::where(
        'device_code',
        $deviceCode
    )->first();

    if (!$auth) {

        return response()->json([
            'success' => false,
            'message' => 'Device code not found'
        ], 404);
    }

    return response()->json([

        'success' => true,

        'approved' => (bool) $auth->approved,

        'user_id' => $auth->user_id,

        'hostname' => $auth->hostname,

        'device_hash' => $auth->device_hash
    ]);
    }
}