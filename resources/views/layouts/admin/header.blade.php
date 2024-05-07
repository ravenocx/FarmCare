<header class="bg-white px-16 py-3 fixed top-0 w-screen z-40 border-b-2">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <a href="{{route('admin.index')}}">
                <img src="{{ asset('images/assets/farmcare-logo.svg') }}" alt="Farmcare Logo">
            </a>
            <ul class="menu menu-horizontal px-1 font-medium text-xl ml-10">
                <li class="mx-4"><a>Applicant</a></li>
                <li class="mr-4"><a>Veterinarian</a></li>
            </ul>
        </div>
        
        <ul class="menu menu-horizontal px-1 font-medium text-xl ml-10">
            <li>
                <details>
                <summary>
                    <div class="flex items-center">
                        <img src="{{asset('images/icon/profile-icon.svg')}}" alt="profile-image">
                        <p class="ml-4 font-medium text-xl">{{Auth::guard('admin')->user()->name}}</p>
                    </div>
                </summary>
                <ul class="p-2 bg-gray-100 rounded-t-none drop-shadow-xl">
                    <li><a href="{{route('logout')}}" class="px-12">Logout</a></li>
                </ul>
                </details>
            </li>
        </ul>
        
    </div>
</header>