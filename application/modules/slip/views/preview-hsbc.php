<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CETAK SLIP</title>
    <style>
        @page {
            size: 215mm 140mm potrait;
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
            	AOC&nbsp;&nbsp;&nbsp;: <?= $data_print['code']; ?> <br>		
				Nama&nbsp;&nbsp;: <?= $data_print['name']; ?> <br>		
				Team&nbsp;&nbsp; : <?= ($data_print['team']) ? $data_print['team'] : 0; ?><br>
				Posisi&nbsp;&nbsp;: <?= $data_print['position']; ?><br>	
				Status&nbsp;&nbsp;: <?= $data_print['status']; ?>	<br>
			</p>
        </div>
        <div style="position: fixed;margin-top: 34mm;margin-left: 4mm;width: 75mm;overflow: hidden;height: 14mm;">
            <p class="title" style="height: 4mm;width: 75mm;overflow: hidden;">
                <span style="width: 25mm;display: inline-block;"><?= date('m/d/Y') ?></span>
            </p>
        </div>
        <div style="position: fixed;margin-top: 44mm;margin-left: 68mm;width: 54mm;height: 4mm;overflow: hidden;">
        </div>
        <div style="width: 500mm;">
	        <div style="position: fixed;margin-top: 44mm;margin-left: 4mm;width: 180mm;height: 4mm;overflow: hidden; border-bottom: 0.5mm solid black; border-top:0.5mm solid black; ">
		        PENERIMAAN
	        </div>
	        <div style="position: fixed;margin-top: 44mm;margin-left: 128mm;width: 71mm;height: 4mm;overflow: hidden;">
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
                    ( ADMIN HRD )
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
        	// PENERIMAAN
            $gaji_pokok    		= ($data_print['basic_sallary']) ? base64_decode($data_print['basic_sallary']) : "0";
            $allowance 	   		= ($data_print['bpjs_kesehatan_1']) ? base64_decode($data_print['bpjs_kesehatan_1']) : "0"; 
            $ot 		   		= ($data_print['over_time']) ? base64_decode($data_print['over_time']) : "0";
            $transport 	   		= ($data_print['commision_taxi']) ? base64_decode($data_print['commision_taxi']) : "0";
            $gaji_repelan  		= ($data_print['rapelan_jan_mar']) ? base64_decode($data_print['rapelan_jan_mar']) : "0";
            $rapelan_ot    		= ($data_print['rapelan_ot_jan_mar']) ? base64_decode($data_print['rapelan_ot_jan_mar']) : "0";
            $reward        		= ($data_print['reward']) ? base64_decode($data_print['reward']) : "0";
            $bpjs_pensiun  		= ($data_print['bpjs_pensiun_1']) ? base64_decode($data_print['bpjs_pensiun_1']) : "0";
            $komisi 	   		= ($data_print['commision']) ? base64_decode($data_print['commision']) : "0";
            $total_gaji_bruto 	= base64_decode($data_print['total_gaji_bruto']);

            //PEMOTONGAN
            $bpjs_kesehatan     = ($data_print['bpjs_kesehatan_2']) ? base64_decode($data_print['bpjs_kesehatan_2']) : "0";
            $bpjs_pensiun   	= ($data_print['bpjs_pensiun_2']) ? base64_decode($data_print['bpjs_pensiun_2']) : "0";
            $bpjs_tenaga_kerja  = ($data_print['bpjs_tenaga_kerja_2']) ? base64_decode($data_print['bpjs_tenaga_kerja_2']) : "0";
            $pph21				= ($data_print['pph_pasal_21']) ? base64_decode($data_print['pph_pasal_21']) : "0";
            $potongan_parkir    = ($data_print['potongan_parkir']) ? base64_decode($data_print['potongan_parkir']) : "0";

            $total_potongan = 
	            (
	            	$bpjs_kesehatan +
	            	$bpjs_pensiun   +
	            	$bpjs_tenaga_kerja +
	            	$pph21   +
	            	$potongan_parkir
	            );
            $total_diterima = ($total_gaji_bruto) - ( $total_potongan );
        ?>
        <!-- fix ok -->
        <div style="position: fixed;margin-top: 50mm; margin-left: 4mm;width: 200mm;">
            <!-- <div class="list-product"> -->
            <table width="100%" class="table">
            	<tr>
	                <td>Gaji Pokok <span style="margin-left: 8mm;"></span>:&nbsp;&nbsp;<?= $gaji_pokok; ?></td>
	                <td></td>
	                <td>BPJS Kesehatan <span style="margin-left: 8.5mm;"></span>: <?= round($bpjs_kesehatan); ?></td>
            	</tr>
            	<tr>
	                <td colspan="1">Allowance<span style="margin-left: 9.1mm;"></span>:&nbsp;&nbsp;<?= round($allowance) ?></td>
	                <td></td>
	                <td>BPJS Pensiun <span style="margin-left: 11.5mm;"></span>: <?= round($bpjs_pensiun); ?></td>
            	</tr>
            	<tr>
	                <td colspan="1">Over Time<span style="margin-left: 9.2mm;"></span>:&nbsp;&nbsp;<?= round($ot) ?></td>
	                <td></td>
	                <td>BPJS Ketenagakerjaan <span style="margin-left: 1mm;"></span>: <?= round($bpjs_tenaga_kerja); ?></td>
            	</tr>
            	<tr>
	                <td colspan="1">Transport <span style="margin-left: 9.8mm;"></span>:&nbsp;&nbsp;<?= round($transport); ?></td>
	                <td></td>
	                <td>PPH Pasal 21 <span style="margin-left: 12.2mm;"></span>: <?= round($pph21) ?></td>
            	</tr>
            	<tr>
	                <td colspan="1">Komisi <span style="margin-left: 12.7mm;"></span>:&nbsp;&nbsp;<?= round($komisi); ?></td>
	                <td></td>
	                <td>Potongan Parkir <span style="margin-left: 9mm;"></span>: <?= $potongan_parkir ?></td>
            	</tr>
            	<tr>
	                <td colspan="1">Rapelan Gaji<span style="margin-left: 6.4mm;"></span>:&nbsp;&nbsp;<?= round($gaji_repelan); ?></td>
	                <td></td>
	                <td></td>
            	</tr>
            	<tr>
	                <td colspan="1">Rapelan OT<span style="margin-left: 7.5mm;"></span>:&nbsp;&nbsp;<?= round($rapelan_ot); ?></td>
	                <td></td>
	                <td></td>
            	</tr>
            	<tr>
	                <td colspan="1">Reward<span style="margin-left: 12.6mm;"></span>:&nbsp;&nbsp;<?= round($reward); ?> </td>
	                <td></td>
	                <td></td>
            	</tr>
            	<tr>
            		<td colspan="1"></td>
            		<td></td>
            		<td></td>
            	</tr>
            	<tr>
	                <td colspan="1">Total Gaji Bruto <span style="margin-left: 0.2mm;">&nbsp;&nbsp;:&nbsp;<?= number_format($total_gaji_bruto); ?></td>
	                <td></td>
	                <td>Total Potongan <span style="margin-left: 11mm;"></span>: <?= number_format($total_potongan) ?></td>
            	</tr>
            </table>
            <div style="width: 500mm;">
                <div style="position: fixed;margin-left:1mm;width: 177mm;height: 4mm;overflow: hidden; border-bottom: 0.5mm solid black; border-top:0.5mm solid black; ">
                    Total gaji yang diterima
                </div>
                <div style="position: fixed;margin-left: 117.5mm;width: 71mm;height: 4mm;overflow: hidden;">
                    RP <span style="margin-left: 7mm;">&nbsp;&nbsp;: <?= number_format($total_diterima); ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        // window.print();
    </script>
</body>
</html>
