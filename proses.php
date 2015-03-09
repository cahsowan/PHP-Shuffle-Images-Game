<?php
$images = json_decode(file_get_contents("new_order.txt"), true);
$correct_answer = array_keys($images);

if ($_POST) {
	$input = trim($_POST['answer']);

	if (empty($input)) {
		die('silahkan mengisi jawaban');
	}

	$your_answer = explode(",", strtoupper($input));

	if (count($your_answer) < 6) {
		die('jawaban tidak lengkap 6 karakter');
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cek Jawaban</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<ol>
		<?php foreach ($your_answer as $key): ?>
			<li><img src="<?php echo $images[$key] ?>"></li>
		<?php endforeach ?>
	</ol>
	<hr>
	<?php if ($your_answer == $correct_answer): ?>
		<h3>Jawaban Benar</h3>
	<?php else: ?>
		<h3>Jawaban salah</h3>
	<?php endif ?>
</body>
</html>