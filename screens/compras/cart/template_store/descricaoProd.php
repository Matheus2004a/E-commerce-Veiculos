<?php
  require __DIR__ . '/../App/Controller/ProdutoController.php';
  require __DIR__ . '/../App/Controller/ClienteController.php';

  $user = new ClienteController();
	$result = $user->isLoggedIn();	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .imagem{
          
          width: 640px;
          border-radius: 10px;
          height: 400px;
      }
      .qtd{
        float:right; 
        margin-right:550px;
            margin-top:-30px  
      }
      .favoritar{
          margin-top:20px;
      margin-left:600px;
        position: absolute;
        z-index: 1;
      }
    </style>
</head>
<body>

    <div class="image" style="display: inline-block;">
      <div class="favoritar">
      <img src="images/Icons/Favoritar-peça.png" alt="" style="display: inline-block; ">
      </div>
        <?php
        $preco = $_POST[".$produto[1]."]; 
         $produto = ProdutoController::allProdutos();

       
        echo'
        <div class="product-img" style="background-image: url(images/'.$produto[4].'.jpg'.');"
        <p class="tag"><span class="new"></span></p>
        <div class="cart">
        <h3>'.$produto[1].'</h3>
        
        
        ';
      
        ?>

    </div>
    <h2 style="float:right; margin-right:500px; margin-top:50px "> Titulo Produto</h2><br>
    

    <div style="float:right; margin-right:550px; margin-top:-100px"> 
	    <img src="images/icons/star.png" > 
	    <img src="images/icons/star.png" > 
	    <img src="images/icons/star.png" > 
        <img src="images/icons/star.png" > 
	</div>
    <h3 style="float:right; margin-right:550px; margin-top:-60px "> R$ 1199,99 </h3>
    <input type="number" for="id_quantidade" name="id_quantidade" id="id_quantidade" class="qtd  input-number text-center" value="1" min="1" max="100"> 
    <button type="submit" style="float:right; margin-right:300px; margin-top:-30px"> Comprar agora</button>
    <br><br><br>

    <hr>

    
    
</body>
</html>