@foreach($subjects as $subject)
    @if($subject->courses->count())
        <div class="card-wrapper col-md-4" data-section="subjects-results">
            <a href="browse/{{$subject->slug}}" class="browse-item">
                <div class="card-section">
                    <div class="card-image">
                        @if($subject->image_url)
                            <img src="/uploads/images/{{ $subject->image_url }}" alt="{{ $subject->slug }}">
                        @else
                            <img src="/uploads/images/fallback/fallback.jpg" alt="{{ $subject->slug }}">
                        @endif
                    </div>
                    <div class="card-text">
                        <h4>{{ $subject->title }}</h4>
                        <p>9/10</p>
                        {{-- Carbon to parse date --}}
                        <span>Toegevoegd op {{ Carbon::parse($subject->created_at)->format('d-m-Y') }}</span>
                    </div>
                </div>
            </a>
        </div>
    @endif
@endforeach
