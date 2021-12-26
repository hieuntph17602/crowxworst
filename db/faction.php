<?php

function getAllFaction()
{
    $conn = getConnection();
    $sql = "SELECT * FROM factions inner join affiliations on factions.id_faction = affiliations.id_faction";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_faction' => $data['id_faction'],
            'name_faction' => $data['name_faction'],
            'image_faction' => $data['image_faction'],
            'history_faction' => $data['history_faction'],
            'class_faction' => $data['class_faction'],
            'status_faction' => $data['status_faction'],
            'name_faction' => $data['name_faction'],
        ];
        array_push($result, $row);
    }
    return $result;
}


function getAllImageFaction($id_faction)
{
    $conn = getConnection();
    $sql = "SELECT * FROM img_faction WHERE id_faction = :id_faction";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_faction' => $id_faction]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_faction' => $data['id_faction'],
            'images' => $data['images'],
            'id_img' => $data['id_img'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function findFactionById($id)
{
    $conn = getConnection();
    $sql = "SELECT * FROM factions inner join affiliations on factions.id_affiliation = affiliations.id_affiliation WHERE id_faction =:id_faction ";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_faction' => $id]);

    $data = $stmt->fetch();

    $row = [
        'id_faction' => $data['id_faction'],
        'name_faction' => $data['name_faction'],
        'image_faction' => $data['image_faction'],
        'history_faction' => $data['history_faction'],
        'class_faction' => $data['class_faction'],
        'name_faction' => $data['name_faction'],
        'status_faction' => $data['status_faction'],
        'id_affiliation' => $data['id_affiliation'],
    ];

    return $row;
}


function insertFaction(array $data)
{
    $conn = getConnection();
    $sql  = "INSERT INTO factions(name_faction, image_faction, history_faction, class_faction,id_affiliation,status_faction)" .
        "VALUES(:name_faction, :image_faction, :history_faction, :class_faction,:id_affiliation,:status_faction)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function updateFaction($data)
{
    $conn = getConnection();
    $sql = "UPDATE factions SET status_faction=:status_faction, name_faction =:name_faction, class_faction =:class_faction,image_faction =:image_faction, history_faction =:history_faction, id_affiliation =:id_affiliation WHERE id_faction =:id_faction";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function deleteFaction($id)
{
    $conn = getConnection();
    $sql = "DELETE FROM factions WHERE id_faction = :id_faction";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_faction' => $id]);
}

function deleteFactionImage($id)
{
    $conn = getConnection();
    $sql = "DELETE FROM img_faction WHERE id_faction = :id_faction";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_faction' => $id]);
}

