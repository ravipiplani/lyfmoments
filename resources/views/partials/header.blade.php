<nav class="navbar navbar-expand-md navbar-light bg-transparent mb-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center text-white" href="{{route('index')}}"><img src="/assets/img/logo.svg" alt="Example Navbar 1" class="mr-2" height="30">LYF<span class="text-warning">MOMENTS</span></a>
    </div>
    <div class="collapse navbar-collapse mr-auto text-center" id="navbarNavDropdown-3">
        <ul class="navbar-nav ml-auto ">
            <li class="nav-item m-2 m-md-0">
                <h5 class="link text-warning mt-2">
                <span class="text-white">{{\App\Config::get_value('moments_count')}}</span> #lyfmoments <br />Shared
                </h5>
            </li>
        </ul>
    </div>
</nav>