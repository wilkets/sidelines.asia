<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    @if(Auth::check() == true)
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            @if(!empty(Auth::user()->image))
              <img src="{{ asset('img/profilepics/' . Auth::user()->image) }}" class="img-circle" alt="User Image">
            @elseif(Auth::user()->user_type == 'c')
              <img src="{{ asset('dist/img/avatar-default-company.png') }}" class="img-circle" alt="User Image">
            @elseif(Auth::user()->user_type == 'sa')
              <img src="{{ asset('dist/img/avatar-default-school.png') }}" class="img-circle" alt="User Image">
            @elseif(Auth::user()->user_type == 'admin')
                <img src="{{ asset('dist/img/avatar_admin.png') }}" class="img-circle" alt="User Image">
            @else
              <img src="{{ asset('dist/img/avatar-default.png') }}" class="img-circle" alt="User Image">
            @endif
          </div>
          <div class="pull-left info">
            <p>
              <a href="{{ URL::to('/' . Auth::user()->id) }}">
                @if(Auth::user()->user_type == 'c' || Auth::user()->user_type == 'sa')
                  {{ Auth::user()->userable->name }}
                @elseif(Auth::user()->user_type == 'admin')
                  {{ Auth::user()->email }}
                @else
                  @if(count(explode(' ', Auth::user()->userable->fname)) > 2)
                    {{ current(explode(' ', Auth::user()->userable->fname)) . " " . Auth::user()->userable->lname }}
                  @else
                    {{ Auth::user()->userable->fname . " " . Auth::user()->userable->lname }}
                  @endif
                @endif
              </a>
            </p>
            <!-- Status -->
            @if(Auth::user()->user_type == 's')
              <a href="#"><i class="fa fa-circle text-success"></i> Student </a>
            @elseif(Auth::user()->user_type == 'f')
              <a href="#"><i class="fa fa-circle text-success"></i> Faculty </a>
            @elseif(Auth::user()->user_type == 'd')
                <a href="#"><i class="fa fa-circle text-success"></i> Dean </a>
            @elseif(Auth::user()->user_type == 'c')
                <a href="#"><i class="fa fa-circle text-success"></i> Company </a>
            @elseif(Auth::user()->user_type == 'sa')
                <a href="#"><i class="fa fa-circle text-success"></i> School Admin </a>
            @elseif(Auth::user()->user_type == 'admin')
                <a href="#"><i class="fa fa-circle text-success"></i> Super Admin </a>
            @endif
          </div>
        </div>
    @endif

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">

      <!-- error trap for navs -->
      @if(Auth::check() == true)
        @if(Auth::user()->user_type == 's')
          @include('students._sidebar')
        @elseif(Auth::user()->user_type == 'f' || Auth::user()->user_type == 'd')
          @include('faculties._sidebarFaculty')
        @elseif(Auth::user()->user_type == 'c')
          @include('companies._sidebarCompany')
        @elseif(Auth::user()->user_type == 'sa')
          @include('schools._sidebarSchools')
        @elseif(Auth::user()->user_type == 'admin')
          @include('admin._sidebarAdmin')
        @endif
        <hr class="side-hr"/>
      @endif

      <li class="header" style="margin-left: -3px;">Job Categories</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="#"><a href="{{ URL::to('jobs') }}">All Jobs</a></li>
      @foreach($categories as $category)
        <li class="#"><a href="{{ URL::route('jobs.category', $category->id) }}"><span> {{ $category->name }} </span></a></li>
      @endforeach



    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
