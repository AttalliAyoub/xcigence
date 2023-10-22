<?= $this->extend("layouts/index") ?>

<?= $this->section("title"); ?>
<?= $report_detail["client_name"] ?> Report
<?= $this->endSection() ?>
<?= $this->section("nav-sub-title") ?>
<?= $report_detail["client_email"] ?>
<?= $this->endSection() ?>

<?= $this->section("nav-title") ?>
<?= $report_detail["client_name"] ?>
<?= $this->endSection() ?>


<?= $this->section("content") ?>

<!-- <?= '<pre>' . print_r($report_detail) . '</pre>'; ?> -->

<div class="row">

    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-my shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">warning</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize font-weight-bolder "> High Vulnerability </p>
                    <h4 class="mb-0">
                        <?= $report_detail["High_vuln"] ?>
                    </h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <?php
                $vulnerabilities = $report_detail["Vulnerability"];
                $filteredArray = array_filter(
                    $vulnerabilities,
                    function ($val) {
                        return $val["severity"] == 'High';
                    }
                );
                foreach ($filteredArray as $vulnerability) { ?>
                    <p class="mb-0" style="text-wrap: nowrap; overflow: hidden;">
                        <?= $vulnerability["alert"] ?>
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">warning</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize font-weight-bolder">Critical Vulnerability</p>
                    <h4 class="mb-0">
                        <?= $report_detail["Critical_vuln"] ?>
                    </h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <?php
                $vulnerabilities = $report_detail["Vulnerability"];
                $filteredArray = array_filter(
                    $vulnerabilities,
                    function ($val) {
                        return $val["severity"] == 'Critical';
                    }
                );
                foreach ($filteredArray as $vulnerability) { ?>
                    <p class="mb-0" style="text-wrap: nowrap; overflow: hidden;">
                        <?= $vulnerability["alert"] ?>
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">warning</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize font-weight-bolder">Medium Vulnerability</p>
                    <h4 class="mb-0">
                        <?= $report_detail["Medium_vuln"] ?>
                    </h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <?php
                $vulnerabilities = $report_detail["Vulnerability"];
                $filteredArray = array_filter(
                    $vulnerabilities,
                    function ($val) {
                        return $val["severity"] == 'Medium';
                    }
                );
                foreach ($filteredArray as $vulnerability) { ?>
                    <p class="mb-0" style="text-wrap: nowrap; overflow: hidden;">
                        <?= $vulnerability["alert"] ?>
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div
                    class="icon icon-lg icon-shape bg-dark shadow-info text-center border-radius-xl mt-n4 position-absolute">

                    <i class="material-icons opacity-10 ">warning</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize font-weight-bolder"> Low Vulnerability </p>
                    <h4 class="mb-0">
                        <?= $report_detail["Low_vuln"] ?>
                    </h4>
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <?php
                $vulnerabilities = $report_detail["Vulnerability"];
                $filteredArray = array_filter(
                    $vulnerabilities,
                    function ($val) {
                        return $val["severity"] == 'Low';
                    }
                );
                foreach ($filteredArray as $vulnerability) { ?>
                    <p class="mb-0" style="text-wrap: nowrap; overflow: hidden;">
                        <?= $vulnerability["alert"] ?>
                    </p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-my shadow-primary border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <div id="chart-pie-data" style="display: none; visibility: hidden;">
                            <?= $report_detail["final_score"] ?>
                        </div>
                        <canvas id="chart-pie" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 "> Report Status:
                    <span class="text-sm ">
                        <?= $report_detail["status"] ?>
                    </span>
                </h6>
                <hr class="dark horizontal">
                <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">factory</i>
                    <p class="mb-0 text-sm"> Client Industry :
                        <?= $report_detail["client_industry"] ?>
                    </p>
                </div>
                <div class="d-flex ">
                    <i class="material-icons text-sm my-auto me-1">dns</i>
                    <p class="mb-0 text-sm"> Client Web IP :
                        <?= $report_detail["client_web_ip"] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-success border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <div id="chart-bars-user-data" style="display: none; visibility: hidden;">
                            <?php
                            function hacked_email_address($carry, $item)
                            {
                                return $carry + sizeof($item["hacked_email_address"]["hacked_email_address"]);
                            }
                            ;
                            function email_at_risk_high($carry, $item)
                            {
                                return $carry + sizeof($item["email_at_risk_high"]);
                            }
                            ;
                            function email_at_risk_medium($carry, $item)
                            {
                                return $carry + sizeof($item["email_at_risk_medium"]);
                            }
                            ;
                            function email_at_risk_low($carry, $item)
                            {
                                return $carry + sizeof($item["email_at_risk_low"]);
                            }
                            ;
                            $hacked_email_address = array_reduce($Digital_User_Risk, "hacked_email_address");
                            $email_at_risk_high = array_reduce($Digital_User_Risk, "email_at_risk_high");
                            $email_at_risk_medium = array_reduce($Digital_User_Risk, "email_at_risk_medium");
                            $email_at_risk_low = array_reduce($Digital_User_Risk, "email_at_risk_low");
                            echo $hacked_email_address . "," .
                                $email_at_risk_high . "," .
                                $email_at_risk_medium . "," .
                                $email_at_risk_low;
                            ?>
                        </div>
                        <canvas id="chart-bars-user" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 "> Digital User Risk (Emails) </h6>
                <!-- <p class="text-sm "> (<span class="font-weight-bolder">+15%</span>) increase in today sales. -->
                </p>
                <hr class="dark horizontal">
                <div class="d-flex ">
                    <p class="mb-0 text-sm"> Hacked:
                        <?= $hacked_email_address ?>
                    </p> -
                    <p class="mb-0 text-sm"> High:
                        <?= $email_at_risk_high ?>
                    </p>
                </div>
                <div class="d-flex ">
                    <p class="mb-0 text-sm"> Medium:
                        <?= $email_at_risk_medium ?>
                    </p> -
                    <p class="mb-0 text-sm"> Low:
                        <?= $email_at_risk_low ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mt-4 mb-3">
        <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                    <div class="chart">
                        <div id="chart-bars-data" style="display: none; visibility: hidden;">
                            <?=
                                $report_detail["High_vuln"] . "," .
                                $report_detail["Critical_vuln"] . "," .
                                $report_detail["Medium_vuln"] . "," .
                                $report_detail["Low_vuln"]
                                ?>
                        </div>
                        <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0 "> Vulnerabilities </h6>
                <!-- <p class="text-sm ">Last Campaign Performance</p> -->
                <hr class="dark horizontal">
                <div class="">
                    <!-- <i class="material-icons text-sm my-auto me-1">schedule</i> -->
                    <p class="mb-0 text-sm"> High:
                        <?= $report_detail["High_vuln"] ?> - Critical:
                        <?= $report_detail["Critical_vuln"] ?>
                    </p>
                    <p class="mb-0 text-sm"> Medium:
                        <?= $report_detail["Medium_vuln"] ?> - Low:
                        <?= $report_detail["Low_vuln"] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<h1 class="text-white mb-3" id="ThreatenedSystems"> Threatened Systems </h1>


<?php foreach ($Threatened as $Tkey => $Threat) { ?>
    <div class="row">
        <div class=" mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">
                        <?= $Threat["system_defense"] ?>
                    </h6>
                    <p class="mb-0">
                        <?= $Threat["system_defense_description"] ?>
                    </p>
                </div>
                <div class="card-body pt-4 p-3">
                    <h6> Vulnerabilities & Threats </h6>
                    <ul class="list-group">
                        <?php foreach ($Threat["vulnerability_threat"] as $key => $threat) { ?>
                            <div class="list-group-item border-0 mb-2 bg-gray-100 border-radius-lg">
                                <h6 class="mb-3 mb-0 text-sm"> Threat:
                                    <?= $threat["threat"] ?>
                                </h6>
                                <li class="border-0 d-flex">
                                    <div class="d-flex flex-column">
                                        <span class="mb-3 text-sm">
                                            <?= $threat["threat_description"] ?>
                                        </span>

                                        <span class="mb-2 text-xs">
                                            Attack Complexity:
                                            <span class="text-dark font-weight-bold ms-sm-2">
                                                <?= $threat["threat_attackcomplexity"] ?>
                                            </span></span>
                                        <span class="mb-2 text-xs">
                                            Confidentiality Impact:
                                            <span class="text-dark font-weight-bold ms-sm-2">
                                                <?= $threat["threat_confidentialityimpact"] ?>
                                            </span></span>
                                        <span class="mb-2 text-xs">
                                            Geolocation:
                                            <span class="text-dark geolocation font-weight-bold ms-sm-2">
                                                <span class="value">
                                                    <?= $threat["threat_geolocation"] ?>
                                                </span>
                                                <span style="display: none;" class="index">#vector-map-<?=$Tkey."-".$key?></span>
                                            </span></span>
                                    </div>
                                    <div id="vector-map-<?=$Tkey."-".$key?>" class="" class="min-height-200"></div>
                                </li>
                            </div>
                        <?php } ?>


                    </ul>
                </div>

            </div>
        </div>

    </div>

    <div class="row ">
        <div class="col-md-7 mt-4">
            <div class="card" style="height: 100%; max-height: 600px;">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0 btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target=".multi-collapse" aria-expanded="false"
                        aria-controls="multiCollapseExample1-<?= $Tkey . "-" . $key ?> multiCollapseExample2-<?= $Tkey . "-" . $key ?>">
                        Malicious IP Address </h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group collapse multi-collapse" id="multiCollapseExample1-<?= $Tkey . "-" . $key ?>">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">
                                    <?= $Threat["Malicious_IP_Address_threat"]["Malicious_IP_Address_threat"] ?>
                                </h6>
                                <span class="mb-2 text-xs"> Solution: <span class="text-dark font-weight-bold ms-sm-2">
                                        <?= $Threat["Malicious_IP_Address_threat"]["Malicious_IP_Address__solution"] ?>
                                    </span></span>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-4">
            <div class="card mb-4" style="height: 100%; max-height: 600px; overflow-y: auto;">
                <div class="card-header pb-0 px-3" style="position: sticky; top: 0; z-index: 100;">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0"> Malicious IP's List </h6>
                        </div>
                        <!-- <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                            <i class="material-icons me-2 text-lg">date_range</i>
                            <small>23 - 30 March 2020</small>
                        </div> -->
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group collapse multi-collapse" id="multiCollapseExample2-<?= $Tkey . "-" . $key ?>">
                        <?php foreach ($Threat["Malicious_IP_Address_threat"]["Malicious_IP_Address"] as $IP) { ?>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="material-icons text-lg">router</i></button>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">
                                            <?= substr($IP, 0, strpos($IP, "[")) ?>
                                        </h6>
                                        <span class="text-xs">
                                            <?= substr($IP, strpos($IP, "[") + 1, -1) ?>
                                        </span>
                                    </div>
                                </div>
                                <!-- <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                - $ 2,500
                            </div> -->
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 mt-4">
            <div class="card" style="height: 100%; max-height: 600px;">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0 btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target=".multi-collapse1" aria-expanded="false"
                        aria-controls="Subdomain1-<?= $Tkey . "-" . $key ?> Subdomain2-<?= $Tkey . "-" . $key ?>"> Subdomain Threats
                    </h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group multi-collapse1" id="Subdomain1-<?= $Tkey . "-" . $key ?>" >
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">
                                    <?= $Threat["subdomain_threat"]["subdomain_threat"] ?>
                                </h6>
                                <span class="mb-2 text-xs"> Solution: <span class="text-dark font-weight-bold ms-sm-2">
                                        <?= $Threat["subdomain_threat"]["subdomain_solution"] ?>
                                    </span></span>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-4">
            <div class="card h-100 mb-4" data-scroll="true">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0"> Subdomains List </h6>
                        </div>
                        <!-- <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                            <i class="material-icons me-2 text-lg">date_range</i>
                            <small>23 - 30 March 2020</small>
                        </div> -->
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group multi-collapse1" id="Subdomain2-<?= $Tkey . "-" . $key ?>" style="height: 100%; max-height: 470px; overflow-y: auto;">
                        <?php foreach ($Threat["subdomain_threat"]["subdomains"] as $IP) { ?>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="material-icons text-lg">dns</i></button>
                                    <div class="d-flex flex-column">
                                        <!-- <h6 class="mb-1 text-dark text-sm"> <?= substr($IP, 0, strpos($IP, "[")) ?> </h6> -->
                                        <h6 class="mb-1 text-dark text-sm">
                                            <?= $IP; ?>
                                        </h6>
                                        <!-- <span class="text-xs"> <?= substr($IP, strpos($IP, "[") + 1, -1) ?> </span> -->
                                    </div>
                                </div>
                                <!-- <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                - $ 2,500
                            </div> -->
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 mt-4">
            <div class="card" style="height: 100%; max-height: 600px; overflow-y: auto;">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0 btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target=".multi-collapse2" aria-expanded="false" > Expired SSL Certificate </h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group collapse multi-collapse2">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">
                                    <?= $Threat["SSL_Certificate_Expired"]["SSL_Certificate_Expired_threat"] ?>
                                </h6>
                                <span class="mb-2 text-xs"> Solution: <span class="text-dark font-weight-bold ms-sm-2">
                                        <?= $Threat["SSL_Certificate_Expired"]["SSL_Certificate_Expired_solution"] ?>
                                    </span></span>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-4">
            <div class="card h-100 mb-4" style="height: 100%; max-height: 600px; overflow-y: auto;" data-scroll="true">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0"> Expired SSL Certificate List </h6>
                        </div>
                        <!-- <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                            <i class="material-icons me-2 text-lg">date_range</i>
                            <small>23 - 30 March 2020</small>
                        </div> -->
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group collapse multi-collapse2 ">
                        <?php foreach ($Threat["SSL_Certificate_Expired"]["SSL_Certificate_Expired"] as $IP) { ?>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="material-icons text-lg">receipt</i></button>
                                    <div class="d-flex flex-column">
                                        <!-- <h6 class="mb-1 text-dark text-sm"> <?= substr($IP, 0, strpos($IP, "[")) ?> </h6> -->
                                        <h6 class="mb-1 text-dark text-sm">
                                            <?= $IP; ?>
                                        </h6>
                                        <!-- <span class="text-xs"> <?= substr($IP, strpos($IP, "[") + 1, -1) ?> </span> -->
                                    </div>
                                </div>
                                <!-- <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                - $ 2,500
                            </div> -->
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7 mt-4">
            <div class="card" style="height: 100%; max-height: 600px; overflow-y: auto;">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0 btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target=".multi-collapse3" aria-expanded="false" > Open TCP Port </h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group collapse multi-collapse3">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                                <h6 class="mb-3 text-sm">
                                    <?= $Threat["SSL_Certificate_Expired"]["SSL_Certificate_Expired_threat"] ?>
                                </h6>
                                <span class="mb-2 text-xs"> Solution: <span class="text-dark font-weight-bold ms-sm-2">
                                        <?= $Threat["SSL_Certificate_Expired"]["SSL_Certificate_Expired_solution"] ?>
                                    </span></span>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-4">
            <div class="card h-100 mb-4" style="height: 100%; max-height: 600px; overflow-y: auto;" data-scroll="true">
                <div class="card-header pb-0 px-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0"> Expired SSL Certificate List </h6>
                        </div>
                        <!-- <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                            <i class="material-icons me-2 text-lg">date_range</i>
                            <small>23 - 30 March 2020</small>
                        </div> -->
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group collapse multi-collapse3">
                        <?php foreach ($Threat["SSL_Certificate_Expired"]["SSL_Certificate_Expired"] as $IP) { ?>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <button
                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                                            class="material-icons text-lg">receipt</i></button>
                                    <div class="d-flex flex-column">
                                        <!-- <h6 class="mb-1 text-dark text-sm"> <?= substr($IP, 0, strpos($IP, "[")) ?> </h6> -->
                                        <h6 class="mb-1 text-dark text-sm">
                                            <?= $IP; ?>
                                        </h6>
                                        <!-- <span class="text-xs"> <?= substr($IP, strpos($IP, "[") + 1, -1) ?> </span> -->
                                    </div>
                                </div>
                                <!-- <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                - $ 2,500
                            </div> -->
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

<h1 class="text-white mt-5 mb-5" id="DigitalUserRisks"> Digital User Risks </h1>

<?php foreach ($Digital_User_Risk as $risk) { ?>
    <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6> Mailservice:
                                <?= $risk["mailservice"] ?>
                            </h6>
                            <!-- <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1"> <?= $risk["mailservice"] ?> </span>
                            </p> -->
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive" style="height: 100%; max-height: 600px; overflow-y: auto;">

                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Hacked</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Site</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Vulnerability Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($risk["email_at_risk_high"] as $value) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <div class="avatar bg-gradient-primary avatar-sm me-3">
                                                        <i class="material-icons opacity-10">mail</i>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <?= $value ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $hacked = $risk["hacked_email_address"]["hacked_email_address"];
                                            $isHacked = false;
                                            foreach ($hacked as $hack) {
                                                if (strpos($hack, $value) !== false) {
                                                    $isHacked = true;
                                                    ?>
                                                    <div class="avatar bg-gradient-my avatar-sm me-3">
                                                        <i class="material-icons opacity-10">lock_open</i>
                                                    </div>
                                                    Yes
                                                    <?php
                                                    break;
                                                }
                                            }
                                            ?>

                                            <?php if (!$isHacked) {
                                                ?>
                                                <div class="avatar bg-gradient-success avatar-sm me-3">
                                                    <i class="material-icons opacity-10">lock</i>
                                                </div>
                                                No
                                                <?php
                                            }
                                            ?>

                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold">
                                                <?php
                                                $hacked = $risk["hacked_email_address"]["hacked_email_address"];
                                                foreach ($hacked as $hack) {
                                                    if (strpos($hack, $value) !== false) {
                                                        echo substr($hack, strpos($hack, "[") + 1, -1);
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-wrapper w-75 mx-auto">
                                                <div class="progress-info">
                                                    <div class="progress-percentage">
                                                        <span class="text-xs font-weight-bold"> High </span>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-damage w-100" role="progressbar"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>


                                <?php foreach ($risk["email_at_risk_medium"] as $value) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <div class="avatar bg-gradient-primary avatar-sm me-3">
                                                        <i class="material-icons opacity-10">mail</i>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <?= $value ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $hacked = $risk["hacked_email_address"]["hacked_email_address"];
                                            $isHacked = false;
                                            foreach ($hacked as $hack) {
                                                if (strpos($hack, $value) !== false) {
                                                    $isHacked = true;
                                                    ?>
                                                    <div class="avatar bg-gradient-my avatar-sm me-3">
                                                        <i class="material-icons opacity-10">lock_open</i>
                                                    </div>
                                                    Yes
                                                    <?php
                                                    break;
                                                }
                                            }
                                            ?>

                                            <?php if (!$isHacked) {
                                                ?>
                                                <div class="avatar bg-gradient-success avatar-sm me-3">
                                                    <i class="material-icons opacity-10">lock</i>
                                                </div>
                                                No
                                                <?php
                                            }
                                            ?>

                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold">
                                                <?php
                                                $hacked = $risk["hacked_email_address"]["hacked_email_address"];
                                                foreach ($hacked as $hack) {
                                                    if (strpos($hack, $value) !== false) {
                                                        echo substr($hack, strpos($hack, "[") + 1, -1);
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-wrapper w-75 mx-auto">
                                                <div class="progress-info">
                                                    <div class="progress-percentage">
                                                        <span class="text-xs font-weight-bold"> High </span>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-warning w-70" role="progressbar"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>


                                <?php foreach ($risk["email_at_risk_low"] as $value) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <div class="avatar bg-gradient-primary avatar-sm me-3">
                                                        <i class="material-icons opacity-10">mail</i>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        <?= $value ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php
                                            $hacked = $risk["hacked_email_address"]["hacked_email_address"];
                                            $isHacked = false;
                                            foreach ($hacked as $hack) {
                                                if (strpos($hack, $value) !== false) {
                                                    $isHacked = true;
                                                    ?>
                                                    <div class="avatar bg-gradient-my avatar-sm me-3">
                                                        <i class="material-icons opacity-10">lock_open</i>
                                                    </div>
                                                    Yes
                                                    <?php
                                                    break;
                                                }
                                            }
                                            ?>

                                            <?php if (!$isHacked) {
                                                ?>
                                                <div class="avatar bg-gradient-success avatar-sm me-3">
                                                    <i class="material-icons opacity-10">lock</i>
                                                </div>
                                                No
                                                <?php
                                            }
                                            ?>

                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold">
                                                <?php
                                                $hacked = $risk["hacked_email_address"]["hacked_email_address"];
                                                foreach ($hacked as $hack) {
                                                    if (strpos($hack, $value) !== false) {
                                                        echo substr($hack, strpos($hack, "[") + 1, -1);
                                                        break;
                                                    }
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="progress-wrapper w-75 mx-auto">
                                                <div class="progress-info">
                                                    <div class="progress-percentage">
                                                        <span class="text-xs font-weight-bold"> Low </span>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-success w-30" role="progressbar"
                                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div style="display: table;" class="col-lg-4 col-md-6">
            <div class="card h-100" style="height: 100%; max-height: 600px; overflow-y: auto;">
                <div class="card-header pb-0">
                    <h6> Details </h6>
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side">
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-info text-gradient">mail</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0"> Mailservice </h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    <?= $risk["mailservice"] ?>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-warning text-gradient">description</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0"> Mailservice Description </h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    <?= $risk["mailservice_description"] ?>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-danger   text-gradient">cancel_schedule_send</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0"> Email Risks
                                </h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    <?= $risk["email_risks"] ?>
                                </p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-success text-gradient">mark_email_read</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0"> Email Risks Solution
                                </h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    <?= $risk["email_risks_solution"] ?>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-success text-gradient">emoji_objects</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0"> Hacked Email Address Solution
                                </h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    <?= $risk["hacked_email_address"]["hacked_email_address_solution"] ?>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>



<?= $this->endSection() ?>


<?= $this->section("script") ?>

<script> <?= $this->include("Home/chart.php") ?> </script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        darkMode(true);
        setTimeout(() => {
            darkMode(true);
        }, 5000);
    }
</script>

<?= $this->endSection() ?>