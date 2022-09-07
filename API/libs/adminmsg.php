<?php
return function () {
     $website = 'https://snc-services.sncformer.com/venderCOVID/client/Login.php';

     $msg = "\n" . "เรียน ผู้บริหารทุกท่าน" . "\n" . "มีใบขออนุมัติเข้าพื้นที่บริษัทฯ ที่รอดำเนินการ X รายการ";
     $msg .= "\n" . "\n" . "พิจารณาอนุมัติได้ที่: " . $website;
     return $msg;
};
