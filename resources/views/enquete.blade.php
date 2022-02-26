@extends('layout')
@section('title')
<?= $title;?>
@endsection
@section('content')
<div class="max-w-lg mx-auto">
    <fieldset class="mb-5 bg-white p-5 shadow-md">
        <legend class="text-xl">
            Placeholder Question
        </legend>

        <div class="flex items-center mb-4">
            <input id="option-1" type="radio" name="options" value="value"
                class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300" aria-labelledby="option-1"
                aria-describedby="option-1" checked="">
            <label for="option-1" class="text-sm font-medium text-gray-900 ml-2 block">
                Opção 1
            </label>
        </div>
    </fieldset>
    <div class="flex justify-center mb-5">
        <a href="/"
            class="bg-green-500 uppercase font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-green-600 mr-6">
            Confirmar
        </a>
        <a href="/"
            class="bg-red-500 uppercase font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-red-600 mr-6">
            Cancelar
        </a>
    </div>
</div>
@endsection