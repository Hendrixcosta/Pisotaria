<?php
//Check to see if users could be found
?>
        <table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>e-mail</th>
            </tr>
            <?php if ($users) {
                foreach ($users as $user):
                    ?>
                    <tr>
                        <td><?php echo $user->get_id(); ?></td>
                        <td><?php echo $user->get_nome(); ?></td>
                        <td><?php echo $user->get_cpf(); ?></td>
                        <td><?php echo $user->get_email(); ?></td>
                    </tr>
                <?php endforeach;
            }
            ?>
        </table>
