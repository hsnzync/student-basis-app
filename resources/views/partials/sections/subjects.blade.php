@foreach($subjects as $subject)
    @if($subject->courses->count())
        <div class="main-features-wrapper main-block-wrapper col-lg-4" data-section="subjects-results">
            <a href="browse/{{$subject->slug}}" class="browse-item">
                <div class="col-12 main-block-section">
                    <div class="main-block-image-section">
                        @if($subject->image_url)
                            <img src="/uploads/images/{{ $subject->image_url }}" alt="{{ $subject->slug }}">
                        @else
                            <img src="/uploads/images/fallback/fallback.jpg" alt="{{ $subject->slug }}">
                        @endif
                    </div>
                    <div class="main-block-text">
                        <h4>{{ $subject->title }}</h4>
                    </div>
                </div>
            </a>
        </div>
    @endif
@endforeach