<?php
require 'helpers.php';

$names = ["anggur", "apel", "jeruk", "mangga", "melon", "pisang"];
$images = [
	'A' => 'buah/anggur.jpg',
	'B' => 'buah/apel.jpg',
	'C' => 'buah/jeruk.jpg',
	'D' => 'buah/mangga.jpg',
	'E' => 'buah/melon.jpg',
	'F' => 'buah/pisang.jpg'
];

if (! $_POST) {
	// acak array gambar
	shuffle_assoc($images);

	$new_order = array_keys($images);
	file_put_contents("buah.txt", json_encode($new_order));
}

$correct_answer = json_decode(file_get_contents("buah.txt"), true);
?>

<html>
<head>
	<title>Urutkan</title>
</head>
<body>
	<ol>
		<?php if ($_POST): ?>
			<?php foreach ($correct_answer as $item): ?>
				<li><img style="width: 100px" src="<?php echo $images[$item] ?>"></li>
			<?php endforeach ?>
		<?php else: ?>
			<?php foreach ($images as $item): ?>
				<li><img style="width: 100px" src="<?php echo $item ?>"></li>
			<?php endforeach ?>
		<?php endif ?>
	</ol>

	<ol>
		<?php foreach ($names as $item): ?>
			<li type="A"><?php echo $item ?></li>
		<?php endforeach ?>
	</ol>

	<hr>
	<form action="<?php $PHP_SELF ?>" method="POST">
		<p>Urutkan gambar, pisahkan abjad dengan koma</p>

		<input type="text" name="answer">
		<button type="submit">Cek Jawaban</button>
		<a href="http://localhost:3000/buah.php">Ulangi Lagi</a>
	</form>

<?php
if ($_POST) {
	$input = trim($_POST['answer']);

	if (empty($input)) {
		print('<h2>silahkan isi jawaban</p>');
	} else {
		$your_answer = explode(",", strtoupper($input));

		if (count($your_answer) < 6) {
			print('<h2>jawaban tidak lengkap 6 karakter<h2>');
		} else {
			if ($your_answer == $correct_answer) {
				print('<h2>jawaban benar<h2>');
			} else {
				print('<h2>jawaban salah<h2>');	
			}
		}
	}
}
?>

</body>
</html>