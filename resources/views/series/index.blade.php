<x-layout title="Séries">
    <div class="mb-6">
        <a href="{{ route('series.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">+ Adicionar</a>
    </div>
    
    <ul class="space-y-2">
        @foreach($series as $serie)
            <li class="p-4 bg-white dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white">{{ $serie->name }}</li>
        @endforeach
    </ul>
</x-layout>
