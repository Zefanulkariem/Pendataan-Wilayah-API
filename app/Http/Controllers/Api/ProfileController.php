<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if ($user) {
            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404);
    }
    
}
