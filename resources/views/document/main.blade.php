<div class="email-sidebar cdxapp-sidebar">
    <div class="card">
        <div class="card-header">
            <h4 >{{__('Document Overview')}}</h4>
        </div>
        <div class="card-body">
            <ul class="sidebarmenu-list custom-sidebarmenu-list">
                <li>
                    <a class="menu-item" href="{{route('document.show',\Illuminate\Support\Facades\Crypt::encrypt($document->id))}}">
                        <div class="icons"><i data-feather="list"></i></div>
                        {{__('Basic Details')}}
                    </a>
                </li>
                @if(Gate::check('manage comment'))
                <li>
                    <a class="menu-item" href="{{route('document.comment',\Illuminate\Support\Facades\Crypt::encrypt($document->id))}}">
                        <div class="icons"><i data-feather="message-circle"></i></div>
                        {{__('Comment')}}
                    </a>
                </li>
                @endif
                @if(Gate::check('manage reminder'))
                <li>
                    <a class="menu-item" href="{{route('document.reminder',\Illuminate\Support\Facades\Crypt::encrypt($document->id))}}">
                        <div class="icons"><i data-feather="user-check"></i></div>
                        {{__('Reminder')}}
                    </a>
                </li>
                @endif
                @if(Gate::check('manage version'))
                <li>
                    <a class="menu-item" href="{{route('document.version.history',\Illuminate\Support\Facades\Crypt::encrypt($document->id))}}">
                        <div class="icons"><i data-feather="briefcase"></i></div>
                        {{__('Version History')}}
                    </a>
                </li>
                @endif
                @if(Gate::check('manage share document'))
                <li>
                    <a class="menu-item" href="{{route('document.share',\Illuminate\Support\Facades\Crypt::encrypt($document->id))}}">
                        <div class="icons"><i data-feather="share-2"></i></div>
                        {{__('Share')}}
                    </a>
                </li>
                @endif
                @if(Gate::check('manage mail'))
                <li>
                    <a class="menu-item" href="{{route('document.send.email',\Illuminate\Support\Facades\Crypt::encrypt($document->id))}}">
                        <div class="icons"><i data-feather="mail"></i></div>
                        {{__('Send Email')}}
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
