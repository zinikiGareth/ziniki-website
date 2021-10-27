<?php
$codes = [];
function check($curr, $g, $m) {
  global $codes;
  if ($curr)
    return $curr;
  $h = "_downloads/" . $g . '/' . $m;
  if (file_exists($h)) {
    $codes[$m] = $h;
    return $g;
  } else
    return null;
}
function cell($g, $l, $m) {
  $h = "_downloads/" . $g . '/' . $l;
  if (file_exists($h)) {
    print "<a href='$h'>";
    print "<div class='download-for'>";
    print "<div class='download-label'>$m: </div>";
    print "<div class='download-version'>$g</div>";
    print "</div>";
    print "</a>";
  }
}
$fm = null;
$fl = null;
$zd = null;
$za = null;
$vs = null;
$guide = null;
$ref = null;
$zguide = null;
$zref = null;
$dates = scandir("_downloads", 1); // reverse order
foreach ($dates as $i => $f) {
  if (preg_match('/[0-9]+/', $f) == 1 && (strlen($f) == 8 || strlen($f) == 6)) {
    $fm = check($fm, $f, "flas-mac.zip");
    $fl = check($fm, $f, "flas-linux.zip");
    $zd = check($zd, $f, "ziniki.zip");
    $za = check($za, $f, "aws-lambda.zip");
    $vs = check($za, $f, "flas-0.0.1.vsix");
    $guide = check($guide, $f, "flas-guide.pdf");
    $ref = check($ref, $f, "flas-reference.pdf");
    $zguide = check($zguide, $f, "ziniki-guide.pdf");
    $zref = check($zref, $f, "ziniki-reference.pdf");
  }
}

  $what = $_GET['what'];
  if ($what && $codes[$what]) {
    header('Location: /' . $codes[$what], true, 307);
    exit();
  }
?>
<html>
<head>
<title>Latest Downloads</title>
<link rel='stylesheet' type='text/css' href='/css/ziniki.css'>
<link rel='stylesheet' type='text/css' href='/css/downloads.css'>
<link rel='stylesheet' type='text/css' href='/css/latest.css'>
</head>
<body>
<div class='titlebar'>
			<img src='images/ZinikiLogo.png' alt='Ziniki Logo'>
			<div class='title'>Latest Downloads</div>
			<img src='images/ZinikiLogo.png' alt='Ziniki Logo'>
		</div>
<div class='download-all-groups'>
<div class='download-block'>
<div class='download-group'>
<div class='download-title'>FLAS Binaries</div>
<?php
cell($fm, "flas-mac.zip", "Mac");
cell($fl, "flas-linux.zip", "Linux");
?>
</div>
<div class='download-group'>
<div class='download-title'>Ziniki Binaries</div>
<?php
cell($zd, "ziniki.zip", "Developer Kit");
cell($za, "aws-lambda.zip", "AWS Deployable");
?>
</div>
<div class='download-group'>
<div class='download-title'>IDE Plugins</div>
<?php
cell($vs, "flas-0.0.1.vsix", "VS Code");
?>
</div>
<div class='download-group'>
<div class='download-title'>FLAS Documentation</div>
<?php
cell($guide, "flas-guide.pdf", "Guide PDF");
cell($guide, "flas-guide.epub", "Guide EPUB");
cell($ref, "flas-reference.pdf", "Reference PDF");
cell($ref, "flas-reference.epub", "Reference EPUB");
?>
</div>
<div class='download-group'>
<div class='download-title'>Ziniki Documentation</div>
<?php
cell($zguide, "ziniki-guide.pdf", "Guide PDF");
cell($zguide, "ziniki-guide.epub", "Guide EPUB");
cell($zref, "ziniki-reference.pdf", "Reference PDF");
cell($zref, "ziniki-reference.epub", "Reference EPUB");
?>
</div>
</div>
</div>
</body>
</html>
