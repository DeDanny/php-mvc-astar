<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            @import './media/css/reset.css';
            @import './media/css/select.css';
        </style>
        <script src="./media/javascript/jquery-2.0.3.js" type="text/javascript"></script>
        <script src="./media/javascript/select.js" type="text/javascript"></script>

    </head>
    <form method="post" action="?request=main/draw">
        <input type="submit"/>
        <table>
            <?php
            for ($column = 0; $column < $model['row']; $column++) {
                ?><tr><?php
                    for ($row = 0; $row < $model['column']; $row++) {
                        $id = $model['getObject']($row, $column);
                        ?><td>
                            <div class="preview <?= GroundTypes::getName($id)?>" id="<?= $row . '_' . $column ?>">&nbsp;</div>
                            <?php
                            ?><input type="radio" value="<?= GroundTypes::grass ?>" name="<?= $row . ':' . $column ?>" <?php echo $model['isGrass']($id) ?>        />g<?php
                            ?><input type="radio" value="<?= GroundTypes::lava ?>" name="<?= $row . ':' . $column ?>" <?php echo $model['isLava']($id) ?>          />l<?php
                            ?><input type="radio" value="<?= GroundTypes::water; ?>" name="<?= $row . ':' . $column ?>" <?php echo $model['isWater']($id) ?>       />w<?php
                            ?><input type="radio" value="<?= GroundTypes::mountain ?>" name="<?= $row . ':' . $column ?>" <?php echo $model['isMountain']($id) ?>  />m<?php
                            ?><input type="radio" value="<?= GroundTypes::sand ?>" name="<?= $row . ':' . $column ?>" <?php echo $model['isSand']($id) ?>          />s<?php
                            ?></td><?php }
                        ?></tr>
                <?php
            }
            ?></table>
    </form>
</html>