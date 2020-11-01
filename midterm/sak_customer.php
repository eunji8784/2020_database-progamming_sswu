<?php
    $link = mysqli_connect("localhost", "admin", "admin", "sakila");
    $option = isset($_GET['email']) ? $_GET['email'] : false;

    if ($option) {
        $query = "SELECT a.customer_id, a.first_name, a.last_name, a.email, b.rental_date, c.title ,b.return_date
        FROM customer a
        INNER JOIN rental b ON a.customer_id = b.customer_id
        INNER JOIN film c ON b.inventory_id = c.film_id
        WHERE a.email='{$_GET['email']}'
        ";
    } else {
        echo '이메일을 입력하세요. <a href="index.php">돌아가기</a>';
        exit;
    }

    $result = mysqli_query($link, $query);

    $sak_info = '';
    while($row = mysqli_fetch_array($result)) {
        $customer_id = $row['customer_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];

        $sak_info .= '<tr>';
        $sak_info .= '<td>'.$row['rental_date'].'</td>';
        $sak_info .= '<td>'.$row['title'].'</td>';
        $sak_info .= '<td>'.$row['return_date'].'</td>';
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
    <h2><a href="index.php">DVD 대여 시스템</a> | 고객 대여 정보</h2>
    고객 아이디: <?= $customer_id ?> <br>
    고객명: <?= $first_name ?> <?= $last_name ?> <br>
    이메일: <?= $email ?> <br>

    <table border="1">
        <tr>
            <th>대여 날짜</th>
            <th>DVD 제목</th>
            <th>반납 날짜</th>
        </tr>
        <?= $sak_info ?>
    </table>
</body>

</html>
