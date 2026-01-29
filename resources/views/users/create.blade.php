<x-layout title="Crie sua Conta">

    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nome</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('name') }}">
        </div>   

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">E-mail</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('email') }}">
        </div>   

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Senha</label>
            <input 
                type="password" 
                name="password" 
                id="password"   
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('password') }}">
        </div>   

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Confirmar Senha</label>
            <input 
                type="password" 
                name="password_confirmation" 
                id="password_confirmation" 
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded bg-white dark:bg-gray-800 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                value="{{ old('password_confirmation') }}">
        </div>

        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
            Confirmar
        </button>

        <a href="{{ route('login') }}" class="ml-2 text-gray-600 hover:text-gray-800">Cancelar</a>
    </form>
</x-layout>
