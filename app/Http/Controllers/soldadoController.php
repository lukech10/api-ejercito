<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\soldado;
use App\Models\Equipo;
use App\Models\EquiposSoldado;


class soldadoController extends Controller
{
    //

	public function createSoldado(Request $request)
	{
		
		$response = "";
		//Leer el contenido de la petición
		$data = $request->getContent();

		//Decodificar el json
		$data = json_decode($data);

		//Si hay un json válido, crear el soldado
		if($data){
			$soldado = new Soldado();

			//TODO: Validar los datos antes de guardar el soldado

			$soldado->NumeroPlaca = $data->NumeroPlaca;
			$soldado->nombre = $data->nombre;
			$soldado->apellidos = $data->apellidos;
			$soldado->fechaNacimiento = $data->fechaNacimiento;
			$soldado->rango = $data->rango;
			$soldado->estado = $data->estado;
			
			try{
				$soldado->save();
				$response = "OK";
			}catch(\Exception $e){
				$response = $e->getMessage();
			}

			
		}

		
		return response($response);
	}

	public function updateSoldado(Request $request, $NumeroPlaca){

		$response = "";

		//Buscar el soldado por su id

		$soldado = Soldado::find($NumeroPlaca);

		if($soldado){

			//Leer el contenido de la petición
			$data = $request->getContent();

			//Decodificar el json
			$data = json_decode($data);

			//Si hay un json válido, buscar el soldado
			if($data){
			
				//TODO: Validar los datos antes de guardar el soldado
				
				$soldado->estado = (isset($data->estado) ? $data->estado : $soldado->estado);

				try{
					$soldado->save();
					$response = "OK";
				}catch(\Exception $e){
					$response = $e->getMessage();
				}
			}

			
		}else{
			$response = "No soldado";
		}

		
		return response($response);
	}

	public function deleteSoldado(Request $request, $NumeroPlaca){

			$response = "No se puede borrar un soldado (puedes editarlo con /edit/numero de placa y sacalo de servicio)";
		

		
		return response($response);
	}

	public function viewSoldado($NumeroPlaca){

		$response = "";
		$soldado = Soldado::find($NumeroPlaca);

		if($soldado){

			$response = [
				"numero de placa" => $soldado->NumeroPlaca,
				"nombre" => $soldado->nombre,
				"apellidos" => $soldado->apellidos,
				"fecha de nacimiento" => $soldado->fechaNacimiento,
				"rango"=> $soldado->rango,
				"estado"=> $soldado->estado,
				"fecha de incorporacion" => $soldado->created_at
				//"equipo"=>$soldado->equipo
			];

		}else{
			$response = "soldado no encontrado";
		}

		return response()->json($response);
	}

	public function listSoldados(){

		$response = "";
		$soldados = Soldado::all();
		
		$response= [];

		foreach ($soldados as $soldado) {
			$response[] = [
				"numero de placa" => $soldado->NumeroPlaca,
				"nombre" => $soldado->nombre,
				"apellidos" => $soldado->apellidos,
				"rango"=> $soldado->rango,
				"id equipo"=> $soldado->equipo_id 
			];
		}
		


		return response()->json($response);
	}

	public function addEquipo(Request $request){

		$response = "";
		//Leer el contenido de la petición
		$data = $request->getContent();

		//Decodificar el json
		$data = json_decode($data);

		//Si hay un json válido, crear el soldado
		if($data&&soldado::find($data->soldado)&&Equipo::find($data->equipo)){
			$soldadoEquipo = new EquiposSoldado();
		
			//TODO: Validar los datos antes de guardar el soldado

			$soldadoEquipo->NumeroPlaca = $data->soldado;
			$soldadoEquipo->equipo_id = $data->equipo;
			var_dump($data);
			try{
				$soldadoEquipo->save();
				$response = "OK";
			}catch(\Exception $e){
				$response = $e->getMessage();
			}

		}
		return response($response);

	}


}
