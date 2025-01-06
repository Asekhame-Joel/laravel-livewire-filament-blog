@props(['post'])
<div>
      <div class="md:col-span-1 col-span-3">
                            <div>
                                <img class="w-full rounded-xl" src={{ $post->image }}>
                            </div>
                            <div class="mt-3">
                                <div class="flex items-center mb-2">
                                    <p class="text-gray-500 text-sm">{{ $post->published_at }}</p>
                                </div>
                                <a class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
                            </div>
                        </div>
</div>
