@extends('layouts.veterinarian.app')

@section('title', 'Veterinarian - Consultation')

@section('main-content')
        <div class="h-auto p-12 flex flex-col gap-y-4">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-medium">Article</h1>
                <a href="{{ route('veterinarian.article.create') }}"
                    class="px-5 py-2 font-medium rounded-lg text-white text-sm font-sm"
                    style="background-color: #C8B6A6">
                    Add a Article
                </a>
            </div>
            @if(count($articles) == 0)
            <div class="grid place-items-center h-auto">
                <h1 class="text-xl font-semibold ">There is No Article</h1>
            </div>
            @else
            <div class="grid grid-cols-3 gap-3">
                @foreach($articles as $article)
                <div
                    class="max-w-80 bg-[#8D7B68] border border-gray-200 rounded-lg shadow p-3 justify-between">

                    @foreach ($article->articleImages as $articleImage)
                        <img class="w-[270px] bg-center bg-cover bg-no-repeat rounded-lg mx-auto" src="{{ asset($articleImage->image) }}" alt="Photo" />
                    @endforeach
                    
                    <div>
                        <a href="#">
                            <h5 class="mb-2 text-xl font-medium tracking-tight text-white">
                                {{ $article->title }}</h5>
                        </a>
                        <div class="text-white rounded-full px-4 py-1 w-fit my-2 text-sm font-medium"
                            style="background-color: #C8B6A6">{{ $article->category }}</div>
                        <p class="mb-3 font-normal text-white text-sm break-words">
                            {{ Illuminate\Support\Str::limit($article->content, 40)}}</p>
                    </div>
                    <div class="flex justify-center items-center gap-x-5">
                        <a href="{{ route('veterinarian.article.edit', $article->id) }}"
                            class="w-[100px] py-2 bg-yellow-500 text-white text-center text-sm font-medium rounded-lg">Edit</a>
                        <button data-modal-target="popup-modal{{ $article->id }}" data-modal-toggle="popup-modal{{ $article->id }}" class="w-[100px] py-2 bg-red-600 text-white text-sm font-medium rounded-lg">Delete</button>
                    </div>
                </div>

                <div id="popup-modal{{ $article->id }}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow">
                            <button type="button"
                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="popup-modal{{ $article->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you
                                    want to delete this article?</h3>
                                    <form action="{{ route('veterinarian.article.delete', $article->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Yes, I'm sure
                                    </button>
                                    <button data-modal-hide="popup-modal{{ $article->id }}" type="button"
                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No,
                                    cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <!-- Alert -->
    @if(Session::get('message'))
    <div id="alert-3"
        class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 fixed bottom-5 right-5 z-20"
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ Session::get('message') }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8"
            data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif
    <!-- Alert -->
@endsection
