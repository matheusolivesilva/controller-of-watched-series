<!doctype html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Series Control</title>
</head>

<body>
    <ul>
    <?php foreach ($series as $serie): ?>
    <li><?= $serie; ?></li>
    <?php endforeach; ?>
</body>
</html>
