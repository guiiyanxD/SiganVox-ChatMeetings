<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IA_DeteccionController extends Controller
{
    public function detectargesto()
    {
        $rutamodelo= public_path('diego1.h5');
        $scriptPath = base_path('IA_LSTM/detectar.py');
        $venvPath = base_path('IA_LSTM/venv');
        
       // $command = "\"$venvPath/Scripts/activate\" && \"$venvPath/Scripts/python\" \"$scriptPath\"";
        $command = "\"$venvPath/Scripts/activate\" && \"$venvPath/Scripts/python\" \"$scriptPath\" \"$rutamodelo\"";
        
        $output = shell_exec($command);
        
        if ($output) {
            return response()->json(['message' => $output]);
        } else {
            return response()->json(['error' => 'Error al ejecutar el script']);
        }
    }
    public function prueba(){

        return view('prueba');
    }
    
}
