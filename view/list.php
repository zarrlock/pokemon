
<?php
if (!empty($pokemons)): ?>
    <section id="listFav">
        <table>
            <?php foreach ($pokemons as $pokemon): ?>

                <tr>
                    <td><?= $pokemon->__get('id'); ?></td>
                    <td><?= ucfirst($pokemon->__get('name')); ?></td>
                    <td><img src="<?= $pokemon->__get('sprite'); ?>"></td>
                    <td>

                        <form action="" method="post" class="delete">
                            <input type="hidden" name="id" value="<?= $pokemon->__get('id'); ?>">
                            <input type="submit" value="Supprimer" name="delete">

                        </form>

                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

<?php endif; ?>