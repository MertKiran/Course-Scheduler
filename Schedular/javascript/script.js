var derslerdizileri;
var secilendersler = [];
var eklenenDersSayisi = 0;
var derslerinDilimler = [];
var silinmisdersdilimiArray = [];
var silinmisdilim;
var tempdilim = [];
var tempSize = 0;
var istenmeyenSaatler = [];
var lastclickedBolumID;
var lastclickedDersKodu;
var GrupDersleri = [];
var BolumlerDizisi = [];
var derslerdizilerieski = [];
var colorindex = 0;
var renkAtaDizi = [];

var colors = ["LightBlue", "LightCoral", "LightGreen", "LightPink", "LightSalmon", "LightSeaGreen", "LightSkyBlue", "LightSlateGray", "MediumAquaMarine", "LightGrey", "MediumOrchid", "MediumPurple", "MediumSeaGreen", "MediumSlateBlue", "MediumSpringGreen", "MediumTurquoise", "MediumVioletRed", "MidnightBlue", "AliceBlue", "AntiqueWhite", "Aqua", "Aquamarine", "Azure", "Beige", "Bisque", "Black", "BlanchedAlmond", "Blue", "BlueViolet", "Brown", "BurlyWood", "CadetBlue"];
$.ajax({ //1 safya yüklenirken mevcut bölümler veritabanından getirilir
    type: "POST",
    url: "ajax.php",
    data: {
        action: "funcBolumler"
    },
    dataType: "json",
    success: function(sonuc) {
        BolumlerDizisi = sonuc;
        BolumleriYazdir();
        // $("#bolumler").html(sonuc);
    },
    error: function(result) {
        // alert("Bölümler getirilemedi");
        alert("Sunucu ile bağlantı kurulamadı");
    }
})

function renkAta(adnNumarsı) {
    if (renkAtaDizi.length == 0) {
        renkAtaDizi[0] = adnNumarsı;
    }

    for (var i = 0; i < renkAtaDizi.length; i++) {
        if (renkAtaDizi[i] == adnNumarsı) {
            return i;
        }


    }
    renkAtaDizi[renkAtaDizi.length] = adnNumarsı;
    return renkAtaDizi.length - 1;

}


function downloadJson() {
    saveJSON(secilendersler, "Liste.json")
}

function saveJSON(data, filename) {

    if (!data) {
        console.error('No data')
        return;
    }

    if (!filename) filename = 'console.json'

    if (typeof data === "object") {
        data = JSON.stringify(data, undefined, 4)
    }

    var blob = new Blob([data], {
            type: 'text/json'
        }),
        e = document.createEvent('MouseEvents'),
        a = document.createElement('a')

    a.download = filename
    a.href = window.URL.createObjectURL(blob)
    a.dataset.downloadurl = ['text/json', a.download, a.href].join(':')
    e.initMouseEvent('click', true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null)
    a.dispatchEvent(e)
}


function loadFile() {
    var input, file, fr;


    if (typeof window.FileReader !== 'function') {
        alert("Browser tarafından desteklenmemektedir.");
        return;
    }

    input = document.getElementById('fileinput');
    if (!input) {
        alert("Dosya Bulunamadı.");
    } else if (!input.files) {
        alert("Browser desteklememektedir.");
    } else if (!input.files[0]) {
        alert("Dosya hatalı olabilir.");
    } else {
        file = input.files[0];
        fr = new FileReader();
        fr.onload = receivedText;
        fr.readAsText(file);
    }

    function receivedText(e) {
        lines = e.target.result;
        var newArr = JSON.parse(lines);
        secilendersler = newArr;
        eklenenDersSayisi = newArr.length;
        alinanDersleriYazdir();
    }
}


