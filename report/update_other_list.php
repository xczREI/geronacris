<?php
$content = file_get_contents("other-list.php");

// Update top logic
$newTop = "<?php

  \$yy = \$_POST[\"year\"];
  \$mm = \$_POST[\"month\"];
  \$xx = (\"\$yy-\$mm-01\");
  \$zz = (\"\$yy-\$mm-31\");

  if (!empty(\$mm) && \$mm != \"All\") {
      \$dateObj = DateTime::createFromFormat(\"!m\", \$mm);
      \$monthName = strtoupper(\$dateObj->format(\"F\"));
  } else {
      \$monthName = \"\";
  }

  if (!empty(\$yy) && (empty(\$mm) || \$mm == \"All\")) {
      \$birthCond = \"(child_birth_date LIKE \x27\$yy-%\x27 OR child_birth_date LIKE \x27%\$yy\x27)\";
      \$deathCond = \"(date_death LIKE \x27\$yy-%\x27 OR date_death LIKE \x27%\$yy\x27)\";
      \$mrgCond   = \"(mrg_date LIKE \x27\$yy-%\x27 OR mrg_date LIKE \x27%\$yy\x27)\";
  } else if (!empty(\$yy) && \$mm != \"All\") {
      \$birthCond = \"(child_birth_date LIKE \x27\$yy-\$mm-%\x27 OR child_birth_date LIKE \x27%\$monthName%\$yy\x27)\";
      \$deathCond = \"(date_death LIKE \x27\$yy-\$mm-%\x27 OR date_death LIKE \x27%\$monthName%\$yy\x27)\";
      \$mrgCond   = \"(mrg_date LIKE \x27\$yy-\$mm-%\x27 OR mrg_date LIKE \x27%\$monthName%\$yy\x27)\";
  }

  if (!empty(\$yy) && empty(\$mm) || !empty(\$yy) && \$mm == \"All\") {
?>";
$content = preg_replace("/<\?php\s+\\\$yy = \\\$_\POST\[\x27year\x27\];.*if \(!empty\(\\\$yy\) && empty\(\\\$mm\) \|\| !empty\(\\\$yy\) && \\\$mm == \x27All\x27\) {/s", $newTop, $content);

// 1. Birth All
$content = str_replace(
    "SELECT * FROM registration_tbl WHERE reg_date LIKE \x27\$yy%\x27",
    "SELECT registration_tbl.no FROM registration_tbl NATURAL JOIN child_tbl WHERE \$birthCond",
    $content
);
$content = str_replace(
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date LIKE \x27\$yy%\x27 GROUP BY reg_user",
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl NATURAL JOIN child_tbl WHERE \$birthCond GROUP BY reg_user",
    $content
);

// 2. Death All
$content = str_replace(
    "SELECT * FROM registration_tbl WHERE reg_date LIKE \x27\$yy%\x27",
    "SELECT registration_tbl.no FROM registration_tbl NATURAL JOIN person_tbl WHERE \$deathCond",
    $content
);
$content = str_replace(
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date LIKE \x27\$yy%\x27 GROUP BY reg_user",
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl NATURAL JOIN person_tbl WHERE \$deathCond GROUP BY reg_user",
    $content
);

// 3. Marriage All
$content = str_replace(
    "SELECT * FROM registration_tbl WHERE reg_date LIKE \x27\$yy%\x27",
    "SELECT registration_tbl.no FROM registration_tbl NATURAL JOIN marriage_tbl WHERE \$mrgCond",
    $content
);
$content = str_replace(
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date LIKE \x27\$yy%\x27 GROUP BY reg_user",
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl NATURAL JOIN marriage_tbl WHERE \$mrgCond GROUP BY reg_user",
    $content
);

// 1. Birth Month
$content = str_replace(
    "SELECT * FROM registration_tbl WHERE reg_date BETWEEN \x27\$xx\x27 AND \x27\$zz\x27",
    "SELECT registration_tbl.no FROM registration_tbl NATURAL JOIN child_tbl WHERE \$birthCond",
    $content
);
$content = str_replace(
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date BETWEEN \x27\$xx\x27 AND \x27\$zz\x27 GROUP BY reg_user",
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl NATURAL JOIN child_tbl WHERE \$birthCond GROUP BY reg_user",
    $content
);

// 2. Death Month
$content = str_replace(
    "SELECT * FROM registration_tbl WHERE reg_date BETWEEN \x27\$xx\x27 AND \x27\$zz\x27",
    "SELECT registration_tbl.no FROM registration_tbl NATURAL JOIN person_tbl WHERE \$deathCond",
    $content
);
$content = str_replace(
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date BETWEEN \x27\$xx\x27 AND \x27\$zz\x27 GROUP BY reg_user",
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl NATURAL JOIN person_tbl WHERE \$deathCond GROUP BY reg_user",
    $content
);

// 3. Marriage Month
$content = str_replace(
    "SELECT * FROM registration_tbl WHERE reg_date BETWEEN \x27\$xx\x27 AND \x27\$zz\x27",
    "SELECT registration_tbl.no FROM registration_tbl NATURAL JOIN marriage_tbl WHERE \$mrgCond",
    $content
);
$content = str_replace(
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl WHERE reg_date BETWEEN \x27\$xx\x27 AND \x27\$zz\x27 GROUP BY reg_user",
    "SELECT COUNT(*) AS xx, reg_user FROM registration_tbl NATURAL JOIN marriage_tbl WHERE \$mrgCond GROUP BY reg_user",
    $content
);

file_put_contents("other-list.php", $content);
echo "SUCCESS";
?>
