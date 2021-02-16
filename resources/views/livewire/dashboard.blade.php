<div class="w-screen h-screen bg-gray-700">
    <header class="h-1/4 flex justify-center items-start bg-green-600">
        <div class="w-2/4"></div>
        <img class="w-auto mr-10 mt-3" src="{{ asset('images/logo.svg') }}" class="w-30 mt-4" alt="logo">
        <div class="w-2/4 p-3 flex justify-end">
            <button wire:click.prevent="logout" href="">
                <img class="w-1/4" src="{{ asset('images/exit.svg') }}" alt="avatar">
            </button>
        </div>
    </header>

    <main class="w-9/12 mx-auto">
        {{-- balance --}}
        <section class="flex justify-around -my-16">
            {{-- income --}}
            <div class="w-1/4 p-5 rounded shadow-xl flex flex-col bg-white">
                <div class="flex justify-between mb-5">
                    <span class="text-gray-500 text-sm font-semibold">Entradas</span>
                    <img src="{{ asset('images/income.svg') }}" class="w-5" alt="plus">
                </div>
                <p class="text-green-500 text-2xl font-bold">
                    R$ 17.400,00
                </p>
            </div>

            {{-- expense --}}
            <div class="w-1/4 p-5 rounded shadow-xl flex flex-col bg-white">
                <div class="flex justify-between mb-5">
                    <span class="text-gray-500 text-sm font-semibold">Saídas</span>
                    <img src="{{ asset('images/expense.svg') }}" class="w-5" alt="plus">
                </div>
                <p class="text-red-500 text-2xl font-bold">
                    R$ 17.400,00
                </p>
            </div>

            {{-- total --}}
            <div class="w-1/4 p-5 rounded shadow-2xl flex flex-col text-white bg-indigo-700">
                <div class="flex justify-between mb-5">
                    <span class="text-sm font-semibold">Total</span>
                    <img src="{{ asset('images/total.svg') }}" class="w-5" alt="plus">
                </div>
                <p class="text-md text-2xl font-bold">
                    R$ 17.400,00
                </p>
            </div>
        </section>

        <section class="mt-24 ml-16">
            <button wire:click="save" class="w-36 flex justify-between">
                <img src="{{ asset('images/plus.svg')}}" class="w-15" alt="plus">
                <span class="text-green-500">Nova Transação</span>
            </button>
        </section>

        <section class="w-15 mt-5">
            @if (session()->has('info'))
                <div class="w-11/12 text-white text-center mx-auto bg-indigo-500 p-1 rounded">
                    {{ session('info') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="w-11/12 text-white text-center mx-auto bg-red-500 p-1 rounded">
                    {{ session('error') }}
                </div>
            @endif
        </section>

        {{-- data-table --}}
        <section class="w-15 mt-5">
            <div class="w-11/12 p-3 mx-auto bg-white rounded flex justify-between">
                <div class="font-bold text-gray-600">
                    <span>Descrição</span>
                </div>
                <div class="font-bold text-gray-600">
                    <span>Valor</span>
                </div>
                <div class="font-bold text-gray-600">
                    <span>Data</span>
                </div>
                <div class="w-10">

                </div>
            </div>

            <div class="w-11/12 p-3 mx-auto mt-3 bg-gray-200 rounded flex justify-around">
                <div class="w-1/4 font-semibold text-gray-500">
                    Conta de Luz
                </div>
                <div class="w-1/4 font-semibold text-red-500">
                    -R$ 50,00
                </div>
                <div class="w1/4 font-semibold text-gray-500">
                    13/08/2000
                </div>
                <div class="w-1/4 cursor-pointer">
                    <img class="mx-auto" src="{{ asset('images/minus.svg') }}" alt="">
                </div>
            </div>

        </section>
    </main>
</div>
