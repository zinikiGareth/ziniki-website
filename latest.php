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
function cell($g, $l) {
  $h = "_downloads/" . $g . '/' . $l;
  if (file_exists($h)) {
    print "<td class='download link'><a href='$h'>$g</a></td>";
  } else {
    print "<td class='download nolink'></td>";
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
</head>
<body>
<h1>Latest Downloads</h1>
<table class='downloads'>
<tr><th colspan='2'>FLAS</th><th colspan='2'>Ziniki</th><th></th><th colspan='4'>Developer Guides</th><th colspan='4'>Reference Manuals</th></tr>
<tr><th>MacOS</th><th>Linux</th><th>Developer Kit</th><th>AWS Deployment</th><th>VSCode Extension</th><th colspan='2'>FLAS</th><th colspan='2'>Ziniki</th><th colspan='2'>FLAS</th><th colspan='2'>Ziniki</th></tr>
<tr>
<?php
cell($fm, "flas-mac.zip");
cell($fl, "flas-linux.zip");
cell($zd, "ziniki.zip");
cell($za, "aws-lambda.zip");
cell($vs, "flas-0.0.1.vsix");
cell($guide, "flas-guide.pdf");
cell($guide, "flas-guide.epub");
cell($ref, "flas-reference.pdf");
cell($ref, "flas-reference.epub");
cell($zguide, "ziniki-guide.pdf");
cell($zguide, "ziniki-guide.epub");
cell($zref, "ziniki-reference.pdf");
cell($zref, "ziniki-reference.epub");
?>
</tr>
</table>
</body>
</html>
