{{-- Selection registration process --}}

<div class="main-container">
    {!! Form::open() !!}
    <div class="col-sm-12 row">
        @foreach($entities as $entity)
            @if($entity->count())
                <div class="col-md-4 education-block">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn toggle-options">
                            <input type="radio" name="{{ request()->segment(1) == 'select-programme' ? 'programme_id' : 'school_id' }}" value="{{ $entity->id }}" id="{{ $entity->slug }}" autocomplete="off">

                            <div class="card">
                                @if($entity->image_url)
                                    <div class="card-body" style="background-image: url('/uploads/schools/{{ $entity->image_url }}')"></div>
                                @else
                                    <div class="card-body" style="background-image: url('/uploads/fallback/fallback.jpg')"></div>
                                @endif
                                
                                <div class="card-content">
                                    <h5 class="card-title">{{ $entity->title }}</h5>
                                </div>
                            </div>

                        </label>
                    </div>
                </div>
            @endif
        @endforeach

        <div class="education-submit col-md-12 text-center">
            <input class="btn btn-primary" type="submit" value="{{ request()->segment(1) == 'select-programme' ? 'Voltooien' : 'Volgende' }}">
        </div>
        
    </div>
    {!! Form::close() !!}
</div>