var takeScreenShot = function() {
    var base64image;
    var element = document.getElementById("cizelge");
    element.scrollIntoView()
    var useWidth = document.getElementById("cizelge").Width;
    var useHeight = document.getElementById("cizelge").Height;


    html2canvas(element, {

        onrendered: function(canvas) {
            // yeni sekmede aç Link olarak 
            //  base64image = canvas.toDataURL("image/png"); window.open(base64image);

            //dosya olarak indir
            saveAs(canvas.toDataURL(), 'Ders Programı.png');

        }
    });


    function saveAs(uri, filename) {
        var link = document.createElement('a');
        if (typeof link.download === 'string') {
            link.href = uri;
            link.download = filename;

            //Firefox requires the link to be in the body
            document.body.appendChild(link);

            //simulate click
            link.click();

            //remove the link when done
            document.body.removeChild(link);
        } else {
            window.open(uri);
        }
    }


}


function BolumleriYazdir() {
    text = "<select  id='selectedBolum' onchange= getClickedBolumId()> ";
    text += "<option selected='selected' hidden> Bölüm Seçiniz</option>";
    for (let index = 0; index < BolumlerDizisi.length; index++) {
        text += "<option value='" + BolumlerDizisi[index]["birim"] + "'>" + BolumlerDizisi[index]["birim_adi"] + "</option>";

    }
    text += "</select>";
    document.getElementById("bolumler").innerHTML = text;

}


function getEklenenDerslerinDilimlerini() {
    var sendToJSONString = JSON.stringify(secilendersler)
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {
            action: "funcDilimler",
            sendToJSONString
        },
        dataType: "json", //  json decode yap
        success: function(sonuc) {

            derslerinDilimler = sonuc;
            dersDilimlerResult();
        },
        error: function(result) {
            // alert("Error: Ders saatleri getirilemedi");
        }

    })

}

function temizle() {
    for (let index = 0; index < tempdilim.length; index++) {

        if (document.getElementById(tempdilim[index]).style.backgroundColor == "black")
            document.getElementById(tempdilim[index]).style.backgroundColor = "black";
        else
            document.getElementById(tempdilim[index]).style.backgroundColor = "";

        document.getElementById(tempdilim[index]).setAttribute("title", "");
        document.getElementById(tempdilim[index]).innerHTML = "";

        document.getElementById(tempdilim[index]).setAttribute("onclick", "istenmeyensaat(this.id)");
        // document.getElementById("h" + (parseInt(derslerinDilimler[index]["dilim"]) + countdilim)).innerHTML = " ";
        // document.getElementById(tempdilim[index]).setAttribute("data-toggle", "");
        // document.getElementById(tempdilim[index]).setAttribute("data-placement", "left");
    }
}

function istenmeyenSaatlerKontrol() {
    for (let index = 0; index < istenmeyenSaatler.length; index++) {
        for (let i = 0; i < derslerinDilimler.length; i++) {
            for (let countdilim = 0; countdilim < derslerinDilimler[i]["sure"]; countdilim++) {

                if (istenmeyenSaatler[index] == ("h" + (parseInt(derslerinDilimler[i]["dilim"]) + countdilim))) {
                    alert("İstenmeyen Saatlere Denk Gelmektedir.");
                    document.getElementById(istenmeyenSaatler[index]).style.backgroundColor = "black";
                    secilenDersSil(derslerinDilimler[i]["adn"]);
                    getEklenenDerslerinDilimlerini();
                    derslerinDilimler[i].pop();

                }
            }


        }
    }

}


