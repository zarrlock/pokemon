<?php
if (!empty($pokemons)): ?>
    <section>
        <table>
            <?php foreach ($pokemons as $pokemon): ?>
                <tr>
                    <td><?= $pokemon->__get('id'); ?></td>
                    <td><?= $pokemon->__get('name'); ?></td>
                    <td><img src="<?= $pokemon->__get('sprite'); ?>"></td>
                    <td>
                        <form action="" method="post">

                            <input type="hidden" name="id" value="<?= $pokemon->__get('id'); ?>">
                            <input type="submit" value="Supprimer" name="deletepokemon">

                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
<?php endif; ?>