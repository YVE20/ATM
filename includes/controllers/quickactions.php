<?php

##################################
###       QUICK ACTIONS        ###
##################################


switch ($_GET['qa']) {
    case "mutationGuardrailPlus":
        Guardrail::editDetailSJPlus($_GET['id']);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid'] . "&section=" . $_GET['section']);
        break;

    case "mutationGuardrailLostaccReceiver":
        if ($_GET["lost"] == 1) {
            $database->update("mutationguardrail_detail", [
                "lostacc_receiver" => 1,
            ], ["id" => $_GET['id']]);
            if (getSingleValue("mutationguardrail_detail", "lostacc_receiver", $_GET['id']) == 1 && getSingleValue("mutationguardrail_detail", "lostacc_sender", $_GET['id']) == 1) {
                $database->update("mutationguardrail_detail", [
                    "is_issue" => 4,
                ], ["id" => $_GET['id']]);
            } else {
                $database->update("mutationguardrail_detail", [
                    "is_issue" => 1,
                ], ["id" => $_GET['id']]);
            }
        } else {
            $database->update("mutationguardrail_detail", [
                "lostacc_receiver" => 0,
            ], ["id" => $_GET['id']]);
            if (getSingleValue("mutationguardrail_detail", "lostacc_receiver", $_GET['id']) == 1 && getSingleValue("mutationguardrail_detail", "lostacc_sender", $_GET['id']) == 1) {
                $database->update("mutationguardrail_detail", [
                    "is_issue" => 4,
                ], ["id" => $_GET['id']]);
            } else {
                $database->update("mutationguardrail_detail", [
                    "is_issue" => 1,
                ], ["id" => $_GET['id']]);
            }
        }
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid'] . "&section=" . $_GET['section']);
        break;

    case "mutationGuardrailLostaccSender":
        if ($_GET["lost"] == 1) {
            $database->update("mutationguardrail_detail", [
                "lostacc_sender" => 1,
            ], ["id" => $_GET['id']]);
            if (getSingleValue("mutationguardrail_detail", "lostacc_receiver", $_GET['id']) == 1 && getSingleValue("mutationguardrail_detail", "lostacc_sender", $_GET['id']) == 1) {
                $database->update("mutationguardrail_detail", [
                    "is_issue" => 4,
                ], ["id" => $_GET['id']]);
            } else {
                $database->update("mutationguardrail_detail", [
                    "is_issue" => 1,
                ], ["id" => $_GET['id']]);
            }
        } else {
            $database->update("mutationguardrail_detail", [
                "lostacc_sender" => 0,
            ], ["id" => $_GET['id']]);
            if (getSingleValue("mutationguardrail_detail", "lostacc_receiver", $_GET['id']) == 1 && getSingleValue("mutationguardrail_detail", "lostacc_sender", $_GET['id']) == 1) {
                $database->update("mutationguardrail_detail", [
                    "is_issue" => 4,
                ], ["id" => $_GET['id']]);
            } else {
                $database->update("mutationguardrail_detail", [
                    "is_issue" => 1,
                ], ["id" => $_GET['id']]);
            }
        }
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid'] . "&section=" . $_GET['section']);
        break;

    case "parcelChecker":
        if ($_GET['on'] == 1) {
            Master::parcelCheckeron($_GET['parcelid'], $liu['id']);
        } else {
            Master::parcelCheckeroff($_GET['parcelid'], $liu['id']);
        }
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case 'vehicle_search':
        $numberplate = $_GET['q'];
        $vehicles = $database->select("vehicles", ['id', 'numberplate'], [
            'AND' => [
                'is_active' => 1,
                'numberplate[~]' => $numberplate
            ]
        ]);

        echo json_encode($vehicles);
        break;

    case "vehicleid":
        $drivers = $database->select("drivers", "*", ["AND" => ["vid" => $_POST['vehicleid'], "is_active" => 1]]); ?>
        <option value='0'><?php echo "Unknown"; ?></option>
        <?php foreach ($drivers as $item) { ?>
            <option value='<?php echo $item['id']; ?>'><?php echo $item['name']; ?></option>
        <?php }
        break;

    case "chargeplafon":
        echo $_GET['date']; die();
        $datas = $database->get("vehicles", "*", ["id" => $_GET['date']]);
        $dataz = array('length' =>  $datas['length'], 'wide' =>  $datas['wide'], 'high' => $datas['high']);
        echo json_encode($dataz);
        break;

    case "vehicleidplt":
        $datas = $database->get("vehicles", "*", ["id" => $_GET['vehicleid']]);
        $dataz = array('length' =>  $datas['length'], 'wide' =>  $datas['wide'], 'high' => $datas['high']);
        echo json_encode($dataz);
        break;

    case "assumptionmarka":
        $datas = $database->get("calculation_marka_assumption", "*", ["id" => $_GET['assumptionid']]);
        $dataz = array(
            'assumption_production_capacity' =>  $datas['assumption_production_capacity'], 
            'assumption_machine_quantity' =>  $datas['assumption_machine_quantity'], 
            'assumption_kwh' =>  $datas['assumption_kwh'], 
            'assumption_number_workers' =>  $datas['assumption_number_workers'], 
            'assumption_umr' =>  $datas['assumption_umr'], 
            'assumption_total_working_days' =>  $datas['assumption_total_working_days']
        );
        echo json_encode($dataz);
        break;

    case "province":
        if ($_POST["province"] == 0) {
            $regencies = getTable("regencies");
        } else {
            $regencies = getTableFiltered("regencies", "province_id", $_POST["province"]);
        } ?>
        <option value=''><?php echo "Undefined"; ?></option>
        <?php foreach ($regencies as $regency) { ?>
            <option value='<?php echo $regency['id']; ?>' <?php if (isset($_GET['regencyid'])) {
                                                                if ($_GET['regencyid'] == $regency['id']) echo "selected";
                                                            }  ?>><?php echo $regency['name']; ?></option>
        <?php }
        break;

    case "regency":
        if ($_POST["regency"] == 0) {
            $districts = getTable("districts");
        } else {
            $districts = getTableFiltered("districts", "regency_id", $_POST["regency"]);
        } ?>
        <option value=''><?php echo "Undefined"; ?></option>
        <?php foreach ($districts as $district) { ?>
            <option value='<?php echo $district['id']; ?>' <?php if (isset($_GET['districtid'])) {
                                                                if ($_GET['districtid'] == $district['id']) echo "selected";
                                                            }  ?>><?php echo $district['name']; ?></option>
        <?php }
        break;

    case "district":
        if ($_POST["district"] == 0) {
            $villages = getTable("villages");
        } else {
            $villages = getTableFiltered("villages", "district_id", $_POST["district"]);
        }

        foreach ($villages as $village) { ?>
            <option value='<?php echo $village['id']; ?>' <?php if (isset($_GET['villageid'])) {
                                                                if ($_GET['villageid'] == $village['id']) echo "selected";
                                                            }  ?>><?php echo $village['name']; ?></option>
        <?php }
        break;

    case "report_mutprosj_projectid":
        $vsupp = $database->query("select DISTINCT(b.id),b.name FROM mutationprosj a JOIN vehiclesupplier b ON a.vsupp = b.id WHERE projectid =" . $_POST["mutprosj_projectid"])->fetchAll();
        ?>
        <option value="0">- <?php _e('ALL'); ?> -</option>
        <?php foreach ($vsupp as $item) { ?>
            <option value='<?php echo $item['id']; ?>'><?php echo $item['name']; ?></option>
        <?php }
        break;

    case "report_mutprovol_projectid":
        $vsupp = $database->query("select DISTINCT(b.id),b.name FROM mutationprovol a JOIN vehiclesupplier b ON a.vsupp = b.id WHERE projectid =" . $_POST["mutprovol_projectid"])->fetchAll();
        ?>
        <option value="0">- <?php _e('ALL'); ?> -</option>
        <?php foreach ($vsupp as $item) { ?>
            <option value='<?php echo $item['id']; ?>'><?php echo $item['name']; ?></option>
        <?php }
        break;

    case "dateLocksj":
        if ($_GET['on'] == 1) {
            $database->update("date", [
                "is_locksj" => 1,
            ], ["id" => $_GET['id']]);
        } else {
            $database->update("date", [
                "is_locksj" => 0,
            ], ["id" => $_GET['id']]);
        }

        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "omzetrappro":
        if ($_GET['on'] == 1) {
            $database->update("rap_pro", [
                "is_omzet" => 1,
            ], ["id" => $_GET['id']]);
        } else {
            $database->update("rap_pro", [
                "is_omzet" => 0,
            ], ["id" => $_GET['id']]);
        }

        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid'] . "&section=" . $_GET['section']);
        break;

    case "activevsupp":
        $database->insert("projects_vsupp", [
            "projectid" => $_GET['routeid'],
            "vsuppid" => $_GET['id'],
            "active" => 1
        ]);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "inactivevsupp":
        $database->delete("projects_vsupp", ["vsuppid" => $_GET['id']]);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "inactivevsuppz":
        if (getSingleValue("projects_vsupp", "active", $_GET['id']) == 0) {
            $qwe = 1;
        } else {
            $qwe = 0;
        }
        $database->update("projects_vsupp", [
            "active" => $qwe,
        ], ["id" => $_GET['id']]);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid'] . "&section=" . $_GET['section']);
        break;

    case "validmutprosj":
        $database->update("mutationprosj", [
            "is_valid" => 1,
        ], ["id" => $_GET['id']]);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "unvalidmutprosj":
        $is_edit_admin = $database->get("mutationprosj", "edit_admin", ["id" => $_GET['id']]);
        if ($is_edit_admin != 1) {
            $database->update("mutationprosj", [
                "is_valid" => 0,
            ], ["id" => $_GET['id']]);
        }
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "validppd":
        $database->update("ppd", [
            "is_valid" => 1,
        ], ["id" => $_GET['id']]);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "unvalidppd":
        $database->update("ppd", [
            "is_valid" => 0,
        ], ["id" => $_GET['id']]);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "ccbox":

        break;

    case "ccboxspp":
        $dor = explode('-', $_POST['spp']);
        $goodsid = $database->query("select goodsid FROM sakti_spp WHERE spp='" . $dor[0] . "'")->fetchAll(PDO::FETCH_COLUMN);
        $goodsid = implode(",", $goodsid);
        $goods = $database->query("select * FROM goodsguardrail WHERE id in (" . $goodsid.")")->fetchAll(); ?>
        <?php foreach ($goods as $good) { ?>
            <option value='<?php echo $good['id']; ?>'>
                <?php echo $good['name'] . " (" . getSingleValue("typegoodsguardrail", "name", getSingleValue("goodsguardrail", "typeid", $good['id'])) . " - " . $good['spec'] . ")"; ?>
            </option>
        <?php }
        break;

    case "ccboxware":
        $goodsidmut = array_unique($database->select("mutations", "goodsid", ["warehouseid" => $_POST['warehouseid'], "ORDER" => "ID ASC"]));
        $goodsidmut = join(",", $goodsidmut);
        $ware = getRowById("warehouses", $_POST['warehouseid']);
        if ($_POST['tex'] == "1A") {
            if ($ware['categoryid'] == 2) {
                $goods = $database->query("select * FROM goods WHERE name like '%plate%' and categoryid=4 and id in (" . $goodsidmut . ")")->fetchAll();
            } else if ($ware['categoryid'] == 3) {
                $goods = $database->query("select * FROM goods WHERE name like '%plate%' and (categoryid=2 or categoryid=4) and id in (" . $goodsidmut . ")")->fetchAll();
            }
        } else if ($_POST['tex'] == "1B") {
            $goods = $database->query("select * FROM goods WHERE name like '%plate%' and categoryid=4 and id in (" . $goodsidmut . ")")->fetchAll();
        } else if ($_POST['tex'] == "1Block") {
            $goods = $database->query("select * FROM goods WHERE name like '%plate%' and categoryid=3 and id in (" . $goodsidmut . ")")->fetchAll();
        } else if ($_POST['tex'] == "2A") {
            $goods = $database->query("select * FROM goods WHERE name like '%semi%' and (categoryid=2 or categoryid=4) and id in (" . $goodsidmut . ")")->fetchAll();
        } else if ($_POST['tex'] == "2B") {
            $goods = $database->query("select * FROM goods WHERE name like '%semi%' and (categoryid=3 or categoryid=4) and id in (" . $goodsidmut . ")")->fetchAll();
        } else if ($_POST['tex'] == "OutPost") {
            $goods = $database->query("select * FROM goods WHERE (categoryid=2 or categoryid=4) and id in (" . $goodsidmut . ")")->fetchAll();
        } else if ($_POST['tex'] == "OutBlock") {
            $goods = $database->query("select * FROM goods WHERE (categoryid=3 or categoryid=4) and id in (" . $goodsidmut . ")")->fetchAll();
        }
        ?>
        <option value=''><?php echo "None"; ?></option>
        <?php foreach ($goods as $good) { ?>
            <option value='<?php echo $good['id']; ?>'><?php echo $good['name'] . " (" . getSingleValue("goods", "type", $good['id']) . " - " . getSingleValue("goods", "spec", $good['id']) . ")"; ?></option>
        <?php }
        break;

    case "ccboxgoods":
        $nobatch = $database->query("select distinct(nobatch),code FROM mutations WHERE warehouseid=" . $_POST['warehouseid'] . " and goodsid=" . $_POST['goodsid'])->fetchAll();
        foreach ($nobatch as $nobatc) { ?>
            <option value='<?php echo $nobatc['nobatch']; ?>'><?php echo $nobatc['nobatch']; ?></option>
        <?php }
        break;

    case "ccboxis":

        if ($_POST["projectid"] == 0) {
            $modules = getTable("projects_module");
        } else {
            $modules = getTableFiltered("projects_module", "projectid", $_POST["projectid"]);
        }

        if (empty($modules)) { ?>
            <option value="0" selected><?php _e('None'); ?></option>
        <?php } else { ?>
            <option value="0"><?php _e('None'); ?></option>
            <?php
            foreach ($modules as $module) { ?>
                <option value='<?php echo $module['id']; ?>'><?php echo $module['name']; ?></option>
<?php }
        }
        break;

    case "broken":
        if ($_GET["broken"] == 1) {
            $database->update("tickets", [
                "broken" => 1,
            ], ["id" => $_GET['id']]);
        } else {
            $database->update("tickets", [
                "broken" => 0,
            ], ["id" => $_GET['id']]);
        }
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "ticketNotifed":
        Ticket::notifed($_GET['id'], $_GET['notifed']);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['id']);
        break;

    case "issueNotifed":
        Issue::notifed($_GET['id'], $_GET['notifed']);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['id']);
        break;

    case "ticketClose":
        Ticket::ticketClose($_GET['id'], "Closed");
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "ticketReopen":
        Ticket::updateStatus($_GET['id'], "Reopened");
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "ticketAssignToMe":
        Ticket::assignTo($_GET['id'], $liu['id']);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "issueAssignToMe":
        Issue::assignTo($_GET['id'], $liu['id']);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "issueDone":
        Issue::issueDone($_GET['id']);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "issueunDone":
        Issue::issueunDone($_GET['id']);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "mutationOver":
        Mutation::over($_GET['mutationid'], $_GET['issueid']);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "mutationLost":
        Mutation::lost($_GET['mutationid'], $_GET['issueid']);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid']);
        break;

    case "mtDone":
        Maintenance::mtDone($_GET['id'], "Done");
        header("Location:?route=" . $_GET['reroute']);
        break;

    case "getTicketReply":
        echo getSingleValue("tickets_replies", "message", $_GET['id']);
        break;

    case "getGuardrailReply":
        echo getSingleValue("mutationguardrail_chat", "description", $_GET['id']);
        break;

    case "getUserEmail":
        echo getSingleValue("people", "email", $_GET['id']);
        break;

    case "setAutorefresh":
        Profile::setAutorefresh($liu['id'], $_GET['autorefresh']);
        header("Location:?route=" . $_GET['reroute'] . "&id=" . $_GET['routeid'] . "&section=" . $_GET['section']);
        break;

    case "removeAvatar":
        Profile::removeAvatar($liu['id']);
        header("Location:?route=profile");
        break;

    case "updateIssueStatus":
        Issue::updateStatus($_POST['issueid'], $_POST['status']);
        break;

    case "deleteFile":
        $status = 9503;
        global $database;
        global $scriptpath;

        $targetdir = $scriptpath . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR;
        $file = getRowById("files", $_GET['id']);
        $filename = $file['file'];
        $targetfile = $targetdir . $filename;

        if (!unlink($targetfile)) {
            $database->delete("files", ["file" => $filename]);
            $status = 9504;
        } else {
            $database->delete("files", ["file" => $filename]);
            $status = 9503;
        }
        break;

    case "download":
        $file = getRowById("files", $_GET['id']);
        $targetfile = $scriptpath . DIRECTORY_SEPARATOR . "uploads/img" . DIRECTORY_SEPARATOR . $_GET['for'] . DIRECTORY_SEPARATOR . $file['file'];
        if (file_exists($targetfile)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $file['file'] . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($targetfile));
            readfile($targetfile);
            exit;
        } else {
            echo "File does not exist.";
        }
} // end switch
?>