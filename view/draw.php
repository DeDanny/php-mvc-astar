<!DOCTYPE html>
<html>
    <head>
        <style>
            @import './media/css/reset.css';
            @import './media/css/map.css';
        </style>
        <title>draw map</title>
        <script src="./media/javascript/jquery-2.0.3.js" type="text/javascript"></script>
        <script type="text/javascript">
            var jsonMap = '<?php echo json_encode($model)?>';
        </script>
        <script src="./media/javascript/lifeLine.js" type="text/javascript"></script>
    </head>
    <body>
        <h1>Demo of a A* implementation</h1>
        <table><?php for ($column = 0; $column < $model['row']; $column++) { 
         ?><tr><?php 
            for ($row = 0; $row < $model['column']; $row++) {
                
                $id =   $model[$row . ':' . $column];
            
                $cssClass = GroundTypes::getName($id);
                $tableText = GroundTypes::getName($id);
                $placable = GroundTypes::isPlacable($id);
                
                ?><td id="<?= $row . '_' . $column ?>" class="tile <?= $cssClass ?>"><?= $tableText ?><?php 
                if($placable) {
                    ?> <input type="radio" name="<?= $row . ':' . $column ?>" value="<?= $row . ':' . $column ?>" class="radio_on_map" />
                <?php } ?></td><?php 
                }
        ?></tr><?php } ?>
        </table>
    <p>Select two radio buttons.</p>
    <ol><li>The first one is the agent.</li>
        <li>The second one the food the agent will go after.</li></ol>
        <!--Hey there. Please don't burn the agent...-->
    </body>
</html>