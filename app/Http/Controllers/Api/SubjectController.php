<?php

namespace App\Http\Controllers\Api;

use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Status;
use App\Models\User;
use DB;

class SubjectController extends Controller
{
    /**
     * Load subjects
     *
     * @return view
     */

    public function getSubjects(Request $request)
    {
        // $subjects = Subject::query();
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

        // $user = User::find( (int)$user_id );

        // dd($auth_user);

        // $data = User::where('id', $auth_user->id)->with('subjects', 'subjects.status')->first();
        $user = User::where('id', auth()->user()->id)->first();

        $subjects = DB::table('subject')
            ->select('subject.id', 'subject.title as title', 'subject.image_url', 'subject.is_active', 'status.name as status')
            ->leftJoin('user_subject as pivot', 'subject.id', 'pivot.subject_id')
            ->leftJoin('status', 'pivot.status_id', 'status.id')
            ->where('user_id', $user->id)
            ->where('subject.is_active', true)
            ->orderBy('subject.id', 'asc')
            ->get();
        // $data->subjects

        // dd($user);
        // $subjects = auth()->user()->subjects;
        // dd($subjects);
        // dd($user->subjects->pivot);
        // $subjects = Subject::
        //     ->offset( $offset )
        //     ->limit( $limit )
        //     orderBy('id', 'asc')
        //     ->with('pivot')
        //     ->active()
        //     ->first();

        // foreach($subjects as $subject) {
        //     dd($subject->status);
            // $status_id = $subject->pivot->status_id;

            // foreach($subject->statuses as $status) {
            //     $subject->status = $status->name;
            // }

            // dd($subject->pivot->status_id);
            // dd($subject->statuses);
            // $subject->status = $subject->statuses[0]['name'];
            // dd($subject->statuses[0]['name']);
        // }

        // dd($subjects);

        return response()->json([
            'subjects'  => $subjects,
            // 'statuses'  => $subjects->user->status
            // 'load_more_btn'     => ($count_subjects > $offset + $limit ? true : false),
            // 'loading_count'     => $count_subjects
        ]);

    }
}
