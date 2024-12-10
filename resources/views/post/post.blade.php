<x-app-layout>
    <div class="mx-auto w-3/4 h-[30rem] relative mt-16">
        @if ($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" alt="" class="w-full h-full object-cover">
        @else
            <img src="{{ asset('img/UB.jpg') }}" alt="" class="w-full h-full object-cover">
        @endif
    </div>
    <div class="w-3/4 bg-white mx-auto px-12 py-8 rounded-sm z-10 relative flex flex-col gap-4 shadow-2xl font-poppins">
        <p class="bg-blue-500 text-white max-w-fit p-2 font-medium -mt-12 rounded-md">{{ $article->category->name }}</p>
        <h1 class="text-5xl font-bold uppercase">{{ $article->title }}</h1>
        <p class="">
            {!! $article->full_text !!}
        </p>
        <div class="flex flex-row justify-between italic">
            <div class="flex-row flex gap-1">
                <p class=" mr-2">{{ \Carbon\Carbon::parse($article->created_at)->format('F d, Y') }}</p>
                @foreach ($article->tags as $tag)
                    <a href="{{ route('tags.show', $tag->slug) }}">{{ $tag->name }}
                        @unless ($loop->last)
                            ,
                        @endunless
                    </a>
                @endforeach
            </div>
            <p class="">By {{ $article->user->name }}</p>
        </div>
    </div>

</x-app-layout>
