<header class="main-header">
    <div class="inside-header">
      <div class="d-flex align-items-center logo-box justify-content-start">
          <!-- Logo -->
          <a href="index.html" class="logo">
            <!-- logo-->
            <div class="logo-lg">
                <span class="light-logo">GeontaTest</span>
                <span class="dark-logo">GeontaTest</span>
            </div>
          </a>	
      </div>  
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <div class="app-menu">
          <ul class="header-megamenu nav">
              <li class="btn-group d-lg-inline-flex d-none">
                  <div class="app-menu">
                      <div class="search-bx mx-5">
                          <form>
                              <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                  <button class="btn" type="submit" id="button-addon3"><i data-feather="search"></i></button>
                                </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </li>
          </ul> 
        </div>

        <div class="navbar-custom-menu r-side">
          <ul class="nav navbar-nav">	
              
            @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                    <a href="{{ url('/admin/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                                @else
                                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                                    {{-- @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                    @endif --}}
                                @endauth
                            </div>
                        @endif
            <!-- User Account-->
            <li class="dropdown user user-menu">
              <a href="#" class="waves-effect waves-light dropdown-toggle btn-primary" data-bs-toggle="dropdown" title="User">
                  <i class="fa fa-user"></i>
              </a>
              <ul class="dropdown-menu animated flipInX">
                <li class="user-body">
                   <a class="dropdown-item" href="#"><i class="ti-user text-muted me-2"></i> Profile</a>
                   <div class="dropdown-divider"></div>
                   <a class="dropdown-item" href="{{ route('logout'); }}"><i class="ti-lock text-muted me-2"></i> Logout</a>
                </li>
              </ul>
            </li>	
          </ul>
        </div>
      </nav>
    </div>
</header>