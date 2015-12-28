<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Рассчет коэффициента Жаккара</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		.hello{margin-top: 3%;}
		.button{width: 50px;}
		.btn{width: 180px;  }
	</style>

</head>
<body>

<div class="col-md-12">
	<h1>Привет!</h1>

		<p>Здесь вы можете построить схему редиректов сайта при помощи коэффициента Жаккара. Для этого загрузите файл csv
		для старого и нового сайта. Весь функционал работает и так, но если вы хотите, чтобы ваш результат сохранялся на сервере,
		пожалуйста, зарегестрируйтесь!</p>
<div class="col-md-1 button">
	<form role="form" action="register">
		<button type="submit" class="btn btn-primary">Зарегестрироваться</button>
	</form>
</div>
	<div class="col-md-1 col-md-offset-2 button">
	<form role="form" action="login">
		<button type="submit" class="btn btn-primary">Войти</button>
	</form>
</div>
	<div class="col-md-1 col-md-offset-2 button">
		<form role="form" action="hello">
			<button type="submit" class="btn btn-primary">Мне это не нужно</button>
		</form>
	</div>
		<div class="col-md-1 col-md-offset-2 button">
		<form role="form" action="show">
			<button type="submit" class="btn btn-primary">Мои файлы</button>
		</form>
			</div>

</div>
<div class="col-md-12">
<div class="col-md-2 hello">
<?php  echo $hello; ?>
</div>
</div>
<div class="col-md-12"><br/>

	<div class="col-md-1">
		<form role="form" action="logout">
			<button type="submit" class="btn btn-danger">Выйти</button>
		</form>
	</div>
	</div>
<div class="col-md-12"><br/>
<div class="col-md-1">
	<form role="form" action="help">
		<button type="submit" class="btn btn-success">Как этим пользоваться</button>
	</form>
</div>

</div>

</body>
</html>
