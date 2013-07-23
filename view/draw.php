<html>
    <head>
        <style>
            @import './media/css/reset.css';
            @import './media/css/map.css';
        </style>
    </head>
    <form method="post" action="?request=main/draw">
        <table><?php for ($column = 0; $column < $model['row']; $column++) { 
         ?><tr><?php 
            for ($row = 0; $row < $model['column']; $row++) {
                
                $id =   $model[$row . ':' . $column];
            
                $cssClass = GroundTypes::getName($id);
                $tableText = GroundTypes::getName($id);
                $placable = GroundTypes::isPlacable($id);
                
                ?><td class="tile <?= $cssClass ?>"><?= $tableText ?><?php 
                if($placable) {
                    ?> <input type="radio" name="<?= $row . ':' . $column ?>" class="radio_on_map" />
                <?php } ?></td><?php 
                }
            ?></tr><?php } ?></table>
    </form>
</html>