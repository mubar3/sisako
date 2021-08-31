<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>TEMPAT LAHIR</th>
			<th>TANGGAL LAHIR</th>
			<th>ALAMAT</th>
			<th>DESA</th>
			<th>KECAMATAN</th>
			<th>KABUPATEN</th>
		</tr>

		<?php
		$no = 1;
		foreach ( $anggota as $d): ?>
			
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $d->nama ?></td>
				<td><?php echo $d->tempat_lahir ?></td>
				<td><?php echo $d->tanggal_lahir  ?></td>
				<td><?php echo $d->alamat ?></td>
				<td><?php echo $d->desa ?></td>
				<td><?php echo $d->kecamatan ?></td>
				<td><?php echo $d->kabupaten ?></td>
			</tr>

		<?php endforeach; ?>

	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>