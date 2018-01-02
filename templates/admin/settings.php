<div class="wrap">
    <h1>Impostazioni di lettura</h1>

    <form method="post" action="">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="slug">Slug</label></th>
                <td>
                    <input name="slug" type="text" id="slug"
                           class="text" value="<?php echo $slug; ?>"/>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="archive">Ha l'archivio</label></th>
                <td>
                    <input name="archive" type="checkbox" step="1" min="1" id="archive"
                           value="1" <?php echo $archive ? 'checked="checked"' : ''; ?>/>
                </td>
            </tr>

            </tbody>
        </table>

        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary"
                                 value="Salva le modifiche"></p></form>
</div>