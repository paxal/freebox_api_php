<?php
namespace alphayax\freebox\api\v3\services\config;
use alphayax\freebox\utils\Service;
use alphayax\freebox\api\v3\models;


/**
 * Class System
 * @package alphayax\freebox\api\v3\services\config
 */
class Freeplug extends Service {

    const API_FREEPLUG       = '/api/v3/freeplug/';
    const API_FREEPLUG_RESET = '/api/v3/freeplug/%s/reset/';

    /**
     * Get the freeplug networks information
     * @throws \Exception
     * @return models\Freeplug\FreeplugNetwork[]
     */
    public function getNetworks(){
        $rest = $this->getAuthService( self::API_FREEPLUG);
        $rest->GET();

        return $rest->getResultAsArray( models\Freeplug\FreeplugNetwork::class);
    }

    /**
     * Get a particular Freeplug information
     * @param $FreeplugId
     * @return models\Freeplug\Freeplug
     */
    public function getFromId( $FreeplugId){
        $rest = $this->getAuthService( self::API_FREEPLUG . $FreeplugId . DIRECTORY_SEPARATOR);
        $rest->GET();

        return $rest->getResult( models\Freeplug\Freeplug::class);
    }

    /**
     * Reset a Freeplug
     * @param $FreeplugId
     * @return models\Freeplug\FreeplugNetwork
     */
    public function resetFromId( $FreeplugId){
        $Service = sprintf( self::API_FREEPLUG_RESET, $FreeplugId);
        $rest = $this->getAuthService( $Service);
        $rest->POST();

        return $rest->getSuccess();
    }

}
