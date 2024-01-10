<?php
	include_once "../conexao.php";
	if(isset($_POST['votar'])){
		$artigoId = (int)$_POST['artigo'];
		$ponto = (int)$_POST['ponto'];

		$pegaArtigo = $pdo->prepare("SELECT votos, pontos FROM `rates` WHERE `id` = ?");
		$pegaArtigo->execute(array($artigoId));
		while($row = $pegaArtigo->fetchObject()){
			$pontosUpd = ($row->pontos+$ponto);
			$votosUpd = ($row->votos+1);

			$atualizaArtigo = $pdo->prepare("UPDATE `rates` SET `votos` = ?, `pontos` = ? WHERE `id` = ?");
			if($atualizaArtigo->execute(array($votosUpd, $pontosUpd, $artigoId))){
				$calculate = round(($pontosUpd/$votosUpd),1);
				die(json_encode(array('average' => $calculate, 'votos' => $votosUpd)));
			}
		}
	}
?>