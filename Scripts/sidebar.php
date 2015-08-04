<?php
 $pageName = basename($_SERVER['PHP_SELF']);
 $indexActive = $geekActive = $portActive = $photoActive = $gkActive= "";
    if($pageName == "index.php"){
        $indexActive = "class ='active'";
    }
    elseif($pageName == "addGeekStars.php" || $pageName == "listGeek.php"){
        $geekActive = "class ='active'";
    }
    elseif($pageName == "addPortfolio.php" || $pageName == "listPortfolio.php"){
        $portActive = "class ='active'";
    }
    elseif($pageName == "addGKInfo.php" || $pageName == "listGKInfo.php"){
        $gkActive = "class ='active'";
    }
    else{
        $photoActive ="class ='active'";
    }
?>
<div class="span3" id="sidebar">
    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        <li <?php echo $indexActive;?>>
            <a href="index.php"><i class="icon-chevron-right"></i> Dashboard</a>
        </li>
        <li <?php echo $geekActive;?>>
            <a href=""><span class="badge badge-success pull-right"> <?php echo ""; ?></span>Temperature</a>
        </li>
        <li <?php echo $portActive;?>>
            <a href=""><span class="badge badge-success pull-right"> <?php echo ""; ?></span>Humidity</a>
        </li >
        <li <?php echo $photoActive; ?>>
            <a href=""><span class="badge badge-success pull-right"> <?php echo ""; ?></span>Luminosity</a>
        </li>
        <li <?php echo $gkActive; ?>>
            <a href=""><span class="badge badge-success pull-right"> <?php echo ""; ?></span>Fan Speed</a>
        </li>
    </ul>
</div>
