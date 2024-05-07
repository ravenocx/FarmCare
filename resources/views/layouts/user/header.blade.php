<header class="bg-white px-16 py-3 fixed top-0 w-screen z-40 border-b-2">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            @if(Auth::guard('user')->check())
                <a href="{{route('user.home')}}">
                    <img src="{{ asset('images/assets/farmcare-logo.svg') }}" alt="Farmcare Logo">
                </a>
            @else
                <a href="{{route('landing-page')}}">
                    <img src="{{ asset('images/assets/farmcare-logo.svg') }}" alt="Farmcare Logo">
                </a>
            @endif
            <ul class="menu menu-horizontal px-1 font-medium text-xl ml-10">
                <li>
                    <details>
                    <summary>
                        Service
                    </summary>
                    <ul class="p-2 bg-base-150 rounded-t-none drop-shadow-xl">
                        <li><a href="{{route('user.consultation')}}">Online Consultation</a></li>
                        <li><a>Offline Reservation</a></li>
                    </ul>
                    </details>
                </li>
                <li class="mx-4"><a>Article</a></li>
                <li class="mr-4"><a>FAQ</a></li>
                <li><a href="#footer">Contact Us</a></li>
            </ul>
        </div>
        
        @if(Auth::guard('user')->check())
            <ul class="menu menu-horizontal px-1 font-medium text-xl ml-10">
                <li>
                    <details>
                    <summary>
                        <div class="flex items-center">
                            @if(Auth::guard('user')->user()->photo)
                                <img src="{{asset('storage/app' . Auth::user()->photo)}}" alt="profile-image">
                            @else
                                <img src="{{asset('images/icon/profile-icon.svg')}}" alt="profile-image">
                            @endif
                            <p class="ml-4 font-medium text-xl">Hi, {{Auth::guard('user')->user()->name}}</p>
                        </div>
                    </summary>
                    <ul class="p-2 bg-gray-100 rounded-t-none drop-shadow-xl">
                        <li><a href="{{route('logout')}}" class="px-12">Logout</a></li>
                    </ul>
                    </details>
                </li>
            </ul>
        @else
        <div>
            <a href="{{route('login.form')}}">
                <button class="btn px-5 py-2 rounded-md bg-shadeBrown text-white font-bold text-base hover:text-shadeBrown hover:bg-white">Login</button>
            </a>
            <a href="{{route('login.form')}}"> 
                <button class="btn ml-5 px-5 py-2 rounded-md border bg-white border-shadeBrown text-shadeBrown text-base font-semibold hover:bg-shadeBrown hover:text-white">Register</button>
            </a>
        </div>
        @endif
    </div>
</header>