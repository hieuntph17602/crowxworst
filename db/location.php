<?php
//List các hàm
function getAllLocation()
{
    $conn = getConnection();
    $sql = "SELECT * FROM locations";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = [];
    while (true) {
        $data = $stmt->fetch();
        if ($data == false) {
            break;
        }
        $row = [
            'id_location' => $data['id_location'],
            'name_location' => $data['name_location'],
            'history_location' => $data['history_location'],
            'image_location' => $data['image_location'],
        ];
        array_push($result, $row);
    }
    return $result;
}
function findLocationById($id)
{
    $conn = getConnection();
    $sql = "SELECT * FROM locations WHERE id_location = :id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_location' => $id]);
    $data = $stmt->fetch();

    $row = [
        'id_location' => $data['id_location'],
        'name_location' => $data['name_location'],
        'history_location' => $data['history_location'],
        'image_location' => $data['image_location'],
    ];

    return $row;
}
function insertLocation(array $data)
{
    $conn = getConnection();
    $sql = "INSERT INTO locations(name_location, history_location,image_location) VALUES(:name_location, :history_location,:image_location)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
}
function updateLocation($data)
{
    $conn = getConnection();
    $sql = "UPDATE locations SET name_location = :name_location, history_location = :history_location, image_location = :image_location WHERE id_location = :id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute($data);
    return true;
}
function deleteLocation($id)
{
    $conn = getConnection();
    $sql = "DELETE FROM locations WHERE id_location = :id_location";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id_location' => $id]);
}