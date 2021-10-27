<html lang='en'>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Downloads</title>
<link rel='stylesheet' type='text/css' href='css/ziniki.css'>
<link rel='stylesheet' type='text/css' href='css/downloads.css'>
<link rel="stylesheet" type='text/css' href="css/ziniki-mobile.css">
</head>
<body>
<div class='titlebar'>
			<img src='images/ZinikiLogo.png' alt='Ziniki Logo'>
			<div class='title long'>Download Archive</div>
			<img src='images/ZinikiLogo.png' alt='Ziniki Logo'>
		</div>
  <div class='downloads-container'>
<table class='downloads'>
<tr><th></th><th colspan='2'>FLAS</th><th colspan='2'>Ziniki</th><th></th><th colspan='4'>Developer Guides</th><th colspan='4'>Reference Manuals</th></tr>
<tr><th>Version</th><th>MacOS</th><th>Linux</th><th>Developer Kit</th><th>AWS Deployment</th><th>VSCode Extension</th><th colspan='2'>FLAS</th><th colspan='2'>Ziniki</th><th colspan='2'>FLAS</th><th colspan='2'>Ziniki</th></tr>
<?php
function cell($g, $m, $l) {
    $h = $g . $m;
    if (file_exists($h)) {
      print "<td class='download link'><a href='$h'>$l</a></td>";
    } else {
      print "<td class='download nolink'></td>";
    }
}
$dates = scandir("_downloads", 1); // reverse order
foreach ($dates as $i => $f) {
  if (preg_match('/[0-9]+/', $f) == 1 && (strlen($f) == 8 || strlen($f) == 6)) {
    print "<tr><td class='version'>$f</td>";
    $g = "_downloads/$f/";
    cell($g, "flas-mac.zip", "Mac");
    cell($g, "flas-linux.zip", "Linux");
    cell($g, "ziniki.zip", "Ziniki");
    cell($g, "aws-lambda.zip", "Lambda Zip");
    cell($g, "flas-0.0.1.vsix", "VSCode");
    cell($g, "flas-guide.epub", "EPUB");
    cell($g, "flas-guide.pdf", "PDF");
    cell($g, "ziniki-guide.epub", "EPUB");
    cell($g, "ziniki-guide.pdf", "PDF");
    cell($g, "flas-reference.epub", "EPUB");
    cell($g, "flas-reference.pdf", "PDF");
    cell($g, "ziniki-reference.epub", "EPUB");
    cell($g, "ziniki-reference.pdf", "PDF");
    print "</tr>\n";
  }
}
?>
</table>
</div>
</body>
</html>
