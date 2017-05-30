<script type="text/javascript">
	jQuery(function($){
   		$("#date").mask("99/99/9999",{placeholder:"dd/mm/aaaa"});

});
</script>

<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
     <div class="row">
     
     
     	            
            <div class="span12">	      		
	      		<div id="target-1" class="widget">	
               		<div class="widget-header">
	      					<i class="icon-file"></i>
	      					<h3>Cadastrar Postagem</h3>
	  				</div> <!-- /widget-header -->
                      			
	      			<div class="widget-content">
                    <?php
	  	if(isset($_POST['cadastrar'])){
			$titulo 		= trim(strip_tags($_POST['titulo']));
			$data 			= trim(strip_tags($_POST['data']));
			$exibir 		= trim(strip_tags($_POST['exibir']));
			$descricao	 	= $_POST['descricao'];
			
							
			//INFO IMAGEM
		$file 		= $_FILES['img'];
		$numFile	= count(array_filter($file['name']));
		
		//PASTA
		$folder		= '../upload/postagens/';
		
		//REQUISITOS
		$permite 	= array('image/jpeg', 'image/png');
		$maxSize	= 1024 * 1024 * 5;
		
		//MENSAGENS
		$msg		= array();
		$errorMsg	= array(
			1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.',
			2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML',
			3 => 'o upload do arquivo foi feito parcialmente',
			4 => 'Não foi feito o upload do arquivo'
		);
		
		if($numFile <= 0){
			echo '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						Selecione uma imagem e tente novamente!
					</div>';
		}
		else if($numFile >=2){
			echo '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						Você ultrapassou o limite de upload. Selecione apenas uma foto e tente novamente!
					</div>';
		}else{
			for($i = 0; $i < $numFile; $i++){
				$name 	= $file['name'][$i];
				$type	= $file['type'][$i];
				$size	= $file['size'][$i];
				$error	= $file['error'][$i];
				$tmp	= $file['tmp_name'][$i];
				
				$extensao = @end(explode('.', $name));
				$novoNome = rand().".$extensao";
				
				if($error != 0)
					echo $msg[] = "<b>$name :</b> ".$errorMsg[$error];
				else if(!in_array($type, $permite))
					echo $msg[] = "<b>$name :</b> Erro imagem não suportada!";
				else if($size > $maxSize)
					echo $msg[] = "<b>$name :</b> Erro imagem ultrapassa o limite de 5MB";
				else{
					
					if(move_uploaded_file($tmp, $folder.'/'.$novoNome)){
						//$msg[] = "<b>$name :</b> Upload Realizado com Sucesso!";
					
			$insert = "INSERT into tb_postagens (titulo, data, imagem, exibir, descricao) VALUES (:titulo, :data, :imagem, :exibir, :descricao)";
		
		try{
			$result = $conexao->prepare($insert);
			$result->bindParam(':titulo', $titulo, PDO::PARAM_STR);
			$result->bindParam(':data', $data, PDO::PARAM_STR);
			$result->bindParam(':imagem', $novoNome, PDO::PARAM_STR);
			$result->bindParam(':exibir', $exibir, PDO::PARAM_STR);
			$result->bindParam(':descricao', $descricao, PDO::PARAM_STR);
			$result->execute();
			$contar = $result->rowCount();
			if($contar>0){
				echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Sucesso!</strong> O post foi cadastrado.
                </div>';
			}else{
				echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro ao cadastrar!</strong> Não foi possível cadastrar o post.
                </div>';
			}			
		}catch(PDOException $e){
			echo $e;
		}	
						
						
						
						
						
							
					}else
						$msg[] = "<b>$name :</b> Desculpe! Ocorreu um erro...";
				
				}
				
				foreach($msg as $pop)
				echo '';
					//echo $pop.'<br>';
			}
		}
			

			
		}
	 
	 
	 ?>	      				
			      		
                        
                        
                     <div class="tab-pane" id="formcontrols">
								<form id="edit-profile" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
								
										
										<div class="control-group">											
											<label class="control-label" for="username">Título da Postagem</label>
											<div class="controls">
												<input type="text" class="span6 disabled" id="titulo" value="" name="titulo">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="firstname">Data</label>
											<div class="controls">
												<input type="text" class="span2" id="date" value="" name="data">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="lastname">Imagem</label>
											<div class="controls">
												<input type="file" multiple class="span6 fileinput" id="imagem" name="img[]">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
                                        
                                        <div class="control-group">											
											<label class="control-label" for="username">Exibir</label>
											<div class="controls">
												<select class="span2" id="exibir"  name="exibir">
                                                	<option>Sim</option>
                                                    <option>Não</option>
                                                </select>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="email">Descrição</label>
											<div class="controls">
												<textarea class="span8" name="descricao" id="descricao" value="" rows="10"></textarea>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
                                        
                        
                        
                        				<div class="form-actions">
											<input type="submit" name="cadastrar" class="btn btn-primary" value="Salvar">
											<input type="reset" class="btn" value="Cancelar">
										</div> <!-- /form-actions -->
                  				</form>                        
                        
                        </div>
                       
                        
		      		</div> <!-- /widget-content -->
	      		</div> <!-- /widget -->
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

 

