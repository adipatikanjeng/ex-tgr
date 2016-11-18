<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <style>
    @page {
      margin: 0.25in;
    }

/* General
-----------------------------------------------------------------------*/
body {
  background-color: transparent;
  color: black;
  font-family: "arial","verdana", "sans-serif";
  margin: 0px;
  padding-top: 0px;
  font-size: 10px;
}

@media print {
  p { margin: 2px; }
}

h1 {
  font-size: 1.1em;
  font-style: italic;
}

h2 {
  font-size: 1.05em;
}

img {
  border: none;
}

pre {
  font-family: "verdana", "sans-serif";
  font-size: 0.7em;
}

ul {
  list-style-type: circle;
  list-style-position: inside;
  margin: 0px;
  padding: 3px;
}

li.alpha {
  list-style-type: lower-alpha;
  margin-left: 15px;
}

p {
  font-size: 0.8em;
}

a:link,
a:visited {
  /* font-weight: bold;  */
  text-decoration: none;
  color: black;
}

a:hover {
  text-decoration: underline;
}

#body {
  padding-bottom: 2em;
  padding-top: 5px;
}

#body pre {
}

.center {
  text-align: center;
}

.right {
  text-align: right;
}

#money {
  text-align: right;
  padding-right: 20px;
}

/* Footer
-----------------------------------------------------------------------*/
#footer {
  color: black;
}

#copyright {
  padding: 5px;
  font-size: 0.6em;
  background-color: white;
}

#footer_spacer_row {
  width: 100%;
}

#footer_spacer_row td {
  padding: 0px;
  border-bottom: 1px solid #000033;
  background-color: #F7CF07;
  height: 2px;
  font-size: 2px;
  line-height: 2px;
}

#logos {
  padding: 5px;
  float: right;
}

/* Section Header
-----------------------------------------------------------------------*/
#section_header {
  text-align: center;
}

#job_header {
  text-align: left;
  background-color: white;
  margin-left: 5px;
  padding: 5px;
  border: 1px dashed black;
}

#job_info {
  font-weight: bold;
}

.header_details td {
  font-size: 0.6em;
}

.header_label {
  padding-left: 20px;
}

.header_field {
  padding-left: 5px;
  font-weight: bold;
}

/* Content
-----------------------------------------------------------------------*/
#content {
  padding: 0.2em 1% 0.2em 1%;
  min-height: 15em;
}

.page_buttons {
  text-align: center;
  margin: 3px;
  font-size: 0.7em;
  white-space: nowrap;
  font-weight: bold;
  width: 74%;
}

.link_bar {
  font-size: 0.7em;
  text-align: center;
  margin: auto;
  /*  white-space: nowrap; */
}

.link_bar a {
  white-space: nowrap;
  font-weight: bold;
}

.page_menu li {
  margin: 5px;
  font-size: 0.8em;
}

/* Detail
-----------------------------------------------------------------------*/
.detail_table {
  border-top: 1px solid black;
  border-bottom: 1px solid black;
  padding: 3px;
  margin: 15px;
}

.detail_head td {
  background-color: #ddd;
  color: black;
  font-weight: bold;
  padding: 3px;
  font-size: 0.75em;
  text-align: center;
}

.detail_label {
  padding: 3px;
  font-size: 0.75em;
  width: 16%;
  border-top: 1px solid #fff;
  border-bottom: 1px solid #fff;
  background-color: #ddd;
}

.detail_field {
  width: 33%;
  font-size: 0.8em;
  /*color: ;*/
  text-align: center;
  padding: 3px;
}

.detail_sub_table {
  font-size: 1em;
}

.detail_spacer_row td {
  border-top: 1px solid white;
  border-bottom: 1px solid white;
  background-color: #999;
  font-size: 2px;
  line-height: 2px;
}

#narrow {
  width: 50%;
}

.operation {
  width: 1%;
}

.summary_spacer_row {
  font-size: 0.1em;
}

.bar {
  border-top: 1px solid black;
}

/* Forms
-----------------------------------------------------------------------*/
.form {
  border-top: 1px solid black;
  border-bottom: 1px solid black;
  margin-top: 10px;
}

.form td {
  padding: 3px;
}

