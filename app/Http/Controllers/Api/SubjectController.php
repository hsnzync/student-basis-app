<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;

class SubjectController extends Controller
{
    /**
     * Load subjects
     *
     * @return view
     */

    public function getSubjects(Request $request)
    {
        $limit = $request->get('limit');
        $offset = 0;

        if($request->has('offset')) {
            $offset = $request->get('offset');
        }

        $subjects = Subject::query();
        
        $loading_count = 6;
        $count_subjects = $subjects->active()->count();

        if($request->has('load_more')) {
            $loading_count += $request->get('load_more');
        }

        $subjects = $subjects
            ->offset( $offset )
            ->limit( $limit )
            ->active()
            ->get();

        return response()->json([
            'html'              => view('partials.sections.subjects', compact('subjects'))->render(),
            'load_more_btn'     => ($count_subjects > $offset + $limit ? true : false),
            'loading_count'     => $count_subjects
        ]);

    }
}
