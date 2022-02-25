<?php
			require __DIR__."../DataBase/conexao.php";
			
				$nome_Prod = $_POST['nome_Prod'];
				$desc_Prod = $_POST['desc_Prod'];
				$preco_Prod = $_POST['preco_Prod'];
				$image = $_FILES['img_Prod'] ['name'];

				$_UP['pasta'] = './produtos.php/';
                $_UP['tamanho'] = 1024*1024*100;

				$_UP['extensoes'] = array('png','jpg','JPEG','gif');

				$_UP['renomeia'] = false;

				//Array com os tipos de erros de upload do PHP
			$_UP['erros'][0] = 'Não houve erro';
			$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
			$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
			$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
			$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			
			//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
			if($_FILES['arquivo']['error'] != 0){
				die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['img_Prod']['error']]);
				exit; //Para a execução do script
			}
			
			//Faz a verificação da extensao do arquivo
		
			
			//Faz a verificação do tamanho do arquivo
			else if ($_UP['tamanho'] < $_FILES['img_Prod']['size']){
				echo "
					<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/upload_imagem.php'>
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
				";
			}
			
			//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
			else{
				//Primeiro verifica se deve trocar o nome do arquivo
				if($UP['renomeia'] == true){
					//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
					$nome_final = time().'.jpg';
				}else{
					//mantem o nome original do arquivo
					$nome_final = $_FILES['img_Prod']['name'];
				}
				//Verificar se é possivel mover o arquivo para a pasta escolhida
				if(move_uploaded_file($_FILES['img_Prod']['name'], $_UP['pasta']. $nome_final)){
					//Upload efetuado com sucesso, exibe a mensagem
					$sql = "INSERT INTO produtos (
						nome,descricao,valor,imagem)
                         VALUES('$nome_Prod','$desc_Prod','$preco_Prod','$nome_final')";
					$query = mysqli_query($conexao,$sql);
				
				echo"
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/upload_imagem.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem cadastrada com Sucesso.\");
						</script>
					";	
				}
				else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/upload_imagem.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada com Sucesso.\");
						</script>
					";
				}
			}
			
		?>