<?php

namespace sidelines\Http\Controllers\Auth;

use sidelines\User;
use sidelines\Student;
use sidelines\Company;
use sidelines\School;
use sidelines\DeanFaculty;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Registrar;
use sidelines\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    // Redirect to this path after registration or login.
    protected $redirectPath = '/';
    protected $redirectAfterLogout = '/login';
    protected $loginPath = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('account', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $user_type = $data['user_type'];

        // 0 = dean and 1 = faculty
        // only the dean and faculty requires key code for registration
        // for other users, they don't need it

        if($user_type === '0' || $user_type === '1')
        {
            $rules = [
                'fname' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
                'lname' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
                'schools' => 'required|exists:schools,id',
                //'position' => 'required',
                'key_code' => 'exists:schools',
            ];
        }
        else if($user_type === 'student')
        {
            $rules = [
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
                'fname' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
                'lname' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
                'schools' => 'required|exists:schools,id',
            ];
        }
        else if($user_type === 'admin')
        {
            $rules = [
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
                'admin_code' => 'required|in:s1d3l1n3sjw3@r',
            ];
        }
        else
        {
            $rules = [
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6',
                'user_type' => 'required',
            ];
        }

        $validator = Validator::make($data, $rules);

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user_type = $data['user_type'];

        if($user_type === 'admin')
        {
            $this->redirectPath = '/';
            $user = User::create([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'user_type' => 'admin',
            ]);

            return $user;
        }


        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        /*
            There are four user types, mainly:
            student
            company
            0 = dean
            1 = faculty
        */
        if($user_type === 'student')
        {
            $date = $data['year'].'-'.$data['month'].'-'.$data['day'];
            $date = date("Y-m-d", strtotime($date));

            $school = School::find($data['schools']);

            $student = new Student();
            $student->lname = $data['lname'];
            $student->fname = $data['fname'];
            $student->gender = $data['gender'];
            $student->date_of_birth = $date;
            $student->save();
            $user->user_type = 's';
            $school->students()->save($student);
            $student->user()->save($user);
        }
        else if($user_type === 'company')
        {
            $company = new Company();
            $company->name = $data['company_name'];
            $company->save();
            $user->user_type = 'c';
            $company->user()->save($user);
        }
        else if($user_type === 'school')
        {
            $school = new School();
            $school->name = $data['school_name'];
            $school->key_code = $data['key_code'];
            $school->save();
            $user->user_type = 'sa';
            $school->user()->save($user);
        }
        else if($user_type === '0')
        {
            $date = $data['year'].'-'.$data['month'].'-'.$data['day'];
            $date = date("Y-m-d", strtotime($date));

            $dean = new DeanFaculty();
            $dean->lname = $data['lname'];
            $dean->fname = $data['fname'];
            $dean->gender = $data['gender'];
            $dean->date_of_birth = $date;
            $school = School::find($data['schools']);
            $school->deans_faculties()->save($dean);
            $user->user_type = 'd';
            $dean->user()->save($user);
        }
        else if($user_type === '1')
        {
            $date = $data['year'].'-'.$data['month'].'-'.$data['day'];
            $date = date("Y-m-d", strtotime($date));

            $faculty = new DeanFaculty();
            $faculty->lname = $data['lname'];
            $faculty->fname = $data['fname'];
            $faculty->gender = $data['gender'];
            $faculty->date_of_birth = $date;
            $school = School::find($data['schools']);
            $school->deans_faculties()->save($faculty);
            $user->user_type = 'f';
            $faculty->user()->save($user);
        }

        $this->redirectPath = '/' . $user->id;

        return $user;
    }

    public function preregister()
    {
        return view('auth.preregister');
    }

    public function registerByUserType(Request $request)
    {
        if($request['user_type'] === 's')
        {
            $user_type = 'student';
            $schools = School::lists('name', 'id');

            return \Redirect::to('register')->with('user_type', $user_type)->with('schools', $schools);
        }
        else if($request['user_type'] === 'sa')
        {
            $user_type = 'school_admin';
        }
        else if($request['user_type'] === 'df')
        {
            $user_type = 'dean_faculty';
            $schools = School::lists('name', 'id');

            return \Redirect::to('register')->with('user_type', $user_type)->with('schools', $schools);
        }
        else if($request['user_type'] === 'c')
        {
            $user_type = 'company';
        }

        return \Redirect::to('register')->with('user_type', $user_type);
    }

    public function authenticated(Request $request, User $user)
    {
        if($user->user_type === 's')
        {
            $this->redirectPath = '/jobs';
        }
        else if($user->user_type === 'sa')
        {
            $this->redirectPath = '/students';
        }
        else if($user->user_type === 'c')
        {
            $this->redirectPath = '/recommendations';
        }
        else if($user->user_type === 'd' || $user->user_type === 'f')
        {
            $this->redirectPath = '/applications';
        }
        else if($user->user_type === 'admin')
        {
            $this->redirectPath = '/admin';
        }

        return redirect()->intended($this->redirectPath());
    }

    public function registerAsAdmin()
    {
        return view('admin.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $remember = true;

        \Auth::login($this->create($request->all()), $remember);

        if(\Auth::check())
        {
            if(\Auth::user()->user_type === 'admin')
            {
                $this->redirectPath = '/';
            }
            else
            {
                $this->redirectPath = '/' . \Auth::user()->id . '/edit';
            }
        }

        return redirect($this->redirectPath());
    }
}
