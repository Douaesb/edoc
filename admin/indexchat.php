<?php 
  session_start();

  if (!isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat App - Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" 
	      href="../css/style.css">
	<link rel="icon" href="img/logo.png">
	
	<style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
</style>
</head>

<body class="d-flex
             justify-content-center
             align-items-center
             vh-100">
			
    	
	 <div class="w-400 p-5 shadow rounded">
	 	<form method="post" 
	 	      action="../app/http/auth.php">
	 		<div class="d-flex
	 		            justify-content-center
	 		            align-items-center
	 		            flex-column">
      <a href="index.php"
	  class="w-400 p-2 fs-4 link-dark">&#8592;</a>
	 		<img src="../img/logo.png" 
	 		     class="w-25">
	 		<h3 class="display-4 fs-1 
	 		           text-center">
	 			       Connexion</h3>   
						

	 		</div>
			 
	 		<?php if (isset($_GET['error'])) { ?>
	 		<div class="alert alert-warning" role="alert">
			  <?php echo htmlspecialchars($_GET['error']);?>
			</div>
			<?php } ?>
			
	 		<?php if (isset($_GET['success'])) { ?>
	 		<div class="alert alert-success" role="alert">
			  <?php echo htmlspecialchars($_GET['success']);?>
			</div>
			<?php } ?>
		  <div class="mb-3">
		    <label class="form-label">
		          Nom d'utilisateur</label>
		    <input type="text" 
		           class="form-control"
		           name="username">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">
		           Mot de passe</label>
		    <input type="password" 
		           class="form-control"
		           name="password">
		  </div>
		  
		  <button type="submit" 
		          class="btn btn-primary">
		          Connexion</button>
		  <a href="../signupA.php">S'inscrire</a>
		</form>
		
	 </div>
	 
</body>

</html>
<?php
  }else{
  	header("Location: home.php");
   	exit;
  }
 ?>