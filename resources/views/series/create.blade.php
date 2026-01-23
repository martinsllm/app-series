<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="flex gap-4">
            <div class="flex-1">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nome</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('name') }}">
            </div>
            <div class="flex-1">
                <label for="seasonsQty" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nº Temporadas</label>
                <input 
                    type="text" 
                    name="seasonsQty" 
                    id="seasonsQty" 
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('seasonsQty') }}">
            </div>
            <div class="flex-1">
                <label for="episodesForSeason" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Eps / Temporada</label>
                <input 
                    type="text" 
                    name="episodesForSeason" 
                    id="episodesForSeason" 
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('episodesForSeason') }}">
            </div>
        </div>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Salvar</button>
    </form>
</x-layout>