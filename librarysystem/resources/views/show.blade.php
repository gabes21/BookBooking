<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
    <x-card class="px-4">
        <div class="flex flex-col items-center justify-center text-center">
            <img
                class="w-48 mr-6 mb-6"
                src="{{$book->image ? asset('/storage/'.$listing->logo) : asset('/images/no-image.png')}}"
                alt=""
            />

            <h3 class="text-2xl mb-2">{{$book->title}}</h3>
            <div class="text-xl font-bold mb-4">{{$book->author}}</div>
            <x-book-genre :genresCsv="$book->genre" />
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Book Summary
                </h3>
                <div class="text-lg space-y-6">
                    {{$book->summary}}
                </div>
            </div>
        </div>
    </x-card>
    <x-card class="mt-4 p-2 flex space-x-6">
        <form class="hidden" method="POST" action="/books/{{$book->id}}">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
        </form>
        <button id="showFormButton" class="text-red-500"><i class="fa-solid fa-book"></i>Book</button>
    </x-card>
    <x-card id="myForm" class="hidden">
        <form method="POST" action="/books/{{$book->id}}/store" class="flex flex-col items-center">
            @csrf
            <div class="mb-2 flex flex-row">
                <label for="start_date" class="rounded p-2 w-80 mr-6">Start Date</label>
                
                <input type="date" class="border border-gray-200 rounded p-2 w-full mr-6" name="start_date" />
                @error('start_date')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

                <label for="end_date" class="rounded p-2 w-80 mr-6">End Date</label>
                <input type="date" class="border border-gray-200 rounded p-2 w-full" name="end_date" />
                @error('end_date')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <button class="bg-green-500 mt-3">Submit</button>
        </form>
    </x-card>
</x-layout>

<script>
    document.getElementById('showFormButton').addEventListener('click', function() {
        document.getElementById('myForm').classList.remove('hidden');
    });
  

</script>