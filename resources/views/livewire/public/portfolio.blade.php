<div>
    <div class="h-screen py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div
                class="mx-auto mt-5 pb-10 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-5 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @forelse ($images as $image)
                <article
                    class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="{{ asset($image->getFirstMedia('gallery')->getUrl()) }}"
                        alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                </article>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</div>