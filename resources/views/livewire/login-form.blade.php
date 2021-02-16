<div class="min-h-screen flex items-center justify-center bg-gray-700 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div class="flex flex-col items-center">
        <img src="{{ asset('images/logo.svg') }}" class="w-52" alt="logo">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Entre com a sua conta
        </h2>

      </div>

      <form wire:submit.prevent="login" class="mt-8 space-y-6">

        @if (session()->has('info'))
            <div class="text-white text-center bg-indigo-500 p-1 rounded">
                {{ session('info') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="text-white text-center bg-red-500 p-1 rounded">
                {{ session('error') }}
            </div>
        @endif

        @error('email')
            <div class="text-white text-center bg-red-500 p-1 rounded">
                <small>{{ $message}}</small>
            </div>
        @enderror
        @error('password')
            <div class="text-white text-center bg-red-500 p-1 rounded">
                <small>{{ $message}}</small>
            </div>
        @enderror
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm -space-y-px">
          <div>
            <label for="email-address" class="sr-only">Email</label>
            <input wire:model="email" id="email-address" name="email" type="email" autocomplete="email"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Insira seu Email">
          </div>

          <div>
            <label for="password" class="sr-only">Senha</label>
            <input wire:model="password" id="password" name="password" type="password" autocomplete="current-password"  class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Insira sua senha">
          </div>
        </div>


        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Entrar
          </button>
        </div>
        <div class="text-center">
            <a href="{{ route('register') }}" class="text-white">Ainda não tem uma conta? Cadastre-se</a>
        </div>
      </form>
    </div>
</div>
