<?php
session_start();
include "../../connection/connection.php";
$sql = "SELECT * FROM tbl_dados_pessoais WHERE id_dados_pessoais = " . $_SESSION['idLogado'] . " ";
$insert = mysqli_query($conn, $sql);

$fetch = mysqli_fetch_assoc($insert);
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<head>
    <title>Seus dados</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<?php 

    include "../../components/header.php";

?>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1><?php echo $_SESSION['username'] ?></h1>
        </div>
        <div class="col-sm-2"><a href="../../index.php" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="../../images/icones/brand header.png"></a></div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->


            <div class="text-center">
                <img src="../../images/users/<?php echo $_SESSION['image'] ?>" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Entre com uma foto diferente ....</h6>
                <input type="file" class="text-center center-block file-upload">
            </div>
            </hr><br><br>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">



            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form" action="./trocaDados.php" method="post" id="registrationForm">
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h4>Nome</h4>
                                </label>
                                <input type="text" class="form-control" name="nome" id="nome" placeholder="first name" title="enter your first name if any." value="<?php echo $fetch['nome'] ?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="phone">
                                    <h4>Telefone</h4>
                                </label>
                                <input type="text" class="form-control" name="telefone" id="telefone" placeholder="enter phone" title="enter your phone number if any." value="<?php echo $fetch['telefone'] ?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." value="<?php echo $fetch['email'] ?>">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="cpf">
                                    <h4>CPF</h4>
                                </label>
                                <input type="text" class="form-control" name="cpf" id="cpf" title="Entre com seu CPF." value="<?php echo $fetch['cpf'] ?>">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="categoria">
                                    <h4>Categoria</h4>
                                </label>
                                <input type="text" disabled class="form-control" name="categoria" id="categoria" title="Sua categoria." value="<?php echo $_SESSION['category'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Resetar</button>
                            </div>
                        </div>

                    </form>

                    <hr>

                </div>
                <!--/tab-pane-->



            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>
<!--/row-->