<div class="text-base breadcrumbs text-slateGray pt-32 pl-11">
    <ul>
        @foreach ($breadcrumbs as $index => $breadcrumb)
            <li class="breadcrumb-item">
                @if ($loop->last)
                    <a href="{{ $breadcrumb['url'] }}" class="text-shadeBrown">{{ $breadcrumb['label'] }}</a>
                @else
                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['label'] }}</a>

                @endif
            </li>
        @endforeach
    </ul>
</div>