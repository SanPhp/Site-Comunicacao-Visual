<?php
// faz o redimensionamento
        function Redimensionar($imagem, $name, $largura, $pasta){
                $img = imagecreatefromjpeg($imagem['tmp_name']);
                $x   = imagesx($img);
                $y   = imagesy($img);
                $altura = ($largura * $y)/$x;
                $nova = imagecreatetruecolor($largura, $altura);
                imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
                imagejpeg($nova, "$pasta/$name");
                imagedestroy($img);
                imagedestroy($nova);
				
	//era pra fazer o upload da imagem grande
			$foto2 = $_FILES['foto'];
			move_uploaded_file($foto2['tmp_name'], "imgG/".$name);
			return $name;
			}
?>