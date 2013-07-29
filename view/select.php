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
    <body>
        <form method="post" action="?request=Main/draw">
            <input type="submit"/> &leftarrow; Select the tiles you want and press the button;
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
        <!-- Piwik -->
        <script type="text/javascript"> 
          var _paq = _paq || [];
          _paq.push(['trackPageView']);
          _paq.push(['enableLinkTracking']);
          (function() {
            var u=(("https:" == document.location.protocol) ? "https" : "http") + "://analytics.dedanny.com//";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', 1]);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
            g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
          })();

        </script>
        <noscript><p><img src="http://analytics.dedanny.com/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
        <!-- End Piwik Code -->
    </body>
</html>