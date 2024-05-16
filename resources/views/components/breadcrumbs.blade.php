<div class="text-[16px] breadcrumbs text-[#61676D] pt-[128px] pl-[42px]">
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