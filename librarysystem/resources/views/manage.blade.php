<x-layout>
    <x-card class='p-10'> 
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Booking
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($books->isEmpty())
                @foreach($books as $book)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="/books/{{$book->id}}">
                            {{$book->title}} {{$book->id}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <form method="POST" action="/books/{{$book->id}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">No Listings Found</p>
                    </td>
                </tr>
                @endunless
            </tbody>
        </table>
    </x-card>  
</x-layout>