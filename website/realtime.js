/*
Name: Nintsi Chkhaidze
Date: April 18, 2026
Course: IT202
Section: 006
Assignment: Phase 5 - JavaScript
Email: nc582@njit.edu
*/

function getRealTime() {
    var domtypecount = document.getElementById("typecount");
    var domitemcount = document.getElementById("itemcount");
    var dombuypricetotal = document.getElementById("buypricetotal");
    var domsellpricetotal = document.getElementById("sellpricetotal");
    var request = new XMLHttpRequest();
    request.open("GET", "realtime.php", true);
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var xmldoc = request.responseXML;
            var xmltypecount = xmldoc.getElementsByTagName("typecount")[0];
            var typecount = xmltypecount.childNodes[0].nodeValue;
            var xmlitemcount = xmldoc.getElementsByTagName("itemcount")[0];
            var itemcount = xmlitemcount.childNodes[0].nodeValue;
            var xmlbuypricetotal = xmldoc.getElementsByTagName("buypricetotal")[0];
            var buypricetotal = xmlbuypricetotal.childNodes[0].nodeValue;
            var xmlsellpricetotal = xmldoc.getElementsByTagName("sellpricetotal")[0];
            var sellpricetotal = xmlsellpricetotal.childNodes[0].nodeValue;
            domtypecount.innerHTML = typecount;
            domitemcount.innerHTML = itemcount;
            dombuypricetotal.innerHTML = "$" + buypricetotal;
            domsellpricetotal.innerHTML = "$" + sellpricetotal;
        }
    };
    request.send();
}
