<div class="side-menu">
  <aside class="menu m-t-30 m-l-10">
    <p class="menu-label">
      General
    </p>
    <ul class="menu-list">
      <li><a href="{{route('admin.index')}}">Dashboard</a></li>
    </ul>
    <p class="menu-label">
      Administrator
    </p>
    <ul class="menu-list">
      <li><a href="{{route('users.index')}}">Manage Users</a></li>
      <a href="{{route('permissions.index')}}">Roles & Permissions</a>
      <li>
        <ul>
          <li><a href="{{route('roles.index')}}">Roles</a></li>
          <li><a href="{{route('permissions.index')}}">Permissions</a></li>
        </ul>

      </li>
    </ul>
  </aside>
</div>