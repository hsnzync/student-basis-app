<?php

namespace App\Http\Controllers\Api;

use DB;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Status;
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
        // $loading_count = 6;

        // if($request->has('limit')) {
        //     $limit = $request->get('limit');
        // }

        // $offset = 0;
        // if($request->has('offset')) {
        //     $offset = $request->get('offset');
        // }

        // $user_id = null;
        // if($request->has('id')) {
        //     $user_id = $request->get('id');
        // }

        // $count_subjects = $subjects->active()->count();

        // if($request->has('load_more')) {
        //     $loading_count += $request->get('load_more');
        // }

        $subjects = DB::table('subject')
            ->select('subject.id', 'subject.title as title', 'subject.image_url', 'subject.is_active', 'status.name as status')
            ->leftJoin('user_subject as pivot', 'subject.id', 'pivot.subject_id')
            ->leftJoin('status', 'pivot.status_id', 'status.id')
            ->where('user_id', auth()->user()->id)
            ->where('subject.is_active', true)
            ->orderBy('subject.id', 'asc')
            ->get();

        // $subjects = Subject::
        //     ->offset( $offset )
        //     ->limit( $limit )
        //     orderBy('id', 'asc')
        //     ->with('pivot')
        //     ->active()
        //     ->first();

        return response()->json([
            'subjects' => $subjects,
            // 'load_more_btn'     => ($count_subjects > $offset + $limit ? true : false),
            // 'loading_count'     => $count_subjects
        ]);

    }
}
