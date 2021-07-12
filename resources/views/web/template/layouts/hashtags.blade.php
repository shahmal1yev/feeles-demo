@if($hashtags->count())

    <section class='mt-4' data-aos='fade-up'>
        <div class='hashtags text-center px-md-5 mx-md-3 p-0 m-0'>
        
            @foreach($hashtags as $hashtag)

                <a class='hashtag' href='{{ url(app()->getLocale() . $hashtag->link) }}'>
                    {{ $hashtag->label }}
                </a>

            @endforeach

        </div>
    </section>

@endif