@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Consultation')

@section('main-content')
        <div class="h-auto p-12 flex flex-col gap-y-4">
            <a href="{{ route('veterinarian.article.index') }}" class="flex gap-x-2 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="#8D7B68" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
                <p class="text-[#8C8F93]">
                    Back
                </p>
            </a>
            <form action="{{ route('veterinarian.article.edit.submit', $article->id) }}" enctype="multipart/form-data" method="post"
                class="px-8 mt-4 flex flex-col gap-y-4">
                @csrf
                @method('patch')
                <h1 class="text-3xl font-medium">Edit Article</h1>
                <h3 class="text-xl font-medium">Description</h3>
                <div class="border border-[#F1DEC9] rounded-lg px-10 py-5">
                    <div>
                        <label for="title" class="text-xl text-[#888888] font-medium">Title Article</label>
                        <input type="text" name="title" placeholder="Title Article..." value="{{ $article->title }}" required
                            class="w-full text-black border border-[#F1DEC9] p-4 rounded-lg mt-3">
                    </div>
                    <div class="mt-4">
                        <label for="category" class="text-xl text-[#888888] font-medium">Category</label>
                        <select name="category" id="category"
                            class="w-full text-black border border-[#F1DEC9] p-4 rounded-lg mt-3" required>
                            <option value="">Choose a Category</option>
                            <option value="Antraknosa" {{ $article->category == "Antraknosa" ? 'selected' : '' }}>Antraknosa</option>
                            <option value="Flu Burung" {{ $article->category == "Flu Burung" ? 'selected' : '' }}>Flu Burung</option>
                            <option value="Flu Babi" {{ $article->category == "Flu Babi" ? 'selected' : '' }}>Flu Babi</option>
                            <option value="Ensefalitis Jepang" {{ $article->category == "Ensefalitis Jepang" ? 'selected' : '' }}>Ensefalitis Jepang</option>
                            <option value="Enteritis Homogarik" {{ $article->category == "Enteritis Homogarik" ? 'selected' : '' }}>Enteritis Homogarik</option>
                            <option value="Herpes Koi" {{ $article->category == "Herpes Koi" ? 'selected' : '' }}>Herpes Koi</option>
                            <option value="Ensefalomielitis Burung" {{ $article->category == "Ensefalomielitis Burung" ? 'selected' : '' }}>Ensefalomielitis Burung</option>
                            <option value="Hepatitis Badan Inklusi" {{ $article->category == "Hepatitis Badan Inklusi" ? 'selected' : '' }}>Hepatitis Badan Inklusi</option>
                            <option value="Imunodefisiensi Kucing" {{ $article->category == "Imunodefisiensi Kucing" ? 'selected' : '' }}>Imunodefisiensi Kucing</option>
                            <option value="Infeksi Kalisivirus Kucing" {{ $article->category == "Infeksi Kalisivirus Kucing" ? 'selected' : '' }}>Infeksi Kalisivirus Kucing</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="title" class="text-xl text-[#888888] font-medium">Content of the Article</label>
                        <textarea id="message" rows="4" name="content"
                            class="block w-full text-black border-[#F1DEC9] p-4 mt-3 rounded-lg border"
                            placeholder="Write your thoughts here..." required>{{ $article->content }}</textarea>
                    </div>
                </div>
                <h1 class="text-2xl font-semibold">Article Image</h1>
                <p class="text-[#888888] font-medium">Choose a photo that available for your Article</p>
                <div class="w-full p-6 border border-[#F1DEC9] grid grid-cols-4 gap-x-4">

                    <div class="relative profile-pic-div w-fit">
                        <img class="w-48 h-48" src="{{asset('images/icon/plus-icon.png')}}" id="photo" alt="Photo of Profile">
                        <input class="hidden" type="file" id="file" name="photo1">
                        <label
                            class="hidden w-48 h-48 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 cursor-pointer transition-all"
                            for="file" id="uploadBtn" style="background-color: rgba(217,217,217,0.8)">
                            <div
                                class="absolute w-10/12 flex flex-col items-center top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <img class="w-1/5" src="/assets/svg/profile.png" alt="">
                                <p class="text-white font-bold">Choose Photo</p>
                            </div>
                        </label>
                    </div>
                    <div class="relative profile-pic-div-2 w-fit">
                        <img class="w-48 h-48" src="{{asset('images/icon/plus-icon.png')}}" id="photo-2" alt="Photo of Profile">
                        <input class="hidden" type="file" id="file-2" name="photo2">
                        <label
                            class="hidden w-48 h-48 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 cursor-pointer transition-all"
                            for="file-2" id="uploadBtn-2" style="background-color: rgba(217,217,217,0.8)">
                            <div
                                class="absolute w-10/12 flex flex-col items-center top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <img class="w-1/5" src="/assets/svg/profile.png" alt="">
                                <p class="text-white font-bold">Choose Photo</p>
                            </div>
                        </label>
                    </div>
                    <div class="relative profile-pic-div-3 w-fit">
                        <img class="w-48 h-48" src="{{asset('images/icon/plus-icon.png')}}" id="photo-3" alt="Photo of Profile">
                        <input class="hidden" type="file" id="file-3" name="photo3">
                        <label
                            class="hidden w-48 h-48 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 cursor-pointer transition-all"
                            for="file-3" id="uploadBtn-3" style="background-color: rgba(217,217,217,0.8)">
                            <div
                                class="absolute w-10/12 flex flex-col items-center top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <img class="w-1/5" src="/assets/svg/profile.png" alt="">
                                <p class="text-white font-bold">Choose Photo</p>
                            </div>
                        </label>
                    </div>
                    <div class="relative profile-pic-div-4 w-fit">
                        <img class="w-48 h-48" src="{{asset('images/icon/plus-icon.png')}}" id="photo-4" alt="Photo of Profile">
                        <input class="hidden" type="file" id="file-4" name="photo4">
                        <label
                            class="hidden w-48 h-48 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 cursor-pointer transition-all"
                            for="file-4" id="uploadBtn-4" style="background-color: rgba(217,217,217,0.8)">
                            <div
                                class="absolute w-10/12 flex flex-col items-center top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                <img class="w-1/5" src="/assets/svg/profile.png" alt="">
                                <p class="text-white font-bold">Choose Photo</p>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="mt-5 flex justify-end items-center gap-x-5 text-sm">
                    <button type="submit" class="px-5 py-2 rounded-md text-white bg-[#A4907C]">Edit Article</button>
                    <a href="{{ route('veterinarian.article.index') }}" class="px-5 py-2 rounded-md text-black">Discard</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Error Alert -->
    @if(Session::get('error'))
    <div id="alert-2"
        class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 fixed bottom-5 right-5 z-20"
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ Session::get('error') }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
            data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif
    <!-- Error Alert -->
    <script type="application/javascript">
        const imgDiv = document.querySelector('.profile-pic-div');
        const img = document.querySelector('#photo');
        const file = document.querySelector('#file');
        const uploadBtn = document.querySelector('#uploadBtn');

        const imgDiv2 = document.querySelector('.profile-pic-div-2');
        const img2 = document.querySelector('#photo-2');
        const files2 = document.querySelector('#file-2');
        const uploadBtn2 = document.querySelector('#uploadBtn-2');

        const imgDiv3 = document.querySelector('.profile-pic-div-3');
        const img3 = document.querySelector('#photo-3');
        const files3 = document.querySelector('#file-3');
        const uploadBtn3 = document.querySelector('#uploadBtn-3');

        const imgDiv4 = document.querySelector('.profile-pic-div-4');
        const img4 = document.querySelector('#photo-4');
        const files4 = document.querySelector('#file-4');
        const uploadBtn4 = document.querySelector('#uploadBtn-4');

        imgDiv.addEventListener('mouseenter', function () {
            uploadBtn.style.display = "block";
        });

        imgDiv.addEventListener('mouseleave', function () {
            uploadBtn.style.display = "none";
        });

        imgDiv2.addEventListener('mouseenter', function () {
            uploadBtn2.style.display = "block";
        });

        imgDiv2.addEventListener('mouseleave', function () {
            uploadBtn2.style.display = "none";
        });

        imgDiv3.addEventListener('mouseenter', function () {
            uploadBtn3.style.display = "block";
        });

        imgDiv3.addEventListener('mouseleave', function () {
            uploadBtn3.style.display = "none";
        });

        imgDiv4.addEventListener('mouseenter', function () {
            uploadBtn4.style.display = "block";
        });

        imgDiv4.addEventListener('mouseleave', function () {
            uploadBtn4.style.display = "none";
        });

        file.addEventListener('change', function () {
            const choosedFile = this.files[0];
            console.log('1');
            if (choosedFile) {
                const reader = new FileReader();
                reader.addEventListener('load', function () {
                    img.setAttribute('src', reader.result);
                });
                reader.readAsDataURL(choosedFile);
            }
        });
        files2.addEventListener('change', function () {
            const choosedFile2 = this.files[0];
            console.log('2');

            if (choosedFile2) {
                const reader2 = new FileReader();
                reader2.addEventListener('load', function () {
                    img2.setAttribute('src', reader2.result);
                });
                reader2.readAsDataURL(choosedFile2);
            }
        });
        files3.addEventListener('change', function () {
            const choosedFile3 = this.files[0];
            if (choosedFile3) {
                const reader3 = new FileReader();
                reader3.addEventListener('load', function () {
                    img3.setAttribute('src', reader3.result);
                });
                reader3.readAsDataURL(choosedFile3);
            }
        });
        files4.addEventListener('change', function () {
            const choosedFile4 = this.files[0];
            if (choosedFile4) {
                const reader4 = new FileReader();
                reader4.addEventListener('load', function () {
                    img4.setAttribute('src', reader4.result);
                });
                reader4.readAsDataURL(choosedFile4);
            }
        });

    </script>
@endsection
