<?php
return function ($number, $status, $data) {
     $msg = "\n" . "แจ้งหน่วยงาน รปภ. และผู้ประสานงานทราบ";
     $msg .= "\n" . "No: " . $number . "\n" . "Name: " . $data->name . "\n" . "Organization/Company: " . $data->company . "\n" . "To Visit: " . $data->toVisit . "\n" . "Visit date: " . $data->visitDate . "\n" .  "Status: " . $status . "\n" . "Note: " . $data->note;
};
