<?php
    extract($_POST);
    include_once ("database.php");
    $sql = "SELECT * FROM user";
    $result = mysqli_query($con,$sql);
    $totalData = mysqli_num_rows($result);
    $totalFilter = $totalData;
    $columns = array(
        0 => "firstName",
        1 => "lastName",
        2 => "email",
        3 => "pincode"
    );
    /*
     * for searching and sorting property
     * of datatable
     * */
    $searchKeyWord = htmlspecialchars($_POST['search']['value']);
    if(!empty($searchKeyWord)){
        $sql .= " WHERE firstName LIKE '".$searchKeyWord."%' ";
        $sql .= " OR lastName LIKE '".$searchKeyWord."%' ";
        $sql .= " OR email LIKE '".$searchKeyWord."%' ";
        $sql .= " OR pincode LIKE '".$searchKeyWord."%' ";
        $result = mysqli_query($con,$sql);
        $totalFilter = mysqli_num_rows($result);
    }
    $sql .= " ORDER BY ". $columns[$_POST['order']['0']['column']] ." ".$_POST['order']['0']['dir']." LIMIT ".$_POST['start']." , ".$_POST['length']." ";
    $result = mysqli_query($con,$sql);
    while ($row = mysqli_fetch_assoc($result)){
        $data[] = [

            'firstName' => $row['firstName'],
            'lastName' => $row['lastName'],
            'email' => $row['email'],
            'pincode' => $row['pincode']
        ];
    }
    $jsonData = array(
        "draw" => intval($_POST['draw']),
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFilter),
        "data" => $data
    );
    echo json_encode($jsonData);
?>

