<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Grade;

class RegisterController extends Controller
{
    /**
     * Show grades
     *
     * @return view
     */

     public function getGrades(Request $request)
     {
        $grades = Grade::where('school_id', $request->school)
            ->active()
            ->get();

        return response()->json([
            'grades' => $grades
        ]);
     }
}
