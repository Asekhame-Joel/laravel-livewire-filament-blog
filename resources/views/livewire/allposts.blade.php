<div>
    <div class="w-full grid grid-cols-4 gap-10">
        <div class="md:col-span-3 col-span-4">
            <div id="posts" class=" px-3 lg:px-7 py-6">
                <div class="flex justify-between items-center border-b border-gray-100">
                    <div id="filter-selector" class="flex items-center space-x-4 font-light">
                        <button
                            class="{{ $sort === 'desc' ? 'text-gray-900 py-4 border-b border-gray-700' : 'text-gray-500' }}
                          py-4"
                            wire:click="setSort('desc')">Latest
                        </button>
                        <button
                            class="{{ $sort === 'asc' ? 'text-gray-900 py-4 border-b border-gray-700' : 'text-gray-500' }}  py-4"
                            wire:click="setSort('asc')">Oldest
                        </button>
                    </div>
                </div>
                <div class="py-4">
                    @foreach ($this->posts as $post)
                        <x-posts.ariticle-item :post="$post" />
                    @endforeach

                </div>



            </div>
            <div class="py-4">
                {{ $this->posts->links() }}

            </div>
        </div>
    </div>

</div>
