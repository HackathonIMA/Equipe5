<?php

namespace ApiImaV1;

class AtendimentoApi {

  function __construct($apiClient = null) {
    if (null === $apiClient) {
      if (Configuration::$apiClient === null) {
        Configuration::$apiClient = new ApiClient(); // create a new API client if not present
        $this->apiClient = Configuration::$apiClient;
      }
      else
        $this->apiClient = Configuration::$apiClient; // use the default one
    } else {
      $this->apiClient = $apiClient; // use the one provided by the user
    }
  }

  private $apiClient; // instance of the ApiClient

  /**
   * get the API client
   */
  public function getApiClient() {
    return $this->apiClient;
  }

  /**
   * set the API client
   */
  public function setApiClient($apiClient) {
    $this->apiClient = $apiClient;
  }


  /**
   * atendimentoGet
   *
   * Dados sobre atendimentos
   *
   * @param string $client_id Token disponibilizado na criaÃ§Ã£o da APP. (required)
   * @param string $offset ParÃ¢metro utilizado para indicar a posiÃ§Ã£o do registro inicial que serÃ¡ trazido. A primeira posiÃ§Ã£o Ã© sempre zero (0). (required)
   * @param string $limit ParÃ¢metro utilizado para indicar a quantidade de registros que deve ser trazido na consulta. (required)
   * @param array[string] $fields ParÃ¢metro utilizado para pesquisar campos especÃ­ficos (required)
   * @param array[string] $filters ParÃ¢metro utilizado para pesquisar valores de campos especÃ­ficos, por exemplo, para pesquisar um id de valor 123, passar o valor id:123 (required)
   * @return array[SolicitacaoResponse]
   */
   public function atendimentoGet($client_id, $offset, $limit, $fields, $filters) {

      // verify the required parameter 'client_id' is set
      if ($client_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $client_id when calling atendimentoGet');
      }

      // verify the required parameter 'offset' is set
      if ($offset === null) {
        throw new \InvalidArgumentException('Missing the required parameter $offset when calling atendimentoGet');
      }

      // verify the required parameter 'limit' is set
      if ($limit === null) {
        throw new \InvalidArgumentException('Missing the required parameter $limit when calling atendimentoGet');
      }


      // parse inputs
      $resourcePath = "/atendimento";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array());
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($offset !== null) {
        $queryParams['offset'] = $this->apiClient->toQueryValue($offset);
      }// query params
      if($limit !== null) {
        $queryParams['limit'] = $this->apiClient->toQueryValue($limit);
      }// query params
      if($fields !== null) {
        $queryParams['fields'] = $this->apiClient->toQueryValue($fields);
      }// query params
      if($filters !== null) {
        $queryParams['filters'] = $this->apiClient->toQueryValue($filters);
      }
      // header params
      if($client_id !== null) {
        $headerParams['client_id'] = $this->apiClient->toHeaderValue($client_id);
      }




      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array();

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'array[SolicitacaoResponse]');
      return $responseObject;
  }

  /**
   * atendimentoIdGet
   *
   * Dado de um atendimento especifico.
   *
   * @param string $client_id Token disponibilizado na criaÃ§Ã£o da APP. (required)
   * @param string $id Identificador da solicitaÃ§Ã£o (required)
   * @param array[string] $fields ParÃ¢metro utilizado para pesquisar campos especÃ­ficos (required)
   * @return SolicitacaoResponse
   */
   public function atendimentoIdGet($client_id, $id, $fields) {

      // verify the required parameter 'client_id' is set
      if ($client_id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $client_id when calling atendimentoIdGet');
      }

      // verify the required parameter 'id' is set
      if ($id === null) {
        throw new \InvalidArgumentException('Missing the required parameter $id when calling atendimentoIdGet');
      }


      // parse inputs
      $resourcePath = "/atendimento/{id}";
      $resourcePath = str_replace("{format}", "json", $resourcePath);
      $method = "GET";
      $httpBody = '';
      $queryParams = array();
      $headerParams = array();
      $formParams = array();
      $_header_accept = $this->apiClient->selectHeaderAccept(array());
      if (!is_null($_header_accept)) {
        $headerParams['Accept'] = $_header_accept;
      }
      $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(array());

      // query params
      if($fields !== null) {
        $queryParams['fields'] = $this->apiClient->toQueryValue($fields);
      }
      // header params
      if($client_id !== null) {
        $headerParams['client_id'] = $this->apiClient->toHeaderValue($client_id);
      }
      // path params
      if($id !== null) {
        $resourcePath = str_replace("{" . "id" . "}",
                                    $this->apiClient->toPathValue($id), $resourcePath);
      }



      // for model (json/xml)
      if (isset($_tempBody)) {
        $httpBody = $_tempBody; // $_tempBody is the method argument, if present
      } else if (count($formParams) > 0) {
        // for HTTP post (form)
        $httpBody = $formParams;
      }

      // authentication setting, if any
      $authSettings = array();

      // make the API Call
      $response = $this->apiClient->callAPI($resourcePath, $method,
                                            $queryParams, $httpBody,
                                            $headerParams, $authSettings);

      if(! $response) {
        return null;
      }

      $responseObject = $this->apiClient->deserialize($response,'SolicitacaoResponse');
      return $responseObject;
  }


}
