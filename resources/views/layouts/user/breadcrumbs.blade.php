<div class="text-base breadcrumbs text-slateGray pt-32 pl-11">
    <ul>
        @foreach ($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item">
                @if ($breadcrumb['url'])
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>
                @else
                    <p class="text-[#A4907C]">{{ $breadcrumb['label'] }}</p>
                @endif
            </li>
        @endforeach
    </ul>
</div>