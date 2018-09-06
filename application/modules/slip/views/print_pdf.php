<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CETAK SLIP</title>
    <style>
        @page {
            size: 215mm 200mm potrait;
        }
        @font-face {
            font-family:"1979 Dot Matrix Regular";
            src:url("/printer/1979_dot_matrix.eot?") format("eot"),url("/printer/1979_dot_matrix.woff") format("woff"),url("/printer/1979_dot_matrix.ttf") format("truetype"),url("/printer/1979_dot_matrix.svg#1979-Dot-Matrix") format("svg");
            font-weight:normal;
            font-style:normal;
        }

        body, h1, h2, h3, h4, h5, h6 {
            font-family: "1979 Dot Matrix Regular";
            font-size: 3mm;
            margin: 0mm;
            padding: 0mm;
            line-height: 4mm;
        }
        .page {
            /*width: 210mm;
            height: 148mm;*/
            position: fixed;
            background: none;
            border: none;
        }
        p {
            margin: 0 0 1mm 0;
            background-color: none;
        }
        div {
            background-color: none;
            /*#f7f7f7;*/
        }
        .title {
            font-weight: bold;
        }
        .list-product {
            height: 62mm;
            overflow: hidden;
            border-top: 0.5mm solid black;
            border-bottom: 0.5mm solid black;
        }
        .list-product p {
            margin: 0;
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding:1mm 3mm 0.5mm 0mm;
            border:none;
        }
        .table>thead {
            text-align: left;
        }
        .table>tbody>tr>td:last-child, .table>tbody>tr>th:last-child,.table>thead>tr>td:last-child, .table>thead>tr>th:last-child {
            padding-right: 0mm;
        }
    </style>
    <script src="<?= base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
</head>