.form th, .form_head td {
  background-color: #ddd;
  border-bottom: 1px solid black;
  color: black;
  padding: 3px;
  text-align: center;
  font-size: 0.65em;
  font-weight: bold;
}

.form_head a:link,
.form_head a:visited {
  color: black;
}

.form_head a:hover {
}

.sub_form_head td {
  border: none;
  font-size: 0.9em;
  white-space: nowrap;
}

.form input {
  color: black;
  background-color: white;
  border: 1px solid black;
  padding: 1px 2px 1px 2px;
  text-decoration: none;
  font-size: 1em;
}

.form textarea {
  color: black;
  background-color: white;
  border: 1px solid black;
  font-size: 1em;
}

.form select {
  color: black;
  background-color: white;
  font-size: 1em;
}

.button, a.button {
  color: black;
  background-color: white;
  border: 1px solid black;
  font-weight: normal;
  white-space: nowrap;
  text-decoration: none;
}

a.button {
  display: inline-block;
  text-align: center;
  padding: 2px;
}

a.button:hover {
  text-decoration: none;
  color: black;
}

.form_field {
  color: black;
  background-color: white;
  font-size: 0.7em;
}

.form_label {
  color: black;
  background-color: #ddd;
  font-size: 0.7em;
  padding: 3px;
}

/*
.form_foot {
  background-color: #E5D9C3;
  font-size: 0.6em;
}
*/

.form_foot td {
  background-color: #ddd;
  border-bottom: 1px solid black;
  color: black;
  padding: 3px;
  text-align: center;
  font-size: 0.65em;
  font-weight: bold;
}

.form_foot a:link,
.form_foot a:visited {
  color: black;
}

.form_foot a:hover {
  color: black;
}

.no_border_input input {
  border: none;
}

.no_wrap {
  white-space: nowrap;
}

tr.row_form td {
  white-space: nowrap;
}

/* Wizards
-----------------------------------------------------------------------*/
.wizard {
  font-size: 0.8em;
  border-top: 1px solid black;
}

#no_border {
  border: none;
}

.wizard p {
  text-indent: 2%;
}

.wizard td {
  padding: 3px;
/*  padding-left: 3px;
  padding-right: 3px;
  padding-bottom: 3px;*/
}

.wizard input {
  color: black;
  background-color: white;
  border: 1px solid black;
  padding: 1px 2px 1px 2px;
  text-decoration: none;
}

.wizard textarea {
  color: black;
  background-color: white;
  border: 1px solid black;
}

.wizard select {
  color: black;
  background-color: white;
  border: 1px solid black;
}

.wizard_head {
  color: black;
  font-weight: bold;
}

.wizard_buttons {
  border-top: 1px solid black;
  padding-top: 3px;
}

.wizard_buttons a {
  background-color: white;
  border: 1px solid black;
  padding: 2px 3px 2px 3px;
}

/* List
-----------------------------------------------------------------------*/
.list_table,
.notif_list_table {
  color: black;
  padding-bottom: 4px;
  background-color: white;
}

.list_table td,
.notif_list_table td {
  padding: 3px 5px 3px 5px;
}

.list_table input {
  color: black;
  background-color: white;
  border: 1px solid black;
  padding: 1px 2px 1px 2px;
  text-decoration: none;
}

.list_head,
.notif_list_head {
  font-weight: bold;
  background-color: #ddd;
  font-size: 0.65em;
}

.list_head td,
.notif_list_head td {
  border-top: 1px solid black;
  border-bottom: 1px solid black;
  color: black;
  text-align: center;
  white-space: nowrap;
}

.list_head a:link,
.list_head a:visited,
.notif_list_head a:link,
.notif_list_head a:visited {
  color: black;
}

.list_head a:hover,
.notif_list_head a:hover {
}

.list_foot {
  font-weight: bold;
  background-color: #ddd;
  font-size: 0.65em;
}

.list_foot td {
  border-top: 1px solid black;
  border-bottom: 1px solid black;
  color: black;
  text-align: right;
  white-space: nowrap;
}

.sub_list_head td {
  border: none;
  font-size: 0.7em;
}

.odd_row td {
/*  background-color: #EDF2F7;
border-top: 2px solid #FFFFff;*/
background-color: transparent;
border-bottom: 0.9px solid #ddd; /* 0.9 so table borders take precedence */
}

