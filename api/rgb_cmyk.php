<?php


 include "cabecalho.php";


    if($_POST['red'] != '' and $_POST['green'] != '' and $_POST['blue'] != ''){

        
        $red = $_POST['red'];
        $green = $_POST['green'];
        $blue = $_POST['blue'];

        $r = $red/255;
        $g = $green/255;
        $b = $blue/255;

        $black = 1 - max($r,$g,$b);
        if ($black == 1) $cyan = $magenta = $yellow = 0; else { 
        $cyan = (1 - $r - $black)/(1-$black);
        $magenta = (1 - $g - $black)/(1-$black);
        $yellow = (1 - $b - $black)/(1-$black);
        }
        $hex_comp = sprintf("#%02x%02x%02x", $red, $green, $blue);

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
        <label>Ciano</label>
        <input value="<?= round(number_format($cyan*100,1,'.',''))?>%" class='form-control' disabled>


        <label>Magenta</label>
        <input value="<?= round(number_format($magenta*100,1,'.',''))?>%" class='form-control' disabled>


        <label>Amarelo</label>
        <input value="<?= round(number_format($yellow*100,1,'.',''))?>%" class='form-control' disabled>

        <label>Preto</label>
        <input value="<?= round(number_format($black*100,1,'.',''))?>%" class='form-control' disabled>

        <label>Hex Code</label>
        <input value="<?= $hex_comp?>" class='form-control' disabled>

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