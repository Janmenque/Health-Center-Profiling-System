@php
    $users=\Auth::user();
   $languages=\App\Models\Custom::languages();
   $userLang=\Auth::user()->lang;
   $profile=asset(Storage::url('upload/profile'));
@endphp
    <!-- Header Start-->
<header class="codex-header">
    <div class="header-contian d-flex justify-content-between align-items-center">
        <div class="header-left d-flex align-items-center">
            <div class="sidebar-action navicon-wrap"><i data-feather="menu"></i></div>
            <ul class="nav-iconlist">
                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">

                        <span class="align-middle d-none d-sm-inline-block">{{ucfirst($userLang)}}</span>
                        <i class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu dropdown-menu-animated topbar-dropdown-menu">
                        @foreach($languages as $language)
                            @if($language!='en')
                                <a href="{{route('language.change',$language)}}" class="dropdown-item notify-item">
                                    <span class="align-middle">{{ucfirst( $language)}}</span>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
        <div class="header-right d-flex align-items-center justify-content-end">
            <ul class="nav-iconlist">
                @if(\Auth::user()->type=='super admin' || \Auth::user()->type=='owner')
                    <li data-bs-toggle="tooltip" data-bs-original-title="{{__('Theme Settings')}}"
                        data-bs-placement="bottom">
                        <div class="navicon-wrap customizer-action"><i class="fa fa-cog"></i></div>
                    </li>
                @endif
                <li class="nav-profile">
                    <div class="media">
                        <div class="user-icon"><img class="img-fluid rounded-50"
                                                    src="{{(!empty($users->profile)? $profile.'/'.$users->profile : $profile.'/avatar.png')}}"
                                                    alt="logo"></div>
                        <div class="media-body">
                            <h6>{{\Auth::user()->name}}</h6><span class="text-light">{{\Auth::user()->type}}</span>
                        </div>
                    </div>
                    <div class="hover-dropdown navprofile-drop">
                        <ul>
                            <li><a href="{{route('setting.account')}}"><i class="ti-user"></i>{{__('Profile')}}</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i
                                        class="fa fa-sign-out"></i>{{__('Logout')}}</a>
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" class="d-none">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
<!-- Header End-->
