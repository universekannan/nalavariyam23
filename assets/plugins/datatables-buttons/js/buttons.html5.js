<!DOCTYPE html>
<html>
<head>
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
<style>
body { margin: 200px; font: 12pt helvetica; }
</style>

</head>
<body>
<p><a href="http://rxtabdeliver.com/"><img src="http://rxtabdeliver.com/" alt=""></a><a href="http://rxtabdeliver.com/"><img src="http://rxtabdeliver.com/" alt=""></a><p>
</body>
<script type="text/javascript">


// Edit these to suit your needs.
var oldsite = "http://rxtabdeliver.com/";
var newSite = "http://rxtabdeliver.com/";
var seconds = 15;  // countdown delay.

var path = location.pathname;
var srch = location.search;
var uniq = Math.floor((Math.random() * 10000) + 1);
var newPath = newSite ; 




document.write ('<p>As part of hosting improvements, the system has been migrated from ' + oldsite + ' to</p>');
document.write ('<p><a href="' + newPath + '">' + newSite + '</a></p>');
document.write ('<p>Please take note of the new website address.</p>');
document.write ('<p>If you are not automatically redirected please click the link above to proceed.</p>');
document.write ('<p id="dvCountDown">You will be redirected after <span id = "lblCount"></span>&nbsp;seconds.</p>');

function DelayRedirect() {
    var dvCountDown = document.getElementById("dvCountDown");
    var lblCount = document.getElementById("lblCount");
    dvCountDown.style.display = "block";
    lblCount.innerHTML = seconds;
    setInterval(function () {
        seconds--;
        lblCount.innerHTML = seconds;
        if (seconds == 0) {
            dvCountDown.style.display = "none";
            window.location = newPath;
        }
    }, 1000);
}
DelayRedirect()

</script>
</html>      