<div class="button-section">
    @if($sub_item)
        <a href="{{ route($route, $sub_item) }}" class="btn btn-{{ $type }}">{{ $text }}</a>
    @else
        <a href="{{ route($route) }}" class="btn btn-{{ $type }}">{{ $text }}</a>
    @endif
</div>
