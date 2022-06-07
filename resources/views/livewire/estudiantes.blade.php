<x-slot name="header">
    <h1 class="text-gray-900">Lista de alumnos</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

        @if(session()->has('message'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <h4>{{ session('message')}}</h4>
                    </div>
                </div>
            </div>
        @endif


        <button wire:click="crear()" class="bg-indigo-500 hover:bg-blue-600 text-white font-bold py-2 px-4 my-3" >Nuevo +</button>
        @if($modal)
            @include('livewire.crear')   
        @endif    

        <table class="table-fixed w-full">
        <thead>
            <tr class="bg-red-600 text-white">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">NOMBRE</th>
                <th class="px-4 py-2">APELLIDO</th>
                <th class="px-4 py-2">CURSO</th>
                <th class="px-4 py-2">PROMEDIO</th>
                <th class="px-4 py-2">ACCIONES</th>    
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
            <tr>
                <td class="border px-4 py-2">{{$estudiante->id}}</td>
                <td class="border px-4 py-2">{{$estudiante->Nombre}}</td>
                <td class="border px-4 py-2">{{$estudiante->Apellido}}</td>
                <td class="border px-4 py-2">{{$estudiante->Curso}}</td>
                <td class="border px-4 py-2">{{$estudiante->Promedio}}</td>
                <td class="border px-4 py-2 text-center">
                    <button wire:click="editar({{$estudiante->id}})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                    <button wire:click="borrar({{$estudiante->id}})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4">Borrar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
