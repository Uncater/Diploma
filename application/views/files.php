<head>
    <title>Файлы CSV</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>Привет! Вот твои документы:</h1>
<?php foreach($result as $res): ?>
<div><a href="<?php echo $res?>"><?php echo $res ?></a></div>
<?php endforeach ?>
</body>
