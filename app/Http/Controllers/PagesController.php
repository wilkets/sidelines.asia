<?php

namespace sidelines\Http\Controllers;

use Illuminate\Http\Request;

use sidelines\Http\Requests;
use sidelines\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function jobview()
    {
        return view('job_posts.jobview');
    }

    public function jobcreate()
    {
        return view('job_posts.jobcreate');
    }

    public function jobedit()
    {
        return view('job_posts.jobedit');
    }

    public function companyShow()
    {
        return view('pages.companyprofile');
    }

    public function deanShow()
    {
        return view('pages.deanprofile');
    }
    public function companyEdit()
    {
        return view('pages.companyedit');
    }
    public function studentIndex()
    {
        return view('students.index');
    }

    public function studentShow()
    {
        return view('students.show');
    }

    public function studentEdit()
    {
        return view('students.edit');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function preregister()
    {
        return view('auth.preregister');
    }

    public function recommendStudents()
    {
        return view('recommendation.students');
    }

    public function about()
    {
        return view('auth.about');
    }


    public function userType(Request $request) {

        //dd($request);

        if($request['user_type'] === 's')
        {
            $user_type = 'student';
        }
        else if($request['user_type'] === 'sa')
        {
            $user_type = 'school_admin';
        }
        else if($request['user_type'] === 'df')
        {
            $user_type = 'dean_faculty';
        }
        else if($request['user_type'] === 'c')
        {
            $user_type = 'company';
        }

        //dd($user_type);
        //return redirect('auth/register', ['user_type' => $user_type]);
        //return \Redirect::to('/auth/register', compact($request['user_type']));

        return \Redirect::to('/auth/register')->with('user_type', $user_type);
    }

    public function jobLists()
    {
        return view('pages.joblists');
    }
    public function companyLists()
    {
        return view('pages.companylists');
    }
    public function schoolLists()
    {
        return view('pages.schoollists');
    }

    public function schoolShow()
    {
        return view('schools.show');
    }
    public function schoolEdit()
    {
        return view('schools.edit');
    }

    public function adminRegister()
    {
        return view('admin.register');
    }

    public function adminIndex()
    {
        return view('admin.index');
    }

    public function adminStudentLists()
    {
        return view('admin._studentLists');
    }

    public function adminCompanyLists()
    {
        return view('admin._companyLists');
    }

    public function adminSchoolLists()
    {
        return view('admin._schoolLists');
    }

    public function adminFacultyLists()
    {
        return view('admin._facultyLists');
    }

    public function adminJobLists()
    {
        return view('admin._jobLists');
    }

    public function admingAppLists()
    {
        return view('admin._applicationLists');
    }

    public function adminRecommendLists()
    {
        return view('admin._recommendLists');
    }

    public function adminCategoryLists()
    {
        return view('admin._categoryLists');
    }

    public function adminCreateCategories()
    {
        return view('admin._categoryCreate');
    }
}