<body onload="onbeforeunload()">
    <div class="page">
        <div style="position: fixed;margin-top: 4mm;margin-left: 4mm;">
            <h2>SLIP GAJI</h2>
        </div>
        <div style="position: fixed;margin-top: 12mm;margin-left: 4mm;">
            <p style="max-width:90mm;">
                Setiabudi Building II, Lt. 6 <br>               
                Jl. HR. Rasuna Said. Kav. 62. Jakarta Selatan</p>
        </div>
        <div style="position: fixed;margin-top: 12mm;margin-left: 110mm;">
            <p> 
                AOC     : <?= $data_print['code']; ?> <br>      
                Nama    : <?= $data_print['name']; ?> <br>      
                Team    : <?= ($data_print['team']) ? $data_print['team'] : 0; ?><br>
                Posisi  : <?= $data_print['position']; ?><br>   
                Status  : <?= $data_print['status']; ?> <br>
            </p>
        </div>
        <!-- <div style="position: fixed;margin-top: 34mm;margin-left: 4mm;width: 75mm;overflow: hidden;height: 14mm;"> -->
            <!-- <p class="title" style="height: 4mm;width: 75mm;overflow: hidden;">
                <span style="width: 25mm;display: inline-block;">No. PO</span> <span>:</span>
            </p>
            <p class="title" style="height: 4mm;width: 75mm;overflow: hidden;">
                <span style="width: 25mm;display: inline-block;">No Faktur</span> <span>:</span>
            </p>
            <p class="title" style="height: 4mm;width: 75mm;overflow: hidden;">
                <span style="width: 25mm;display: inline-block;">Jatuh Tempo</span> <span>: </span>
            </p>
        </div> -->
        <!-- <div style="position: fixed;margin-top: 44mm;margin-left: 68mm;width: 54mm;height: 4mm;overflow: hidden;">
        </div> -->
        <div style="width: 500mm;">
            <div style="position: fixed;margin-top: 44mm;margin-left: 1mm;width: 180mm;height: 4mm;overflow: hidden; border-bottom: 0.5mm solid black; border-top:0.5mm solid black; ">
                PENERIMAAN
            </div>
            <div style="position: fixed;margin-top: 44mm;margin-left: 131mm;width: 71mm;height: 4mm;overflow: hidden;">
                POTONGAN
            </div>
        </div>
       
        

        <!-- tanda tangan -->
        <div style="position: fixed;margin-top: 114mm; margin-left: 80mm;">
            <div style="position: relative;margin-left: 0mm;background:none;float: left;">
                <p style="text-align: center;width: 100%;">
                    Diserahkan oleh,
                </p>
                <p style="height: 16mm;">
                </p>
                <p style="text-align: center;width: 100%;height: 4mm;">
                    ( FINANCE )
                </p>
            </div>
        </div>

         <div style="position: fixed;margin-top: 114mm; margin-left: 120mm;">
            <div style="position: relative;margin-left: 0mm;background:none;">
                <p>Jakarta, &nbsp;<?= str_replace('/',' ', date('d/M/Y')); ?></p>
                <p style="text-align: center;width: 100%;">
                    Diterima oleh,
                </p>
                <p style="height: 11mm;">
                </p>
                <p style="text-align: center;width: 100%;height: 4mm;">
                    ( <?= $this->session->userdata('name'); ?> )
                </p>
            </div>
        </div>
        <!-- tampung data ke variabel biar gampang -->
        <?php 
            // $gaji_pokok     = substr($data_print['basic_sallary'],0,10);
            $gaji_pokok     = (
                base64_decode($data_print['basic_sallary'])) ? base64_decode($data_print['basic_sallary']) : "-";
            $tunj_jabatan   = ($data_print['tunjangan_jabatan']) ? $data_print['tunjangan_jabatan'] : "-" ;
            $bp_kesehatan_1 = ($data_print['kesehatan_a']) ? $data_print['kesehatan_a'] : "-";
            $bp_kesehatan_2 = ($data_print['kesehatan_b']) ? $data_print['kesehatan_b'] : "-";
            $pensiun        = ($data_print['pensiun']) ? $data_print['pensiun'] : "-";
            $bp_pensiun_1   = ($data_print['bpjs_pensiun_a']) ? $data_print['bpjs_pensiun_a'] : "-";
            $bp_pensiun_2   = ($data_print['bpjs_pensiun_b']) ? $data_print['bpjs_pensiun_b'] : "-";
            $bp_tk_1        = ($data_print['tenaga_kerja_a']) ? $data_print['tenaga_kerja_a'] : "-";
            $bp_tk_2        = ($data_print['tenaga_kerja_b']) ? $data_print['tenaga_kerja_b'] : "-";
            $pph_21_a       = ($data_print['pph_pasal_21']) ? $data_print['pph_pasal_21'] : "-";
            $pinjaman       = ($data_print['pinjaman']) ? $data_print['pinjaman'] : "-";
            $pph_21_b       = ($data_print['tunjangan_pph21']) ? $data_print['tunjangan_pph21'] : "-";
            $potongan_lain  = ($data_print['potongan_lain']) ? $data_print['potongan_lain'] : "-";
            $komisi         = ($data_print['commision_xtradana']) ? $data_print['commision_xtradana'] : "-";

            $bpjs_pensiun = ($pensiun) + ($bp_pensiun_1);
            $tenaga_kerja = ($bp_tk_1) + ($bp_tk_2);

            $total_gaji_bruto = 
                (   
                    $gaji_pokok + 
                    $tunj_jabatan +
                    $bp_tk_1      +
                    $bp_pensiun_1 +
                    $bp_kesehatan_1 +
                    $pph_21_a + 
                    $komisi
                );

            $total_potongan = 
                (
                    $bp_kesehatan_2 +
                    $bpjs_pensiun   + 
                    $tenaga_kerja   +
                    $pph_21_b       +
                    $pinjaman       +
                    $potongan_lain  
                );
            $total_diterima = ( $total_gaji_bruto ) - ( $total_potongan );

        ?>
        <!-- fix ok -->
        <div style="position: fixed;margin-top: 50mm; margin-left: 4mm;width: 200mm;">
            <!-- <div class="list-product"> -->
            <table width="100%" class="table">
                <tr>
                    <td>Gaji Pokok <span style="margin-left: 20.5mm;"></span>:&nbsp;&nbsp;<?= $gaji_pokok ?></td>
                    <td></td>
                    <td>BPJS Kesehatan <span style="margin-left: 8.5mm;"></span>: <?= $bp_kesehatan_2 ?></td>
                </tr>
                <tr>
                    <td colspan="1">Tunjangan Jabatan <span style="margin-left: 11.6mm;"></span>:&nbsp;&nbsp;<?=  $tunj_jabatan; ?></td>
                    <td></td>
                    <td>BPJS Pensiun <span style="margin-left: 11.5mm;"></span>: <?= $bpjs_pensiun ?></td>
                </tr>
                <tr>
                    <td colspan="1">Tunjangan BPJS TK <span style="margin-left: 9.7mm;"></span>:&nbsp;&nbsp;<?= $bp_tk_1; ?></td>
                    <td></td>
                    <td>BPJS Ketenagakerjaan <span style="margin-left: 1mm;"></span>: <?= $tenaga_kerja ?></td>
                </tr>
                <tr>
                    <td colspan="1">Tunjangan BPJS Pens <span style="margin-left: 8mm;"></span>:&nbsp;&nbsp;<?= $bp_pensiun_1 ?></td>
                    <td></td>
                    <td>PPH Pasal 21 <span style="margin-left: 12.2mm;"></span>: <?= $pph_21_a ?></td>
                </tr>
                <tr>
                    <td colspan="1">Tunjangan BPJS Kesehatan <span style="margin-left: 1.2mm;"></span>:&nbsp;&nbsp;<?=  $bp_kesehatan_1 ?></td>
                    <td></td>
                    <td>Potongan Pinjaman <span style="margin-left: 5.2mm;"></span>: <?= $pinjaman ?></td>
                </tr>
                <tr>
                    <td colspan="1">Tunjangan PPH 21 <span style="margin-left: 12mm;"></span>:&nbsp;<?= $pph_21_b ?></td>
                    <td></td>
                    <td>Potongan Lainnya <span style="margin-left: 6.5mm;"></span>: <?= $potongan_lain ?></td>
                </tr>
                <tr>
                    <td colspan="1">Komisi <span style="margin-left: 26mm;"></span>: <?= $komisi ?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="1"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="1">Total Gaji Bruto <span style="margin-left: 14mm;">&nbsp;&nbsp;: <?= number_format($total_gaji_bruto) ?></td>
                    <td></td>
                    <td>Total Potongan <span style="margin-left: 11mm;"></span>:<?= number_format($total_potongan) ?></td>
                </tr>
                <!-- <tr>
                    <td colspan="1" style="border-bottom: 0.5mm solid black; border-top:0.5mm solid black;">Total Gaji Yang di terima <span style="margin-left: 3mm;">&nbsp;&nbsp;:
                        <span style="margin-left: 0mm;">&nbsp;&nbsp;:</td>
                    <td></td>
                </tr> -->
            </table>
            <div style="width: 500mm;">
                <div style="position: fixed;margin-left: 1mm;width: 177mm;height: 4mm;overflow: hidden; border-bottom: 0.5mm solid black; border-top:0.5mm solid black; ">
                    Total gaji yang diterima
                </div>
                <div style="position: fixed;margin-left: 115mm;width: 71mm;height: 4mm;overflow: hidden;">
                    RP <span style="margin-left: 24.1mm;">&nbsp;&nbsp;: <?= number_format($total_diterima); ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        // window.print();
    </script>
</body>
</html>
