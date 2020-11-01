<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> DVD 대여 시스템 </title>
</head>

<body>
    <h1>DVD 대여 시스템</h1>
    <form action="sak_select.php" method="GET">
        (1) 영화 검색: <br>
        <select name="category">
            <option value="none">==장르==</option>
            <option value="Action">액션</option>
            <option value="Animation">애니메이션</option>
            <option value="Comedy">코미디</option>
            <option value="Documentary">다큐멘터리</option>
            <option value="Horror">호러</option>
            <option value="Music">음악</option>
            <option value="Children">어린이</option>
            <option value="Drama">드라마</option>
        </select>
        <input type="text" name="title" placeholder="영화 제목">
        <input type="submit" value="Search">
    </form>

    <form action="sak_customer.php" method="GET">
        (2) 고객 대여 정보: <br>
        <input type="text" name="email" placeholder="이메일을 입력하세요.">
        <input type="submit" value="Search">
    </form>

    <a href="sak_store.php">(3) 상점 정보 </a><br>
</body>

</html>
