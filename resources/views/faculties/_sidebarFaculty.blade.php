<li>
    <a href="{{ URL::to('recommendations/students') }}">
        <i class="glyphicon glyphicon-plus text-green"></i> <span class="text-green">Recommend a Student</span>
    </a>
</li>

<hr class="side-hr"/>

<li class="header" style="margin-left: -3px;">Labels</li>

<li>
    <a href="{{ URL::route('schools.index') }}">
        <i class="fa fa-university"></i> <span> Schools </span>
    </a>
</li>

<li>
    <a href="{{ URL::route('companies.index') }}">
        <i class="fa fa-building"></i> <span> Companies </span>
    </a>
</li>
<li>
    <a href="{{ URL::route('application.index') }}">
        <i class="fa fa-user-plus"></i><span> Applications </span>
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
