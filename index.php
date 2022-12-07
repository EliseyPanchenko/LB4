<!DOCTYPE html>
<html lang="ru">
<meta charset="UTF-8">
<h1>Лабораторная №4| Вариант 5 | Панченко Елисей | КИУКИ-20-4  </h1>
<Style>
h1{
	 text-align: center;
}
form.CALCULATE {
display: block;
margin: auto;
width: 700px;
border: 1px solid #8B0000;
padding: 28px;
}
form.CALCULATE input[type="number"] {
padding: 10px;
margin: 4px;
width: 220px;
}
form.CALCULATE input[type="submit"] {
width: 95%;
margin: 6 px;
padding: 10px;
}
form div {text-align:center;
}
</Style>
</head>
<body>
<a name="rezult"></a>
<form method="POST" action="#rezult" class="CALCULATE ">
<div><? echo $rezult; ?></div>
<input type="number" name="first" required>
<input type="radio" name="operator" value="summ">+
<input type="radio" name="operator" value="minus">-
<input type="radio" name="operator" value="multi">*
<input type="radio" name="operator" value="delete">/
<input type="number" name="second" required>
<input type="submit" name="send" value="Отправить">
</form>
</body>	
</html>
<?
	$f = fopen("resultate.txt", "a");
	
	if($_POST['first']) { $first = strip_tags( $_POST['first'] ); }
	if($_POST['second']) { $second = strip_tags( $_POST['second'] ); }
	if($_POST['send'])
	{
	if(!$_POST['operator'])
	{
	$rezult = 'Нужно выбрать знак';
	}
		else
	{
		if($_POST['operator'] == 'summ') 
		{ $rezult = 'Результат сложения :'. ($first + $second) ;}
		if($_POST['operator'] == 'minus')
		{ $rezult = 'Результат минусования :'.($first - $second) ;}
		if($_POST['operator'] == 'multi')
		{ $rezult = 'Результат умножения :'. $first * $second ;}
		if($_POST['operator'] == 'delete')
		{ $rezult = 'Результат деления:'. $first / $second ;}
		fwrite($f, $rezult . PHP_EOL);
	}
	}
	
	else
	{
		$rezult = 'Калькулятор ';
	}
	echo readfile("resultate.txt");
	fclose($f);
?>