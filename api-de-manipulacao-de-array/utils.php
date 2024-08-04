<?php

function getBody() {
  return json_decode(file_get_contents("php://input"));
}

function readFileContent($fileName){
   return json_decode(file_get_contents($fileName));
}

function saveFileContent($fileName, $content) {
  file_put_contents($fileName, json_encode($content));
}

function responseError($message, $status) {
  http_response_code($status);
  echo json_encode(['error' => $message]);
  exit;
}

function response($response, $status) {
  http_response_code($status);
  echo json_encode($response);
  exit;
}

function generateUniqueID() {
  $uniqueID = time() . mt_rand(10000, 99999);
  $integerID = intval($uniqueID);
  return $integerID;
}

function validateID() {
    return filter_var($_GET['id'], FILTER_VALIDATE_INT);
}