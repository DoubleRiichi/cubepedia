
    <div class="container-fluid p-0 d-flex flex-grow-1">
        <div id="bdSidebar" 
             class="d-flex flex-column 
                    flex-shrink-0 
                    p-3 bg-success
                    text-white offcanvas-md offcanvas-start"
                    >
            <a href="#" 
               class="navbar-brand">
            </a>
            <span class="text-light fs-5 mb-4 text-center">Cubepedia!</span>
            <div class="dropdown">
    @if(Auth::check())

        <a href="#" class="d-flex align-items-center link-light text-decoration-none" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">  <!--  dropdown-toggle -->
        <div class="col border text-dark bg-light p-2">
            <img src="{{asset("storage/" . Auth::user()->avatar)}}" alt="" width="32" height="32" class="border border-1  border-dark  me-2">
            <span class="nav-item"><strong>{{Auth::user()->username}}</strong></span>
        </div>
        </a>
    @else
        <span class="text-light">Hello, anonymous!</span>
    @endif
      <!-- <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
        <li><a class="dropdown-item" href="#">New Article...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul> -->
    </div>
            <hr>
            <ul class="mynav nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-1">
                    <a href="/">
                        <i class="fa-solid fa-house"></i>
                        Home
                    </a>
                </li>
@if(Auth::check())
                <li class="nav-item mb-1">
                    <a href="#">
                        <i class="fa-regular fa-bookmark"></i>
                        New Article
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="#">
                        <i class="fa-regular fa-newspaper"></i>
                        Articles
                    </a>
                </li>
@endif
                <li class="nav-item mb-1">
                    <a href="#">
                        <i class="fa-solid fa-archway"></i>
                        Discussions
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/random">
                        <i class="fa-solid fa-graduation-cap"></i>
                        Random Article
                    </a>
                </li>
@if(Auth::check())
    @if(Auth::user()->status == "admin")
                <li class="nav-item mb-1">
                    <a href="#">
                    <i class="fas fa-cog pe-2"></i>
                        Moderation
                    </a>
                </li>
    @endif
                <li class="nav-item mb-1">
                    <a href="#">
                    <i class="fas fa-cog pe-2"></i>
                        Settings
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/auth/logout">
                    <i class="fas fa-sign-out-alt pe-2"></i>
                        Logout
                    </a>
                </li>
@else

                <li class="nav-item mb-1">
                    <a href="/auth/login">
                    <i class="fas fa-sign-in-alt pe-2"></i>
                        Login
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/auth/register">
                    <i class="fas fa-user-plus pe-2"></i>
                        Register
                    </a>
                </li>

@endif

                <!-- <li class="sidebar-item  nav-item mb-1">
                    <a href="#" 
                       class="sidebar-link collapsed" 
                       data-bs-toggle="collapse"
                       data-bs-target="#settings"
                       aria-expanded="false"
                       aria-controls="settings">
                        <i class="fas fa-cog pe-2"></i>
                        <span class="topic">Settings </span>
                    </a>
                    <ul id="settings" 
                        class="sidebar-dropdown list-unstyled collapse" 
                        data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="fas fa-sign-in-alt pe-2"></i>
                                <span class="topic"> Login</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="fas fa-user-plus pe-2"></i>
                                <span class="topic">Register</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link">
                                <i class="fas fa-sign-out-alt pe-2"></i>
                                <span class="topic">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>
            <hr>
            <div class="d-flex">

                <i class="fa-solid fa-book  me-2"></i>
                <span>
                    <h6 class="mt-1 mb-0">
                          Cubepedia - 2024
                      </h6>
                </span>
            </div>
        </div>

        <div class="bg-light flex-fill">
            <div class="p-2 d-md-none d-flex text-white bg-success">
                <a href="#" class="text-white" 
                   data-bs-toggle="offcanvas"
                   data-bs-target="#bdSidebar">
                    <i class="fa-solid fa-bars"></i>
                </a>
                <span class="ms-3">Cubepedia</span>
            </div>
            <div class="p-4">
                <nav style="--bs-breadcrumb-divider:'>';font-size:14px">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <i class="fa-solid fa-house"></i>
                        </li>
                        @foreach ($current_url as $url_part)
                        <li class="breadcrumb-item">{{$url_part}}</li>
                        @endforeach
  
                    </ol>
                </nav>

                <hr>
        <div class="col py-3 scroll-area">
