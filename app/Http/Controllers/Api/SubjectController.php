<?php

namespace App\Http\Controllers\Api;

use Auth;

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
        $subjects = Subject::query();
        $loading_count = 6;

        if($request->has('limit')) {
            $limit = $request->get('limit');
        }

        $offset = 0;
        if($request->has('offset')) {
            $offset = $request->get('offset');
        }

        if($request->has('id')) {
            $user_id = $request->get('id');
        }

        $count_subjects = $subjects->active()->count();

        if($request->has('load_more')) {
            $loading_count += $request->get('load_more');
        }

        $user = User::find( $user_id );

        $subjects = $subjects
            ->offset( $offset )
            ->limit( $limit )
            ->orderBy('id', 'asc')
            ->active()
            ->get();

        return response()->json([
            'html'              => view('partials.sections.subjects', compact('subjects'))->render(),
            'load_more_btn'     => ($count_subjects > $offset + $limit ? true : false),
            'loading_count'     => $count_subjects
        ]);

    }
}
