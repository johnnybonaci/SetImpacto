<?php

class Service {
   
    public function act_maestro_servicios($SolicitudImpactada = null, $ObjetoImpactado = null, $FechaImpacto = null, $DerivacionImpactada = null){
			
			if(empty($SolicitudImpactada) || empty($ObjetoImpactado) || empty($FechaImpacto) || empty($DerivacionImpactada)){
					return array('400', 'Bad Request');
			}
 	

    	if(!preg_match('/^[a-z]+$/i', $SolicitudImpactada)){
    		return array('400', 'Bad Request - Solicitud Impactada invalida');	
    	} 

    	if(!preg_match('/^[a-z]+$/i', $ObjetoImpactado)){
    		return array('400', 'Bad Request - Objeto Impactado invalido.');	
    	} 

    	if(!preg_match('/^[0-9]{14}$/', $FechaImpacto)){
    		return array('400', 'Bad Request - Fecha de Impacto invalida.');
    	}

    if(!preg_match('/^[a-z]+$/i', $DerivacionImpactada)){
    		return array('400', 'Bad Request - Derivacion Impactada invalida.');	
		} 
		
		
		//$ksh = "/portal_judicial/app/movil/intervenciones/interfaces/ims_radio/servicio_instanlink/script/procesa_servicio_instanlink.ksh $SolicitudImpactada $ufmi $ObjetoImpactado $FechaImpacto";

		$salida = shell_exec($ksh);
		$salida = 1;

		if($salida){

			return array('200', 'OK');
		}
		else{
			return array('400', 'Error');
		}
		
    }

}