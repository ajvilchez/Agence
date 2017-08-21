<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function main()
    {

    	$years=[];

    	$dates = DB::table('cao_fatura')
    					->select('data_emissao')
    					->orderBy('data_emissao','asc')
    					->get();

    	foreach ($dates as $date) {

    		$date = strtotime($date->data_emissao);

    		$year = date('Y',$date);

    		if(!(in_array($year,$years))){

    			array_push($years,$year);

    		} 

		}				

    	$users = DB::table('cao_usuario')
						->join('permissao_sistema','cao_usuario.co_usuario','=','permissao_sistema.co_usuario')
						->select('cao_usuario.co_usuario','cao_usuario.no_usuario')
						->where('co_sistema',1)
						->where('in_ativo','s')
						->whereIn('co_tipo_usuario',[0,1,2])
						->orderBy('no_usuario', 'asc')
						->get();

		return view('welcome',compact('users','years'));
		
    }

    public function relatorio()
    {
    	
    	setlocale(LC_TIME, "es_US");

    	$result=[];

    	$cf = [

    		'nombre' => '',

    		'mes'    => ''
    	];

    	$data = DB::table('cao_fatura')
				->join('cao_os','cao_fatura.co_os','=','cao_os.co_os')
				->join('cao_usuario','cao_os.co_usuario','=','cao_usuario.co_usuario')
				->join('cao_salario','cao_salario.co_usuario','=','cao_usuario.co_usuario')
				->select('cao_usuario.no_usuario','cao_fatura.data_emissao','cao_fatura.valor','cao_fatura.total_imp_inc','cao_fatura.comissao_cn','brut_salario')
				->whereIn('cao_os.co_usuario',$_POST['consultores'])
				->where('cao_fatura.data_emissao','>=',$_POST['desde'])
				->where('cao_fatura.data_emissao','<=',$_POST['hasta'])
				->orderBy('cao_usuario.no_usuario', 'asc')
				->orderBy('cao_fatura.data_emissao', 'asc')					
				->get();

		foreach ($data as $row) {
			
			$row->data_emissao = strftime("%B %Y", strtotime($row->data_emissao));

		}

		foreach ($data as $row) {
			
			if($cf['nombre'] == ''){

				$mesdata = [
	
								'liq'      => ($row->valor - (($row->valor*$row->total_imp_inc)/100)),

								'costo'    => $row->brut_salario,

								'comision' => (($row->valor - (($row->valor*$row->total_imp_inc)/100))*(($row->comissao_cn)/100)),

								'lucro'    => (($row->valor - (($row->valor*$row->total_imp_inc)/100))-$row->brut_salario-(($row->valor - (($row->valor*$row->total_imp_inc)/100))*(($row->comissao_cn)/100)))

							];


				$mesd = [

							'date'     => $row->data_emissao,

							'data'	   => $mesdata

						];
				

				$cf =[

						'nombre' => $row->no_usuario,
					
						'mes'   => [$mesd] 

						];

			}elseif ($cf['nombre']  == $row->no_usuario) {
				
				$f='';
					
				foreach($cf['mes'] as $mes){

					if($mes['date'] == $row->data_emissao){

						$mes['data']['liq']      =	$mes['data']['liq'] + ($row->valor - (($row->valor*$row->total_imp_inc)/100));

						$mes['data']['comision'] =	$mes['data']['comision'] + (($row->valor - (($row->valor*$row->total_imp_inc)/100))*(($row->comissao_cn)/100));

						$mes['data']['lucro']    =  $mes['data']['lucro'] +	(($row->valor - (($row->valor*$row->total_imp_inc)/100))-$row->brut_salario-(($row->valor - (($row->valor*$row->total_imp_inc)/100))*(($row->comissao_cn)/100)));

						$f=1;

						continue;

					}

				}

				if ($f == '') {
					
					$mesdata = [

									'liq'      => ($row->valor - (($row->valor*$row->total_imp_inc)/100)),

									'costo'    => $row->brut_salario,

									'comision' => (($row->valor - (($row->valor*$row->total_imp_inc)/100))*(($row->comissao_cn)/100)),

									'lucro'    => (($row->valor - (($row->valor*$row->total_imp_inc)/100))-$row->brut_salario-(($row->valor - (($row->valor*$row->total_imp_inc)/100))*(($row->comissao_cn)/100)))

								];

					$mesd = [

								'date'     => $row->data_emissao,

								'data'	   => $mesdata

							];

					array_push($cf['mes'], $mesd);							
				
				}

			}elseif ($cf['nombre'] != $row->no_usuario) {
				
				array_push($result,$cf);


				$mesdata = [
	
								'liq'      => ($row->valor - (($row->valor*$row->total_imp_inc)/100)),

								'costo'    => $row->brut_salario,

								'comision' => (($row->valor - (($row->valor*$row->total_imp_inc)/100))*(($row->comissao_cn)/100)),

								'lucro'    => (($row->valor - (($row->valor*$row->total_imp_inc)/100))-$row->brut_salario-(($row->valor - (($row->valor*$row->total_imp_inc)/100))*(($row->comissao_cn)/100)))

							];


				$mesd = [

							'date'     => $row->data_emissao,

							'data'	   => $mesdata

						];
				

				$cf =[

						'nombre' => $row->no_usuario,
					
						'mes'   => [$mesd] 

						];

			}	

		}

		array_push($result,$cf);

		json_encode($result);

    	return $result;

    }

    public function bargraph()
    {

    	$bruto = 0;

 		$consultor =[];

 		$liq = [];   	

 		$liq_acum = 0;
 
 		$date='';

    	$data = DB::table('cao_fatura')
				->join('cao_os','cao_fatura.co_os','=','cao_os.co_os')
				->join('cao_usuario','cao_os.co_usuario','=','cao_usuario.co_usuario')
				->join('cao_salario','cao_salario.co_usuario','=','cao_usuario.co_usuario')
				->select('cao_usuario.no_usuario','data_emissao','cao_fatura.valor','cao_fatura.total_imp_inc','cao_fatura.comissao_cn','brut_salario')
				->whereIn('cao_os.co_usuario',$_POST['consultores'])
				->where('cao_fatura.data_emissao','>=',$_POST['desde'])
				->where('cao_fatura.data_emissao','<=',$_POST['hasta'])
				->orderBy('cao_usuario.no_usuario', 'asc')					
				->get();

		foreach ($data as $row) {
			
			$row->data_emissao = strftime("%B %Y", strtotime($row->data_emissao));

		}

		foreach ($data as $row) {
			
			if(empty($consultor)){

				$bruto = $bruto + $row->brut_salario;

				array_push($consultor, $row->no_usuario);

				$liq_acum = $liq_acum + ($row->valor - (($row->valor*$row->total_imp_inc)/100));

				$date = $row->data_emissao;

			}elseif (in_array($row->no_usuario,$consultor)) {

				if ($date == $row->data_emissao) {
					
					$bruto = $bruto + $row->brut_salario;

					$date = $row->data_emissao;

				}

				$liq_acum 	=	$liq_acum + ($row->valor - (($row->valor*$row->total_imp_inc)/100));

			}elseif (!(in_array($row->no_usuario,$consultor))) {
				
				array_push($consultor,$row->no_usuario);

				array_push($liq,$liq_acum);

				$liq_acum = 0;

				$liq_acum = $liq_acum + ($row->valor - (($row->valor*$row->total_imp_inc)/100));

				$bruto = $bruto + $row->brut_salario;				

				$date = $row->data_emissao;

			}	

		}

		array_push($liq,$liq_acum);

		$bruto = $bruto/count($consultor);

		$result =[

			'nombre' => $consultor,

			'liq' => $liq,

			'bruto' =>$bruto
		];

		json_encode($result);

    	return $result;

    }

    public function pizzagraph()
    {

    	$liq_totl = 0;

 		$consultor =[];

 		$liq = [];   	

 		$liq_acum = 0;
 
    	$data = DB::table('cao_fatura')
				->join('cao_os','cao_fatura.co_os','=','cao_os.co_os')
				->join('cao_usuario','cao_os.co_usuario','=','cao_usuario.co_usuario')
				->join('cao_salario','cao_salario.co_usuario','=','cao_usuario.co_usuario')
				->select('cao_usuario.no_usuario','cao_fatura.valor','cao_fatura.total_imp_inc')
				->whereIn('cao_os.co_usuario',$_POST['consultores'])
				->where('cao_fatura.data_emissao','>=',$_POST['desde'])
				->where('cao_fatura.data_emissao','<=',$_POST['hasta'])
				->orderBy('cao_usuario.no_usuario', 'asc')					
				->get();


		foreach ($data as $row) {

	    	$liq_totl =  $liq_totl + ($row->valor - (($row->valor*$row->total_imp_inc)/100));

			if(empty($consultor)){

				array_push($consultor, $row->no_usuario);

				$liq_acum = $liq_acum + ($row->valor - (($row->valor*$row->total_imp_inc)/100));

			}elseif (in_array($row->no_usuario,$consultor)) {

				$liq_acum 	=	$liq_acum + ($row->valor - (($row->valor*$row->total_imp_inc)/100));

			}elseif (!(in_array($row->no_usuario,$consultor))) {
				
				array_push($consultor,$row->no_usuario);

				array_push($liq,$liq_acum);

				$liq_acum = 0;

				$liq_acum = $liq_acum + ($row->valor - (($row->valor*$row->total_imp_inc)/100));
				
			}	

		}

		array_push($liq,$liq_acum);

		$result =[

			'nombre' => $consultor,

			'liq' => $liq,

			'liq_totl' =>$liq_totl
		];

		json_encode($result);

    	return $result;

    }
}
