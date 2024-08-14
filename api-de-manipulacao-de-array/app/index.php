<?php
require_once '../config.php';
require_once '../src/Validations/validationFunctions.php';
require_once '../src/Utils/utilityFunctions.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $body = getBody();
    $data = filterAndValidateData($body);

    if ($data === false) {
        responseError('Digite as informações para prosseguir com o cadastro!', 400);
    }

    $allData = readFileContent(FILE_CITY);

    if (isNameDuplicate($allData, $data['name'])) {
        responseError('Este lugar já está cadastrado!', 409);
    }

    $data['id'] = generateUniqueID();
    array_push($allData, $data);
    saveFileContent(FILE_CITY, $allData);
    response($data, 201);

} elseif ($method === 'GET') {
    if (!isset($_GET['id'])) {
        $allData = readFileContent(FILE_CITY);
        response($allData, 200);
    } else {
        $id = validateID();
        if (!$id) {
            responseError('ID ausente ou inválido!', 400);
        }
        $allData = readFileContent(FILE_CITY);
        $item = findItemByID($allData, $id);
        if ($item) {
            response($item, 200);
        } else {
            responseError('Item não encontrado!', 404);
        }
    }

} elseif ($method === 'DELETE') {
    $id = validateID();
    if (!$id) {
        responseError('ID ausente ou inválido!', 400);
    }

    $allData = readFileContent(FILE_CITY);
    $filteredData = array_filter($allData, function ($item) use ($id) {
        return $item->id !== $id;
    });

    if (count($filteredData) === count($allData)) {
        responseError('Item não encontrado para exclusão!', 404);
    }

    saveFileContent(FILE_CITY, array_values($filteredData));
    response('', 204);

} elseif ($method === 'PUT') {
    $body = getBody();
    $id = validateID();

    if (!$id) {
        responseError('ID ausente ou inválido!', 400);
    }

    $allData = readFileContent(FILE_CITY);
    $updatedData = updateItem($allData, $id, $body);

    if ($updatedData === false) {
        responseError('Item não encontrado para atualização!', 404);
    }

    saveFileContent(FILE_CITY, $updatedData);
    response([], 200);

} else {
    responseError('Método não permitido!', 405);
}
?>
