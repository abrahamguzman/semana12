<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Estudiante;

class Estudiantes extends Component
{
    public $estudiantes, $nombre, $apellido, $curso, $promedio, $id_estudiante;
    public $modal=false;

    public function render()
    {
        $this->estudiantes = Estudiante::all();
        return view('livewire.estudiantes');
    }

    public function crear(){
        $this->abrirModal();
        $this->limpiarCampos();
    }
    public function abrirModal(){
        $this->modal = true;
    }
    public function cerrarModal(){
        $this->modal = false;
    }
    public function limpiarCampos(){
        $this->id_estudiantes='';
        $this->nombre='';
        $this->apellido='';
        $this->curso='';
        $this->promedio='';
    }
    public function editar($id){
        $estudiantes = Estudiante::findOrFail($id);
        $this->id_estudiantes = $id;
        $this->nombre = $estudiantes->nombre;
        $this->apellido = $estudiantes->apellido;
        $this->curso = $estudiantes->curso;
        $this->promedio = $estudiantes->promedio;
        $this->abrirModal();
    }
    
    public function guardar(){
        Estudiante::updateOrCreate(['id'=>$this->id_estudiantes],
            [
                'nombre'=>$this->nombre,
                'apellido'=> $this->apellido,
                'curso'=> $this->curso,
                'promedio'=>$this->promedio,
            ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }

    public function borrar($id){
        Estudiante::find($id)->delete();
    }
}

