<?php

function getAllCharacter()
{
    $conn = getConnection();
    $sql = "SELECT * FROM characters inner join locations on characters.id_location = locations.id_location".
    "inner join factions on characters.id_faction = factions.id_faction inner join affiliation on characters.id_affiliation = affiliation.id_affiliation";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_character' => $data['id_character'],
            'name_character' => $data['name_character'],
            'image_character' => $data['image_character'],
            'history_character' => $data['history_character'],
            'nickname_character' => $data['nickname_character'],
            'id_location' => $data['id_location'],
            'id_faction' => $data['id_faction'],
            'id_affiliation' => $data['id_affiliation'],
            'class_character' => $data['class_character'],
            'role_character' => $data['role_character'],
            'status_character' => $data['status_character'],
        ];
        array_push($result, $row);
    }
    return $result;
}


function getAllImageCharacter($id_character)
{
    $conn = getConnection();
    $sql = "SELECT * FROM img_character WHERE id_character = :id_character";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_character' => $id_character]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_character' => $data['id_character'],
            'images' => $data['images'],
            'id_img' => $data['id_img'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function findCharacterById($id)
{
    $conn = getConnection();
    $sql = "SELECT * FROM characters inner join locations on characters.id_location = locations.id_location".
    "inner join factions on characters.id_faction = factions.id_faction inner join affiliation on characters.id_affiliation = affiliation.id_affiliation WHERE id_character=:id_character";    
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_affiliation' => $id]);
    $data = $stmt->fetch();

    $row = [
        'id_character' => $data['id_character'],
        'name_character' => $data['name_character'],
        'image_character' => $data['image_character'],
        'history_character' => $data['history_character'],
        'nickname_character' => $data['nickname_character'],
        'id_location' => $data['id_location'],
        'id_faction' => $data['id_faction'],
        'id_affiliation' => $data['id_affiliation'],
        'class_character' => $data['class_character'],
        'role_character' => $data['role_character'],
        'status_character' => $data['status_character'],
    ];

    return $row;
}


function insertCharacter(array $data)
{
    $conn = getConnection();
    $sql  = "INSERT INTO characters(name_character, history_character,id_location,id_faction,id_affiliation,image_character,nickname_character,role_character,class_character,status_character) VALUES(:name_character,:history_character,:id_location,:id_faction,:id_affiliation,:image_character,:nickname_character,:role_character,:class_character,:status_character)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function updateCharacter($data)
{
    $conn = getConnection();
    $sql = "UPDATE characters SET name_character=:name_character,history_character=:history_character,id_location=:id_location,image_character=:image_character,nickname_character=:affiliation,role_character=:role_character,class_character=:class_character,status_character=:status_character,id_faction=:id_faction,id_affiliation=:id_affiliation WHERE id_character=:id_character";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);

    return true;
}
function deleteCharacter($id)
{
    $conn = getConnection();
    $sql = "DELETE FROM characters WHERE id_character = :id_character";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_character' => $id]);
}

function deleteCharacterImage($id)
{
    $conn = getConnection();
    $sql = "DELETE FROM img_character WHERE id_character = :id_character";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_character' => $id]);
}

