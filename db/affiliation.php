<?php

function getAllAffiliation()
{
    $conn = getConnection();
    $sql = "SELECT * FROM affiliations inner join locations on affiliations.id_location = locations.id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_affiliation' => $data['id_affiliation'],
            'name_affiliation' => $data['name_affiliation'],
            'image_affiliation' => $data['image_affiliation'],
            'history_affiliation' => $data['history_affiliation'],
            'class_affiliation' => $data['class_affiliation'],
            'name_location' => $data['name_location'],
        ];
        array_push($result, $row);
    }
    return $result;
}


function getAllImageAffiliation($id_affiliation)
{
    $conn = getConnection();
    $sql = "SELECT * FROM img_affiliation WHERE id_affiliation = :id_affiliation";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_affiliation' => $id_affiliation]);
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_affiliation' => $data['id_affiliation'],
            'images' => $data['images'],
            'id_img' => $data['id_img'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function findAffiliationById($id)
{
    $conn = getConnection();
    $sql = "SELECT * FROM affiliations inner join locations on affiliations.id_location = locations.id_location WHERE id_affiliation =:id_affiliation ";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_affiliation' => $id]);

    $data = $stmt->fetch();

    $row = [
        'id_affiliation' => $data['id_affiliation'],
        'name_affiliation' => $data['name_affiliation'],
        'image_affiliation' => $data['image_affiliation'],
        'history_affiliation' => $data['history_affiliation'],
        'class_affiliation' => $data['class_affiliation'],
        'name_location' => $data['name_location'],
        'id_location' => $data['id_location'],
    ];

    return $row;
}


function insertAffiliation(array $data)
{
    $conn = getConnection();
    $sql  = "INSERT INTO affiliations(name_affiliation, history_affiliation,id_location,image_affiliation,class_affiliation) VALUES(:name_affiliation, :history_affiliation,:id_location,:image_affiliation,:class_affiliation)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}

function updateAffiliation($data)
{
    $conn = getConnection();
    $sql = "UPDATE affiliations SET name_affiliation=:name_affiliation,history_affiliation=:history_affiliation,id_location=:id_location,image_affiliation=:image_affiliation,class_affiliation=:affiliation WHERE id_affiliation=:id_affiliation";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);

    return true;
}
function deleteAffiliation($id)
{
    $conn = getConnection();
    $sql = "DELETE FROM affiliations WHERE id_affiliation = :id_affiliation";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_affiliation' => $id]);
}

function deleteAffiliationImage($id)
{
    $conn = getConnection();
    $sql = "DELETE FROM img_affiliation WHERE id_affiliation = :id_affiliation";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_affiliation' => $id]);
}

