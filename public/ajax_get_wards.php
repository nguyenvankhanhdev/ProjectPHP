<?php 
    require_once("../resources/config.php");
    $district_id = $_GET['district_id'];

    // echo $district_id;
    $sql = "SELECT * FROM `wards` WHERE `district_id` = {$district_id}";
    $result = query($sql);
    confirm($result);

    $data[0] = [
        'id' => null,
        'name' => 'Chọn một xã/phường'
    ];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            'id' => $row['wards_id'],
            'name'=> $row['name']
        ];
    }
    echo json_encode($data);
?>