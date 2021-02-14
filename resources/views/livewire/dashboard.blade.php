<div class="w-screen h-screen bg-gray-700">
    <header class="h-1/4 flex justify-center items-start bg-green-600">
        <img src="{{ asset('images/logo.svg') }}" class="w-30 mt-4" alt="logo">
    </header>

    <main>
        {{-- balance --}}
        <section class="flex justify-around -my-16">
            {{-- income --}}
            <div class="w-1/4 p-3 rounded shadow-xl flex flex-col bg-white">
                <div class="flex justify-between mb-5">
                    <span class="text-gray-500 text-sm font-semibold">Entradas</span>
                    <img src="{{ asset('images/income.svg') }}" class="w-5" alt="plus">
                </div>
                <p class="text-gray-600 text-2xl font-bold">
                    R$ 17.400,00
                </p>
            </div>

            {{-- expense --}}
            <div class="w-1/4 p-3 rounded shadow-xl flex flex-col bg-white">
                <div class="flex justify-between mb-5">
                    <span class="text-gray-500 text-sm font-semibold">Entradas</span>
                    <img src="{{ asset('images/expense.svg') }}" class="w-5" alt="plus">
                </div>
                <p class="text-gray-600 text-2xl font-bold">
                    R$ 17.400,00
                </p>
            </div>

            {{-- total --}}
            <div class="w-1/4 p-3 rounded shadow-2xl flex flex-col text-white bg-gray-900">
                <div class="flex justify-between mb-5">
                    <span class="text-sm font-semibold">Entradas</span>
                    <img src="{{ asset('images/total.svg') }}" class="w-5" alt="plus">
                </div>
                <p class="text-md text-2xl font-bold">
                    R$ 17.400,00
                </p>
            </div>
        </section>

        {{-- data-table --}}
        <section>

        </section>
    </main>
</div>
