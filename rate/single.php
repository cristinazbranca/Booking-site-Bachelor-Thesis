<?php
	include_once "conexao.php";
?>




<html lang="pt-BR">
<head>
	<meta charset=UTF-8>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/avaliations.js"></script>
	<meta charset="utf-8">
    
</head>

	<body>
		 
<?php
	$id = (int)$_GET['id'];
	$pegaArtigo = $pdo->prepare("SELECT * FROM `rates` WHERE id = ?");
	$pegaArtigo->execute(array($id));
	while($artigo = $pegaArtigo->fetchObject()){
		$calculo = ($artigo->pontos == 0) ? 0 : round(($artigo->pontos/$artigo->votos), 1);
?>
<h2><?php echo utf8_encode($artigo->titulo);?> - <a href="../index1.php">Mergi înapoi</a></h2>
<span class="ratingAverage" data-average="<?php echo $calculo;?>"></span>
<span class="article" data-id="<?php echo $id;?>"></span>

<div class="barra">
	<span class="bg"></span>
	<span class="stars">
<?php for($i=1; $i<=5; $i++):?>


<span class="star" data-vote="<?php echo $i;?>">
	<span class="starAbsolute"></span>
</span>
<?php 
	endfor;
	echo '</span></div><p class="votos"><span>'.$artigo->votos.'</span> : Numărul de voturi</p>';
}
?>

</body>
</html>