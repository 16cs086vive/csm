<!DOCTYPE html>
<html>

<head>
    <title>testing</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <?php
    for ($i = 1; $i <= 10; $i++) {
        echo "37 X " . $i . "=" . (37 * $i) . "<br>";
    }
    ?>
</body>

</html>