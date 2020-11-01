<?php
    $link = mysqli_connect("localhost", "admin", "admin", "sakila");

    $query = "SELECT a.store_id, b.address, b.district, c.city
    FROM  store a
    INNER JOIN address b ON a.address_id = b.address_id
    INNER JOIN city c ON b.city_id = c.city_id
    ";
    
    $result = mysqli_query($link, $query);

    $sak_info = '';
    while($row = mysqli_fetch_array($result)) {
        $sak_info .= '<tr>';
        $sak_info .= '<td>'.$row['store_id'].'</td>';
        $sak_info .= '<td>'.$row['address'].'</td>';
        $sak_info .= '<td>'.$row['district'].'</td>';
        $sak_info .= '<td>'.$row['city'].'</td>';
        $sak_info .= '</tr>';
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> DVD 대여 시스템 </title>
</head>

<body>
    <h2><a href="index.php">DVD 대여 시스템</a> | 상점 정보</h2>
    <table border="1">
        <tr>
            <th>상점 아이디</th>
            <th>주소</th>
            <th>구</th>
            <th>도시</th>
        </tr>
        <?= $sak_info ?>
    </table>
</body>

</html>
