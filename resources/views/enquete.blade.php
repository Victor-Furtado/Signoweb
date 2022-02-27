@extends('layout')
@section('title')
<?= $title;?>
@endsection
@section('content')
<form method="post">
    @csrf
    <div class="max-w-lg mx-auto">
        <fieldset class="mb-5 bg-white p-5 shadow-md">
            <legend class="text-xl">
                {{$question}}
            </legend>
            @foreach($options as $option)
            <div class="flex justify-between align-center mb-4">
                <div class="flex items-center">
                    <input id="{{$option->option}}" {{ $disabled==0 ? '' : 'disabled' }} type="radio" name="answer" value="{{$option->id}}"
                        class="h-4 w-4 border-gray-300 focus:ring-2 focus:ring-blue-300"
                        aria-labelledby="{{$option->option}}" aria-describedby="{{$option->option}}">
                    <label for="{{$option->option}}" class="text-sm font-medium text-gray-900 ml-2 block">
                        {{$option->option}}
                    </label>
                </div>
                <p class='text-xs text-gray-400'>VOTOS: <span class='text-base text-black'>{{$option->n_answers}}</span></p>
            </div>
            @endforeach
        </fieldset>
        <div class="flex justify-center mb-5">
            <button type='submit'
                class="{{$disabled==1 ? 'bg-gray-500 pointer-events-none' : 'bg-green-500 hover:bg-green-600'}}  uppercase font-bold text-white px-4 py-3 transition duration-300 ease-in-out mr-6">
                Votar
            </button>
            <a href="/"
                class="bg-red-500 uppercase font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-red-600 mr-6">
                Voltar
            </a>
        </div>
    </div>
</form>
@endsection