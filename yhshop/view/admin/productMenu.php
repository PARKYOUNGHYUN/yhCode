<table border="1" width="100%" height="100%">
    <tr align="center">
        <td><?php include "productMainMenu.php" ?></td>
    </tr>
    <?php if($action != 2000 && $action != 2020){ ?>
    <tr align="center">
        <td><?php include "productSubMenu.php"?></td>
    </tr>
    <?php } ?>
</table>