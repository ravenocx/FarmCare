@extends('layouts.user.app')

@section('title','FarmCare - Online Consultation')

@section('main-content')
<div class="mb-10 mt-5 px-12 bg-white">
    <div class="container mx-auto text-center text-2xl flex gap-x-5 items-center">
        <input type="text" class="w-10/12 py-3 rounded-md" name="search" id="search"
            placeholder="Search by title, category, topic">
        <button id="searchButton" class="text-white bg-[#8D7B68] w-2/12 text-base font-semibold py-3 rounded-md">Search</button>
    </div>
    <div class="mt-10">
        <h1 class="text-3xl font-semibold">Current Topics</h1>
        <div class="grid grid-cols-5 gap-4 mt-4">
            <a href="{{ url('/article?filter=Antraknosa') }}" class="text-white text-center bg-[#8D7B68] px-4 text-sm font-semibold py-2 rounded-md">Antraknosa</a>
            <a href="{{ url('/article?filter=Flu Burung') }}" class="text-white text-center bg-[#8D7B68] px-4 text-sm font-semibold py-2 rounded-md">Flu Burung</a>
            <a href="{{ url('/article?filter=Flu Babi') }}" class="text-white text-center bg-[#8D7B68] px-4 text-sm font-semibold py-2 rounded-md">Flu Babi</a>
            <a href="{{ url('/article?filter=Ensefalitis Jepang') }}" class="text-white text-center bg-[#8D7B68] px-4 text-sm font-semibold py-2 rounded-md">Ensefalitis
                Jepang</a>
            <a href="{{ url('/article?filter=Enteritis Homogarik') }}" class="text-white text-center bg-[#8D7B68] px-4 text-sm font-semibold py-2 rounded-md">Enteritis
                Homogarik</a>
            <a href="{{ url('/article?filter=Herpses Koi') }}" class="text-white text-center bg-[#8D7B68] px-4 text-sm font-semibold py-2 rounded-md">Herpses Koi</a>
            <a href="{{ url('/article?filter=Ensefalomielitis Burung') }}" class="text-white text-center bg-[#8D7B68] px-4 text-sm font-semibold py-2 rounded-md">Ensefalomielitis
                Burung</a>
            <a href="{{ url('/article?filter=Hepatitis Badan Inklusi') }}" class="text-white text-center bg-[#8D7B68] px-4 text-sm font-semibold py-2 rounded-md">Hepatitis Badan
                Inklusi</a>
            <a href="{{ url('/article?filter=Imunodefisiensi Kucing') }}" class="text-white text-center bg-[#8D7B68] px-4 text-sm font-semibold py-2 rounded-md">Imunodefisiensi
                Kucing</a>
            <a href="{{ url('/article?filter=Infeksi Kalisivirus Kucing') }}" class="text-white text-center bg-[#8D7B68] px-4 text-sm font-semibold py-2 rounded-md">Infeksi Kalisivirus
                Kucing</a>
            <a href="{{ route('user.article') }}" class="text-white text-center bg-[#8D7B68] px-4 text-sm font-semibold py-2 rounded-md">Clear Filter</a>    
        </div>
        <div class="mt-10 grid grid-cols-4 gap-5" id="articleGrid">
            @foreach($articles as $data)
            <a href="{{ route('user.article.detail', $data->id) }}"
                class="max-w-sm bg-[#8D7B68] border border-gray-200 rounded-lg shadow p-3 flex flex-col justify-between article-card">
                <div class="bg-center bg-cover bg-no-repeat rounded-lg"
                    style="background-image: url('{{ $data->articleImage->image }}')">
                    <img class="invisible w-full h-40" src="{{ asset('assets/cow.png') }}" alt="Photo" />
                </div>
                <div>
                    <h5 class="mt-4 mb-2 text-lg font-medium tracking-tight text-white article-title">
                        {{ $data->title }}</h5>
                    <div class="text-white rounded-full px-4 py-1 w-fit my-2 text-sm font-medium article-category"
                        style="background-color: #C8B6A6">{{ $data->category }}</div>
                    <p class="mb-3 font-normal text-white text-sm">
                        {{ Illuminate\Support\Str::limit($data->content, 80)}}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        filterArticles();
    });

    document.getElementById('search').addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            filterArticles();
        }
    });

    function filterArticles() {
        const searchValue = document.getElementById('search').value.toLowerCase();
        const articles = document.querySelectorAll('.article-card');

        articles.forEach(article => {
            const title = article.querySelector('.article-title').innerText.toLowerCase();
            const category = article.querySelector('.article-category').innerText.toLowerCase();

            if (title.includes(searchValue) || category.includes(searchValue)) {
                article.style.display = '';
            } else {
                article.style.display = 'none';
            }
        });
    }
</script>
@endsection
