<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">General</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
              <a href="{{route('home.dashboard')}}">
                  <span class="pcoded-micon"><i class="icofont icofont-dashboard-web"></i></span><span class="pcoded-mtext">Dashboard</span>
              </a>
            </li>
            <li class=" ">
                <a href="{{url('my-qrcode')}}">
                    <span class="pcoded-micon"><i class="icofont icofont-qr-code"></i></span>
                    <span class="pcoded-mtext">My QR-Code</span>
                </a>
            </li>
        </ul>
        @if (Sentinel::getUser()->hasAnyAccess(['user.index','role.index']))
          <div class="pcoded-navigatio-lavel">Management</div>
          <ul class="pcoded-item pcoded-left-item">
            @if (Sentinel::getUser()->hasAnyAccess(['user.index','role.index']))
              <li class="pcoded-hasmenu " dropdown-icon="style1" subitem-icon="style1">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="icofont icofont-users"></i></span>
                    <span class="pcoded-mtext">User</span>
                </a>
                <ul class="pcoded-submenu">
                    @if (Sentinel::getUser()->hasAccess(['user.index']))
                      <li class="">
                          <a href="{{route('user.index')}}">
                              <span class="pcoded-micon"><i class="icofont icofont-boy"></i></span><span class="pcoded-mtext">User</span>
                          </a>
                      </li>
                    @endif
                    @if (Sentinel::getUser()->hasAccess(['role.index']))
                      <li class="">
                          <a href="{{route('role.index')}}">
                              <span class="pcoded-micon"><i class="icofont icofont-animal-cat-alt-4"></i></span><span class="pcoded-mtext">Role</span>
                          </a>
                      </li>
                    @endif
                </ul>
              </li>
            @endif
          </ul>
        @endif
    </div>
</nav>