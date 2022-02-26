@extends('layout')
@section('title')
<?= $title;?>
@endsection
@section('content')
<form method="post">
    @csrf
    <div class="max-w-xl mx-auto bg-white p-5">
        <div class="flex flex-col align-center gap-5">
            @if(Count($n_options) > 0)
            @for($i = 1; $i <= $n_options; $i++)
            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="{{$options}}" class="bg-white text-gray-600 text-lg px-1">Questão {{$i}}</label> </p>
                </div>
                <p>
                    <input id="{{$options}}" autocomplete="false" tabindex="0" type="text" name="{{$options}}"
                        class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                </p>
            </div>
            @endfor
            @endif
        </div>
    </div>
    <div class="flex justify-center mb-5"> <button type="submit"
            class="bg-green-500 uppercase font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-green-600 mx-6">
            {{str_replace(" Enquete","",$title)}} </button> <a href="/"
            class="bg-red-500 uppercase font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-red-600 mx-6">
            Cancelar
        </a>
    </div>
</form>
@endsection