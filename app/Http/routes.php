<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Index
Route::get('/', 'JobsController@index');

//for testing

// Route::get('job_posts/jobview','PagesController@jobview');
// Route::get('job_posts/jobcreate','PagesController@jobcreate');
// Route::get('job_posts/jobedit','PagesController@jobedit');

// Route::get('recommendation/students', 'PagesController@recommendStudents');

// PagesController
Route::get('company/show', 'PagesController@companyShow');
Route::get('dean/show', 'PagesController@deanShow');
Route::get('company/edit', 'PagesController@companyEdit');
Route::get('students/joblists', 'PagesController@jobLists');
Route::get('students/companylists', 'PagesController@companyLists');
Route::get('students/schoollists', 'PagesController@SchoolLists');

Route::get('schools/show','PagesController@schoolShow');
Route::get('schools/edit','PagesController@schoolEdit');

// Route::get('admin/index', 'PagesController@adminIndex');
// Route::get('admin/students', 'PagesController@adminStudentLists');
// Route::get('admin/companies', 'PagesController@adminCompanyLists');
// Route::get('admin/schools', 'PagesController@adminSchoolLists');
// Route::get('admin/faculties', 'PagesController@adminFacultyLists');
// Route::get('admin/jobs', 'PagesController@adminJobLists');
// Route::get('admin/applications', 'PagesController@admingAppLists');
// Route::get('admin/applications', 'PagesController@adminRecommendLists');
// Route::get('admin/categories', 'PagesController@adminCategoryLists');
// Route::get('admin/categories/create', 'PagesController@adminCreateCategories');


// Authentication
Route::get('about', 'PagesController@about');

Route::get('preregister', 'Auth\AuthController@preregister');
Route::post('preregister', 'Auth\AuthController@registerByUserType');
Route::get('register/admin', 'Auth\AuthController@registerAsAdmin');
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::get('admin/students', 'StudentsController@index');
// Admin Routes
Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function() {
    Route::resource('categories', 'CategoriesController');
    Route::get('admin/students', 'StudentsController@index');
    Route::get('admin/schools', 'SchoolsController@index');
    Route::get('admin/faculties', 'FacultiesController@index');
    Route::get('admin/companies', 'CompaniesController@index');
    Route::get('admin/applications', 'ApplicationsController@index');
    Route::get('admin/pending-applications', 'ApplicationsController@showPendingApplications');
    Route::get('admin/successful-applications', 'ApplicationsController@showSuccessfulApplications');
    Route::get('admin/declined-applications', 'ApplicationsController@declinedApplications');
    Route::get('admin/recommendations', 'RecommendationsController@index');
    Route::get('admin/jobs', 'JobsController@index');
    Route::get('admin/active-jobs', 'JobsController@activeJobs');
    Route::get('admin/expired-jobs', 'JobsController@expiredJobs');
    Route::post('admin/jobs/retrieve/{id}', array('as' => 'jobs.retrieve', 'uses' => 'JobsController@retrieve'));
    Route::delete('admin/jobs/destroy/{id}', array('as' => 'jobs.forcedelete', 'uses' => 'JobsController@destroy'));
    Route::delete('admin/jobs/delete/{id}', array('as' => 'jobs.delete', 'uses' => 'JobsController@setJobAsExpired'));
    Route::delete('admin/users/delete/{id}', array('as' => 'admin.delete', 'uses' => 'UsersController@destroy'));
    Route::post('admin/users/retrieve/{id}', array('as' => 'admin.retrieve', 'uses' => 'UsersController@retrieve'));
    Route::delete('admin/users/force-delete/{id}', array('as' => 'admin.forcedelete', 'uses' => 'UsersController@forceDelete'));
});


// NOTE: Resource routes must be at the top of User Routes to avoid being overridden
// Job Posts Routes
Route::post('jobs/apply', ['as' => 'jobs.apply', 'uses' => 'JobsController@apply']);
Route::post('jobs/cancel', ['as' => 'jobs.cancel', 'uses' => 'JobsController@cancelApplication']);
Route::get('jobs/category/{id}', ['as' => 'jobs.category', 'uses' => 'JobsController@getJobsByCategory']);
Route::resource('jobs', 'JobsController');

// Faculty Routes
Route::resource('faculties', 'FacultiesController');

// Student Routes
Route::get('students/skills/{name}', 'StudentsController@studentsBySkill');
Route::resource('students', 'StudentsController');

// Companies Routes
Route::post('companies/partner', ['as' => 'companies.partner', 'uses' => 'CompaniesController@requestPartnership']);
Route::post('companies/accept', ['as' => 'companies.accept', 'uses' => 'CompaniesController@acceptPartnership']);
Route::get('companies/{id}/jobs', ['as' => 'companies.posts', 'uses' => 'CompaniesController@getJobsPosted']);
Route::resource('companies', 'CompaniesController');

// Schools Routes
Route::post('schools/partner', ['as' => 'schools.partner', 'uses' => 'SchoolsController@requestPartnership']);
Route::post('schools/accept', ['as' => 'schools.accept', 'uses' => 'SchoolsController@acceptPartnership']);
Route::resource('schools', 'SchoolsController');

// Application Routes
Route::get('/applications', ['as' => 'application.index', 'uses' => 'ApplicationsController@index']);

// Recommendation Routes
Route::post('recommendations/students', 'RecommendationsController@recommendStudent');
Route::get('recommendations/students', 'RecommendationsController@getStudents');
Route::get('recommendations/student/{id}', 'RecommendationsController@viewRecommendationsOfStudent');
Route::resource('recommendations', 'RecommendationsController');

// Partnership Routes
Route::resource('partnerships', 'PartnershipsController');

// User Routes
Route::get('/{id}', ['as' => 'users.show', 'uses' => 'UserController@show']);
Route::get('/{id}/edit', 'UserController@edit');
Route::put('/{id}', 'UserController@update');


//testin login
// Route::get('login','PagesController@login');
// Route::get('register','PagesController@register');
// Route::get('preregister','PagesController@preregister');
// Route::post('preregister', 'PagesController@userType');
