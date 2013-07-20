<html>
    <form method="post">
        <table>
 <?= $model['row'] . ' ' . $model['column'] ?>
<?php
for ($index = 0; $index < $model['row']; $index++) {
?><tr><?php
    for ($index1 = 0; $index1 < $model['column']; $index1++) {
        ?><td><input type="radio" value="w" name="<?= $index . ':' . $index1?>"/>w<?php
              ?><input type="radio" value="m"  name="<?= $index . ':' . $index1?>"/>m<?php
              ?><input type="radio" value="e"  checked="checked" name="<?= $index . ':' . $index1?>"/>e<?php
              ?><input type="radio" value="l"  name="<?= $index . ':' . $index1?>"/>l</td><?php } ?></tr>
<?php
}
?>          </table>
            <input type="submit"/>
        </form>
</html>