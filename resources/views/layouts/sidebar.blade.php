<nav id="sidebar">
    <div class="sidebar-header">
        <h3><a class="navbar-brand" href="{{ url('/') }}">Revenue Collection</a></h3>
    </div>

    <ul class="list-unstyled components">
        <p>Hello {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        <li>
            <a href="#shop_owners" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Shop Owners</a>
            <ul class="collapse list-unstyled" id="shop_owners">
                <li>
                    <a href="{{ route('store_owners.create') }}">Add Shop Owner</a>
                </li>
                <li>
                    <a href="{{ route('store_owners.view') }}">View Shop Owners</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Reports</a>
            <ul class="collapse list-unstyled" id="reports">
                <li>
                    <a href="{{ route('reports.payments') }}">Payment Reports</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#settings" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Settings</a>
            <ul class="collapse list-unstyled" id="settings">
                <li>
                    <a href="{{ route('settings.edit_fees') }}">Fees</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Other</a>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li>
            <a class="download" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>
