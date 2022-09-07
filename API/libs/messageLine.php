<?php
return function ($group, $number, $status, $data, $website) {
     if ($group == 'visitor') {
          $msg = "\n" . "No: " . $number . "\n" . "Name: " . $data->name . "\n" . "Organization/Company: " . $data->company . "\n" . "To Visit: " . $data->toVisit . "\n" . "Visit date: " . $data->visitDate . "\n" . "Status: " . $status . "\n";

          $msg .= "\n" .  "[ประกาศทั่วไป]";
          $msg .= "\n" .  "เรียน ทุกท่านทราบ";
          $msg .= "\n" . "สำหรับผู้ต้องการเข้ามาติดต่อภายในพื้นที่ SNC Group" . "\n" .
               "กรุณากรอกข้อมูลขออนุมัติในเว็บไซต์ iVMS" . "\n" . "ล่วงหน้าอย่างน้อย 3 วัน" . "\n";
          $msg .= "\n" . "Website iVMS: " . $website;

          return $msg;
     } else if ($group == 'guard') {
          $msg = "\n" . "แจ้งหน่วยงาน รปภ. และผู้ประสานงานทราบ";
          $msg .= "\n" . "No: " . $number . "\n" . "Name: " . $data->name . "\n" . "Organization/Company: " . $data->company . "\n" . "To Visit: " . $data->toVisit . "\n" . "Visit date: " . $data->visitDate . "\n" .  "Status: " . $status . "\n" . "Note: " . $data->note;

          return $msg;
     } else if ($group == 'admin') {
          $msg = "\n" . "เรียน ผู้บริหารทุกท่าน" . "\n" . "มีใบขออนุมัติเข้าพื้นที่บริษัทฯ ที่รอดำเนินการ X รายการ";
          $msg .= "\n" . "\n" . "พิจารณาอนุมัติได้ที่: " . $website;

          return $msg;
     }
};
