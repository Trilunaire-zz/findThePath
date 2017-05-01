<!DOCTYPE html>
<html>
	<head>
		<title>Find The Path | <?php echo $page_title;?></title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<!-- JQUERY -->
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

		<!-- SOME CSS -->
		<style>
			body{
				background: url('/assets/pictures/himesh-kumar-behera-216019.jpg');
				background-repeat: no-repeat;
				background-position: center;
			}
			#block_loginSignIn{
				background: rgba(170, 170, 170, 0.7);
				text-align: left;
				margin: auto;
				margin-top: 50px;
				padding: 25px;
			}
			button{
				display: block;
				margin: auto;
				margin-top: 10px;
				width: 200px;
				height: 50px;
				font-size: 25px;
			}
		</style>
	</head>
	<body>
		<div class="col-md-6"></div>
		<div id="block_loginSignIn" class="col-md-6">
			<?php echo $message_err;?>
			<h1>Find The Path</h1>
			<h2>Consultez vos trajets favoris</h2>
			<button id="conn_butt" class="btn" onclick="open_conn()">Se connecter</button><br />
			<button id="insc_butt" class="btn" onclick="open_insc()">S'inscrire</button>
			<input type="submit" id="back_butt" class="btn btn-warning" onclick="back()" value="Retour" /><br /><br />
			<div id="connection_container">
                <form class="form-horizontal" action="http://find-the-path.tristanlaurent.com/index.php/Welcome/connection" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <label for="login_con" class="col-sm-4 control-label">Identifiant :</label>
                    <div class="col-sm-6">
                      <input id="login_con" class="form-control" type="text" name="username" placeholder="Login" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass_con" class="col-sm-4 control-label">Mot de passe :</label>
                    <div class="col-sm-6">
                      <input id="pass_con" class="form-control" type="password" name="password" placeholder="Password" />
                    </div>
                </div>
                    <input class="btn btn-success" type="submit" value="Connexion" />
                </form>
            </div>
			<div id="inscrip_container"/>
			    <form class="form-horizontal" action="http://find-the-path.tristanlaurent.com/index.php/Welcome/inscription" method="post" accept-charset="utf-8">
			    <div class="form-group">
			        <label for="log_ins" class="col-sm-4 control-label">Identifiant :</label>
			        <div class="col-sm-6">
			          <input id="log_ins" class="form-control" type="text" name="login" placeholder="Login" recquired="true"/>
			        </div>
			    </div>
			    <div class="form-group">
			        <label for="mail_ins" class="col-sm-4 control-label">Adresse e-mail :</label>
			        <div class="col-sm-6">
			          <input id="mail_ins" class="form-control" type="text" name="mail" placeholder="Mail" recquired="true"/>
			        </div>
			    </div>
			    <div class="form-group">
			        <label for="pass_ins" class="col-sm-4 control-label">Mot de passe :</label>
			        <div class="col-sm-6">
			          <input id="pass_ins" class="form-control" type="password" name="password" placeholder="Password" recquired="true"/>
			        </div>
			    </div>
			    <div class="form-group">
			        <label for="confpass_con" class="col-sm-4 control-label">Confirmation du mot de passe :</label>
			        <div class="col-sm-6">
			          <input id="confpass_con" class="form-control" type="password" name="password_verif" placeholder="Password again" recquired="true"/>
			        </div>
			    </div>
			        <input class="btn btn-success" type="submit" value="S'inscrire" />
			    </form>
			</div>
		</div>
		<script>

		    $("#inscrip_container").hide();
		    $("#connection_container").hide();
		    $("#back_butt").hide();

		    function open_conn(){
		        $("#inscrip_container").hide();
		        $("#connection_container").toggle();
		        $("#conn_butt").hide();
		        $("#insc_butt").hide();
		        $("#back_butt").show();
		    }

		    function open_insc(){
		        $("#connection_container").hide();
		        $("#inscrip_container").toggle();
		        $("#conn_butt").hide();
		        $("#insc_butt").hide();
		        $("#back_butt").show();
		    }

		    function back(){
		        $("#connection_container").hide();
		        $("#inscrip_container").hide();
		        $("#conn_butt").show();
		        $("#insc_butt").show();
		        $("#back_butt").hide();
		    }


		</script>
	</body>
</html>
