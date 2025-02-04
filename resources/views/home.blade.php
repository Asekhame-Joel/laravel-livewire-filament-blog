<x-app-layout>
    @section('hero')
        <div class="w-full text-center py-32">
            <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700">
                Welcome to <span class="text-yellow-500">&lt;YELO&gt;</span> <span class="text-gray-900"> News</span>
            </h1>
            <p class="text-gray-500 text-lg mt-1">Best Blog in the universe</p>
            <a class="px-3 py-2 text-lg text-white bg-gray-800 rounded mt-5 inline-block"
                href="http://127.0.0.1:8000/blog">Start Reading</a>
        </div>
    @endsection

    <div class="mb-10">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Featured Posts</h2>
            <div class="w-full">
                <div>
                    <div class="grid grid-cols-3 gap-10 w-full">
                        @foreach ($FeaturePost as $post)
                            <x-posts.post-card :post="$post" />
                        @endforeach
                    </div>
                </div>

            </div>
            <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold"
                href="http://127.0.0.1:8000/blog">More
                Posts</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl text-yellow-500 font-bold">Latest Posts</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-3 gap-10 gap-y-32 w-full">
            @foreach ( $LatestPost as $post )

                <div class="md:col-span-1 col-span-3">
                    <a href="http://127.0.0.1:8000/blog/sed-dolor-id-qui-distinctio-autem-repellat-voluptas">
                        <div>
                            <img class="w-full rounded-xl"
                                src={{$post->image}}>
                        </div>
                        <div class="mt-3">
                            <div class="flex items-center mb-2">
                                <p class="text-gray-500 text-sm">{{$post->published_at}}</p>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">{{$post->title}}</h3>
                        </div>
                    </a>
                </div>
                            @endforeach

            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-yellow-500 font-semibold" href="http://127.0.0.1:8000/blog">More
            Posts</a>
    </div>


</x-app-layout>
