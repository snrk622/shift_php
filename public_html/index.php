<?php


require_once(__DIR__ . '/../lib/Controller/Shift.php');
require_once(__DIR__ . '/../lib/functions.php');
require_once(__DIR__ . '/../config/config.php');


$shift = new \MyApp\Controller\Shift();



?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>シフト</title>
</head>
<body>
    <div id="wrapper">
        <table>
            <thead>
                <tr>
                    <th><a href="/?t=<?= h($shift->prev); ?>">&laquo;</a></th>
                    <th colspan="5"><?= h($shift->yearMonth); ?></th>
                    <th><a href="/?t=<?= h($shift->next); ?>">&raquo;</a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="week sun">Sun</td>
                    <td class="week">Mon</td>
                    <td class="week">Tue</td>
                    <td class="week">Wed</td>
                    <td class="week">Thu</td>
                    <td class="week">Fri</td>
                    <td class="week sat">Sat</td>
                </tr>
                <?php $shift->show(); ?>
                
            </tbody>
            <tfoot>
                <tr><td colspan="7"><a href="/">Today</a></td></tr>
                
            </tfoot>
        </table>
        <div>
<!--
            <select>
                <option hidden>FROM</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
            <span>~</span>
            <select>
                <option hidden>TO</option>
                <option value="9">24</option>
                <option value="10">25</option>
            </select>
-->
            
        </div>
    </div>
</body>
</html>