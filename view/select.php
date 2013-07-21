<html>
    <form method="post">
        <table>
            <?php
            for ($column = 0; $column < $model['row']; $column++) {
                ?><tr><?php
                    for ($row = 0; $row < $model['column']; $row++) {
                        $object = $model['getObject']($row, $column);
                        ?><td><?php
                        ?><input type="radio" value="w" name="<?= $row . ':' . $column ?>" <?php echo $model['isWater']($object) ?>    />w<br/><?php
                        ?><input type="radio" value="m" name="<?= $row . ':' . $column ?>" <?php echo $model['isMountain']($object) ?> />m<br/><?php
                        ?><input type="radio" value="e" name="<?= $row . ':' . $column ?>" <?php echo $model['isEarth']($object) ?>    />e<br/><?php
                        ?><input type="radio" value="l" name="<?= $row . ':' . $column ?>" <?php echo $model['isLava']($object) ?>     />l</td><?php
                    } ?></tr>
                <?php
            }
            ?></table>
        <input type="submit"/>
    </form>
</html>