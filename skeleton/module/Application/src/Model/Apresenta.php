<?php
/**
 * Created by PhpStorm.
 * User: Hygor Dias
 * Date: 10/05/2017
 * Time: 19:03
 */

namespace Application\Model;

class Apresenta{

    private $ocorrencia_policial_Numero;
    private $ocorrencia_policial_Ano;
    private $tipo_Penal_ID;

    /**
     * @return mixed
     */
    public function getOcorrenciaPolicialNumero(){
        return $this->ocorrencia_policial_Numero;
    }

    /**
     * @param mixed $ocorrencia_policial_Numero
     */
    public function setOcorrenciaPolicialNumero($ocorrencia_policial_Numero){
        $this->ocorrencia_policial_Numero = $ocorrencia_policial_Numero;
    }

    /**
     * @return mixed
     */
    public function getOcorrenciaPolicialAno(){
        return $this->ocorrencia_policial_Ano;
    }

    /**
     * @param mixed $ocorrencia_policial_Ano
     */
    public function setOcorrenciaPolicialAno($ocorrencia_policial_Ano){
        $this->ocorrencia_policial_Ano = $ocorrencia_policial_Ano;
    }

    /**
     * @return mixed
     */
    public function getTipoPenalID(){
        return $this->tipo_Penal_ID;
    }

    /**
     * @param mixed $tipo_Penal_ID
     */
    public function setTipoPenalID($tipo_Penal_ID){
        $this->tipo_Penal_ID = $tipo_Penal_ID;
    }

    public function exchangeArray(array $data){
        $this->setTipoPenalID($data['tipo_penal_ID']);
        $this->setOcorrenciaPolicialAno($data['ocorrencia_policial_Ano']);
        $this->setOcorrenciaPolicialNumero($data['ocorrencia_policial_Numero']);
    }

}