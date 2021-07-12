@if($subbanners->count())

    <section class='bg-white p-0 mt-4 m-0' data-aos='fade-up'>
        <div class='row p-0 m-0'>
            
            @foreach($subbanners as $subbanner)
                <div class='col-12 col-sm-6 col-lg-4 p-2 m-0'>
                    <div class='gender-card'>
                        <img class='image' src='{{ $subbanner->source }}' />
                        
                        <div class='bottom'>
                            <span class='text'>
                                {{ $subbanner->label }}
                            </span>
                        </div>

                        <div class='floating'>
                            <div class='content'>
                                <span class='label'>
                                    {{ $subbanner->label }}
                                </span>
                                <hr class='divider' />
                                <a 
                                    class='link btn btn-outline-dark-blue animating-btn action serious'
                                    href='{{ url(app()->getLocale(), $subbanner->link) }}'
                                >
                                    __("Show")
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </section>

@endif