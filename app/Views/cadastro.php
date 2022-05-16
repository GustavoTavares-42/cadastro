<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/css/index.css">
	<title>Cadastrar</title>
</head>
<body>
	<div>
		<form action="<?= base_url('Home/insertFile')?>" method="POST">
			<label for="nome"><b>Nome</b></label>
			<input type="text" name="nome" id="nome">
			<label for="cpf"><b>CPF</b></label>
			<input type="text" name="cpf" id="cpf">
			<label for="data"><b>Data De Nascimento</b></label>
			<input type="date" name="data" id="data" style="color:black; height: 30px;">
			<label for="import"><b>Importar de uma planilha</b></label>
			<input type="file" name="import" id="import">
			<input type="submit" value="Cadastrar">
			<?= session("message") ?>
		</form>
	</div>
</body>
</html>