<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Print</title>

	<style type="text/css">
		table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}

			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			}

			tr:nth-child(even) {background-color: #f2f2f2;}
			img{
				max-width: 100px; height: auto; display: block;
			}
	</style>
</head>
<body>

<div id="container" style="padding-top:10px;">
	<h3>Data Aset</h3>	
	<div id="body">
		<table >
			<tr>
				<td>No</td>
				<td>Jenis Barang</td>
				<td>Kode Kegiatan</td>
				<td>Nama Kegiatan</td>
				<td>Nama Barang</td>
				<td>Harga</td>
				<td>Keterangan</td>
				<td>OPD</td>
				<td>Foto Barang</td>
			</tr>
			<tbody>
				<?php $i=1?>
				<?php foreach ($data as $key) {?>
				<tr>
				<td><?php echo $i++?></td>
				<td><?php echo $key->nama_jenis?></td>
				<td><?php echo $key->kode_kegiatan?></td>
				<td><?php echo $key->nama_kegiatan?></td>
				<td><?php echo $key->nama_barang?></td>
				<td><?php echo $key->harga_barang?></td>
				<td><?php echo date('Y', strtotime($key->tgl_barang))?></td>
				<td><?= get_status($key->id_barang);?></td>
				<td><img src="<?= base_url();?>assets/img/barang/<?= $key->img_barang;?>" width="100%" class="img-thumbnail"></td>
			<?php }?>
			</tr>
			</tbody>
		</table>

</div>

</body>
</html>