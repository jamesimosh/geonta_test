<nav class="main-nav" role="navigation">
    <!-- Mobile menu toggle button (hamburger/x icon) -->
    <input id="main-menu-state" type="checkbox" />
    <label class="main-menu-btn" for="main-menu-state">
        <span class="main-menu-btn-icon"></span> Toggle main menu visibility
    </label>

    <!-- Sample menu definition -->
    <ul id="main-menu" class="sm sm-blue">
        <li>
            <a href="{{ route('admin.home') }}"><i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>Dashboard</a>
        </li>
        <li>
            <a href="#"><i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>Adverts</a>
            <ul>
                <li><a href="{{ route('admin.adverts') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List all Adverts</a></li>                              
            </ul>
        </li>

        <li>
            <a href="#"><i span class="icon-Layout-grid"><span class="path1"></span><span class="path2"></span></i>Booked Adverts</a>
            <ul>
                <li><a href="{{ route('admin.avertsbookings') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>List all Bookings</a></li>                              
            </ul>
        </li>
        	  
        <li>
            <a href="#"><i class="icon-Cart"><span class="path1"></span><span class="path2"></span></i>Reports</a>
            <ul>
                <li>
                    <a href="">
                        <i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Adverts
                    </a>
                </li>
                <li>
                    <a href=""><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Users</a>
                </li>
                <li>
                    <a href=""><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Audit Logs</a>
                </li>
            </ul>
        </li>
        {{-- <li>
            <a href=""><i class="icon-Mail-notification"><span class="path1"></span><span class="path2"></span></i>Problems</a>
        </li> --}}
    </ul>
</nav>