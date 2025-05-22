<?php
// ticket_form.php
?>
<form action="ticket_submit.php" method="post">
  고객성명: <input type="text" name="customer" required>
  <br><br>
  <table border="1">
    <tr>
      <th>No</th><th>구분</th><th>어린이</th><th>어른</th><th>비고</th>
    </tr>
    <?php
    $tickets = [
        ["입장권", 7000, 10000, "입장"],
        ["BIG3", 12000, 16000, "입장+놀이3종"],
        ["자유이용권", 21000, 28000, "입장+놀이자유"],
        ["연간이용권", 70000, 90000, "입장+놀이자유"],
    ];

    foreach ($tickets as $i => $ticket):
    ?>
    <tr>
      <td><?= $i + 1 ?></td>
      <td><?= $ticket[0] ?><input type="hidden" name="item[<?= $i ?>][name]" value="<?= $ticket[0] ?>"></td>
      <td>
        <?= number_format($ticket[1]) ?>
        <select name="item[<?= $i ?>][child_qty]">
          <?php for ($j = 0; $j <= 5; $j++): ?>
            <option value="<?= $j ?>"><?= $j ?></option>
          <?php endfor; ?>
        </select>
        <input type="hidden" name="item[<?= $i ?>][child_price]" value="<?= $ticket[1] ?>">
      </td>
      <td>
        <?= number_format($ticket[2]) ?>
        <select name="item[<?= $i ?>][adult_qty]">
          <?php for ($j = 0; $j <= 5; $j++): ?>
            <option value="<?= $j ?>"><?= $j ?></option>
          <?php endfor; ?>
        </select>
        <input type="hidden" name="item[<?= $i ?>][adult_price]" value="<?= $ticket[2] ?>">
      </td>
      <td><?= $ticket[3] ?></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <br>
  <button type="submit">합계</button>
</form>