function dersDilimlerResult() {
    temizle();
    istenmeyenSaatlerKontrol();


    for (var index = 0; index < derslerinDilimler.length; index++) {
        var label = '<label id="dumy"><span class="labele label-default">' + getAdnyeGoreDersAdları(derslerinDilimler[index]["adn"]) + '</span></label>';

        for (var countdilim = 0; countdilim < derslerinDilimler[index]["sure"]; countdilim++) {

            document.getElementById("h" + (parseInt(derslerinDilimler[index]["dilim"]) + countdilim)).style.backgroundColor = colors[renkAta(parseInt(derslerinDilimler[index]["adn"]))];
            document.getElementById("h" + (parseInt(derslerinDilimler[index]["dilim"]) + countdilim)).setAttribute("title", getAdnyeGoreDersAdları(derslerinDilimler[index]["adn"]));
            document.getElementById("h" + (parseInt(derslerinDilimler[index]["dilim"]) + countdilim)).setAttribute("onclick", 'secilenDersSil(derslerinDilimler[' + index + ']["adn"])');
            document.getElementById("h" + (parseInt(derslerinDilimler[index]["dilim"]))).innerHTML = label;


            //  document.getElementById("h" + (parseInt(derslerinDilimler[index]["dilim"]))).setAttribute("data-toggle", "tooltip");
            // document.getElementById("h" + (parseInt(derslerinDilimler[index]["dilim"]))).setAttribute("data-placement", "left");
            tempdilim[tempSize] = "h" + (parseInt(derslerinDilimler[index]["dilim"]) + countdilim);
            tempSize++;

        }

    }

    var tempDubleIndex = find_duplicates();
    var labelcakisma = '<label id="dumy"><span class="labele label-danger">!!! ÇAKIŞMASI VAR !!!</span></label>'
    alert(getAdnyeGoreDersAdları(derslerinDilimler[tempDubleIndex[0]]["adn"]) + " dersi ile " + getAdnyeGoreDersAdları(derslerinDilimler[tempDubleIndex[1]]["adn"]) + " dersi Çakışmaktadır.");
    for (var countdilim = 0; countdilim < derslerinDilimler[tempDubleIndex[0]]["sure"]; countdilim++) {

        document.getElementById("h" + (parseInt(derslerinDilimler[tempDubleIndex[0]]["dilim"]))).innerHTML = labelcakisma;
        document.getElementById("h" + (parseInt(derslerinDilimler[tempDubleIndex[0]]["dilim"]) + countdilim)).style.backgroundColor = "black";
        document.getElementById("h" + (parseInt(derslerinDilimler[tempDubleIndex[0]]["dilim"]) + countdilim)).setAttribute("title", "" + getAdnyeGoreDersAdları(derslerinDilimler[tempDubleIndex[1]]["adn"]) + " ile " + getAdnyeGoreDersAdları(derslerinDilimler[tempDubleIndex[0]]["adn"]) + "  Çakışmaktadır. !!!");
        document.getElementById("h" + (parseInt(derslerinDilimler[tempDubleIndex[0]]["dilim"]) + countdilim)).setAttribute("onclick", 'secilenDersSil(secilendersler[(secilendersler.length-1)]["adn"])');

    }

}


function find_duplicates() {

    for (var i = 0; i < derslerinDilimler.length; i++) {
        for (var j = i + 1; j < derslerinDilimler.length; j++) {
            if (derslerinDilimler[i]["dilim"] === derslerinDilimler[j]["dilim"]) {
                return [i, j];
                break;
            }
        }
    }
}


function getAdnyeGoreDersAdları(adn) {
    derslerdizilerieski = derslerdizilerieski.concat(secilendersler);
    for (let index = 0; index < derslerdizilerieski.length; index++) {
        if (adn == derslerdizilerieski[index]["adn"]) {
            return derslerdizilerieski[index]["ders_adi"] + " " + derslerdizilerieski[index]["sube"];
        }

    }

}


function getClickedBolumId() { // seçilen bölüm 
    var clicked_id = document.getElementById("selectedBolum").value;
    lastclickedBolumID = clicked_id;
    getDersler(clicked_id);
}

function secilenyil() {
    getDersler(lastclickedBolumID);
}


function dublicateBul(value, arr) { //5 ikinci  defa seçilen şubeleri kontrolu 
    // alert("dublicateBul");
    var status = false;

    for (var i = 0; i < arr.length; i++) {
        var name = parseFloat(arr[i]["adn"]);
        if (name == value) {
            status = true;
            break;
        }
    }
    return status;
}


function secilenDersSil(secilen) { //6 ikinci defa seçilen subenin diziden çıkarılması
    // alert("secilenDersSil");
    for (var i = 0; i < secilendersler.length; i++) {
        if (parseFloat(secilendersler[i]["adn"]) == secilen) {
            if (i != -1) {

                secilendersler = secilendersler.filter(function(n) {
                    return n != undefined
                });
                secilendersler.splice(i, 1);
                secilendersler = secilendersler.filter(function(n) {
                    return n != undefined
                });

            }
            //alert(secilendersler.length);
        }

    }
    temizle(); //son silinen dersin tablodan temizlenmesi
    alinanDersleriYazdir();
}


