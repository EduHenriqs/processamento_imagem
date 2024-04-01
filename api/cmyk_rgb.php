<?php


 include "cabecalho.php";


    if($_POST['ciano'] != '' and $_POST['magenta'] != '' and $_POST['amarelo'] != '' and $_POST['preto'] != ''){

        $cyan = $_POST['ciano']/100;
        $magenta = $_POST['magenta']/100;
        $yellow = $_POST['amarelo']/100;
        $black = $_POST['preto']/100;

        $red = 255 * (1-$cyan)*(1-$black);
        $green = 255 * (1-$magenta)*(1-$black);
        $blue = 255 * (1-$yellow)*(1-$black);
        


        $hex_comp = sprintf("#%02x%02x%02x", $red, $green, $blue);

    }
?>
<div class='row'>
    <div class='col-md-1'></div>
    <div class='col-md-10'>
        <form name='conversao' id='conversao' method='post' action='<?= $_SERVER['PHP_SELF']?>'>
            <label style='font-size:25px;'>Cor Ciano</label>
            <input type="text" class='form-control' name='ciano' id='ciano' value='<?= $cyan?>'>
            <label style='font-size:25px;'>Cor Magenta</label>
            <input type="text" class='form-control' name='magenta' id='magenta' value='<?= $magenta?>'>
            <label style='font-size:25px;'>Cor Amarelo</label>
            <input type="text" class='form-control' name='amarelo' id='amarelo' value='<?= $yellow?>'>
            <label style='font-size:25px;'>Cor Preto</label>
            <input type="text" class='form-control' name='preto' id='preto' value='<?= $black?>'>
            <br>
            <button type="submit" class='btn btn-success'>Converter</button>
            <button type="button" class='btn btn-danger' onclick='recarregar()'>Resetar</button>
        </form>
        <br>
        <h2>Result</h2>
        <label>Vermelho</label>
        <input value="<?= round(number_format($red,1,'.',''))?>" class='form-control' disabled>

        <label>Verde</label>
        <input value="<?= round(number_format($green,1,'.',''))?>" class='form-control' disabled>

        <label>Azul</label>
        <input value="<?= round(number_format($blue,1,'.',''))?>" class='form-control' disabled>

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