<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo $lang['navDashboard']; ?>
        </h1>
    </div>
</div>
<?php if (isset($_SESSION['update'])) echo '<div class="alert alert-info" role="alert">' . $lang['updateMessage'] . ' (' . $_SESSION['message']->version . ') <a href="https://github.com/Cyberbyte-Studios/CyberWorks/releases">Download Section</a></div>'; ?>
<div class="row">
    <div class="col-lg-4">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4>
                    <i class="fa fa-taxi fa-fw"></i>
                    <?php echo $lang['police'] . ' ' . $lang['overview']; ?>
                    <div class="col-lg-3 pull-right">
                        <a href="<?php echo $settings['url'] ?>police"><?php echo $lang['viewAll']; ?> <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </h4>
                <hr>
                <thead>
                <tr>
                    <th><i class="fa fa-user"></i> <?php echo $lang['name']; ?></th>
                    <th><i class="fa fa-eye"></i> <?php echo $lang['playerID']; ?></th>
                    <th>
        </div>
        <?php echo $lang['rank']; ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $cops = $dao->cops(true);
        foreach($cops as $cop) {
            echo '<tr>';
            echo '<td>' . $row["name"] . "</td>";
            echo '<td>' . $playersID . "</td>";
            echo '<td>' . $row["coplevel"] . "</td>";
            echo '</tr>';
        };
        ?>
        </tbody>
        </table>
    </div>
</div>

<div class="col-lg-4">
    <div class="content-panel">
        <table class="table table-striped table-advance table-hover">
            <h4>
                <i class="fa fa-money fa-fw"></i> <?php echo $lang['topRich']; ?>
            </h4>
            <hr>
            <thead>
            <tr>
                <th><i class="fa fa-user"></i> <?php echo $lang['name']; ?></th>
                <th><i class="fa fa-money"></i> <?php echo $lang['cash']; ?></th>
                <th><i class="fa fa-bank"></i> <?php echo $lang['bank']; ?></th>
            </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT `name`, `cash`, `bankacc` FROM `players` ORDER BY `bankacc` DESC, `cash` DESC LIMIT 10";
            $result_of_query = $db_link->query($sql);
            while ($row = mysqli_fetch_assoc($result_of_query)) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["cash"] . "</td>";
                echo "<td>" . $row["bankacc"] . "</td>";
                echo "</tr>";
            };
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="col-lg-4">
    <div class="content-panel">
        <table class="table table-striped table-advance table-hover">
            <h4>
                <i class="fa fa-ambulance fa-fw"></i>
                <?php echo $lang['medic'] . " " . $lang['overview']; ?>
                <div class="col-lg-3 pull-right">
                    <a href="<?php echo $settings['url']; ?>medic"><?php echo $lang['viewAll'];?> <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </h4>
            <hr>
            <thead>
            <tr>
                <th><i class="fa fa-user"></i> <?php echo $lang['name']; ?></th>
                <th><i class="fa fa-eye"></i> <?php echo $lang['playerID']; ?></th>
                <th>
                    <?php echo $lang['rank']; ?></th>
            </tr>
            </thead>
            <tbody>

            <?php
            $sql = "SELECT `name`,`mediclevel`,`playerid` FROM `players` WHERE `mediclevel` >= '1' ORDER BY `mediclevel` DESC LIMIT 10";
            $result_of_query = $db_link->query($sql);
            while ($row = mysqli_fetch_assoc($result_of_query)) {
                $playersID = $row["playerid"];
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $playersID . "</td>";
                echo "<td>" . $row["mediclevel"] . "</td>";
                echo "</tr>";
            };
            ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<?php include("views/templates/news.php");
}
