<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Corretora Virtual - Cotação</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
     <link href="../css/estilo.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<div class="container">
		<div class="row" id="tipo">
			<div class="col-xs-12">
				<div>Digite as informações e entraremos em contato com você</div>
			</div>
		</div>
		<br><br>
		<div class="row">
			<form method="POST" enctype="multipart/form-data" action="">
			<div class="centro">
				<div class='row'>
					<div class='col-md-offset-3 col-md-3'>	
						<div class="form-group">
							<label>Nome</label>
							<input type="text" class="form-control" required>
						</div>
					</div>
					<div class='col-md-2'>	
						<div class="form-group">
							<label>CPF</label>
							<input type="text" class="form-control" required>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-offset-3 col-md-2'>	
						<div class="form-group">
							<label>Placa do Veiculo</label>
							<input type="text" class="form-control" required>
						</div>
					</div>
					<div class='col-md-2'>	
						<div class="form-group">
							<label>Ano/Modelo Fab.</label>
							<input type="text" class="form-control" placeholder="Exemplo 2017/2018" required>
						</div>
					</div>
					<div class='col-md-3'>	
						<div class="form-group">
							<label>WhatsApp para Contato</label>
							<input type="text" class="form-control" required>
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-offset-5">
						<input type="submit" name="enviar" value="Enviar" class="btn btn-success">
					</div>
				</div>
			</div>
		</form>
		</div>
		
	</div>
</body>
</html>