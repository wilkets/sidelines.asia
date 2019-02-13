<!-- <li class="header" style="margin-left: -3px;">Actions</li>

    <li>
        <a href="#">
            <i class="glyphicon glyphicon-plus text-green"></i> <span class="text-green">Update Student Account</span>
        </a>
    </li>

<hr class="side-hr"/> -->

<li class="header" style="margin-left: -3px;">Labels</li>

    <li>
        <a href="{{ URL::route('application.index') }}">
            <i class="fa fa-user-plus"></i><span> Applications </span>
        </a>
    </li>
    <li>
        <a href="{{ URL::route('students.index') }}">
            <i class="fa fa-mortar-board"></i><span> Students </span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span> Hired Students </span>
        </a>
    </li>
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
        <a href="{{ URL::route('partnerships.index') }}">
            <i class="fa fa-users"></i><span> Partners </span>
        </a>
    </li>
