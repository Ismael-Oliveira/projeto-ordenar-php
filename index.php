<?php
    require("./assets/php/config.php");

    $sql = "SELECT * FROM usuarios";
    $res = $pdo->query($sql);

    $result = $res->fetchAll();
    // var_dump($res);
    // echo $res->rowCount();
    // echo count($result);
    // print_r($result);
    // exit

    if(isset($_GET['ordem']) && !empty($_GET['ordem'])){
        $ordem = addslashes($_GET['ordem']);
        
        if($ordem == "id"){
            $sql = "SELECT * FROM usuarios ORDER BY ".$ordem." DESC";
            echo $ordem;
        }else{
           $sql = "SELECT * FROM usuarios ORDER BY ".$ordem; 
        }
        
        $res = $pdo->query($sql);
        $result = $res->fetchAll();

    }else{
        $ordem = "";
    }
?>

<style>
    table{
        margin-top: 20px;
    }
</style>

<form method="get">
    <select name="ordem" id="ord" onchange="this.form.submit()">
        <option value=""></option>
        <option value="id" <?php echo ($ordem == 'id')?'selected':'';?> >Ordenar por ID</option>
        <option value="nome" <?php echo ($ordem == 'nome')?'selected':'';?>>Ordenar por None</option>
        <option value="idade" <?php echo ($ordem == 'idade')?'selected':'';?>>Ordenar por Idade</option>
    </select>
</form>



<table border="1" width="400">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
    </tr>

    <tbody>
        <?php 

            if(count($result) > 0){
    
                for($i = 0; $i < count($result); $i++ ) {
                    echo "<tr>";
                        echo "<td>".$result[$i]['id']."</td>";
                        echo "<td>".$result[$i]['nome']."</td>";
                        echo "<td>".$result[$i]['idade']."</td>";
                    echo "</tr>";                 
                }

            }

        ?>
    </tbody>
</table>