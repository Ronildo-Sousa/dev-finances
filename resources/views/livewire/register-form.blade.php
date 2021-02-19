@section('title')
Cadastro
@endsection
<div class="min-h-screen flex items-center justify-center bg-gray-700 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
      <div class="flex flex-col items-center">
        <img src="{{ asset('images/logo.svg') }}" class="w-52" alt="logo">
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
          Crie a sua conta
        </h2>

      </div>

      <form wire:submit.prevent="register" class="mt-8 space-y-6">
        @error('name')
            <div class="text-white bg-red-500 text-lg p-1 text-center rounded">
                <small>{{ $message}}</small>
            </div>
        @enderror
        @error('email')
            <div class="text-white bg-red-500 text-lg p-1 text-center rounded">
                <small>{{ $message}}</small>
            </div>
        @enderror
        @error('password')
            <div class="text-white bg-red-500 text-lg p-1 text-center rounded">
                <small>{{ $message}}</small>
            </div>
        @enderror
        @if (session()->has('error'))
            <div class="text-white text-center bg-red-500 p-1 rounded">
                {{ session('error') }}
            </div>
        @endif
        <input type="hidden" name="remember" value="true">

          <div>
            <label for="email-address" class="text-white">Nome</label>
            <input wire:model="name"  name="name" type="text" required  class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Insira seu Nome">
          </div>

          <div>
            <label for="email-address" class="text-white">Email</label>
            <input wire:model="email" id="email-address" name="email" type="email" autocomplete="email" required  class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Insira seu Email">
          </div>

          <div>
            <label for="password" class="text-white">Senha</label>
            <input wire:model="password" id="password" name="password" type="password" required  class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Insira sua senha">
          </div>

          <div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cadastrar
            </button>
          </div>
          <div class="text-center">
            <a href="{{ route('login') }}" class="text-white">Já tem uma conta? Faça Login</a>
         </div>
      </form>

</div>
