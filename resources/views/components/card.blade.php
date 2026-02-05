@props(['title' => null])

<div {{ $attributes->merge(['class' => "max-w-7xl mx-auto sm:px-6 lg:px-8"]) }}>
    <div {{ $attributes->merge(['class' => "p-6 text-gray-900"]) }}>
            @isset($title)
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">{{ $title }}</h1>
            @endisset
            
            @if(session('message'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('message') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
        {{ $slot }}
    </div>
</div>