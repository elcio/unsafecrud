<?php

require_once 'framework/auth.php';

$id = require_login();

$carros = list_carros();

include 'parts/header.php'; ?>

<ul>
<?php foreach($carros as $carro): ?>
  <li>
    <a href="carro.php?id=<?php echo $carro['id']; ?>">
      <?php echo $carro['modelo']; ?> (<?php echo $carro['ano']; ?>)
    </a>
  </li>
<?php endforeach ?>
</ul>

<?php include 'parts/footer.php'; ?>
