<x-layout title="{{$seasons->first()->series->name}}">
    <ul class="space-y-2">
        @foreach($seasons as $season)
            <li class="p-4 bg-white dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white flex justify-between items-center">
                <a href="{{ route('episodes.index', $season->id) }}" class="font-semibold hover:underline">
                    Temporada {{ $season->number }}
                </a>
                <div class="flex gap-2">
                    <span class="inline-block px-3 py-1 bg-blue-500 text-white font-semibold rounded-full text-sm">
                        {{ $season->episodes->count() }} episódios
                    </span>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="mt-6">
        <a href="{{ route('series.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Voltar
        </a>
    </div>
</x-layout>
