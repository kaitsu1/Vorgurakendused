<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Koduloomad</title>
</head>
<body>
<h1>Koduloomad raamatust </h1>
<?php
$koduloomad = array(
    array('nimi' => 'Hani', 'kirjeldus' => 'veelind', 'omadus1' => 'Hanel on pikk kael.', 'omadus2' => 'Hani häälitseb kaagatades.'),
    array('nimi' => 'Part', 'kirjeldus' => 'veelind', 'omadus1' => 'Pardile meeldib vees olla.', 'omadus2' => 'Part häälitseb prääksudes.'),
    array('nimi' => 'Hobune', 'kirjeldus' => 'tugev', 'omadus1' => 'Hobune jookseb kiiresti.', 'omadus2' => 'Hobuse häälitsemine on hirnumine.'),
    array('nimi' => 'Kalkun', 'kirjeldus' => 'kõige suurem kodulind', 'omadus1' => 'Kalkunil on pea küljes punane lont.', 'omadus2' => 'Kalkun häälitseb kluginal.'),
    array('nimi' => 'Kana', 'kirjeldus' => 'emalind', 'omadus1' => 'Kana muneb mune.', 'omadus2' => 'Kana kloksub tibudele.'),
    array('nimi' => 'Kass', 'kirjeldus' => 'isepäine', 'omadus1' => 'Kass on uudishimulik ja taibukas.', 'omadus2' => 'Kassi häälitsus on näugumine.'),
    array('nimi' => 'Koer', 'kirjeldus' => 'hea sõber ja seltsiline', 'omadus1' => 'Koer on arukas loom.', 'omadus2' => 'Koer teeb häält haukudes.'),
    array('nimi' => 'Küülik', 'kirjeldus' => 'kodujänes', 'omadus1' => 'Küülikul on pikad kõrvad.', 'omadus2' => 'Küülik väga häält ei tee.'),
    array('nimi' => 'Kits', 'kirjeldus' => 'valge, hall või must', 'omadus1' => 'Kitsel on lühike saba.', 'omadus2' => 'Kitse häälitsus on mökitamine.'),
    array('nimi' => 'Lammas', 'kirjeldus' => 'peenikeste jalgadega', 'omadus1' => 'Lamba keha on kaetud villaga.', 'omadus2' => 'Lammas määgib: mää-mää.'),
    array('nimi' => 'Siga', 'kirjeldus' => 'päris paks loom suurte lontis kõrvadega', 'omadus1' => 'Sea kärss on tugev.', 'omadus2' => 'Sead röhivad või ruigavad.'),
    array('nimi' => 'Veis', 'kirjeldus' => 'koduloom', 'omadus1' => 'Vasikas on kõige väiksem veis.', 'omadus2' => 'Veise häälitsus on ammumine.'),
);
foreach ($koduloomad as $loom) {
    include 'koduloomad.html';
}
?>

</body>
</html>