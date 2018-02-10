<form method="get" action="">
  Sortuj według
  <select name="orderby">
    <option value="id">ID</option>
    <option value="speaker">Speaker</option>
  </select>
  <select name="orderdir">
    <option value="asc">Rosnąco</option>
    <option value="desc">Malejąco</option>
  </select>
  <input type="submit" class="button-secondary" value="Sortuj" />
</form>

<form method="post" action="">
  <div class="tablenav">
    <div class="alignleft actions">
      <select name="bulkaction">
        <option value="0">Masowe działania</option>
        <option value="delete">Usuń</option>
        <option value="public">Publiczny</option>
        <option value="private">Prywatny</option>
      </select>
      <input type="submit" class="button-secondary" value="Zastosuj" />
    </div>
    <div class="tablenav-pages">
      <span class="displaying-num">4 konferencje</span>
      <span class="pagination-links">
        <a href="#" title="Idź do pierwszej strony" class="first-page disabled">&laquo;</a>&nbsp;&nbsp;
        <a href="#" title="Idź do poprzedniej strony" class="prev-page disabled">&lt;</a>&nbsp;&nbsp;
        <span class="paging-input">1 z <span class="total-pages">3</span></span>
        &nbsp;&nbsp;<a href="#" title="Idź do następnej strony" class="next-page">&gt;</a>
        &nbsp;&nbsp;<a href="#" title="Idź do ostatniej strony" class="last_page">&raquo;</a>
      </span>
    </div>
    <div class="clear"></div>
  </div>
  <table class="widefat">
    <thead>
      <tr>
        <th class="check-column"><input type="checkbox" /></th>
        <th>ID</th>
        <th>Speaker</th>
        <th>Widoczny</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td colspan="4"><p>Brak wierszy do wyświetlenia</p></td>
      </tr>

      <tr>
        <th class="check-column"><input type="checkbox" value="1" name="bulkcheck[]" /></th>
        <td>1</td>
        <td>
          Rafał Podkoński
          <div class="row-actions">
            <span class="edit">
              <a href="#" class="edit">Edycja</a>
            </span> |
            <span class="trash">
              <a href="#" class="delete">Usuń</a>
            </span> |
            <span class="news">
              <a href="#" class="news">Aktualności</a>
            </span>
          </div>
        </td>
        <td>Yes</td>
      </tr>
      <tr class="alternate">
        <th class="check-column"><input type="checkbox" value="2" name="bulkcheck[]" /></th>
        <td>2</td>
        <td>
          Michał Szafrański
          <div class="row-actions">
            <span class="edit">
              <a href="#" class="edit">Edycja</a>
            </span> |
            <span class="trash">
              <a href="#" class="delete">Usuń</a>
            </span> |
            <span class="news">
              <a href="#" class="news">Aktualności</a>
            </span>
          </div>
        </td>
        <td>No</td>
      </tr>
    </tbody>
  </table>
  <div class="tablenav">
    <div class="tablenav-pages">
      <span class="pagination-links">
        Przejdź do strony:
        &nbsp;<strong>1</strong>
        &nbsp;<a href="#">2</a>
        &nbsp;<a href="#">3</a>
      </span>
    </div>
    <div class="clear"></div>
  </div>
</form>
