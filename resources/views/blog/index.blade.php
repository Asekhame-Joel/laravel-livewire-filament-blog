<x-app-layout>
@livewire('allposts')
 <div id="side-bar"
            class="border-t border-t-gray-100 md:border-t-none col-span-4 md:col-span-1 px-3 md:px-6  space-y-10 py-6 pt-10 md:border-l border-gray-100 h-screen sticky top-0">
     @include('layouts.partials.search-post-title')
            <div id="recommended-topics-box">
                <h3 class="text-lg font-semibold text-gray-900 mb-3">Recommended Topics</h3>
                <div class="topics flex flex-wrap justify-start">
                    <a href="#"
                        class="bg-red-600
                                        text-white
                                        rounded-xl px-3 py-1 text-base">
                        Tailwind</a>
                </div>
            </div>
        </div>
</x-app-layout>
