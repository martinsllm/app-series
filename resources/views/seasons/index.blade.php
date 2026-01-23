<x-layout title="{{$seasons->first()->series->name}}">
    <ul class="space-y-2">
        @foreach($seasons as $season)
            <li class="p-4 bg-white dark:bg-gray-800 rounded border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-white flex justify-between items-center">
                Temporada {{ $season->number }}
                <div class="flex gap-2">
                    <span class="inline-block px-3 py-1 bg-blue-500 text-white font-semibold rounded-full text-sm">
                        {{ $season->episodes->count() }} episódios
                    </span>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>
