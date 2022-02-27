@extends('layout')
@section('title')
<?= $title;?>
@endsection
@section('content')
<div class="max-w-xl mx-auto bg-white p-5">
    <form method="post">
        @csrf
        <div class="flex flex-col align-center gap-5">
            @foreach($options as $option)
            <div
                class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p> <label for="{{$option['name']}}"
                            class="bg-white text-gray-600 text-lg px-1">{{str_replace("_","Opção ",$option['name'])}}</label>
                    </p>
                </div>
                <p>
                    <input id="{{$option['name']}}" autocomplete="false" tabindex="0" type="text" value="{{$option['option']}}"
                        name="{{$option['name']}}" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                </p>
            </div>
            @endforeach
        </div>
        <button type="submit"
            class="bg-green-500 uppercase font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-green-600 mt-5">
            {{str_replace(" Enquete","",$title)}}
        </button>
    </form>
    <form method="post">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="bg-red-500 uppercase font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-red-600 mt-5">
            Cancelar
        </button>
    </form>
</div>
@endsection