function ayniDersKodu(i) {
    var status = true;
    for (let index = 0; index < secilendersler.length; index++) {
        if (derslerdizileri[i]["dkodu"] == secilendersler[index]["dkodu"]) {
            alert("Aynı Dersi Başka Şubeden Şeçtiniz\n" + secilendersler[index]["sube"] + " şubesi " + derslerdizileri[i]["sube"] + " ile şubesi yer değiştiriyor...");
            secilenDersSil(parseFloat(secilendersler[index]["adn"]));
        }
    }
}


function MakeActiveLi(elem) {
    //////////////////    MAKE ACTIVE   /////////////////////////////////
    selector = ' li';
    a = document.querySelectorAll(selector);
    // loop through all 'a' elements
    // add 'active' classs to the element that was clicked


    if (elem.classList.contains("active")) {

        for (i = 0; i < a.length; i++) {
            // Remove the class 'active' if it exists
            a[i].classList.remove('active')
        }

    } else {

        for (i = 0; i < a.length; i++) {
            // Remove the class 'active' if it exists
            a[i].classList.remove('active')
        }
        elem.classList.add('active');
    }
    ////////////////////////////////////////////////////////////////////////////
}





function getSecilenSubeler(clicked_id) { //4 seçilen şubelerin "secilenders" arrayıne aktarılması
    //alert("işte ilk sube")




    for (var i = derslerdizileri.length - 1; i >= 0; i--) {


        if (clicked_id == parseFloat(derslerdizileri[i]["adn"])) {

            if (dublicateBul(clicked_id, secilendersler)) {

                secilenDersSil(clicked_id);

                break;

            } else {

                ayniDersKodu(i);
                secilendersler = secilendersler.filter(function(n) {
                    return n != undefined
                });
                secilendersler[eklenenDersSayisi] = derslerdizileri[i];

                secilendersler = secilendersler.filter(function(n) {
                    return n != undefined
                });
                eklenenDersSayisi++;
                // alert(secilendersler.length); 

            }

        } //end if 

    } //end for
    //document.getElementById("alinanDersler").innerHTML = JSON.stringify(secilendersler);

    alinanDersleriYazdir();
} //end function






function alinanDersleriYazdir() { //7 seçilen dersler subelerinin yazdırılımlası
    var toplamKredi = 0;

    text = "<div class=\"panel panel-primary\">";
    text += "  <div class=\"panel-heading\">Şeçilen Dersler</div>";
    text += "<table class=\"table\">";
    text += "<tr class='tablehead'>";
    text += "<th>Ders Kodu</th><th>Şubesi</th><th>Teo/Uyg</th><th>Ders Adı</th><th>Öğretim Görevlisi</th>";
    text += "</tr>";
    for (var i = 0; i < secilendersler.length; i++) {
        text += "<tr  style=\"background-color:" + colors[renkAta(parseInt(secilendersler[i]["adn"]))] + " \" onmousemove=\"this.style.backgroundColor='darkgrey'\" onmouseout=\"this.style.backgroundColor='" + colors[renkAta(parseInt(secilendersler[i]["adn"]))] + "'\"  onclick=\"secilenDersSil(this.id)\"  title='" + secilendersler[i]["ders_adi"] + "' id='" + secilendersler[i]["adn"] + "'>" +
            "<td>" + secilendersler[i]["dkodu"] + "</td>" +
            "<td>" + secilendersler[i]["sube"] + "</td>" +
            "<td>" + secilendersler[i]["teo"] + "/" + secilendersler[i]["uyg"] + "</td>" +
            "<td>" + secilendersler[i]["ders_adi"] + "</td>" +
            "<td>" + secilendersler[i]["egitmen"] + "</td>" +
            "</tr>"
        toplamKredi += (parseInt(secilendersler[i]["teo"]));


    }
    text += "</table>";
    text += "<h5 style=' white-space: pre;' text-align: left; > Seçilen Ders : " + secilendersler.length + "                     Toplam Kredi: " + toplamKredi + "</h5>";
    text += "</div>";






    getEklenenDerslerinDilimlerini();
    document.getElementById("alinanDersler").innerHTML = text;

}




