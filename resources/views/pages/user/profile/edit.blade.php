<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Farm Care</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</head>

<body class="bg-[#FFF8F0] font-poppins">
    <div class="px-28 py-16">
        <button type="button" class="w-10 btn border-2 border-[#8D7B68] px-6 py-2 text-white rounded-lg" style="background-color: #8D7B68" onclick="window.location.href='http://127.0.0.1:8000/home'">Back</button>
        <h1 class="text-center text-3xl font-bold">Edit Profile</h1>
        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form class="flex mt-14" action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div id="profilePicture" class="w-2/5 flex flex-col items-center">
                <div class="relative w-2/3">
                    @if($user->photo == null)
                    <img class="w-40 h-40 rounded-full mx-auto" src="/assets/profile.png" id="photo"
                        alt="Photo of Profile">
                    @else
                    <img class="w-40 h-40 rounded-full mx-auto" src="{{ asset('storage/profile/'. $user->photo) }}"
                        id="photo" alt="Photo of Profile">
                    @endif
                    <input class="hidden" type="file" id="file" name="photo">
                    <label class="cursor-pointer transition-all mt-3" for="file" id="uploadBtn">
                        <div class="w-full flex flex-col items-center mt-2">
                            <p class="text-[#8D7B68] underline font-bold text-center text-sm">Change Profile Picture</p>
                        </div>
                    </label>
                </div>
            </div>
            <div id="profileData" class="w-3/5 flex flex-col gap-y-6">
                <div class="">
                    <label for="name" class="w-full font-semibold">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}"
                        class="w-full mt-2 p-2 rounded-md bg-transparent border border-[#8C8F93]">
                </div>
                <div class="">
                    <label for="phonenumber" class="w-full font-semibold">Phone Number</label>
                    <input type="text" name="phonenumber" id="phonenumber" value="{{ $user->phone_number }}"
                        class="w-full mt-2 p-2 rounded-md bg-transparent border border-[#8C8F93]">
                </div>
                <div class="">
                    <label for="email" class="w-full font-semibold">Email</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}"
                        class="w-full mt-2 p-2 rounded-md bg-transparent border border-[#8C8F93]">
                </div>
                <div class="flex gap-x-3 w-full">
                    <div class="w-1/2">
                        <label for="password" class="w-full font-semibold">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full mt-2 p-2 rounded-md bg-transparent border border-[#8C8F93]">
                    </div>
                    <div class="w-1/2">
                        <label for="passwordConfirmation" class="w-full font-semibold">Confirmation</label>
                        <input type="password" name="password_confirmation" id="passwordConfirmation"
                            class="w-full mt-2 p-2 rounded-md bg-transparent border border-[#8C8F93]">
                    </div>
                </div>
                @if( Session::get('error'))
                {{ Session::get('error') }}
                @endif
                <div class="">
                    <label for="address" class="w-full font-semibold">Address</label>
                    <input type="text" name="address" id="address" value="{{ $user->address }}"
                        class="w-full mt-2 p-2 rounded-md bg-transparent border border-[#8C8F93]">
                </div>
                <div class="flex gap-x-10 items-center justify-center">
                    <div data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                        class="w-1/4 btn bg-transparent border-2 border-[#8D7B68] px-6 py-2 text-[#8D7B68] rounded-lg text-center">Delete</div>
                    <button type="submit" class="w-1/4 btn border-2 border-[#8D7B68] px-6 py-2 text-white rounded-lg"
                        style="background-color: #8D7B68">Submit</button>
                </div>
            </div>
        </form>

        <!-- Modal Delete -->
        <div id="popup-modal" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                            delete this account?</h3>
                        <form action="{{ route('destroy') }}" method="post">
                            @csrf
                            @method('delete')
                            <button data-modal-hide="popup-modal" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="popup-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Delete -->

    </div>

    <script type="application/javascript">
        const imgDiv = document.querySelector('.profile-pic-div');
        const img = document.querySelector('#photo');
        const file = document.querySelector('#file');
        const uploadBtn = document.querySelector('#uploadBtn');

        //if user hover on img div 



        //lets work for image showing functionality when we choose an image to upload

        //when we choose a foto to upload

        file.addEventListener('change', function () {
            //this refers to file
            const choosedFile = this.files[0];

            if (choosedFile) {

                const reader = new FileReader(); //FileReader is a predefined function of JS

                reader.addEventListener('load', function () {
                    img.setAttribute('src', reader.result);
                });

                reader.readAsDataURL(choosedFile);
            }
        });

        document.querySelectorAll('#nav div a').forEach(link => {
            if (link.href == window.location.href) {
                link.setAttribute('aria-current', 'page')
            }
        })

    </script>
</body>

</html>
