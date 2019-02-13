<li class="header" style="margin-left: -3px;">Actions</li>

    <li>
        <a href="{{ URL::route('categories.create') }}">
            <i class="glyphicon glyphicon-plus text-green"></i> <span class="text-green">Add Category</span>
        </a>
    </li>

<hr class="side-hr"/>

<li class="header" style="margin-left: -3px;">Users</li>

    <li>
        <a href="{{ URL::to('admin/students') }}">
            <i class="fa fa-mortar-board"></i><span> Students </span>
        </a>
    </li>
    <li>
        <a href="{{ URL::to('admin/companies') }}">
            <i class="fa fa-building"></i><span> Companies </span>
        </a>
    </li>
    <li>
        <a href="{{ URL::to('admin/schools') }}">
            <i class="fa fa-university"></i> <span> Schools </span>
        </a>
    </li>
    <li>
        <a href="{{ URL::to('admin/faculties') }}">
            <i class="fa fa-user"></i> <span> Faculties </span>
        </a>
    </li>

<li class="header" style="margin-left: -3px;">Labels</li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-user-plus"></i> <span>Applications</span> <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
            <li><a href="{{ URL::to('admin/pending-applications') }}"><i class="fa fa-circle-o"></i> Pending </a></li>
            <li><a href="{{ URL::to('admin/successful-applications') }}"><i class="fa fa-circle-o"></i> Hired Students</a></li>
            <li><a href="{{ URL::to('admin/declined-applications') }}"><i class="fa fa-circle-o"></i> Declined Students</a></li>
        </ul>
    </li>
    <li>
        <a href="{{ URL::route('categories.index') }}">
            <i class="fa fa-file-text-o"></i><span> Categories </span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-clipboard"></i> <span>Job Posts</span> <i class="fa fa-angle-left pull-right"></i>
         </a>
         <ul class="treeview-menu">
            <li class="#"><a href="{{ URL::to('admin/active-jobs') }}"><i class="fa fa-circle-o"></i> Active </a></li>
            <li><a href="{{ URL::to('admin/expired-jobs') }}"><i class="fa fa-circle-o"></i> Expired </a></li>
        </ul>
    </li>
    <li>
        <a href="{{ URL::to('admin/recommendations') }}">
            <i class="fa fa-thumbs-up"></i><span> Recommendations </span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-users"></i><span> Partners </span>
        </a>
    </li>
    <li>
        <a href="#">
            <i class="fa fa-money"></i><span> Payments </span>
        </a>
    </li>