function alinanDersleriYazdir2() { //7 seçilen dersler subelerinin yazdırılımlası
    text = "<h5 class='solayasla' >Seçilen Dersler</h5>";
    text += "<pre><h6>Ders Kodu     Şubesi      Teo/Uyg     Ders Adı    Öğretim Görevlisi</h6>"
    text += "<ul class=\"kutu\" >";
    var toplamKredi = 0;

    for (var i = 0; i < secilendersler.length; i++) {
        text += "<li  class=\"list-group-item\" style=\"background-color:" + colors[renkAta(parseInt(secilendersler[i]["adn"]))] + " \" white-space: pre-line; text-align: left; " +
            "onmousemove=\"this.style.backgroundColor='darkgrey'\" onmouseout=\"this.style.backgroundColor='" + colors[renkAta(parseInt(secilendersler[i]["adn"]))] + "'\" onclick=\"secilenDersSil(this.id)\" title=\"" +
            secilendersler[i]["ders_adi"] +
            " \" id= \"" +
            secilendersler[i]["adn"] +
            " \" >" +
            secilendersler[i]["dkodu"] +
            "    " +
            secilendersler[i]["sube"] +
            "            " +
            secilendersler[i]["teo"] +
            "/" +
            secilendersler[i]["uyg"] +
            "       " +
            secilendersler[i]["ders_adi"] +
            "       " +
            secilendersler[i]["egitmen"] +
            "</li>";
        toplamKredi += (parseInt(secilendersler[i]["teo"]));
    }
    text += "</ul>";

    text += "<h6> Seçilen Ders : " + secilendersler.length + "             Toplam Kredi: " + toplamKredi + "</h6></pre>";
    getEklenenDerslerinDilimlerini();
    document.getElementById("alinanDersler").innerHTML = text;

}


function kisaltmaFunc(obj) {

    var deger = obj;
    var yeniDeger = '';
    deger = deger.split(' ');
    for (var i = 0; i < deger.length; i++) {
        yeniDeger += deger[i].substring(0, 1).toUpperCase();
        obj = yeniDeger;
    }
    return obj;
}


function getDersSube() { //3 seçilen derslerin şubelerini yazdırma
    var e = document.getElementById("dersDizisiSelect");
    var clicked_id = e.options[e.selectedIndex].value;
    var dersadi = e.options[e.selectedIndex].text;
    alternatifGrubDersleri(clicked_id);
    var index = 0;
    var subecakismakontoldizisi = [];


    text = "<h5>" + dersadi + "</h5>";
    text += "<ul class=\"kutu\" >";
    for (var i = derslerdizileri.length - 1; i >= 0; i--) {

        if (parseFloat(derslerdizileri[i]["dkodu"]) == clicked_id) {
            subecakismakontoldizisi[index] = derslerdizileri[i];
            index++;
            text += "<li" +
                " class=\"list-group-item\" style=\" text-align: center\"  onmousemove=\"this.style.backgroundColor='darkgrey'\" onmouseout=\"this.style.backgroundColor=''\" onclick=\"getSecilenSubeler(this.id); MakeActiveLi(this);\" title=\"" +
                derslerdizileri[i]["teo"] +
                " Kredi \" id= \"" +
                derslerdizileri[i]["adn"] +
                " \" >" +
                derslerdizileri[i]["sube"] +
                "</li>";
            // alert("ilk "+derslerdizileri[i]["adn"]+" "+derslerdizileri[i]["sube"])
        }

    }
    text += "</ul>";
    document.getElementById("subeler").innerHTML = text;

    // byradan çağır 
    // cakismaDurumunuKontrolEtSubeisaretle(subecakismakontoldizisi);//burayı kapattım çakışma durumunu da dersi seçmeden işaretleme yöntemi çalışmıyor çalıştıramadım

}

