<!DOCTYPE html>
<html>
    <form method="post" action="?request=main/draw">
        <input type="submit"/>
        <table>
            <?php
            for ($column = 0; $column < $model['row']; $column++) {
                ?><tr><?php
                    for ($row = 0; $row < $model['column']; $row++) {
                        $object = $model['getObject']($row, $column);
                        ?><td><?php
                            ?><input type="radio" value="<?= GroundTypes::grass ?>" name="<?= $row . ':' . $column ?>" <?php echo $model['isGrass']($object) ?>        />g<br/><?php
                            ?><input type="radio" value="<?= GroundTypes::lava ?>" name="<?= $row . ':' . $column ?>" <?php echo $model['isLava']($object) ?>          />l<br/><?php
                            ?><input type="radio" value="<?= GroundTypes::water; ?>" name="<?= $row . ':' . $column ?>" <?php echo $model['isWater']($object) ?>       />w<br/><?php
                            ?><input type="radio" value="<?= GroundTypes::mountain ?>" name="<?= $row . ':' . $column ?>" <?php echo $model['isMountain']($object) ?>  />m<br/><?php
                            ?><input type="radio" value="<?= GroundTypes::sand ?>" name="<?= $row . ':' . $column ?>" <?php echo $model['isSand']($object) ?>          />s<?php
                        ?></td><?php
                    } ?></tr>
                <?php
            }
            ?></table>
    </form>
</html>