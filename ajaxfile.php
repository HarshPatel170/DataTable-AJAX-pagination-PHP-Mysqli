
<?php
$conn = mysqli_connect("localhost", "root", "", "training_sql") or die(mysqli_connect_error($conn));

$columns = array(
    0 => 'username',
    1 => 'first_name',
    2 => 'last_name',
    3 => 'gender',
    4 => 'status'
);

$query = "SELECT * FROM user_details WHERE 1";

if (!empty($_POST['search']['value'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']['value']);
    $query .= " AND (username LIKE '%" . $search . "%' OR ";
    $query .= "first_name LIKE '%" . $search . "%' OR ";
    $query .= "last_name LIKE '%" . $search . "%' OR ";
    $query .= "gender LIKE '" . $search . "' OR ";
    $query .= "status LIKE '%" . $search . "%')";
}

$totalData = mysqli_num_rows(mysqli_query($conn, $query));

$columnIndex = $_POST['order'][0]['column'];
$columnName = $columns[$columnIndex];
$columnSortOrder = $_POST['order'][0]['dir'];
$query .= " ORDER BY " . $columnName . " " . $columnSortOrder;

$rowperpage = $_POST['length'];
$start = $_POST['start'];
$query .= " LIMIT " . $start . "," . $rowperpage;

$result = mysqli_query($conn, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

$response = array(
    "draw" => intval($_POST['draw']),
    "iTotalRecords" => $totalData,
    "iTotalDisplayRecords" => $totalData,
    "aaData" => $data
);

echo json_encode($response);
?>
