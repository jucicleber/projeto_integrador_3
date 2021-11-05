<?php
include_once("connect.php");
$id_requisicao  = $_GET["id_requisicao"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
</head>

<body>
    <div class="container">
    <?php
    $query = "select r.id_requisicao, f.nome funcionario, p.nome produto, r.quantidade from requisicao r  
    join funcionarios f on r.id_funcionario = f.id_funcionario 
    join produto p on p.id_produto = r.id_produto
    where r.id_requisicao = $id_requisicao";
    
    $result = $conn->query($query);

    if ($result = $conn->query($query)) {
        while ($row = $result->fetch_row()) {  ?>
    <h1>Requisição: <?= $row['0'];  ?></h1></br>

    <h2>À Chacará São João cnpj: 1212121122121<h2><br/>

    <p>Está emprestando em caráter de empréstimo para o colaborador
    <strong> <?= $row['1']; ?>  </strong>
        sendo solicitado ao mesmo que devolva em sua saída da empresa ou em uma eventual troca, para retirada
        do seu nome.</p><br/></br></br><br/><br/>

        <table class="table table-sm">
        <thead>
    <tr>
      <th scope="col">Produto</th>
      <th scope="col">Quantidade</th>
    </tr>
  </thead>
        <tr>
                <td>
                <?= $row['2']; ?>
                </td>
                <td>
                <?= $row['3']; ?>
                </td>
            </tr> 
        </table><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

    <td><?= $row['1']; ?> </td>

    <p>Ass ______________________________________________</p>

    <?php }
    }
?>
    </div>
</body>

</html>