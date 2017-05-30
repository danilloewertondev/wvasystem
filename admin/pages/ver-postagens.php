<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
     <div class="row">
     <div class="span12">
<?php 
   	//excluir
	if(isset($_GET['delete'])){
		$id_delete = $_GET['delete'];
		
	if($nivelLogado==1){
			//seleviona a imagem para poder apagar
			$seleciona= "SELECT * from tb_postagens WHERE id=:id_delete";
			try	{
				$result = $conexao->prepare($seleciona);			
				$result->bindParam('id_delete',$id_delete,PDO::PARAM_INT);
				$result->execute();
				$contar = $result->rowCount(); 
				if($contar>0){
					$loop = $result->fetchAll();
					foreach($loop as $exibir){
					}
						$fotoDeleta = $exibir['imagem'];
						$arquivo = "../upload/postagens/".$fotoDeleta;//seleciona foto na pasta
						unlink($arquivo);//func php q apaga o arquivo
								
					//excluir o registro
				$seleciona= "DELETE from tb_postagens WHERE id=:id_delete";
			try	{
					$result = $conexao->prepare($seleciona);			
					$result->bindParam('id_delete',$id_delete,PDO::PARAM_INT);
					$result->execute();
					$contar = $result->rowCount(); 
					if($contar>0){
					echo '<div class="alert alert-success">
							  <button type="button" class="close" data-dismiss="alert">×</button>
							  <strong>Sucesso!</strong> O post foi excluido.
						</div>';
					}else{
					echo '<div class="alert alert-danger">
							  <button type="button" class="close" data-dismiss="alert">×</button>
							  <strong>Erro:</strong> Não foi possível excluir o post.
						</div>';
					}
				}catch(PDOException $erro){echo $erro;}
				
			}
				
			
			}catch(PDOException $erro){echo  $erro;}
			
		}
		else{
			
			echo '<div class="alert alert-danger">
						  <button type="button" class="close" data-dismiss="alert">×</button>
						  <strong>Erro:</strong> Seu nivel de usuario nao permite a exclusao de registro.
					</div>';
			
			}
			}
	   ?>
      
   </div>
     
     	            
            <div class="span12">	      		
	      		
                
                <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Visualizar Posts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                  	<th>Nº</th>
                    <th> Título da Postagem </th>
                    <th> Data</th>
                    <th> Imagem</th>
                    <th> Exibição</th>
                    <th> Resumo</th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                
		<?php
include("functions/limita-texto.php");

	if(empty($_GET['pg'])){}
	else{
	$pg=$_GET['pg'];
	/*para evitar sql injection*/
	if(!is_numeric($pg)){
		echo '<script Language= "JavaScript">
				 location.href="home.php?acao=ver-postagens"; 
				</script>';
	
	}


}





if(isset($pg)){$pg = $_GET['pg'];}else{ $pg =1;}
	if(isset($_POST['palavra-busca'])){
		$quantidade = 1000;//controla a quantidade de postagem que vai vizualizar por pagina
		}else{
			$quantidade = 10;
			
			}
	
	$inicio = ($pg*$quantidade) -$quantidade; //para saber de onde tem que começar
	
	if(isset($_POST['palavra-busca'])){
	$busca = addslashes($_POST['palavra-busca']);
	$select = "SELECT * FROM tb_postagens WHERE titulo LIKE '%$busca%' OR descricao LIKE '%$busca%' ORDER BY id DESC LIMIT $inicio, $quantidade";	
}else{
	$select = "SELECT * from tb_postagens ORDER BY id DESC LIMIT $inicio, $quantidade";
}
		

