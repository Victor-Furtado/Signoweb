@extends('layout')
@section('title')
<?= $title;?>
@endsection
@section('content')
<form method="post">
    @csrf
    <div class="max-w-xl mx-auto bg-white p-5">
        <div class="flex flex-col align-center gap-5">
            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="title" class="bg-white text-gray-600 text-lg px-1">Título da enquete</label> </p>
                </div>
                <p> <input id="title" autocomplete="false" tabindex="0" type="text" name="title"
                        value="{{$enquete->title}}" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                </p>
            </div>
            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="question" class="bg-white text-gray-600 text-lg px-1">Pergunta</label> </p>
                </div>
                <p> <input id="question" autocomplete="false" tabindex="0" type="text" name="question"
                        value="{{$enquete->question}}" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                </p>
            </div>
            <div class="flex flex-col gap-5 md:grid md:grid-cols-3 md:gap-4">
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p> <label for="dt_start" class="bg-white text-gray-600 text-lg px-1">Data de inicio</label>
                        </p>
                    </div>
                    <p> <input id="dt_start" autocomplete="false" tabindex="0" type="date" name="dt_start"
                            value="{{$enquete->dt_start}}"
                            class="py-1 px-1 text-gray-900 outline-none block h-full w-full"> </p>
                </div>
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p> <label for="dt_end" class="bg-white text-gray-600 text-lg px-1">Data de fim</label> </p>
                    </div>
                    <p> <input id="dt_end" autocomplete="false" tabindex="0" type="date" name="dt_end"
                            value="{{$enquete->dt_end}}"
                            class="py-1 px-1 text-gray-900 outline-none block h-full w-full"> </p>
                </div>
                <div
                    class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                    <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                        <p> <label for="n_options" class="bg-white text-gray-600 text-lg md:text-base px-1">Quantas opções?</label> </p>
                    </div>
                    <p> <input id="n_options" autocomplete="false" tabindex="0" type="number" name="n_options"
                            value="{{$enquete->options}}" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mb-5"> <button type="submit"
            class="bg-green-500 uppercase font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-green-600 mx-6">
            Definir opções </button> <a href="/"
            class="bg-red-500 uppercase font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-red-600 mx-6">
            Cancelar </a> </div>
</form>
@endsection