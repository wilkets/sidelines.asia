<li class="header" style="margin-left: -3px;">Actions</li>

<li>
    <a href="{{ URL::to('/jobs/create') }}">
        <i class="glyphicon glyphicon-plus text-green"></i> <span class="text-green">Post a Job</span>
    </a>
</li>

<hr class="side-hr"/>

<li class="header" style="margin-left: -3px;">Labels</li>

<li>
    <a href="{{ URL::route('companies.posts', Auth::user()->userable->id) }}">
        <i class="fa fa-list-ol"></i> <span> Jobs Posted </span>
    </a>
</li>
<li class="#">
    <a href="{{ URL::route('recommendations.index') }}">
         <i class="fa fa-thumbs-up"></i><span> Recommended Students </span>
    </a>
</li>
<li>
    <a href="#">
        <i class="fa fa-calendar-check-o"></i> <span> Hired Students </span>
    </a>
</li>
<li>
    <a href="{{ URL::route('companies.index') }}">
        <i class="fa fa-building"></i> <span> Companies </span>
    </a>
</li>
<li>
    <a href="{{ URL::route('schools.index') }}">
        <i class="fa fa-university"></i> <span> Schools </span>
    </a>
</li>
<li>
    <a href="{{ URL::route('partnerships.index') }}">
        <i class="fa fa-users"></i><span> Partners </span>
    </a>
</li>
