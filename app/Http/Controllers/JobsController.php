<?php

namespace sidelines\Http\Controllers;

use Illuminate\Http\Request;

use sidelines\Job;
use sidelines\Category;
use sidelines\Http\Requests;
use sidelines\Http\Controllers\Controller;
use sidelines\Http\Requests\JobFormRequest;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('job', ['except' => ['index', 'show', 'apply', 'cancelApplication', 'getJobsByCategory']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'DESC')->get();

        return view('index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('job_posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobFormRequest $request)
    {
        // dd($request['categories']);
        $job = new Job();
        $job->name = $request['name'];
        $job->description = $request['description'];
        $job->major_benefit = $request['major_benefit'];
        $job->other_benefits = $request['other_benefits'];
        $job->deadline_of_application = $request['deadline_of_application'];

        \Auth::user()->userable->jobs()->save($job);

        $job->categories()->attach($request['categories']);

        return \Redirect::route('jobs.show', $job->id)->with([
            'flash_message' => 'Job post successfully created!',
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Job::where('id', $id)->exists())
        {
            $job = Job::with('applicants')->find($id);
            $categories = Category::all();

            return view('job_posts.show', compact('job', 'categories'));
        }

        // This part will be used for the admin job controller

        $job = Job::withTrashed()->where('id', $id)->first();

        if($job != null && $job->deleted_at != null)
        {
            $categories = Category::all();

            return view('job_posts.show', compact('job', 'categories'));
        }

        return \Redirect::route('jobs.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::with('categories')->find($id);
        $categories = Category::all();
        $past_categories = $job->categories->lists('id')->toArray();

        return view('job_posts.edit', compact('job', 'categories', 'past_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobFormRequest $request, $id)
    {
        $job = Job::find($id);

        $job->update($request->all());

        if($request['categories'] != null && count($request['categories']) > 0)
        {
            $job->categories()->sync($request['categories']);
        }

        return \Redirect::route('jobs.show', $id)->with([
            'flash_message' => 'Job post successfully updated!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::destroy($id);

        return \Redirect::route('companies.posts', \Auth::user()->userable->id);
    }

    // Custom methods for jobs
    public function apply(Request $request)
    {
        $job = Job::with('applicants')->find($request['job_id']);

        $job->applicants()->attach(\Auth::user()->userable->id);

        return \Redirect::route('jobs.show', $request['job_id']);
    }

    public function cancelApplication(Request $request)
    {
        $job = Job::with('applicants')->find($request['job_id']);

        $job->applicants()->detach(\Auth::user()->userable->id);

        return \Redirect::route('jobs.show', $request['job_id']);
    }

    public function getJobsByCategory($id)
    {
        $category = Category::with('jobs')->find($id);
        $jobs = $category->jobs;

        return view('index', compact('jobs'));
    }

    public function jobLists($id)
    {
        $userJobs = Job::find($id)->orderBy('created_at', 'DESC');

        return view('users._jobposts', compact('userJobs'));
    }
}