$contagem =0;
		
		try{
			$result = $conexao->prepare($select);			
			$result->execute();
			$contar = $result->rowCount();
			if($contar>0){
				while($mostra = $result->FETCH(PDO::FETCH_OBJ)){
?>           
                  <tr>
                  	<td><?php echo $contagem++;?></td>
                  	<td> <?php echo $mostra->titulo;?> </td>
                    <td> <?php echo $mostra->data;?> </td>
                    <td> <img src="../upload/postagens/<?php echo $mostra->imagem;?>"width="50"/> </td>
                    <td> <?php echo $mostra->exibir;?> </td>
                    <td> <?php echo limitarTexto($mostra->descricao, $limite=100);?> </td>
                    <td class="td-actions"><a href="home.php?acao=editar-postagem&id=<?php echo $mostra->id;?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i></a>
                    
                    <a href="home.php?acao=ver-postagens&pg=<?php echo $pg?>&delete=<?php echo $mostra->id;?>" class="btn btn-danger btn-small" onClick="return confirm('Deseja realmente exluir o post?')"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
<?php
}				
			}else{
				echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Aviso!</strong> Não há post cadastrado em nosso banco de dados.
                </div>';
			}
			
		}catch(PDOException $e){
			echo $e;
		}
?>                  
                  
                
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
        
        <style>
/* paginacao */

.paginas{width:100%;padding:10px 0;text-align:center;background:#fff;height:auto;margin:10px auto;}
.paginas a{width:auto;padding:4px 10px;background:#eee;color:#333;margin:0px 2.5px; }
.paginas a:hover{text-decoration:none;background:#00BA8B; color:#fff;}

<?php
	if(isset($_GET['pg'])){
		$num_pg = $_GET['pg'];	
	}else{$num_pg = 1;}
?>

.paginas a.ativo<?php echo $num_pg;?>{background:#00BA8B; color:#fff;}

</style>
            
<!-- inicio botoes-->
<?php 

	if(isset($_POST['palavra-busca'])){
		$busca = addslashes($_POST['palavra-busca']);
		$sql = "SELECT * FROM tb_postagens WHERE titulo LIKE '%$busca%' OR descricao LIKE '%$busca%'";	
	}else{
		$sql = "SELECT * from tb_postagens";
	}



	
	try{
			$result = $conexao->prepare($sql);			
			$result->execute();
			$totalRegistros = $result->rowCount();//conta total de registros no BD
			
		}catch(PDOException $e){
			echo $e;
		}
		//se encontrar registros e esse total for menor do que a quantidade n faz nada, caso contrario vai criar uma variavel pagina.
		if($totalRegistros <= $quantidade){}
		else{
			$paginas = ceil($totalRegistros/$quantidade);
			if($pg > $paginas){
				echo '<script Language= "JavaScript">
				 location.href="home.php?acao=ver-postagens"; 
				</script>';	}
				
			$links = 5;
			
			if(isset($i)){}
				else{$i=1;}//contador para usar no for
			

?>
<div class="paginas">

	<a href="home.php?acao=ver-postagens&pg=1">Primeira Página</a>

    
    <?php
			if(isset($_GET['pg'])){
			$num_pg = $_GET['pg'];	
		}
		
		for($i = $pg-$links; $i <= $pg-1; $i++){
			if($i<=0){}
			else{ 
	?>
     
    <a href="home.php?acao=ver-postagens&pg=<?php echo $i;?>"  class="ativo<?php echo $i;?>"><?php echo $i;?></a>
     
         
<?php  }} ?>
    
    
    <a href="home.php?acao=ver-postagens&pg=<?php echo $pg;?>" class="ativo<?php echo $i;?>"><?php echo $pg;?></a>
    

<?php
	for($i = $pg+1; $i <= $pg+$links; $i++){
		if($i>$paginas){}
		else{
?>
			
	<a href="home.php?acao=ver-postagens&pg=<?php echo $i;?>" class="ativo<?php echo $i;?>"><?php echo $i;?></a>		
		
<?php
		}
	}
?>

<a href="home.php?acao=ver-postagens&pg=<?php echo $paginas;?>">Última página</a>		

    

</div><!-- paginas -->





<?php
		}
?>

                
      		</div><!-- span 12 -->
            
            
    </div><!-- row -->        
     
        
          
          
        </div>
        <!-- /span6 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<script type="text/javascript" src="editor/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>

 

