<header class="bg-white px-14 py-3 fixed top-0 w-screen z-10 border-b-2">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <a href="{{route('home')}}">
                <img src="{{ asset('images/assets/farmcare-logo.svg') }}" alt="Farmcare Logo">
            </a>

            <ul class="menu menu-horizontal px-1 font-medium text-xl ml-10">
                <li>
                    <details>
                    <summary>
                        Service
                    </summary>
                    <ul class="p-2 bg-base-150 rounded-t-none drop-shadow-xl">
                        <li><a>Online Consultation</a></li>
                        <li><a>Offline Reservation</a></li>
                    </ul>
                    </details>
                </li>
                <li class="mx-4"><a>Article</a></li>
                <li class="mr-4"><a>About Us</a></li>
                <li><a>Contact Us</a></li>
            </ul>
        </div>
        <div class="flex items-center">
            @if(Auth::guard('user')->user()->photo)
                <img src="{{asset('storage/app' . Auth::user()->photo)}}" alt="profile-image">
            @else
                <img src="{{asset('images/icon/profile-icon.svg')}}" alt="profile-image">
            @endif
            <p class="ml-4 font-medium text-xl">Hi, {{Auth::guard('user')->user()->name}}</p>
        </div>
    </div>
</header>