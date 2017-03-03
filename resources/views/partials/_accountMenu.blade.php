<ul>
    <li><a href="/orders">Order History</a></li>
    <li><a href="/cart">My Cart</a></li>
    <li><a href="/wishlist">My Wishlist</a></li>
    <li><a href="#">Account/Password </a></li>
    <li><a href="{{ url('/logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
       Logout
    </a>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    </li>
</ul>