
@if (count($breadcrumbs))

    <ul class="breadcrumb" style="list-style-type: none;">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item" style="list-style-type: none;"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li style="list-style-type: none" class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ul>

@endif