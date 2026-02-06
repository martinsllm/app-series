<x-app-layout>
    <x-card title="Séries">
        @auth
        <div class="mb-6">
            <a href="{{ route('series.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">+ Adicionar</a>
        </div>
        @endauth
        
        <ul class="space-y-2">
            @foreach($series as $serie)
                <li class="p-4 bg-white dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white flex justify-between items-center">
                    
                    <div class="flex items-center">
                        <img src="{{ asset('storage/' . $serie['cover']) }}" class="w-16 h-16 object-cover rounded mr-4">
                        
                        @auth <a class="ml-4 font-semibold hover:underline" href="{{ route('seasons.index', $serie['id']) }}"> @endauth
                            {{ $serie['name'] }}
                        @auth </a> @endauth
                    </div>

                    @auth
                    <div class="flex gap-2">
                        <a href="{{ route('series.edit', $serie['id']) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-1 px-2 rounded">E</a>
                        
                        <form action="{{ route('series.destroy', $serie['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-2 rounded">X</button>
                        </form>
                    </div>
                    @endauth
                </li>
            @endforeach
        </ul>
    </x-card>
</x-app-layout>
