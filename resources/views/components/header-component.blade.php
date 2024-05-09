<style>
        .navbar {
            background-color: #fff;
            padding: 14px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            text-decoration: none;
            color: black;
            padding: 8px 16px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-menu a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: black;
        }

        .dropdown-menu a:hover {
            background-color: #f2f2f2;
        }

        /* Tambahkan warna saat menu dihover */
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        </style>
        
        <header class="bg-white flex items-center justify-between p-4">
            <div class="flex items-center">
                <a href="">
                    <img src="{{ asset('images/farmcare-logo.png') }}" alt="Farmcare Logo" class="w-[144px] h-[72px]">
                </a>
                <div class="flex items-center">
                    <ul class="menu menu-horizontal px-1 font-medium text-[20px] pl-[48px]">
                        <nav class="flex items-center space-x-4">
                            <a href="#" class="text-black hover:text-gray-700">Home</a>
                            <div class="dropdown">
                                <summary>
                                    Service
                                </summary>
                                <div class="dropdown-menu">
                                    <ul class="p-2 bg-base-150 rounded-t-none drop-shadow-xl">
                                        <li><a>Online Consultation</a></li>
                                        <li><a>Offline Reservation</a></li>
                                    </ul>
                                </div>
                            </div>
                            <a href="#" class="text-black hover:text-gray-700">Contact Us</a>
                        </nav>
                    </ul>
                </div>
            </div>

            <div class="flex pr-[12px] items-center">
                <img src="{{asset('images/profile-icon.png')}}" alt="">
                <p class="pl-[15.92px] font-medium text-[20px]">Hi, Alexander Grahambell</p>
            </div>
        </header>