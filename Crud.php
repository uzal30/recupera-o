
<?php

require_once './Connection.php';

function create($produto)
{
    try {
        $con = getConnection();

        $stmt = $con->prepare("INSERT INTO produto(nm_produto, preco_produto, qtd_produto, marca_produto, num_serie) VALUES (:nm_produto, :preco_produto, :qtd_produto, :marca_produto, :num_serie)");

        $stmt->bindParam(":nm_produto", $produto->nm_produto);
        $stmt->bindParam(":preco_produto", $produto->preco_produto);
        $stmt->bindParam(":qtd_produto", $produto->qtd_produto);
        $stmt->bindParam(":marca_produto", $produto->marca_produto);
        $stmt->bindParam(":num_serie", $produto->num_serie);

        if ($stmt->execute())
            echo "Produto cadastrado com sucesso";
    } catch (PDOException $error) {
        echo "Erro ao cadastrar o produto. Erro: {$error->getMessage()}";
    } finally {
        unset($con);
        unset($stmt);
    }
}

#create test
$produto = new stdClass();
$produto->nm_produto = "Geladeira";
$produto->preco_produto = 2000;
$produto->qtd_produto = 5;
$produto->marca_produto = "Brastemp";
$produto->num_serie = 79322424;
create($produto);
echo "<br><br><br><br>";

    function get()
    {
        try {
            $con = getConnection();

            $rs = $con->query("SELECT nm_produto, preco_produto, qtd_produto, marca_produto, num_serie FROM produto");

            while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
                echo "nm_produto: " . $row->nm_produto . " <br> produto: ";
                echo $row->preco_produto . "<br> preco_produto: ";
                echo $row->qtd_produto . "<br> <br>";
                echo $row->marca_produto . "<br> <br>";
                echo $row->num_serie . "<br> <br>";
            }
        } catch (PDOException $error) {
            echo "Erro listando produtos. Error: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }

    echo "Lista de produtos <br><br><br><br>";
    get($produto);

    function find($preco_produto)
    {
        try {
            $con = getConnection();

            $stmt = $con->prepare("SELECT nm_produto, preco_produto, qtd_produto, marca_produto, num_serie FROM produto WHERE preco_produto LIKE :preco_produto");
            $stmt->bindValue(":preco_produto", "%{$preco_produto}%");


            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {


                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                        echo "nm_produto: " . $row->nm_produto . " <br> produto: ";
                        echo $row->preco_produto . "<br> preco_produto: ";
                        echo $row->qnt_produto . "<br> <br>";
                        echo $row->marca_produto . "<br> <br>";
                        echo $row->num_serie . "<br> <br>";
                    }
                }
            }
        } catch (PDOException $error) {
            echo "Erro quando procurando o produto. Error: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }
    echo "Produtos achados com sucesso<br><br>---<br><br>";
    find("v");

    echo "---<br><br>";

    function update($produto)
    {
        $con = getConnection();


        try {

            $stmt = $con->prepare("UPDATE produto SET nm_produto = :nm_produto, preco_produto = :preco_produto, qtd_produto = :qtd_produto, marca_produto = :marca_produto, num_serie = :num_serie WHERE cod_produto = :pod_produto");

            $stmt->bindParam(":cod_produto", $aluno->cod_produto);
            $stmt->bindParam(":nm_produto", $aluno->nm_produto);
            $stmt->bindParam(":preco_produto", $aluno->preco_produto);
            $stmt->bindParam(":qtd_produto", $aluno->qtd_produto);
            $stmt->bindParam(":marca_produto", $aluno->marca_produto);
            $stmt->bindParam(":num_serie", $aluno->num_serie);

            if ($stmt->execute()) :
                echo "Produtos atualizados com sucesso";
            endif;
        } catch (PDOException $error) {
            echo "Erro ao atualizar os produtos. Error: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }

    function delete($cod_produto)
    {
        $con = getConnection();


        try {

            $stmt = $con->prepare("DELETE FROM aluno WHERE cod_produto = ?");

            $stmt->bindParam(1, $cod_produto);

            if ($stmt->execute()) :
                echo "Produto deletado com sucesso.";
            endif;
        } catch (PDOException $error) {
            echo "Erro ao deletar um produto. Error: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }