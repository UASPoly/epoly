
@if (count($breadcrumbs))
<br>
    <ul class="breadcrumb" style="background-color: #DCF9FA; list-style-type: none;">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}" class="text text-success"><b>{{ $breadcrumb->title}} ></b></a></li>
            @else
                <li class="breadcrumb-item active"><b>{{ $breadcrumb->title }}</b></li>
            @endif

        @endforeach
    </ul>

@endif