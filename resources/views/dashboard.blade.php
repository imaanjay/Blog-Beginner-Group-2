<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Home
        </h2>
    </x-slot>

    <div class="py-4 z-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="w-full mx-auto">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Search..." name="search" required value="{{ request('search') }}" />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                </div>
            </form>
        </div>
    </div>

    @if ($articles->isEmpty())
        <h1 class="text-center text-2xl">Article not found</h1>
    @else
        @foreach ($articles as $article)
            <div class="py-4 hover:scale-[1.05] ease-out duration-150">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden flex flex-row gap-4 border-2 border-gray-300">
                        <div>
                            <div class="w-80 h-60">
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt=""
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('img/UB.jpg') }}" alt=""
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                        </div>
                        <div class="flex flex-col flex-1 font-poppins py-4 px-2">
                            <h1 class="text-4xl mb-1 line-clamp-1 font-medium">{{ $article->title }}</h1>
                            <div class="flex gap-1">
                                <a href="{{ route('category.show', $article->category->slug) }}"
                                    class="text-lg">{{ $article->category->name }}
                                </a>
                                <p class="text-lg mb-1">| {{ $article->created_at->diffForHumans() }}</p>
                            </div>
                            <hr class="w-32 border-blue-500 border-3 mb-1">
                            <p class="flex-1">{!! $article->excerpt !!}</p>
                            <a href="{{ route('post', $article->slug) }}"
                                class="inline-flex items-center gap-2 bg-gray-100 p-1 max-w-fit">
                                <p>Read More</p>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="#0ea5e9" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between items-center mt-4 bg-white rounded-lg p-4 shadow-md">
                    <div class="text-sm text-gray-600">
                        <!-- Display current page item range -->
                        show article {{ $articles->firstItem() }} to {{ $articles->lastItem() }} from
                        {{ $articles->total() }} articles
                    </div>

                    <!-- Custom Pagination -->
                    <nav class="pagination">
                        {{ $articles->onEachSide(1)->links('components.pagination') }}
                    </nav>
                </div>
            </div>
        </div>
    @endif


</x-app-layout>
