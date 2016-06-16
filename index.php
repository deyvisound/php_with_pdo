<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require 'Conexao.php';
            
            $con = new Conexao();                        
            
            $opcao = $_REQUEST["opcao"];
            
            switch ($opcao) {
                case 1:
                    $testeInsert = "INSERT INTO `produtos`(`id`, `tipo`, `fabricante`, `modelo`, `preco`, `descricao`, `quantidade`) "
                    . "VALUES (null,'matéria prima', 'LBA Ltda.' , 'Aço Inox', '20.00', '20 reais por kg','300')";
                    $con->insert_sql($testeInsert);                    
                    break;
                case 2:
                    $testeSelect = "SELECT * FROM produtos;";
                    $array = $con->exec_fetch($testeSelect);
                    
                    foreach ($array as $value) {
                        var_dump($value);
                    }
                    
                default:
                    print "Não faça Nada!";
                    break;
            }            
        ?>
    </body>
</html>
