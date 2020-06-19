<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-4">
        @if($sub_item)
            <li class="breadcrumb-item"><a href="{{ route($route, $sub_item, $item->id) }}">{{ $title }}</a></li>
        @else
            <li class="breadcrumb-item"><a href="{{ route($route) }}">{{ $title }}</a></li>
        @endif
        <li class="breadcrumb-item active" aria-current="page">{{ !$item->id ? 'Toevoegen' : $current_item }}</li>
    </ol>
</nav>
