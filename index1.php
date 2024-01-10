<?php
	include_once "rate/conexao.php";
?>
<?php include("includes/header.php"); ?>

<?php include("includes/navigation.php"); ?>
        
		
	<img src="images/5.jpg" class="w-100 d-block">	
	<div class="my-5 px-4">
	<h2 class=" fw-bold h-font text-center">Părerea ta contează</h2>
	<div class="h-line bg-dark"></div>

            </div>
            <div class="container">
                <div class="section_title text-center">
                    <br>
                    <h6>Vă rugăm să ne evaluați serviciile oferite în urma experienței voastre avute la Pensiunea Casa Cristina</h6>
                </div>
<html lang="pt-BR">
	<head>
		<meta charset=UTF-8>
		<title>Mergi înapoi</title>
	</head>

	<body>
		<ul>
			<?php
				$selecao = $pdo->prepare("SELECT * FROM `rates` ORDER BY `id` DESC");
				$selecao->execute();
				while($row = $selecao->fetchObject()){
			?>
			<li><a href="rate/single.php?id=<?php echo $row->id;?>"><?php echo utf8_encode($row->titulo);?></a></li>
			<?php }?>
		</ul>
	</body>
</html>