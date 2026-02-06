<x-app-layout>
    <x-card title="Editar Série">
        <form action="{{ route('series.update', $serie->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            @method('PUT')

            <div class="flex gap-4">
                <div class="flex-1">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nome</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ $serie->name }}">
                </div>
                <div class="flex-1">
                    <label for="seasonsQty" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nº Temporadas</label>
                    <input 
                        type="text" 
                        name="seasonsQty" 
                        id="seasonsQty" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ $serie->seasons->count() }}">
                </div>
                <div class="flex-1">
                    <label for="episodesForSeason" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Eps / Temporada</label>
                    <input 
                        type="text" 
                        name="episodesForSeason" 
                        id="episodesForSeason" 
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                        value="{{ $serie->seasons->first()->episodes->count() }}">
                </div>
            </div>
            
            <div class="flex gap-4">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Capa (image)</label>

                    <div class="mt-1">
                        <div class="flex items-center">
                            <label for="cover" class="cursor-pointer inline-flex items-center px-4 py-2 border border-gray-300 rounded bg-white dark:bg-gray-800 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-50">
                                <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16v-4a4 4 0 018 0v4m-5 4h6"></path></svg>
                                <span class="ml-2">Escolher arquivo</span>
                            </label>
                            <input id="cover" name="cover" type="file" accept="image/*" class="sr-only">
                            <span id="cover-filename" class="ml-4 text-sm text-gray-600"></span>
                            
                            @if(!empty($serie->cover))
                                <a href="{{ route('series.removeCover', $serie->id) }}" class="ml-4 text-red-600 hover:text-red-800 text-sm">Remover capa</a>
                            @endif
                        </div>

                        @php
                            $coverSrc = '';
                            if(old('cover')) {
                                $coverSrc = '';
                            } elseif(isset($serie) && !empty($serie->cover)) {
                                $coverSrc = asset('storage/' . $serie->cover);
                            }
                        @endphp

                        <a href="{{ $coverSrc }}" target="_blank"><img id="cover-preview" class="mt-4 max-h-48 rounded {{ empty($coverSrc) ? 'hidden' : '' }}" src="{{ $coverSrc }}" alt="Preview da capa"></a>
                    </div>
                </div>
            </div>

            <script>
                (function(){
                    var input = document.getElementById('cover');
                    var filenameEl = document.getElementById('cover-filename');
                    var preview = document.getElementById('cover-preview');
                    if(!input) return;
                    input.addEventListener('change', function(){
                        var file = this.files && this.files[0];
                        if(file){
                            filenameEl.textContent = file.name;
                            if(file.type && file.type.indexOf('image') === 0){
                                var reader = new FileReader();
                                reader.onload = function(e){
                                    preview.src = e.target.result;
                                    preview.classList.remove('hidden');
                                };
                                reader.readAsDataURL(file);
                            } else {
                                preview.src = '';
                                preview.classList.add('hidden');
                            }
                        } else {
                            filenameEl.textContent = '';
                            preview.src = '';
                            preview.classList.add('hidden');
                        }
                    });
                })();
            </script>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Salvar</button>
            <a href="{{ route('series.index') }}" class="ml-2 text-gray-600 hover:text-gray-800">Cancelar</a>
        </form>
    </x-card>
</x-app-layout>