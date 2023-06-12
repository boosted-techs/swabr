
<?php
$path = APPPATH;
require "{$path}third_party/vendor/autoload.php";
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
?>
<div class="row">
    <div class="col-md-12 table-responsive">
        <button class="btn btn-primary float-end" onclick="printBarCodes()"><i class="fa fa-print"></i></button>
        <h4>BarCodes</h4>
        <div id="table">
            <div id="table2">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th></th>
                        <Th></Th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $data = $content;
                    $array_size = count($data);
                    for ($i = 0; $i <= $array_size; $i += 6) {
                        //print_r($data[$i]); die();
                        ?>
                        <tr>
                            <?php
                            if ($i < 6)
                            $level = 6;
                            else
                                $level = $level + 6;
                                $b = $i;
                                //if ()
                            for ($l = $b; $l < $level; $l++) :
                                if (! isset($data[$l]))
                                    continue;
                                ?>
                                <td class="">
                                    <div class="" style="display: inline-block; border:1px solid black; padding: 10px;">
                                        <?=$generator->getBarcode($data[$l]->code, $generator::TYPE_CODE_128, 1, 30)?>
                                        <span style="display:block;"><?=$data[$l]->code?></span>
                                    </div>
                                </td>
                            <?php
                            endfor;
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function printBarCodes() {
        let divContents = document.getElementById("table").innerHTML;
        let a = window.open('', '', 'height=500, width=1000');
        a.document.write('<html>');
        a.document.write('<body >');
        a.document.write('<style>');
        a.document.write('.table { width: 100%; padding: 10px;} @media print{ tr {page-break-inside: avoid; }}');
        a.document.write('</style>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>