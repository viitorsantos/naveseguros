
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Corretora Virtual - Cotação Nova</title>

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
	
		<form method="POST" enctype="multipart/form-data" action="perfil.php">
			<div class="centro">
				<h3>Dados do Principal Condutor</h3>
				<p>Envie uma foto da CNH do principal condutor OU Digite os dados </p>
				<div class='row'>
					<div class="col-md-offset-1 col-md-5">
						<div method="POST" id="upload"> 
							Selecione a foto :
							<input type="file" name="arquivo">
							<input type="hidden" name="MAX_FILE_SIZE" value="1000" /> <!--Poderá enviar para o servidor no maximo 30MB-->
																					
						</div>
					</div>
					<div class='col-md-2'>	
						<div class="form-group">
							<label>CPF</label>
							<input type="text" class="form-control">
						</div>
					</div>
					<div class='col-md-2'>	
						<div class="form-group">
							<label>Nome</label>
							<input type="text" class="form-control">
						</div>
					</div>
					<div class='col-md-2'>	
						<div class="form-group">
							<label>Sexo</label>
							<input type="text" class="form-control">
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-offset-6 col-md-2'>	
						<div class="form-group">
							<label>Data Nascimento</label>
							<input type="text" class="form-control">
						</div>
					</div>
					<div class='col-md-2'>	
						<div class="form-group">
							<label>Data 1ª habilitação</label>
							<input type="text" class="form-control">
						</div>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-offset-5">
						<input type="submit" name="enviar" value="Próximo passo" class="btn btn-success">
					</div>
				</div>
			</div>
		</form>
		
	</div>
</body>
</html>
?>