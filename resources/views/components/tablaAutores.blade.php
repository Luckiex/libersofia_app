<div class="relative overflow-x-auto shadow-md sm:rounded-lg ml-10 mr-10 mb-10">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Nacionalidad
                </th>
                <th scope="col" class="px-6 py-3">
                    Editar
                </th>
                <th scope="col" class="px-6 py-3">
                    Borrar
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autores as $autor)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="{{route('autores.mostrar', $autor->id)}}">{{$autor->nombre}}</a>
                </th>
                <td class="px-6 py-4">
                    {{ $autor->nacionalidad }}
                </td>
                <td class="px-6 py-4">
                    <x-botonAutores tipo="editar" :id="$autor->id"/>
                </td>
                <td class="px-6 py-4">
                    <x-botonAutores tipo="borrar" :id="$autor->id"/>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
