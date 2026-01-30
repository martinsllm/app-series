<x-app-layout>
    <x-card title="Episódios">
        <form method="POST">
            @csrf
            <ul class="space-y-2">
                @foreach($episodes as $episode)
                    <li class="p-4 bg-white dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white flex justify-between items-center">
                        Episódio {{ $episode->number }}
                    
                        <input type="checkbox" name="episodes[]" value="{{ $episode->id }}" class="h-5 w-5 text-blue-600" {{ $episode->watched ? 'checked' : '' }}>
                    </li>
                @endforeach
            </ul>

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Salvar</button>
                <a href="{{ route('seasons.index', $series->id) }}" class="ml-2 text-gray-600 hover:text-gray-800">Cancelar</a>
            </div>
        </form>
    </x-card>
</x-app-layout>