//çakışma durumunu da dersi seçmeden işaretleme yöntemi ama şuan çalışmıyor şuan bu fonksiyon kullanılmıyor
function cakismaDurumunuKontrolEtSubeisaretle(subecakismakontoldizisi) {


    var sendToJSONString = JSON.stringify(subecakismakontoldizisi)
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {
            action: "funcDilimler",
            sendToJSONString
        },
        dataType: "json", //  json decode yap
        success: function(sonuc) {
            var subecakismakontoldizisi_Dilimleri = sonuc;
            dilimkarsilastir(subecakismakontoldizisi_Dilimleri);

        },
        error: function(result) {
            alert("Error Dilimler getirilemedi");
        }

    })


}

//çakışma durumunu da dersi seçmeden işaretleme yöntemi ama şuan çalışmıyor şuan bu fonksiyon kullanılmıyor
function dilimkarsilastir(dilimler) {
    for (var index = 0; index < derslerinDilimler.length; index++) {
        for (var i = 0; i < dilimler.length; i++) {
            if (dilimler[i]["dilim"] == derslerinDilimler[index]["dilim"]) {
                //  alert(dilimler[i]["adn"]);
                //document.getElementById(parseInt( dilimler[i]["adn"])).style.backgroundColor ="red";
                //var yap= document.getElementById((dilimler[i]["adn"]));
                //olduramadım ne yapdım ne ettimse olduramım
                // alert(getAdnyeGoreDersAdları(dilimler[i]["adn"])+" dersi ile "+getAdnyeGoreDersAdları(derslerinDilimler[index]["adn"])+" dersi çakışmaktadır");
                break;
            }
        }
    }


}


function istenmeyensaat(cliked_id) {
    if (document.getElementById(cliked_id).style.backgroundColor == "black") {
        document.getElementById(cliked_id).style.backgroundColor = "";

        for (var i = 0; i < istenmeyenSaatler.length; i++) {
            if (istenmeyenSaatler[i] == cliked_id) {
                if (i != -1) {

                    istenmeyenSaatler = istenmeyenSaatler.filter(function(n) {
                        return n != undefined
                    });
                    istenmeyenSaatler.splice(i, 1);

                    istenmeyenSaatler = istenmeyenSaatler.filter(function(n) {
                        return n != undefined
                    });

                    document.getElementById(cliked_id).setAttribute("onclick", "istenmeyensaat(this.id)");
                }

            }

        }
    } else {
        document.getElementById(cliked_id).style.backgroundColor = "black";
        istenmeyenSaatler.push(cliked_id);
        istenmeyenSaatler = istenmeyenSaatler.filter(onlyUnique);

    }

}


function onlyUnique(value, index, self) {
    return self.indexOf(value) === index;
}


function getDersler(clicked_id) { //2
    var e = document.getElementById("selectedyear");
    var value = e.options[e.selectedIndex].value;

    $.ajax({ //2 Bölüm seçimi yapıldıktan sonra veritabanından seçilen bölümde açılan derslerin "derslerdizileri" arrayine aktarıldı
        type: "POST",
        url: "ajax.php",
        data: {
            action: "funcDersler",
            'birim': clicked_id,
            'sinif': value
        }, //parametre olarak  derslerin "birim"  gönder
        dataType: "json",
        success: function(sonuc) { // databaseden php üzerinden ajax yöntemi ile derslerin alıp javascript dizisi oluşturduk
            // derslerdizilerieski = derslerdizileri.concat(sonuc);
            derslerdizileri = sonuc;

            dersDizilerScript(sonuc);

        },
        error: function(result) {
            alert("Error get dersler");
        }
    });
}


function dersDizilerScript(derslerdizileri) { // 3 derslerdizileri arrayin yazdırılması

    text = "<select id='dersDizisiSelect' onchange= getDersSube() >";
    text += "<option selected='selected' hidden>Ders Seçiniz</option>";
    for (var i = derslerdizileri.length - 1; i >= 0; i--) {

        if (i != 0) {
            if (derslerdizileri[i]["dkodu"] != derslerdizileri[i - 1]["dkodu"]) {
                text += "<option " + " value='" + derslerdizileri[i]["dkodu"] + "'>" + derslerdizileri[i]["ders_adi"] + "</option>";
            } else {

            }
        } else {
            text += "<option" + " value='" + derslerdizileri[i]["dkodu"] + "'>" + derslerdizileri[i]["ders_adi"] + "</option>";
        }

    }
    text += "</select>";

    document.getElementById("dersler").innerHTML = text;

}


