@php
    $admin_logo=getSettingsValByName('company_logo');
    $ids     = parentId();
    $authUser=\App\Models\User::find($ids);
 $subscription = \App\Models\Subscription::find($authUser->subscription);
 $routeName=\Request::route()->getName();
@endphp
<aside class="codex-sidebar sidebar-{{$settings['sidebar_mode']}}">
    <div class="logo-gridwrap">
        <a class="codexbrand-logo" href="{{route('home')}}">
            <img class="img-fluid"
                 src="{{asset(Storage::url('upload/logo/')).'/'.(isset($admin_logo) && !empty($admin_logo)?$admin_logo:'logo.png')}}"
                 alt="theeme-logo">
        </a>
        <a class="codex-darklogo" href="{{route('home')}}">
            <img class="img-fluid"
                 src="{{asset(Storage::url('upload/logo/')).'/'.(isset($admin_logo) && !empty($admin_logo)?$admin_logo:'logo.png')}}"
                 alt="theeme-logo"></a>
        <div class="sidebar-action"><i data-feather="menu"></i></div>
    </div>
    <div class="icon-logo">
        <a href="{{route('home')}}">
            <img class="img-fluid"
                 src="{{asset(Storage::url('upload/logo')).'/'.$settings['company_favicon']}}"
                 alt="theeme-logo">
        </a>
    </div>
    <div class="codex-menuwrapper">
        <ul class="codex-menu custom-scroll" data-simplebar>
            <li class="cdxmenu-title">
                <h5>{{__('Home')}}</h5>
            </li>
            <li class="menu-item {{in_array($routeName,['dashboard','home',''])?'active':''}}">
                <a href="{{route('dashboard')}}">
                    <div class="icon-item"><i data-feather="home"></i></div>
                    <span>{{__('Dashboard')}}</span>
                </a>
            </li>

            @if(\Auth::user()->type=='super admin')
                @if(Gate::check('manage user'))
                    <li class="menu-item {{in_array($routeName,['users.index'])?'active':''}}">
                        <a href="{{route('users.index')}}">
                            <div class="icon-item"><i data-feather="users"></i></div>
                            <span>{{__('Users')}}</span>
                        </a>
                    </li>
                @endif
            @else
                @if(Gate::check('manage user') || Gate::check('manage role') || Gate::check('manage logged history') )
                    <li class="menu-item {{in_array($routeName,['users.index','logged.history','role.index','role.create','role.edit'])?'active':''}}">
                        <a href="javascript:void(0);">
                            <div class="icon-item"><i data-feather="users"></i></div>
                            <span>{{__('Staff Management')}}</span><i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="submenu-list"
                            style="display: {{in_array($routeName,['users.index','logged.history','role.index','role.create','role.edit'])?'block':'none'}}">
                            @if(Gate::check('manage user'))
                                <li class="{{in_array($routeName,['users.index'])?'active':''}}">
                                    <a href="{{route('users.index')}}">{{__('Users')}}</a>
                                </li>
                            @endif
                            @if(Gate::check('manage role'))
                                <li class=" {{in_array($routeName,['role.index','role.create','role.edit'])?'active':''}}">
                                    <a href="{{route('role.index')}}">
                                        {{__('Roles')}}
                                    </a>
                                </li>
                            @endif
                            @if(Gate::check('manage logged history') && $subscription->enabled_logged_history==1)
                                <li class="{{in_array($routeName,['logged.history'])?'active':''}}">
                                    <a href="{{route('logged.history')}}">{{__('Logged History')}}</a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif
            @endif

            @if(Gate::check('manage document') || Gate::check('manage my document') || Gate::check('manage reminder') || Gate::check('manage my reminder') || Gate::check('manage document history') || Gate::check('manage logged history') || Gate::check('manage support') || Gate::check('manage contact') || Gate::check('manage note'))
                <li class="cdxmenu-title">
                    <h5>{{__('Business Management')}}</h5>
                </li>
                @if(Gate::check('manage document'))
                    <li class="menu-item {{(Request::route()->getName() == 'document.index' || Request::route()->getName() == 'document.show' || Request::route()->getName() == 'document.comment' || Request::route()->getName() == 'document.reminder' || Request::route()->getName() == 'document.version.history' || Request::route()->getName() == 'document.share' || Request::route()->getName() == 'document.send.email')?'active':''}}">
                        <a href="{{route('document.index')}}">
                            <div class="icon-item"><i data-feather="file-text"></i></div>
                            <span>{{__('All Documents')}}</span>
                        </a>
                    </li>
                @endif
                @if(Gate::check('manage my document'))
                    <li class="menu-item {{(Request::route()->getName() == 'document.my-document')?'active':''}}">
                        <a href="{{route('document.my-document')}}">
                            <div class="icon-item"><i data-feather="file"></i></div>
                            <span>{{__('My Documents')}}</span>
                        </a>
                    </li>
                @endif
                @if(Gate::check('manage reminder'))
                    <li class="menu-item {{(Request::route()->getName() == 'reminder.index')?'active':''}}">
                        <a href="{{route('reminder.index')}}">
                            <div class="icon-item"><i data-feather="cpu"></i></div>
                            <span>{{__('All Reminders')}}</span>
                        </a>
                    </li>
                @endif
                @if(Gate::check('manage my reminder'))
                    <li class="menu-item {{(Request::route()->getName() == 'my-reminder')?'active':''}}">
                        <a href="{{route('my-reminder')}}">
                            <div class="icon-item"><i data-feather="aperture"></i></div>
                            <span>{{__('My Reminders')}}</span>
                        </a>
                    </li>
                @endif
                @if(Gate::check('manage document history') && $subscription->enabled_document_history==1)
                    <li class="menu-item {{(Request::route()->getName() == 'document.history')?'active':''}}">
                        <a href="{{route('document.history')}}">
                            <div class="icon-item"><i data-feather="wind"></i></div>
                            <span>{{__('Document History')}}</span>
                        </a>
                    </li>
                @endif


                @if(Gate::check('manage contact'))
                    <li class="menu-item {{in_array($routeName,['contact.index'])?'active':''}}">
                        <a href="{{route('contact.index')}}">
                            <div class="icon-item"><i data-feather="phone-call"></i></div>
                            <span>{{__('Contacts')}}</span>
                        </a>
                    </li>
                @endif

                @if(Gate::check('manage note'))
                    <li class="menu-item {{in_array($routeName,['note.index'])?'active':''}} ">
                        <a href="{{route('note.index')}}">
                            <div class="icon-item"><i data-feather="file-text"></i></div>
                            <span>{{__('Note')}}</span>
                        </a>
                    </li>
                @endif
            @endif

            @if(Gate::check('manage category') || Gate::check('manage sub category') || Gate::check('manage tag'))
                <li class="cdxmenu-title">
                    <h5>{{__('Setup')}}</h5>
                </li>
                @if(Gate::check('manage category'))
                    <li class="menu-item {{(Request::route()->getName() == 'category.index')?'active':''}}">
                        <a href="{{route('category.index')}}">
                            <div class="icon-item"><i data-feather="list"></i></div>
                            <span>{{__('Category')}}</span>
                        </a>
                    </li>
                @endif
                @if(Gate::check('manage sub category'))
                    
                @endif
                @if(Gate::check('manage tag'))
                    <li class="menu-item {{(Request::route()->getName() == 'tag.index')?'active':''}}">
                        <a href="{{route('tag.index')}}">
                            <div class="icon-item"><i data-feather="layers"></i></div>
                            <span>{{__('Tags')}}</span>
                        </a>
                    </li>
                @endif
            @endif
            @if(Gate::check('manage pricing packages') || Gate::check('manage pricing transation') || Gate::check('manage account settings') || Gate::check('manage password settings') || Gate::check('manage general settings') || Gate::check('manage company settings'))
                <li class="cdxmenu-title">
                    <h5>{{__('System Settings')}}</h5>
                </li>
                @if(Gate::check('manage pricing packages') || Gate::check('manage pricing transation'))
                    <li class="menu-item {{in_array($routeName,['subscriptions.index','subscriptions.show','subscription.transaction'])?'active':''}}">
                        
                        <ul class="submenu-list"
                            style="display: {{in_array($routeName,['subscriptions.index','subscriptions.show','subscription.transaction'])?'block':'none'}}">
                            @if(Gate::check('manage pricing packages'))
                                <li class="{{in_array($routeName,['subscriptions.index','subscriptions.show'])?'active':''}}">
                                    <a href="{{route('subscriptions.index')}}">{{__('Packages')}}</a>
                                </li>
                            @endif
                            @if(Gate::check('manage pricing transation'))
                                <li class="{{in_array($routeName,['subscription.transaction'])?'active':''}} ">
                                    <a href="{{route('subscription.transaction')}}">{{__('Transactions')}}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(Gate::check('manage coupon') || Gate::check('manage coupon history'))
                    <li class="menu-item {{in_array($routeName,['coupons.index','coupons.history'])?'active':''}}">
                        <a href="javascript:void(0);">
                            <div class="icon-item"><i data-feather="gift"></i></div>
                            <span>{{__('Coupons')}}</span><i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="submenu-list"
                            style="display: {{in_array($routeName,['coupons.index','coupons.history'])?'block':'none'}}">
                            @if(Gate::check('manage coupon'))
                                <li class="{{in_array($routeName,['coupons.index'])?'active':''}}">
                                    <a href="{{route('coupons.index')}}">{{__('All Coupon')}}</a>
                                </li>
                            @endif
                            @if(Gate::check('manage coupon history'))
                                <li class="{{in_array($routeName,['coupons.history'])?'active':''}}">
                                    <a href="{{route('coupons.history')}}">{{__('Coupon History')}}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if(Gate::check('manage account settings') || Gate::check('manage password settings') || Gate::check('manage general settings') || Gate::check('manage company settings') || Gate::check('manage seo settings') || Gate::check('manage google recaptcha settings'))
                    <li class="menu-item {{in_array($routeName,['setting.account','setting.password','setting.general','setting.company','setting.smtp','setting.payment','setting.site.seo','setting.google.recaptcha'])?'active':''}}">
                        <a href="javascript:void(0);">
                            <div class="icon-item"><i data-feather="settings"></i></div>
                            <span>{{__('Settings')}}</span><i class="fa fa-angle-down"></i></a>
                        <ul class="submenu-list "
                            style="display: {{in_array($routeName,['setting.account','setting.password','setting.general','setting.company','setting.smtp','setting.payment','setting.site.seo','setting.google.recaptcha'])?'block':'none'}}">
                            @if(Gate::check('manage account settings'))
                                <li class="{{in_array($routeName,['setting.account'])?'active':''}} ">
                                    <a href="{{route('setting.account')}}">{{__('Account Setting')}}</a>
                                </li>
                            @endif
                            @if(Gate::check('manage password settings'))
                                <li class="{{in_array($routeName,['setting.password'])?'active':''}}">
                                    <a href="{{route('setting.password')}}">{{__('Password Setting')}}</a>
                                </li>
                            @endif
                            @if(Gate::check('manage general settings'))
                                <li class="{{in_array($routeName,['setting.general'])?'active':''}} ">
                                    <a href="{{route('setting.general')}}">{{__('General Setting')}}</a>
                                </li>
                            @endif
                            @if(Gate::check('manage company settings'))
                                <li class="{{in_array($routeName,['setting.company'])?'active':''}}">
                                    <a href="{{route('setting.company')}}">{{__('Company Setting')}}</a>
                                </li>
                            @endif
                            @if(Gate::check('manage email settings'))
                                <li class="{{in_array($routeName,['setting.smtp'])?'active':''}} ">
                                    <a href="{{route('setting.smtp')}}">{{__('Email Setting')}}</a>
                                </li>
                            @endif
                            @if(Gate::check('manage payment settings'))
                                <li class="{{in_array($routeName,['setting.payment'])?'active':''}} ">
                                    <a href="{{route('setting.payment')}}">{{__('Payment Setting')}}</a>
                                </li>
                            @endif
                            @if(Gate::check('manage seo settings'))
                                <li class="{{in_array($routeName,['setting.site.seo'])?'active':''}} ">
                                    <a href="{{route('setting.site.seo')}}">{{__('Site SEO Setting')}}</a>
                                </li>
                            @endif
                            @if(Gate::check('manage google recaptcha settings'))
                                <li class="{{in_array($routeName,['setting.google.recaptcha'])?'active':''}} ">
                                    <a href="{{route('setting.google.recaptcha')}}">{{__('ReCaptcha Setting')}}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

            @endif


        </ul>
    </div>
</aside>
<!-- sidebar end-->
