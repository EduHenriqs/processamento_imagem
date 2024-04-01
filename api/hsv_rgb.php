<?php


include "cabecalho.php";

$hue = $_POST['hue'];
$s = $_POST['saturacao'];
$v = $_POST['valor'];

$saturacao = $s / 100;
$valor = $v / 100;

if ($hue != '' and $saturacao != '' and $valor != '') {


    if (($hue >= 0 or $hue < 360) and ($saturacao <= 0 or $saturacao <= 1) and ($valor <= 0 or $valor <= 1)) {

        $c = $valor * $saturacao;
        $h = $hue/60;
        //print  "c1: " . $c;
        $x =   $c * (1 - abs(fmod($h, 2) - 1));
 
        $m = $valor - $c;

      //  print "c2: " . $c;
       // print $g;
        if ($hue <= 0 or $hue < 60) {
            $r = $c;
            $g = $x;
            $b = 0;
        } else if ($hue <= 60 or $hue < 120) {
            $r = $x;
            $g = $c;
            $b = 0;
        } else if ($hue <= 120 or $hue < 180) {
            $r = 0;
            $g = $c;
            $b = $x;
        } else if ($hue <= 180 or $hue < 240) {
            $r = 0;
            $g = $x;
            $b = $c;
        } else if ($hue <= 240 or $hue < 300) {
            $r = $x;
            $g = 0;
            $b = $c;
        } else if ($hue <= 300 or $hue < 360) {
            $r = $c;
            $g = 0;
            $b = $x;
        }

      //  print $g;
        $red = ($r + $m) * 255;
        $green = ($g + $m) * 255;
        $blue = ($b + $m) * 255;

        //print $blue;
        $hex_comp = sprintf("#%02x%02x%02x", $red, $green, $blue);  



    } else {

        print "
    <br>
    <div class='row'>
    <div class='col-md-1'></div>
    <div class='col-md-10'>
    <div class='alert alert-danger' role='alert'>
        Impossível converter os valores informados !
        </div>    
        <div class='col-md-1'></div>
     </div>
    </div>
    
    ";


    }

}

?>


<div class='row'>
    <div class='col-md-1'></div>
    <div class='col-md-10'>
        <form name='conversao' id='conversao' method='post' action='<?= $_SERVER['PHP_SELF'] ?>'>

            <label style='font-size:25px;'>Hue(H)</label>
            <div class="input-group mb-3">
                <input type="text" class='form-control' name='hue' id='hue' value='<?= $hue ?>'>
                <span class="input-group-text">°</span>
            </div>

            <label style='font-size:25px;'>Saturation(S)</label>
            <div class="input-group mb-3">
                <input type="text" class='form-control' name='saturacao' id='saturacao' value='<?= $s ?>'>
                <span class="input-group-text">%</span>
            </div>

            <label style='font-size:25px;'>Value(V)</label>
            <div class="input-group mb-3">
                <input type="text" class='form-control' name='valor' id='valor' value='<?= $v ?>'>
                <span class="input-group-text">%</span>
            </div>

            <button type="submit" class='btn btn-success'>Converter</button>
            <button type="button" class='btn btn-danger' onclick='recarregar()'>Resetar</button>
        </form>
        <br>
        <h2>Result</h2>

        <label style='font-size:25px;'>Código HEX</label>
        <input type="text" class='form-control' value='<?= $hex_comp ?>' disabled>

        <label style='font-size:25px;'>Vermelho(R)</label>
        <input type="text" class='form-control' value='<?= round($red) ?>' disabled>

        <label style='font-size:25px;'>Verde(G)</label>
        <input type="text" class='form-control' value='<?= round($green) ?>' disabled>

        <label style='font-size:25px;'>Azul(B)</label>
        <input type='text' value="<?= round($blue) ?>" class='form-control' disabled>

        <label for="">Color Preview</label>
        <input type="color" class="form-control form-control-color" value="<?= $hex_comp ?>" disabled
            style='width:250px; height:250px;'>
    </div>
    <div class='col-md-1'></div>
</div>

<form name="limpa" id="limpa" method="post" action="<?= $_SERVER['php_self'] ?>">
</form>

</body>

</html>


<script>
    function recarregar() {

        document.limpa.submit();

    }
</script>