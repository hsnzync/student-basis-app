<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Programme;

class RegisterController extends Controller
{
    /**
     * Show programmes
     *
     * @return view
     */

     public function getProgrammes(Request $request)
     {
        $programmes = Programme::where('school_id', $request->school)
            ->active()
            ->get();
            
        return response()->json([
            'programmes' => $programmes
        ]);
     }
}
