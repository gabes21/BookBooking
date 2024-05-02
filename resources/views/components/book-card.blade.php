@props(['book'])

<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$book->image ? asset('/storage/'.$book->image) : asset('/images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/books/{{$book->id}}">{{$book->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$book->author}}</div>
            <x-book-genre :genresCsv="$book->genre" />
        </div>
    </div>
</x-card>