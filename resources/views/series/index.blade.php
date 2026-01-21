<x-layout title="Séries">
    <div class="mb-6">
        <a href="{{ route('series.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">+ Adicionar</a>
    </div>

    @if(session('message'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('message') }}
        </div>
    @endif
    
    <ul class="space-y-2">
        @foreach($series as $serie)
            <li class="p-4 bg-white dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white flex justify-between items-center">
                {{ $serie->name }}

                <div class="flex gap-2">
                    <form action="{{ route('series.destroy', $serie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded">X</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
