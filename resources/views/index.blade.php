@extends('layout')

@section('title')
<?= $title;?>
@endsection

@section('content')
<div class="flex justify-center mb-5">
    <a href="/nova-enquete"
        class="bg-green-500 uppercase font-bold text-white px-4 py-3 transition duration-300 ease-in-out hover:bg-green-600 mr-6">
        Criar nova enquete
    </a>
</div>
<div class="max-w-2xl mx-auto">
    <div class="flex flex-col">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden ">
                    <table class="min-w-full table-fixed">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                    Título da enquete
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                    data inicio
                                </th>
                                <th scope="col"
                                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                    data fim
                                </th>
                                <th scope="col"
                                    class="text-center py-3 px-6 text-xs font-medium tracking-wider text-gray-700 uppercase">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($enquetes as $enquete)
                            <tr class="hover:bg-gray-100">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    {{$enquete->title}}
                                </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap">
                                    {{date_format(date_create($enquete->dt_start),"d/m/Y")}}
                                </td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                                    {{date_format(date_create($enquete->dt_end),"d/m/Y")}}
                                </td>
                                <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                    <div class="flex items-center justify-between">
                                        <a href="/enquete">
                                            <svg class="mx-2 w-12 h-12 md:mx-0 md:w-6 md:h-6" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="/editar-enquete/{{ $enquete->id }}">
                                            <svg class="mx-2 w-12 h-12 md:mx-0 md:w-6 md:h-6" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                        </a>
                                        <form method='post' action="/{{ $enquete->id }}"
                                            onsubmit="return confirm('Tem certeza que deseja excluir {{$enquete->title}}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button>
                                                <svg class="mx-2 w-12 h-12 md:mx-0 md:w-6 md:h-6" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection