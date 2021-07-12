@if ($banners->count())
    <section>
        <div id="bannersCarousel" class="carousel slide" data-bs-ride="carousel" data-aos='fade-up'>
            <div class="carousel-indicators">
                @foreach($banners as $index => $banner)
                    <button
                        type='button'
                        data-bs-toggle='#bannersCarousel'
                        datab-bs-slide-to='{{ $banner->id }}'
                        {{ $index == 0 ? "class='active' aria-current='true'" : false }}
                        aria-label='Slide {{ $index + 1 }}'
                    >
                    </button>
                @endforeach
            </div>

            <div class="carousel-inner">
                @foreach($banners as $index => $banner)
                    <div
                        class="carousel-item {{ ($index == 0) ? 'active' : false }}"
                    >
                        <a 
                            href='{{ url(app()->getLocale() . $banner->link) }}' class='d-block p-0 m-0'
                        >
                            <img 
                                src="{{ $banner->source }}"
                                class="d-block w-100"
                            />
                        </a>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#bannersCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('Previous') }}</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bannersCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('Next') }}</span>
            </button>
        </div>
    </section>
@endif