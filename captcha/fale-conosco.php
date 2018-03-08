<?php
	include ("header.php");
	include ("menu.php");
	
	session_start();
	if ( isset ($_POST["btnacao"])) {
		$nome     = $_POST['nome'];
        $email    = $_POST["email"];
        $telefone = $_POST['telefone'];
        $mensagem      = $_POST["mensagem"];
		
		include_once 'captcha/securimage.php';
		$securimage = new Securimage();
		
		if ($securimage->check($_POST['captcha_code']) == false) {
			// captcha incorreto
			$erro .= "O codigo digitado está incorreto!";
		} 
		
		if(strlen(trim($nome))==0){
            $erro .= "Por favor preencher o Nome. <br>";
        }
        if(strlen(trim($email))==0){
            $erro .= "Por favor preencher a E-mail";
        }
        if(strlen(trim($telefone))==0){
            $erro .= "Por favor preencher o Telefone";
        }
        if(strlen(trim($mensagem))==0){
            $erro .= "Por favor preencher a Mensagem.";
        }
		
		if(strlen(trim($erro))==0) {
			$msg = "Nome:       $nome <br> 
                    E-mail:     $email <br>
                    Telefone:   $telefone <br>
                    Mensagem:   $mensagem <br>";
			
			//Configurações do email, ajustar conforme necessidade
			//==================================================== 
			$email_destinatario = "vitor@fivesystem.com.br"; // pode ser qualquer email que receberá as mensagens
			$email_reply = "$email"; 
			$email_assunto = "Contato Site Nova Marília"; // Este será o assunto da mensagem
			//====================================================
			 
			//Seta os Headers (Alterar somente caso necessario) 
			//==================================================== 
			$email_headers = implode ( "\n",array ( "From: $email", "Reply-To: $email", "Subject: $email_assunto","Return-Path: $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
			//====================================================
			 
			//Enviando o email 
			mail ($email_destinatario, $email_assunto, $msg, $email_headers);

			$ok = "Mensagem enviada com sucesso. <br>";
		}
	}
?>

<div class="container">
	<div class="row">
        <div class="col-xs-12">
            <div class="page-header">
				<h2>Entre em Contato Conosco</h2>
				* campos de preenchimento obrigatório.
			</div>
        </div>
    </div>
	<?php
	if(strlen(trim($erro))>0){
		echo"<div class='alert alert-danger' role='alert'>
                <a href='#' class='alert-link'>$erro</a>
            </div>";
	}
	if(strlen(trim($ok))>0){
		 echo"<div class='alert alert-success' role='alert'>
                <a href='#' class='alert-link'>$ok</a>
             </div>";
	}
	?>
	<div class="row txtRodape">		
		<form class="form-horizontal" method="POST" name="frmContato" id="formContato">
			<div class="col-md-7">
				<div class="form-group">
					<label for="nome" class="col-md-2 control-label">Nome <span class="required">*</span>:</label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>" required placeholder="Nome">
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="col-md-2 control-label">E-mail <span class="required">*</span>:</label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>" required placeholder="E-mail">
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefone" class="col-md-2 control-label">Telefone <span class="required">*</span>:</label>
					<div class="col-md-10">
						<input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $telefone ?>" required placeholder="Telefone">
					</div>
				</div>
				<div class="form-group">
					<label for="mensagem" class="col-md-2 control-label">Mensagem <span class="required">*</span>:</label>
					<div class="col-md-10">
						<textarea class="form-control" name="mensagem" id="mensagem" required="required" rows="3" placeholder="Mensagem"></textarea>
					</div>
				</div>
				
				<div class="col-md-offset-2 col-md-12">
					<div class="form-group">
						<img id="captcha" src="captcha/securimage_show.php" alt="CAPTCHA Image" />
						<br>
						<input type="text" name="captcha_code" size="10" maxlength="6" /required>
						<a href="#" onclick="document.getElementById('captcha').src = 'captcha/securimage_show.php?' + Math.random(); return false"> <img src="captcha/images/refresh.png" width="30" data-placement="right" title="Trocar Imagem"> </a>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-md-offset-2 col-md-5">
						<button type="submit" class="btn btn-success">Enviar</button>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="col-md-12 txtEnder">
                    <div>
						R. Nair Rosilho Gutierrez, 65 <br>
						Bairro Nucleo Nova Marilia<br>
						Marília-SP
					</div>
                <div>
					Telefone: (14) 3417-6922
				</div>
			</div>
		</form>
		
		
	</div>
	
	<div class="row localizacao">
        <div class="col-md-12">                
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d652.7674453204863!2d-49.93060143451006!3d-22.254860130445675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94bfda18bc501fef%3A0x689c13aa5e1e18da!2sR.+Nair+Rosilio+Gutierrez%2C+65+-+Nucleo+Hab.+Nova+Marilia%2C+Mar%C3%ADlia+-+SP!5e0!3m2!1spt-BR!2sbr!4v1460488842470" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
    </div>
	</div>
</div>

<?php
	include ("rodape.php");
?>