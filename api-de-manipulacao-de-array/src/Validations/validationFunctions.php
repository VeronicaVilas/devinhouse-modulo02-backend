<?php
/**
 *  Filtra e valida os dados recebidos do corpo da solicitação.
 * 
 * @param object $body Os dados do corpo da solicitação.
 * @return array|false Retorna uma matriz associativa de dados validados ou falso, se a validação falhar.
 */

 function filterAndValidateData($data) {
    $name = filter_var($data->name, FILTER_SANITIZE_SPECIAL_CHARS);
    $contact = filter_var($data->contact, FILTER_SANITIZE_SPECIAL_CHARS);
    $opening_hours = filter_var($data->opening_hours, FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_var($data->description, FILTER_SANITIZE_SPECIAL_CHARS);
    $latitude = filter_var($data->latitude, FILTER_VALIDATE_FLOAT);
    $longitude = filter_var($data->longitude, FILTER_VALIDATE_FLOAT);

    if ($name && $contact && $opening_hours && $description && $latitude !== false && $longitude !== false) {
        return [
            'name' => $name,
            'contact' => $contact,
            'opening_hours' => $opening_hours,
            'description' => $description,
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
    }

    return false;
}

/**
 * Verifica se o nome já existe nos dados.
 *
 * @param array $data Matriz de dados existentes, onde cada item é um objeto com a propriedade `name`.
 * @param string $name O nome a ser verificado.
 * @return bool Retorna `true` se o nome for encontrado, caso contrário, retorna `false`.
 */
 function isNameDuplicate($data, $name) {
    foreach ($data as $item) {
        if ($item->name === $name) {
            return true;
        }
    }
    return false;
 }

/**
 * Econtra um item pelo ID.
 *
 * @param array $data Matriz de dados existentes, onde cada item é um ojeto com a propriedade `id`.
 * @param string $id O ID a ser pesquisado.
 * @return object|null Retorna o item se encontrado, caso contrário, retorna `null`.
 */
 function findItemByID($data, $id) {
    foreach ($data as $item) {
        if ($item->id === $id) {
            return $item;
        }
    }
    return null;
 }

/**
 * Atualiza um item com base no ID fornecido.
 *
 * @param array $data Matriz de dados existentes, onde cada item é um objeto com a propriedade `id`.
 * @param string $id O ID do item a ser atualizado.
 * @param object $body O corpo da solicitação contendo os novos valores para atualizar o item. 
 * @return array|false Retorna a matriz de dados atualizada se o item for encontrado e atualizado, caso contrário, retorna `false`.
 */
 function updateItem($data, $id, $body) {
    foreach ($data as $position => $item) {
        if ($item->id === $id) {
            $data[$position]->name = isset($body->name) ? $body->name : $item->name;
            $data[$position]->contact = isset($body->contact) ? $body->contact : $item->contact;
            $data[$position]->opening_hours = isset($body->opening_hours) ? $body->opening_hours : $item->opening_hours;
            $data[$position]->description = isset($body->description) ? $body->description : $item->description;
            $data[$position]->latitude = isset($body->latitude) ? $body->latitude : $item->latitude;
            $data[$position]->longitude = isset($body->longitude) ? $body->longitude : $item->longitude;
            return $data;
        }
    }
    return false;
 }

 /**
 * Valida o ID fornecido na consulta da URL.
 *
 * @return int|false Retorna o ID validado como um inteiro se for válido, caso contrário, retorna `false`.
 */
 function validateID() {
    return filter_var($_GET['id'], FILTER_VALIDATE_INT);
}
?>