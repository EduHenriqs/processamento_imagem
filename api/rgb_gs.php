<?php


 include "cabecalho.php";

    if($_POST['red'] != '' and $_POST['green'] != '' and $_POST['blue'] != ''){

        $red = $_POST['red'];
        $green = $_POST['green'];
        $blue = $_POST['blue'];

        $cinza = ($red + $green + $blue)/3;
        
        $hex_comp = sprintf("#%02x%02x%02x", $_POST['red'], $_POST['green'], $_POST['blue']);
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

        <label style='font-size:25px;'>Escala de Cinza</label>
        <input value="<?= $cinza?>" class='form-control' disabled>
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