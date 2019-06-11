<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="content">
       <?php if($list) : foreach($list as $k => $v) : ?>
       <p>Continent Code: <?php echo $v->sCode; ?></p>
       <p>Continent Name: <?php echo $v->sName; ?></p>
        <?php endforeach; endif; ?>
    </div>
</body>
</html>