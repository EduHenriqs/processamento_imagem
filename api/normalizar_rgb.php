<?php


 include "cabecalho.php";

    if($_POST['red'] != '' and $_POST['green'] != '' and $_POST['blue'] != ''){

        $red = $_POST['red'];
        $green = $_POST['green'];
        $blue = $_POST['blue'];

    $r = $red/($red + $green + $blue);
    $g = $green/($red + $green + $blue);
    $b = $blue/($red + $green + $blue);
   
        $normalizado = $r + $g + $b;
        $cores = array($_POST['red'], $_POST['green'], $_POST['blue']);
        $hex_comp = sprintf("#%02x%02x%02x", $cores[0], $cores[1], $cores[2]);
    }
 ?>

<div class='row'>
    <div class='col-md-1'></div>
    <div class='col-md-10'>
        <form name='conversao' id='conversao' method='post' action='<?= $_SERVER['PHP_SELF']?>'>    
            <label style='font-size:25px;'>Cor Vermelha</label>
            <input type="text" class='form-control' name='red' id='red' value='<?= $red?>'>
            <label style='font-size:25px;'>Cor Verde</label>
            <input type="text" class='form-control' name='green' id='green' value='<?= $green?>'>
            <label style='font-size:25px;'>Cor Azul</label>
            <input type="text" class='form-control' name='blue' id='blue' value='<?= $blue?>'>
            <br>
            <button type="submit" class='btn btn-success'>Converter</button>
            <button type="button" class='btn btn-danger' onclick='recarregar()'>Resetar</button>
        </form>
        <br>
        <h2>Result</h2>

        <label style='font-size:25px;'>Vermelho</label>
        <input type="text" class='form-control' value='<?= number_format($r,2,'.','')?>' disabled>
        <label style='font-size:25px;'>Verde</label>
        <input type="text" class='form-control' value='<?= number_format($g,2,'.','')?>' disabled>
        <label style='font-size:25px;'>Azul</label>
        <input type="text" class='form-control' value='<?= number_format($b,2,'.','')?>' disabled>
        <label style='font-size:25px;'>Normalizado</label>
        <input value="<?= $normalizado?>" class='form-control' disabled>
        <label for="">Color Preview</label>
        <input type="color" class="form-control form-control-color" value="<?= $hex_comp?>" disabled style='width:250px; height:250px;'> 
    </div>
    <div class='col-md-1'></div>
</div>

<form name="limpa" id="limpa" method="post" action="<?= $_SERVER['php_self']?>">
</form>

</body>
</html>


<script>

    function recarregar(){

        document.limpa.submit();

    }

</script>