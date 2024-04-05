@if (count($advs)>0)
    <section class="py-2 bg-body">
        <div class=" zindex-5 ">

            <!-- LTR -->
            <div class="swiper" data-swiper-options='{
                    "loop": true,
                    "grabCursor": false,
                    "autoplay": {
                        "delay": 0,
                        "disableOnInteraction": true
                    },
                    "freeMode": true,
                    "speed": 5000,
                    "freeModeMomentum": false,
                    "breakpoints": {
                        "0": {
                            "slidesPerView": 1,
                            "spaceBetween": 8
                        },
                        "500": {
                            "spaceBetween": 16
                        },
                        "1024": {
                            "slidesPerView": 2,
                            "spaceBetween": 24
                        }
                    }
                    
                }'>
                <div class="swiper-wrapper">

                        @foreach ($advs as $adv)
                            <div class="swiper-slide">
                                <div class="image-container">
                                    <a href="{{ $adv->hyperlink }}" class="stretched-link">
                                        <img src="{{ asset('public/assets/img/home/advertisement/'.$adv->poster) }}" alt="{{ $adv->adv_name }}"
                                            class="rounded-3 p-1">
                                    </a>
                                </div>
                            </div>
                        @endforeach

                </div>
            </div>

        </div>
    </section>
@endif
