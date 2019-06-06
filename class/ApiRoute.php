<?php

class ApiRoute {
	
    private $_soapServer = null;

    public function __construct(){     
        $this->_soapServer = new soap_server();
        $this->_soapServer->configureWSDL();

        $this->_loadRoutes();
    }

    public function execute(){
    	//procesamos el webservice
		$this->_soapServer->service(file_get_contents("php://input"));
    }

    private function _loadRoutes(){
		$this->_soapServer->register(
		    'Service.act_maestro_servicios',
		    array(

		    	'SolicitudImpactada' 	   	=> 'xsd:string',
		    	'ObjetoImpactado'		   	=> 'xsd:string',
		    	'DerivacionImpactada' 		=> 'xsd:string',
		    	'FechaImpacto' 				=> 'xsd:string',
		    ),
		    array(
		    	'msg'  => 'xsd:string',
		    	'code' => 'xsd:int'
		    ), 
		    false,
		    false,
		    "rpc",
		    "encoded"
		);
    }
}