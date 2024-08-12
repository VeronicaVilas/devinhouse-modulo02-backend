<?php

/**
 * Obtém e decodifica o corpo da solicitação em formato JSON.
 * 
 * @return object|null Retorna o corpo da solicitação decodificando como um objeto ou `null` se a decodificação falhar.
 */
  function getBody() {
  return json_decode(file_get_contents("php://input"));
}

/**
 * Lê o conteúdo de um arquivo e decodifica de JSON para um objeto.
 * 
 * @param string $fileName O nome do arquivo a ser lido.
 * @return object|null Retorna o conteúdo do arquivo decodificado com um objeto ou `null` se a leitura ou decodificação falhar.
 */
  function readFileContent($fileName){
   return json_decode(file_get_contents($fileName));
}

/**
 * Salva o conteúdo em formato JSON em um arquivo.
 * 
 * @param string $fileName O nome do arquivo onde o conteúdo será salvo.
 * @param mixed $content O conteúdo a ser codificado em JSON e salvo no arquivo.
 */
  function saveFileContent($fileName, $content) {
  file_put_contents($fileName, json_encode($content));
}

/**
 * Envia uma resposta de erro em formato JSON e define o código de status HTTP.
 * 
 * @param string $message A mensagem de erro a ser enviada na resposta JSON.
 * @param int $status O código de status HTTP a ser definido na resposta.
 */
  function responseError($message, $status) {
  http_response_code($status);
  echo json_encode(['error' => $message]);
  exit;
}

/**
 * Envia uma resposta bem-sucedida em formato JSON e define o código de status HTTP.
 * 
 * @param mixed $response Os dados a serem enviados na resposta JSON.
 * @param int $status O código de status HTTP a ser definido na resposta.
 */
function response($response, $status) {
  http_response_code($status);
  echo json_encode($response);
  exit;
}

/**
 * Gera um ID único baseado no timestamp atual e um número aleatório.
 * 
 * @return int Retorna um identificador único gerado como um inteiro.
 */
  function generateUniqueID() {
    $uniqueID = time() . mt_rand(10000, 99999);
    $integerID = intval($uniqueID);
    return $integerID;
}

function sanitizeInput($data, $property, $filterType, $isObject = true) {
  if($isObject) {
    return isset($data->$property) ? filter_var($data->property, $filterType) : null;
  } else {
    return isset($data[$property]) ? filter_var($data[$property], $filterType) : null;
  }
}

function sanitizeString($value)
{
  return filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
}

function debug($content) {
  echo '<pre>';
  echo var_dump($content);
  echo '</pre>';
}