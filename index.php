<?php
	require_once("admin/conexao/conecta.php");
	require("admin/functions/limita-texto.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Postagem com PHP PDO</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="css/estilo.css" media="all">
</head>

<body>

	<div class="divcenter">
    
    
    	<ul class="boxposts">
        
<?php

if(empty($_GET['pg'])){}
else{ 
$pg =$_GET['pg'];
if(!is_numeric($pg)){
	
	echo '<script language= "JavaScript">
					location.href="index.php";
		</script>';
}

}


if(isset($pg)){ $pg = $_GET['pg'];}else{ $pg = 1;}

$quantidade = 3;
$inicio = ($pg*$quantidade) - $quantidade;


	$sql = "SELECT * from tb_postagens WHERE exibir='Sim' ORDER BY id DESC LIMIT $inicio, $quantidade";
	try{
		$resultado = $conexao->prepare($sql);
		$resultado->execute();
		$contar = $resultado->rowCount();
		
		if($contar > 0 ){
			while($exibe = $resultado->fetch(PDO::FETCH_OBJ)){
?>        
        	<li>            	
                <span class="thumb">
                	<img src="upload/postagens/<?php echo $exibe->imagem;?>" alt="<?php echo $exibe->titulo;?>" title="<?php echo $exibe->titulo;?>" width="166" height="166">
                </span>                
                <span class="content">
                	<h1><?php echo $exibe->titulo;?></h1>
                    <p><?php echo limitarTexto($exibe->descricao, $limite=380)?></p> 
                    <div class="footer_post">
                    	<a href="post.php?id=<?php echo $exibe->id;?>">Leia o artigo completo</a>
                        <span class="datapost">Data de Publicação: <strong><?php echo $exibe->data;?></strong></span>                        
                    </div><!-- footer post -->                    
                </span>                
            </li>  
<?php
}//while
	}else{
		echo '<li>Não existe post cadastrados no sistema</li>';
	}
				
	}catch(PDOException $erro){ echo $erro;}
?>            
           
                  
        </ul>
        
        
        
        


<!-- inicio botoes -->

<style>
/* paginacao */

.paginas{width:100%;padding:10px 0;text-align:center;background:#fff;height:auto;margin:10px auto;}
.paginas a{width:auto;padding:4px 10px;background:#eee;color:#333;margin:0px 2.5px;text-decoration:none;font-family:tahoma, "Trebuchet Ms", arial;font-size:13px; }
.paginas a:hover{text-decoration:none;background:#00BA8B; color:#fff;}

<?php
	if(isset($_GET['pg'])){
		$num_pg = $_GET['pg'];	
	}else{$num_pg = 1;}
?>

.paginas a.ativo<?php echo $num_pg;?>{background:#00BA8B; color:#fff;}

</style>


<?php
	$sql = "SELECT * from tb_postagens";
	try{
			$result = $conexao->prepare($sql);			
			$result->execute();
			$totalRegistros = $result->rowCount();
		}catch(PDOException $e){
			echo $e;
		}
		
		if($totalRegistros <=$quantidade){}
		else{
			$paginas = ceil($totalRegistros/$quantidade);
			if($pg > $paginas){
				echo '<script language= "JavaScript">
					location.href="index.php";
					</script>';}
			$links = 5;	
			
			if(isset($i)){}
			else{$i = '1';}

?>

<div class="paginas">

	<a href="index.php?pg=1">Primeira Página</a>
    
    <?php
		if(isset($_GET['pg'])){
			$num_pg = $_GET['pg'];	
		}
		
		for($i = $pg-$links; $i <= $pg-1; $i++){
			if($i<=0){}
			else{ 
	?>
     
    <a href="index.php?pg=<?php echo $i;?>"  class="ativo<?php echo $i;?>"><?php echo $i;?></a>
     
         
<?php  }} ?>
    
    
    <a href="index.php?pg=<?php echo $pg;?>" class="ativo<?php echo $i;?>"><?php echo $pg;?></a>
    

<?php
	for($i = $pg+1; $i <= $pg+$links; $i++){
		if($i>$paginas){}
		else{
?>
			
	<a href="index.php?pg=<?php echo $i;?>" class="ativo<?php echo $i;?>"><?php echo $i;?></a>		
		
<?php
		}
	}
?>

<a href="index.php?pg=<?php echo $paginas;?>">Última página</a>		

    

</div><!-- paginas -->





<?php
		}
?>

<!-- fim botoes paginacao -->            
        
        
        
        
        
        
    	
    
    </div><!-- div center -->


</body>
</html>