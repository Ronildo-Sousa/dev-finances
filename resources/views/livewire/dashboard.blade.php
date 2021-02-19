@section('title')
Dashboard
@endsection
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
                    R$ {{ number_format($incomes, 2, ',','.')}}
                </p>
            </div>

            {{-- expense --}}
            <div class="w-1/4 p-5 rounded shadow-xl flex flex-col bg-white">
                <div class="flex justify-between mb-5">
                    <span class="text-gray-500 text-sm font-semibold">Saídas</span>
                    <img src="{{ asset('images/expense.svg') }}" class="w-5" alt="plus">
                </div>
                <p class="text-red-500 text-2xl font-bold">
                    R$ {{ number_format($expenses, 2, ',','.')}}
                </p>
            </div>

            {{-- total --}}
            @if ($total > 0)
                <div class="w-1/4 p-5 rounded shadow-2xl flex flex-col text-white bg-indigo-600">
                    <div class="flex justify-between mb-5">
                        <span class="text-sm font-semibold">Total</span>
                        <img src="{{ asset('images/total.svg') }}" class="w-5" alt="plus">
                    </div>
                    <p class="text-md text-2xl font-bold">
                        R$ {{ number_format($total, 2, ',','.')}}
                    </p>
                </div>
            @else
                <div class="w-1/4 p-5 rounded shadow-2xl flex flex-col text-white bg-red-500">
                    <div class="flex justify-between mb-5">
                        <span class="text-sm font-semibold">Total</span>
                        <img src="{{ asset('images/total.svg') }}" class="w-5" alt="plus">
                    </div>
                    <p class="text-md text-2xl font-bold">
                        R$ {{ number_format($total, 2, ',','.')}}
                    </p>
                </div>
            @endif

        </section>

        <section class="mt-24 ml-16">
            <button wire:click="showModal" class="w-36 flex justify-between">
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
            @foreach ($finances as $finance)
                <div class="w-11/12 p-3 mx-auto mt-3 bg-gray-200 rounded flex justify-around">
                    <div class="w-1/4 font-semibold text-gray-500">
                        {{ $finance->description }}
                    </div>
                    @if ($finance->amount > 0)
                        <div class="w-1/4 font-semibold text-green-500">
                            R$ {{ number_format($finance->amount, 2, ',','.')}}
                        </div>
                    @else
                        <div class="w-1/4 font-semibold text-red-500">
                            R$ {{ number_format($finance->amount, 2, ',','.')}}
                        </div>
                    @endif

                    <div class="w1/4 font-semibold text-gray-500">
                        @php
                            $date = date_create($finance->date)
                        @endphp
                        {{ date_format($date,'d/m/Y') }}
                    </div>
                    <div wire:click="deleteFinance({{ $finance->id }})" class="w-1/4 cursor-pointer">
                        <img class="mx-auto" src="{{ asset('images/minus.svg') }}" alt="">
                    </div>
                </div>
            @endforeach
           <div class="flex justify-center mt-3">
               {{ $finances->links() }}
           </div>
        </section>

        {{-- new transaction modal --}}
        <!-- This example requires Tailwind CSS v2.0+ -->
        @if($newTransaction)
            <div id="modal" class="fixed z-10 inset-0 overflow-y-auto">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <!--
                    Background overlay, show/hide based on modal state.

                    Entering: "ease-out duration-300"
                        From: "opacity-0"
                        To: "opacity-100"
                    Leaving: "ease-in duration-200"
                        From: "opacity-100"
                        To: "opacity-0"
                    -->
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <!--
                    Modal panel, show/hide based on modal state.

                    Entering: "ease-out duration-300"
                        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        To: "opacity-100 translate-y-0 sm:scale-100"
                    Leaving: "ease-in duration-200"
                        From: "opacity-100 translate-y-0 sm:scale-100"
                        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    -->
                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <div class="bg-gray-700 pt-5 pb-4 sm:p-6 sm:pb-4">


                            <div class="w-11/12 mx-auto mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-semibold text-white" id="modal-headline">
                                    Criar Transação
                                </h3>
                                <div>
                                    @error('description')
                                        <div class="p-2 text-center text-white m-2 bg-red-500 rounded">{{$message}}</div>
                                    @enderror
                                    @error('amount')
                                        <div class="p-2 text-center text-white m-2 bg-red-500 rounded">{{$message}}</div>
                                    @enderror
                                    @error('date')
                                        <div class="p-2 text-center text-white m-2 bg-red-500 rounded">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="w-50 mt-5 flex flex-col">
                                    <input wire:model="description" type="text" class="p-2 mb-5 rounded" placeholder="Descrição">
                                    <div class="flex flex-col mb-3">
                                        <input wire:model="amount" type="number" class="p-2 rounded" placeholder="Valor">
                                        <small class="text-gray-400">Use o sinal - (negativo) para despesas e , (vírgula) para casas decimais.</small>
                                    </div>
                                    <input wire:model="date" type="date" class="p-2 rounded">
                                </div>
                            </div>

                    </div>
                    <div class="bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="createTransaction" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 0 sm:ml-3 sm:w-auto sm:text-sm">
                            Enviar
                        </button>
                        <button wire:click="closeModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancelar
                        </button>
                    </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
</div>
