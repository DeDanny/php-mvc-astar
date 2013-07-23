<html>
    <head>
        <style>
            @import './media/css/reset.css';
            @import './media/css/map.css';
        </style>
    </head>
    <form method="post" action="?request=main/draw">
        <table><?php for ($column = 0; $column < $model['row']; $column++) { ?><tr><?php 
            for ($row = 0; $row < $model['column']; $row++) {
            ?><td class="tile <?php echo GroundTypes::getName($model[$row . ':' . $column]); ?>"><?php echo GroundTypes::getName($model[$row . ':' . $column]); ?></td><?php 
            } ?></tr><?php } ?></table>
    </form>
</html>