
<div class="main">
  <div class="main-inner">
    <div class="container">
     <div class="row">
     
     		
            <div class="span12">
            
            <?php
				if(isset($_GET['acao'])){
					$acao = $_GET['acao'];
					if($acao=='welcome'){
						echo 
               '<div class="alert alert-info">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Olá, '.$nomeLogado.'!</strong> Seja Bem vindo ao <strong>WVA System</strong> !
               </div>';
					}
				}
			 ?>  
      		</div>
            
            
            <div class="span12">	      		
	      		<div id="target-1" class="widget">	      			
	      			<div class="widget-content">	      				
			      		<h1>WVA System - Apresentação</h1>			      		
			      		<p>O <strong>WVA System</strong> é um Sistema de Postagem desenvolvido pelo canal '<strong>Web Vídeo Aulas</strong>', cujo objetivo é gerenciar toda parte de postagens e
                        algumas funções internas do próprio sistema.	<br>
                        O Sistema foi desenvolvido na linguagem <strong>PHP</strong>, utilizando juntamente com a classe <strong>PDO</strong>. O banco de dados utilizado é o famoso <strong>MySQL</strong>.</p>
                        
                        <p>O desenvolvimento desse Sistema tem como objetivo, ensinar aos apaixonados por <strong>Web Design</strong>, ensinar uma maneira de desenvolver
                        um sistema p/ gerenciamento de dados, seja ele para um site instituicional, portal de notícias, loja virtual, etc.</p>
                        
                        <p>Espero que todos tenha um ótimo aprendizado, que vocês usem os conceitos aprendidos nesse projeto p/ aplicações em outros.</p>
                        <p><strong>Forte abraço, e até a próxima!</strong></p>
                        
		      		</div> <!-- /widget-content -->
	      		</div> <!-- /widget -->
      		</div><!-- span 12 -->
            
            
    </div><!-- row -->  
    
    
   
<?php
	//excluir
	if(isset($_GET['delete'])){
		$id_delete = $_GET['delete'];
		
		// seleciona a imagem
		$seleciona = "SELECT * from tb_postagens WHERE id= :id_delete";
		try{
			$result = $conexao->prepare($seleciona);	
			$result->bindParam('id_delete',$id_delete, PDO::PARAM_INT);		
			$result->execute();
			$contar = $result->rowCount();
			if($contar>0){
				$loop = $result->fetchAll();
				foreach ($loop as $exibir){
				}
				
				$fotoDeleta = $exibir['imagem'];
				$arquivo = "../upload/postagens/" .$fotoDeleta;
				unlink($arquivo);
				
				
				// exclui o registo
				$seleciona = "DELETE from tb_postagens WHERE id=:id_delete";
				try{
					$result = $conexao->prepare($seleciona);
					$result->bindParam('id_delete',$id_delete, PDO::PARAM_INT);				
					$result->execute();
					$contar = $result->rowCount();
					if($contar>0){
						echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Sucesso!</strong> O post foi excluído.
                </div>';
					}else{
						echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro!</strong> Não foi possível excluir o post.
                </div>';	
					}				
					
					}catch (PDOWException $erro){ echo $erro;}			}			
		}catch (PDOWException $erro){ echo $erro;}
			
	}

?> 

           
     
        
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Últimos Posts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Nº</th>
                    <th> Título da Postagem </th>
                    <th> DATA</th>
                    <th> Resumo</th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
<?PHP
include("functions/limita-texto.php");
$select = "SELECT * from tb_postagens ORDER BY id DESC LIMIT 5";
$contagem =1;
		
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
                    <td> <?php echo limitarTexto($mostra->descricao, $limite=200)?> </td>
                    <td class="td-actions"><a href="home.php?acao=editar-postagem&id=<?php echo $mostra->id;?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-edit"> </i></a>
                    
                    <a href="home.php?delete=<?php echo $mostra->id;?>" class="btn btn-danger btn-small" onClick="return confirm('Deseja realmente exluir o post?')"><i class="btn-icon-only icon-remove"> </i></a></td>
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
          </div>
          <!-- /widget --> 
          
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