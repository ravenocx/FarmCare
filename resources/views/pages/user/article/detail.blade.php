@extends('layouts.user.app')

@section('title','FarmCare - Online Consultation')

@section('main-content')
<form action="{{ route('user.article.search') }}" method="post" class="containet mx-auto text-center text-2xl flex gap-x-5 items-center bg-[#FFF8F0] p-8">
    @csrf
    <input type="text" class="w-10/12 py-3 rounded-md" name="search" id="search"
        placeholder="Search by title, category, topic">
    <button type="submit" id="searchButton"
        class="text-white bg-[#8D7B68] w-2/12 text-base font-semibold py-3 rounded-md">Search</button>
</form>
<div class="mb-10 mt-5 px-12">
    <div class="mt-10">
        <div id="articleGrid" class="w-3/5">
            <h1 class="mt-4 text-3xl font-semibold tracking-tight">
                {{ $article->title }}</h1>
            <div>
                <div class="flex items-center gap-x-4 my-3">
                    <div class="text-white rounded-md px-4 py-1 w-fit my-2 text-sm font-medium article-category"
                        style="background-color: #8D7B68">{{ $article->category }}</div>
                    <p class="font-semibold">Dibuat oleh {{ $article->veterinarian->name }}
                        {{ $article->formattedDate }}</p>
                </div>
            </div>
            <div class="bg-center bg-cover bg-no-repeat rounded-lg w-full"
                style="background-image: url('{{ $article->articleImage->image }}')">
                <img class="invisible w-full" src="{{ asset('assets/cow.png') }}" style="height: 50vh;" alt="Photo" />
            </div>
            <div>
                <p class="mt-5 text-sm font-medium">
                    {{ $article->content }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
