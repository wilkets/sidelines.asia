<header class="main-header">
  <!-- Logo -->

  <a href="{{ asset('/') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <!-- <span class="logo-mini"><b>S</b>.ph</span> -->
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">
        <img src="/dist/img/slogo1.png" class="side-logo" style="margin-left:-5px;"/>
    </span>
  </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Navbar Right Menu -->
      @if(Auth::check() == true)
          <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->




                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    @if(!empty(Auth::user()->image))
                      <img src="{{ asset('img/profilepics/' . Auth::user()->image) }}" class="user-image" alt="User Image">
                    @elseif(Auth::user()->user_type == 'c')
                      <img src="{{ asset('dist/img/avatar-default-company.png') }}" class="user-image" alt="User Image">
                    @elseif(Auth::user()->user_type == 'sa')
                      <img src="{{ asset('dist/img/avatar-default-school.png') }}" class="user-image" alt="User Image">
                    @elseif(Auth::user()->user_type == 'admin')
                      <img src="{{ asset('dist/img/avatar_admin.png') }}" class="user-image" alt="User Image">
                    @else
                      <img src="{{ asset('dist/img/avatar-default.png') }}" class="user-image" alt="User Image">
                    @endif

                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    @if(Auth::user()->user_type == 'c' || Auth::user()->user_type == 'sa')
                      <span class="hidden-xs">{{ Auth::user()->userable->name  }}</span>
                    @elseif(Auth::user()->user_type == 'admin')
                      <span class="hidden-xs"> Super Admin </span>
                    @else
                      <span class="hidden-xs">{{ Auth::user()->userable->fname . " " . Auth::user()->userable->lname  }}</span>
                    @endif

                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
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
                      <p>
                          @if(Auth::user()->user_type == 'c' || Auth::user()->user_type == 'sa')
                            {{ Auth::user()->userable->name  }}
                          @elseif(Auth::user()->user_type == 'admin')
                            {{ Auth::user()->email }}
                          @else
                            {{ Auth::user()->userable->fname . " " . Auth::user()->userable->lname  }}
                          @endif

                          @if(Auth::user()->user_type == 'd' || Auth::user()->user_type == 'f')
                            <small>{{ Auth::user()->userable->school->name }}</small>
                          @else
                            <small>Member since {{ date("M d, Y", strtotime(Auth::user()->created_at)) }}</small>
                          @endif
                      </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="{{ URL::to('/' . Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="/logout" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
            </ul>
          </div>
      @else
        <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="#">
              <a href="{{ url('/about') }}">
                <i class="fa fa-rocket"></i> About <span class="sr-only"></span>
              </a>
            </li>
            <li class="#">
              <a href="{{ url('/preregister') }}">
                <i class="fa fa-share"></i> Register <span class="sr-only"></span>
              </a>
            </li>
            <li class="#">
              <a href="{{ url('/login') }}">
                <i class="fa fa-sign-in"></i> Sign in <span class="sr-only"></span>
              </a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      @endif
  </nav>
</header>
