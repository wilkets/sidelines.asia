<?php

namespace sidelines\Http\Controllers;

use Illuminate\Http\Request;

use sidelines\Student;
use sidelines\DeanFaculty;
use sidelines\Http\Requests;
use sidelines\Http\Controllers\Controller;

class RecommendationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('recommendation', ['only' => ['edit', 'getStudents']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->user_type === 'd' || \Auth::user()->user_type === 'f')
        {
            $students = \Auth::user()->userable->recommendations;
            // dd($students);
            return view('recommendation.index', compact('students'));
        }
        else if(\Auth::user()->user_type === 'c')
        {
            $students = \DB::table('students')
                            ->join('recommendations', 'recommendations.student_id', '=', 'students.id')
                            ->join('degrees', 'degrees.id', '=', 'students.degree_id')
                            ->join('users', 'users.userable_id', '=', 'students.id')
                            ->select('users.id as user_id', 'students.id', 'students.lname', 'students.fname', 'students.yr_lvl', 'degrees.name as degree', \DB::raw('count(recommendations.student_id) as recommendations'))
                            ->where('users.user_type', '=', 's')
                            ->groupBy('recommendations.student_id')
                            ->get();
                            // dd($students);
            return view('recommendation.index', compact('students'));
            // dd($students);
        }
        else if(\Auth::user()->user_type === 's'){

            $faculties = \Auth::user()->userable->recommendations;

            return view('recommendation.index', compact('faculties'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!\Auth::user()->userable->recommendations->contains($request['student_id']))
        {
            \Auth::user()->userable->recommendations()
                ->attach(array($request['student_id'] => array('recommendation_details' => $request['recommendation_letter'])));
        }

        return \Redirect::route('recommendations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if(\Auth::user()->user_type === 'd' || \Auth::user()->user_type === 'f')
        // {
        //     $student = \Auth::user()->userable->recommendations()->where('student_id', $id)->first();
        //
        //     return view('recommendation.show', compact('student'));
        // }
        // else
        // {
            $recommendation = \DB::table('recommendations')->where('id', $id)->get();

            $faculty = DeanFaculty::find($recommendation[0]->dean_faculty_id);
            $student = $faculty->recommendations()->where('student_id', $recommendation[0]->student_id)->first();

            return view('recommendation.show', compact('student'));
        // }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = \Auth::user()->userable->recommendations()->where('student_id', $id)->first();

        return view('recommendation.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $student = \Auth::user()->userable->recommendations()->where('student_id', $id)->first();
        // dd($request);
        \Auth::user()->userable->recommendations()
            ->updateExistingPivot($id, array('recommendation_details' => $request['recommendation_details']));

        return \Redirect::route('recommendations.show', $request['recommendation_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Custom methods

    public function getStudents()
    {
        $students = Student::where('school_id', \Auth::user()->userable->school_id)->get();

        return view('recommendation.students', compact('students'));
    }

    public function recommendStudent(Request $request)
    {
        $student = Student::find($request['student_id']);

        return view('recommendation.create', compact('student'));
    }

    public function viewRecommendationsOfStudent($id)
    {
        $student = Student::with('recommendations')->find($id);
        $faculties = $student->recommendations;
        // dd($faculties);
        return view('recommendation.viewrecommendations', compact('faculties', 'student'));
    }
}