function alternatifGrubDersleri(clicked_id) {
    lastclickedDersKodu = clicked_id;
    var secilenDersGrubu;
    for (let index = 0; index < derslerdizileri.length; index++) {
        if (parseFloat(derslerdizileri[index]["dkodu"]) == clicked_id) {
            secilenDersGrubu = derslerdizileri[index]["DersGrubu"];
            break; // burayı bir düşün break koymanın veya koymamanın bir faydası varmı?
        }

    }
    //alert(secilenDersGrubu);
    $.ajax({
        type: "POST",
        url: "ajax.php",
        data: {
            action: "funcGrupDersleri",
            'dersgrubu': secilenDersGrubu
        }, //parametre olarak  derslerin "secilenDersGrubu"  gönder
        dataType: "json",
        success: function(sonuc) {
            GrupDersleri = sonuc;
            AlternatifDersleriYazdir(GrupDersleri);
        },
        error: function(result) {
            grubderslerisil();
        }
    });

}

function grubderslerisil() {
    document.getElementById("grupDersleri").innerHTML = "";
}


function AlternatifDersleriYazdir(GrupDersleri) {

    text = "<h5 class='solayasla' >Alternatif Grup Dersleri</h5>";
    text += "<ul class=\"kutuAlt\" >"
    for (let index = 0; index < GrupDersleri.length; index++) {
        if (lastclickedDersKodu != parseInt(GrupDersleri[index]["dkodu"])) {
            text += "<li" +
                " class=\"list-group-item\" style=\" text-align: center  background-color: aliceblue;\" onmousemove=\"this.style.backgroundColor='darkgrey'\" onmouseout=\"this.style.backgroundColor=''\" onclick=\"getSecilenGrupSubeleri(this.id); MakeActiveLi(this);\" title=\"" +
                GrupDersleri[index]["teo"] +
                " Kredi \" id= \"" +
                GrupDersleri[index]["adn"] +
                " \" >" +
                getBirimNumarasınaGoreBirimAdini(GrupDersleri[index]["birim"]) +
                "  " +
                GrupDersleri[index]["ders_adi"] +
                "            " +
                GrupDersleri[index]["sube"] +
                "</li>";

        }
    }
    text += "</ul>";
    document.getElementById("grupDersleri").innerHTML = text;

}

function getBirimNumarasınaGoreBirimAdini(birim) {

    for (let index = 0; index < BolumlerDizisi.length; index++) {
        if (parseInt(BolumlerDizisi[index]["birim"]) == birim) {
            var result = BolumlerDizisi[index]["birim_adi"];

            return result;
        }
    }
    return "Alternatif Ders Yoktur.";
}


function getSecilenGrupSubeleri(clicked_id) {
    //alert("işte ilk subele")

    for (var i = GrupDersleri.length - 1; i >= 0; i--) {

        if (clicked_id == parseFloat(GrupDersleri[i]["adn"])) {

            if (dublicateBul(clicked_id, secilendersler)) {


                // alert("silmeden önce");
                // alert(secilendersler.length);
                secilenDersSil(clicked_id);
                // alert("sildikten sonra");
                //alert(secilendersler.length);
                break;

            } else {
                // ayniDersKodu(i);
                secilendersler = secilendersler.filter(function(n) {
                    return n != undefined
                });
                secilendersler[eklenenDersSayisi] = GrupDersleri[i];

                secilendersler = secilendersler.filter(function(n) {
                    return n != undefined
                });
                eklenenDersSayisi++;
                // alert(secilendersler.length); 

            }

        } //end if 

    } //end for
    //document.getElementById("alinanDersler").innerHTML = JSON.stringify(secilendersler);
    alinanDersleriYazdir();
} //end function