.even_row td {
/*  background-color: #F8EEE4;
border-top: 3px solid #FFFFff;*/
background-color: #f6f6f6;
border-bottom: 0.9px solid #ddd;
}

.spacer_row td {
  line-height: 2px;
  font-size: 2px;
}

.phone_table td {
  border: none;
  font-size: 0.8em;
}

div.notif_list_text {
  margin-bottom: 1px;
  font-size: 1.1em;
}

.notif_list_row td.notif_list_job {
  text-align: center;
  font-weight: bold;
  font-size: 0.65em;
}

.notif_list_row td.notif_list_dismiss table td {
  text-align: center;
  font-size: 1em;
  border: none;
  padding: 0px 2px 0px 2px;
}

.notif_list_row td {
  padding: 5px 5px 7px 5px;
  border-bottom: 1px dotted #ddd;
  background-color: white;
  font-size: 0.6em;
}

.notif_list_row:hover td {
  background-color: #ddd;
}

/* Page
-----------------------------------------------------------------------*/
.page {
  border: none;
  padding: 0in;
  margin-right: 0.1in;
  margin-left: 0.1in;
  /*margin: 0.33in 0.33in 0.4in 0.33in; */
  background-color: transparent;
}

.page table.header h1{
  font-size: 12pt;
}

.page>h2,
.page>p {
  margin-top: 2pt;
  margin-bottom: 2pt;
}

.page h2 {
  page-break-after: avoid;
}

.money_table {
  border-collapse: collapse;
  font-size: 6pt;
}

/* Tree
-----------------------------------------------------------------------*/
.tree_div {
  display: none;
  background-color: #ddd;
  border: 1px solid #333;
}

.tree_div .tree_step_bottom_border {
  border-bottom: 1px dashed #8B9DBE;
}

.tree_div .button, .tree_row_table .button,
.tree_div .no_button {
  width: 110px;
  font-size: 0.7em;
  padding: 3px;
  text-align: center;
}

/*
.tree_div .button a, .tree_row_table .button a {
  text-decoration: none;
  color: #114C8D;
}
*/

.tree_row_desc {
  font-weight: bold;
  font-size: 0.7em;
  text-indent: -10px;
}

.tree_row_info {
  font-size: 0.7em;
  width: 200px;
}

.tree_div_head a,
.tree_row_desc a {
  color: #000033;
  text-decoration: none;
}

.tree_div_head {
  font-weight: bold;
  font-size: 0.7em;
}

/* Summaries
-----------------------------------------------------------------------*/
.summary {
  border: 1px solid black;
  background-color: white;
  padding: 1%;
  font-size: 0.8em;
}

.summary h1 {
  color: black;
  font-style: normal;
}

/* Sales-agreement specific
-----------------------------------------------------------------------*/
table.sa_signature_box {
  margin: 2em auto 2em auto;
}

table.sa_signature_box tr td {
  padding-top: 1.25em;
  vertical-align: top;
  white-space: nowrap;
}

.special_conditions {
  font-style: italic;
  margin-left: 2em;
  white-space: pre;
}

.sa_head * {
  font-size: 7pt;
}

/* Change order specific
-----------------------------------------------------------------------*/
table.change_order_items {
  font-size: 8pt;
  width: 100%;
  border-collapse: collapse;
  /*margin-top: 0em;*/
  /*margin-bottom: 2em;*/
}

table.change_order_items>tbody {
  border: 1px solid black;
}

table.change_order_items>tbody>tr>th {
  border-bottom: 1px solid black;
}

table.change_order_items>tbody>tr>td {
  border-right: 1px solid black;
  /*padding: 0.1em;*/
}

td.change_order_total_col {
  padding-right: 4pt;
  text-align: right;
}

td.change_order_unit_col {
  padding-left: 2pt;
  text-align: left;
}
</style>
</head>

