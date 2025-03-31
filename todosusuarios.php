<html>
<?php
require_once('conexao.php');

$sql = "SELECT * FROM usuario";
$resultado = mysqli_query($conn, $sql);

if ($resultado->num_rows < 1) {
    echo "Nenhum usuário cadastrado";
} else { ?>

    <body>


        <table>
            <tr>
                <th>Nome:</td>
                <th>Email:</td>
            </tr>

            <?php
            while ($row = $resultado->fetch_assoc()) {

                $nome = $row['nome'];
                $email = $row['email'];
            ?>
                <tr>
                    <td><?php echo $nome ?></td>
                    <td><?php echo $email ?></td>
                </tr>

        <?php
            }
        }
        ?>

        </table>
    </body>

</html>