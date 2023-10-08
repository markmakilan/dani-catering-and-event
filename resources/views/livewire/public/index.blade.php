<div>
    <div class="flex items-center justify-center h-screen mx-8 mb-10" style="margin-top: 105px;">
        <div x-data="carousel" class="relative w-full">
            <div class="overflow-hidden rounded-2xl">
                <div class="flex transition-transform" style="transform: translateX(-{{ $current }} * 100%);">
                    <div class="flex-shrink-0">
                        <img 
                            src="{{ asset('assets/img/slider.png') }}" 
                            class="w-screen h-screen object-cover"
                            alt="carousel-image"
                            x-show="currentSlide == 0">
                        <img 
                            src="https://img.freepik.com/premium-photo/restaurant-lunch-catering-buffet-with-different-dishes_219193-3429.jpg" 
                            class="w-screen h-screen object-cover"
                            alt="carousel-image"
                            x-show="currentSlide == 1">
                        <img 
                            src="https://media.istockphoto.com/id/650655146/photo/catering-food-wedding-event-table.jpg?s=612x612&w=0&k=20&c=ATGYgW8bM_559jJ5aUNO4HlJqpkOWUmNNMMflx5kajo=" 
                            class="w-screen h-screen object-cover"
                            alt="carousel-image"
                            x-show="currentSlide == 2">
                    </div>
                </div>
            </div>
            
            <div class="absolute h-full top-0 left-0 right-0 flex justify-between">
                <button x-on:click="togglePrevious" class="w-20 flex items-center justify-center">
                    <x-icons.caret-left class="w-14 h-14" fill="#f8e046" />
                </button>
                <button x-on:click="toggleNext" class="w-20 flex items-center justify-center">
                    <x-icons.caret-right class="w-14 h-14" fill="#f8e046" />
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('carousel', () => ({
                currentSlide: @entangle('current'),
     
                toggleNext() {
                    this.currentSlide = (this.currentSlide + 1) % 3
                },

                togglePrevious() {
                    this.currentSlide = (this.currentSlide - 1 + 3) % 3
                },
            }))
        })
    </script>
</div>
