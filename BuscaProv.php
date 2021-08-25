<?php

    include("ConecBanco.php");

      $Codusu = $_POST["busca"];

      $sql = "SELECT * FROM provedora WHERE MuniProv = '$Codusu'";
      $result = $conn->query($sql);
      $nProvs = mysqli_num_rows($result);
      $i = 1;
      
    ?>