<form method="post" action="admin.php?page=cms-konferencje&view=form&action=save">
  <table class="form-table">
    <tbody>
      <tr class="form-field">
        <th>
          <label for="cms-konferencje-speaker">Speaker:</label>
        </th>
        <td>
          <select id="cms-konferencje-speaker" name="entity[speaker]" required="required">
            <?php
              foreach (get_users() as $user) {
                echo '<option value="' . $user->data->ID . '">' . $user->data->display_name . '</option>';
              }
            ?>
          </select>
          <p class="description">To pole jest wymagane</p>
        </td>
      </tr>
      <tr class="form-field">
        <th>
          <label for="cms-konferencje-places-limit">Limit miejsc:</label>
        </th>
        <td>
          <input type="number" min="-1" id="cms-konferencje-places-limit" name="entity[places_limit]" required="required" />
          <p class="description">To pole jest wymagane, -1 oznacza brak limitu</p>
        </td>
      </tr>
      <tr class="form-field">
        <th>
          <label for="cms-konferencje-price">Cena za osobę:</label>
        </th>
        <td>
          <input type="number" min="0" step="0.01" id="cms-konferencje-price" name="entity[price]" required="required" />
          <p class="description">To pole jest wymagane, musi być większa lub równa 0</p>
        </td>
      </tr>
      <tr>
        <th>
          <label for="cms-konferencje-published">Opublikowano:</label>
        </th>
        <td>
          <input type="checkbox" id="cms-konferencje-published" name="entity[published]" />
        </td>
      </tr>
    </tbody>
  </table>
  <p class="submit">
    <a href="#" class="button-secondary">Wstecz</a>
    &nbsp;
    <input type="submit" class="button-primary" value="Zapisz" />
  </p>
</form>
