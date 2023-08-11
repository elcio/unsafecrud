<?php

require_once 'framework/auth.php';

if(isset($_POST['modelo'])) {
  $modelo = $_POST['modelo'];
  $ano = $_POST['ano'];
  $id = $_GET['id'];
  save_carro($id, $modelo, $ano);
  header('Location: index.php');
}

$carro = get_carro($_GET['id']);

if(!$carro) {
  header('Location: index.php');
}

include 'parts/header.php'; ?>
<form method="POST">
  <input name="modelo" value="<?php echo $carro['modelo']; ?>" /><br />
  <input name="ano" value="<?php echo $carro['ano']; ?>" /><br />
  <input type="submit" value="Save" /> &nbsp; &nbsp; <a href=".">Cancel</a>
</form>
<?php include 'parts/footer.php'; ?>
