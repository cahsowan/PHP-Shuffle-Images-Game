<?php
require 'helpers.php';

$labels = ["A", "B", "C", "D", "E", "F"];
$pics = [
	'img/1.jpg',
	'img/2.jpg',
	'img/3.jpg',
	'img/4.jpg',
	'img/5.jpg',
	'img/6.jpg'
];

$images = array_combine($labels, $pics);

// acak array gambar
shuffle_assoc($images);

// simpan urutan teracak
$shuffled = array_combine($labels, array_keys($images));
asort($shuffled);
$new_order = array_combine(array_keys($shuffled), $pics);
file_put_contents('new_order.txt', json_encode($new_order));

?>

<html>
<head>
	<title>Acak Gambar</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<ol>
	<?php $number = 0; ?>
	<?php foreach($images as $label => $pic): ?>
		<li>
			<span><?php print $labels[$number] ?></span>
			<img src="<?php print $pic ?>">
			<?php $number++; ?>
		</li>
	<?php endforeach; ?>
	</ol>

	<hr>
	<form action="proses.php" method="POST">
		<p>urutkan gambar, pisahkan abjad dengan koma</p>
		<input type="text" name="answer">
		<button type="submit">Cek Jawaban</button>
	</form>
</body>
</html>