<body>
  <div id="body">

    <div id="section_header">
    </div>

    <div id="content">

      <div class="page" style="font-size: 7pt">
        <table style="width: 100%;" class="header">
          <tr>
            <td><h1 style="text-align: left">EPC/EPD/GEPD INFORMATION</td>
          </tr>
        </table>

        <table style="width: 100%; font-size: 8pt;">
          <tr>
            <td>Name: <strong><?php echo $data['data_epc']->rm_name; ?></strong></td>
            <td>Recruiter: <strong><?php echo $data['data_epc']->rm_recruiter_name; ?></strong></td>
          </tr>

          <tr>
            <td>Address: <strong><?php echo $data['data_epc']->rm_home_address_1; ?>, <?php echo $data['data_epc']->rm_home_address_2; ?>, <?php echo $data['data_epc']->rm_home_address_3; ?></strong></td>
            <td>EPD: <strong><?php echo $data['data_epc']->rm_epd_name; ?></strong></td>
          </tr>

          <tr>
            <td>Phone / Cellular: <strong><?php echo $data['data_epc']->rm_phone_home; ?> / <?php echo $data['data_epc']->rm_mobile_phone; ?></strong></td>
            <td>GEPD: <strong><?php echo $data['data_epc']->rm_gepd_name; ?></strong></td>
          </tr>
        </table>
        <div style="border-top: 1px solid black;width: 100%;display: block;height: 1em;"></div>
        <table class="change_order_items" style="margin-top: 0px;">

          <tr><td colspan="4"><h2>Achievement Per Month:</h2></td></tr>

          <tbody>
            <tr>
              <th style="width: 200px;">Periode</th>
              <th>PS</th>
              <th>MS</th>
              <th style="border-right: 1px solid;width:190px;">Direct Member Sales (DMS)</th>
            </tr>

            <?php
            $periode_all = array(
             $data['year'] . '01',
             $data['year'] . '02',
             $data['year'] . '03',
             $data['year'] . '04',
             $data['year'] . '05',
             $data['year'] . '06',
             $data['year'] . '07',
             $data['year'] . '08',
             $data['year'] . '09',
             $data['year'] . '10',
             $data['year'] . '11',
             $data['year'] . '12',
             );

            $count = 0;

            $value = new stdClass();
            $value->ac_PSSU = false;
            $value->ac_MSSU = false;
            $value->ac_RISU = false;

            $index = array();

            $cnt = 0;
            $dataAchievement = $data['data_achievement']->toArray();

            ?>
            @foreach($periode_all as $value_periode)
            @if(@$dataAchievement[$count]['periode'] == $value_periode)
            <tr class="<?php echo $cnt % 2 == 1 ? "even_row" : "odd_row"; ?>">
              <td style="text-align: center"><?php echo date('M Y', strtotime(substr($value_periode, 0, 4) . '-' . substr($value_periode, 4, 2) . '-01')); ?></td>
              <td style="text-align: right;"><?php echo number_format($dataAchievement[$count]['ac_PSSU']); ?></td>
              <td style="text-align: right;"><?php echo number_format($dataAchievement[$count]['ac_MSSU']); ?></td>
              <td style="text-align: right;"><?php echo number_format($dataAchievement[$count]['ac_RISU']); ?></td>
            </tr>
            @yield($count++)
            @else
            <tr class="<?php echo $cnt % 2 == 1 ? "even_row" : "odd_row"; ?>">
              <td style="text-align: center"><?php echo date('M Y', strtotime(substr($value_periode, 0, 4) . '-' . substr($value_periode, 4, 2) . '-01')); ?></td>
              <td style="text-align: right;">0</td>
              <td style="text-align: right;">0</td>
              <td style="text-align: right;">0</td>
            </tr>
            @endif
            @yield($cnt++)

            @endforeach

          </tbody>

          <tr>
            <td style="text-align: right;"><strong>GRAND TOTAL:</strong></td>
            <td style="text-align: right;"><strong>{{ @$data['data_achievement_epc'][0]->total_SU }}</strong></td>
            <td style="text-align: right;"><strong><?php echo (@$data['data_achievement_epc'][0]->total_MS) ?></strong></td>
            <td class="change_order_total_col"><strong><?php echo (@$data['data_achievement_epc'][0]->total_RI) ?></strong></td>
          </tr>
        </table>
        <table class="change_order_items">
          <tr><td colspan="4"><h2>Achievement Per Quarter :</h2></td></tr>
          <tbody>
            <tr>
              <th style="width: 200px;">Periode</th>
              <th>PS</th>
              <th>MS</th>
              <th style="border-right: 1px solid;width:190px;">Direct Member Sales (DMS)</th>
            </tr>

            <?php
            for ($i = 1; $i <= 4; $i++) {
             $objSU = 'triwulan_' . $i . '_SU';
             $objMS = 'triwulan_' . $i . '_MS';
             $objRI = 'triwulan_' . $i . '_RI';
             ?>
             <tr class="<?php echo $i % 2 == 1 ? "even_row" : "odd_row"; ?>">
              <td style="text-align: center">Quarter <?php echo $i; ?></td>
              <td style="text-align: right;"><?php echo number_format(@$data['data_achievement_epc'][0]->$objSU); ?></td>
              <td style="text-align: right;"><?php echo number_format(@$data['data_achievement_epc'][0]->$objMS); ?></td>
              <td style="text-align: right;"><?php echo number_format(@$data['data_achievement_epc'][0]->$objRI); ?></td>
            </tr>
            <?php }
            ;?>

          </tbody>

          <tr>
            <td colspan="1" style="text-align: right;"><strong>GRAND TOTAL:</strong></td>
            <td colspan="1" style="text-align: right;"><strong><?php echo number_format(@$data['data_achievement_epc'][0]->total_SU) ?></strong></td>
            <td colspan="1" style="text-align: right;"><strong><?php echo number_format(@$data['data_achievement_epc'][0]->total_MS) ?></strong></td>
            <td class="change_order_total_col"><strong><?php echo number_format(@$data['data_achievement_epc'][0]->total_RI) ?></strong></td>
          </tr>
        </table>
        <table class="change_order_items">

          <tr><td colspan="4"><h2>Achievement Per Semester :</h2></td></tr>
          <tbody>
            <tr>
              <th style="width: 200px;">Periode</th>
              <th>PS</th>
              <th>MS</th>
              <th style="border-right: 1px solid;width:190px;">Direct Member Sales (DMS)</th>
            </tr>

            <?php
            for ($i = 1; $i <= 2; $i++) {
             $objSUsemester = 'semester_' . $i . '_SU';
             $objMSsemester = 'semester_' . $i . '_MS';
             $objRIsemester = 'semester_' . $i . '_RI';
             ?>
             <tr class="<?php echo $i % 2 == 1 ? "even_row" : "odd_row"; ?>">
              <td style="text-align: center">Semester <?php echo $i; ?></td>
              <td style="text-align: right;"><?php echo number_format(@$data['data_achievement_epc'][0]->$objSUsemester); ?></td>
              <td style="text-align: right;"><?php echo number_format(@$data['data_achievement_epc'][0]->$objMSsemester); ?></td>
              <td style="text-align: right;"><?php echo number_format(@$data['data_achievement_epc'][0]->$objRIsemester); ?></td>
            </tr>
            <?php }
            ;?>
          </tbody>

          <tr>
            <td colspan="1" style="text-align: right;"><strong>GRAND TOTAL:</strong></td>
            <td colspan="1" style="text-align: right;"><strong><?php echo number_format(@$data['data_achievement_epc'][0]->total_SU) ?></strong></td>
            <td colspan="1" style="text-align: right;"><strong><?php echo number_format(@$data['data_achievement_epc'][0]->total_MS) ?></strong></td>
            <td class="change_order_total_col"><strong><?php echo number_format(@$data['data_achievement_epc'][0]->total_RI) ?></strong></td>
          </tr>


        </table>
        <div style="border-top: 1px solid black;width: 100%;display: block;height: 1em;"></div>
        <table class="change_order_items">

          <tr><td colspan="9"><h2>Komisi:</h2></td></tr>

          <tbody>
            <tr>
              <th>Periode</th>
              <th>PS</th>
              <th>SL</th>
              <th>RI</th>
              <th>RA</th>
              <th>MS</th>
              <th>Promo</th>
              <th>Other</th>
              <th>Sub Total</th>
            </tr>
            @for ( $i = 1;  $i <= 12;  $i++)
            <tr class="<?php echo $cnt % 2 == 1 ? "even_row" : "odd_row"; ?>">
              <td style="text-align: center">{{ $data['data_komisi'][$i]['periode'] }}</td>
              <td style="text-align: center">{{ $data['data_komisi'][$i]['ps'] }}</td>
              <td style="text-align: right;">{{ $data['data_komisi'][$i]['sl'] }}</td>
              <td style="text-align: right;">{{ $data['data_komisi'][$i]['ri'] }}</td>
              <td style="text-align: right;">{{ $data['data_komisi'][$i]['ra'] }}</td>
              <td style="text-align: right;">{{ $data['data_komisi'][$i]['ms'] }}</td>
              <td style="text-align: right;">{{ $data['data_komisi'][$i]['promo'] }}</td>
              <td style="text-align: right;">{{ $data['data_komisi'][$i]['other'] }}</td>
              <td style="text-align: right;">{{ $data['data_komisi'][$i]['subTotal'] }}</td>

            </tr>
            @endfor
            <tr class="<?php echo $cnt % 2 == 1 ? "even_row" : "odd_row"; ?>">
              <td style="text-align: right;"><strong>GRAND TOTAL:</strong></td>
              <td style="text-align: right;"><strong>{{ $data['data_komisi']['psTotal'] }}</strong></td>
              <td style="text-align: right;"><strong>{{ $data['data_komisi']['slTotal'] }}</strong></td>
              <td style="text-align: right;"><strong>{{ $data['data_komisi']['riTotal'] }}</strong></td>
              <td style="text-align: right;"><strong>{{ $data['data_komisi']['raTotal'] }}</strong></td>
              <td style="text-align: right;"><strong>{{ $data['data_komisi']['msTotal'] }}</strong></td>
              <td style="text-align: right;"><strong>{{ $data['data_komisi']['promoTotal'] }}</strong></td>
              <td style="text-align: right;"><strong>{{ $data['data_komisi']['otherTotal'] }}</strong></td>
              <td class="change_order_total_col" style="text-align: right;background:#EEE;"><strong>{{ $data['data_komisi']['allTotal'] }}</strong></td>
            </tr>
          </tbody>
        </table>

          <div style="border-top: 1px solid black;width: 100%;display: block;height: 1em;"></div>
          <table class="change_order_items">

            <tr><td colspan="5"><h2>UnPaid:</h2></td></tr>

            <tbody>
              <tr>
                <th>Periode</th>
                <th>KP Number</th>
                <th>Commission Gross</th>
                <th>Tax</th>
                <th style="border-right: 1px solid">Paid Amount</th>
              </tr>
              <?php
              $cnt = 0;
              if (!empty($data['data_unpaid'])) {
               foreach ($data['data_unpaid'] as $key => $val):
                $cnt++;
              ?>
              <tr class="<?php echo $cnt % 2 == 1 ? "even_row" : "odd_row"; ?>">
                <td style="text-align: center"><?php echo date('M Y', strtotime(substr($val->rp_periode, 0, 4) . '-' . substr($val->rp_periode, 4, 2) . '-01')); ?></td>
                <td><?php echo $val->rp_kp_number; ?></td>
                <td style="text-align: center"><?php echo number_format($val->rp_commission_gross_amount); ?></td>
                <td style="text-align: center"><?php echo number_format($val->rp_tax_amount); ?></td>
                <td class="change_order_total_col"><?php echo number_format($val->rp_paid_amount); ?></td>
              </tr>
              <?php
              @$rp_commission_gross_amount = $rp_commission_gross_amount + $val->rp_commission_gross_amount;
              @$rp_tax_amount = $rp_tax_amount + $val->rp_tax_amount;
              @$rp_paid_amount = $rp_paid_amount + $val->rp_paid_amount;
              endforeach;
            } else {
             ?>
             <tr class="<?php echo $cnt % 2 == 1 ? "even_row" : "odd_row"; ?>">
              <td style="text-align: center">&nbsp;</td>
              <td></td>
              <td style="text-align: center"></td>
              <td style="text-align: center"></td>
              <td class="change_order_total_col"></td>
            </tr>
            <?php
          }
          ?>
        </tbody>




        <tr>
          <td colspan="2" style="text-align: right;"><strong>GRAND TOTAL:</strong></td>
          <td style="text-align: right;"><strong><?php echo number_format(@$rp_commission_gross_amount); ?></strong></td>
          <td style="text-align: right;"><strong><?php echo number_format(@$rp_tax_amount); ?></strong></td>
          <td class="change_order_total_col"><strong><?php echo number_format(@$rp_paid_amount); ?></strong></td></tr>
        </table>

        <div style="border-top: 1px solid black;width: 100%;display: block;height: 1em;"></div>

      </div>

    </div>
  </div>

</body>
</html>