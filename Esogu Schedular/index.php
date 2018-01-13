<!DOCTYPE html>
<html  xmlns="http://www.w3.org/1999/xhtml" lang="tr-TR" xml:lang="tr-TR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="theme-color" content="#337AB7" />
    <title>Ders Çizelgesi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="javascript/html2canvas.min.js"></script>
 
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script><!-- Bu Ekran GÖrüntüsünün Düzgün Çıkmasını sağlıyor -->
    <!-- <script src="grabzit.min.js"></script> -->
</head>

<body>
    <div class="col-sm-12" id="all">
        <!-- <section id="preview-area">
         <h2>Preview Image :</h2>
         <div id="previewImage"></div> --></section>
        <div id="Secenekler" class="col-sm-4" ;>
            <!-- <img  id="logo" src="img/RxlF21DF.jpg" style="width: 100px; height: 100px; "> -->
            <div>
                <div id="Bolumseciniz">
                    <div class="col-sm-5">
                        <h5 class="solayasla" >Bölüm Seçimi Yapınız:</h5> </div>
                    <div class="col-sm-7" id="bolumler"></div>
                </div>
                <div id="sinifseciniz">
                    <p class="col-sm-12">&nbsp</p>
                    <div class="col-sm-5">
                        <h5 class="solayasla" >Sınıf Seçiniz:</h5> </div>
                    <div id="selectedyeardiv" class="col-sm-7">
                        <select  id="selectedyear" onchange="secilenyil()">
                            <option selected="selected"  value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                </div>
            </div>
            <div>
                <p class="col-sm-12">&nbsp</p>
                <div id="dersseciniz">
                    <h5  class="col-sm-5 solayasla">Ders Seçimi Yapınız:</h5>
                    <div class="col-sm-7" id="dersler">
                        <select>
                            <option disabled="disabled" selected='selected' hidden>Ders Seçiniz:</option>
                        </select>
                    </div>
                </div>
                <div id="subeseciniz">
                    <p class="col-sm-12">&nbsp</p>
                    <div class="col-sm-4" padding-block-start: 4%;>
                        <div row align-items-center> 
                            <h5 class="solayasla" id="H5subeSeciniz" >Şube Seçimi Yapınız:</h5></div>
                      
                    </div>
                   
                    <div class="col-sm-8" id="subeler"></div>
                </div>
                <div class="col-sm-12" id="grupDersleri"></div>
                <div class="col-sm-12" id="alinanDersler"></div>
            </div>
        </div>
        <div class="col-sm-8">
            <div id="cizelge">
                <h4 style="padding-top: 15px;">DERS PROGRAMI</h4>
                <table id="data" class="table table-condensed table-bordered table-striped unselectable" border="3px">
                    <tr class="gunler">
                        <th style="width: 20px"></th>
                        <th style="width: 100px">Pazartesi</th>
                        <th style="width: 100px">Salı</th>
                        <th style="width: 100px">Çarşamba</th>
                        <th style="width: 100px">Perşembe</th>
                        <th style="width: 100px">Cuma</th>
                        <th style="width: 100px">Cumartesi</th>
                        <th style="width: 100px">Pazar</th>
                    </tr>
                    <tr>
                        <td rowspan="4">8:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h133"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h229"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h325"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h421"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h517"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h613"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h709"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h134"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h230"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h326"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h422"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h518"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h614"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h710"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h135"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h231"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h327"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h423"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h519"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h615"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h711"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h136"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h232"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h328"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h424"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h520"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h616"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h712"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">9:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h137"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h233"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h329"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h425"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h521"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h617"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h713"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h138"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h234"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h330"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h426"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h522"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h618"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h714"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h139"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h235"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h331"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h427"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h523"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h619"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h715"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h140"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h236"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h332"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h428"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h524"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h620"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h716"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">10:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h141"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h237"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h333"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h429"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h525"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h621"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h717"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h142"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h238"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h334"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h430"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h526"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h622"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h718"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h143"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h239"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h335"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h431"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h527"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h623"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h719"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h144"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h240"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h336"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h432"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h528"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h624"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h720"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">11:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h145"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h241"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h337"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h433"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h529"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h625"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h721"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h146"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h242"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h338"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h434"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h530"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h626"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h722"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h147"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h243"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h339"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h435"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h531"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h627"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h723"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h148"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h244"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h340"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h436"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h532"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h628"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h724"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">12:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h149"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h245"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h341"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h437"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h533"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h629"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h725"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h150"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h246"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h342"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h438"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h534"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h630"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h726"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h151"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h247"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h343"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h439"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h535"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h631"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h727"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h152"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h248"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h344"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h440"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h536"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h632"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h728"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">13:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h153"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h249"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h345"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h441"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h537"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h633"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h729"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h154"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h250"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h346"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h442"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h538"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h634"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h730"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h155"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h251"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h347"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h443"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h539"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h635"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h731"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h156"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h252"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h348"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h444"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h540"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h636"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h732"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">14:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h157"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h253"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h349"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h445"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h541"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h637"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h733"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h158"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h254"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h350"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h446"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h542"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h638"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h734"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h159"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h255"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h351"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h447"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h543"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h639"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h735"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h160"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h256"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h352"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h448"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h544"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h640"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h736"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">15:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h161"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h257"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h353"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h449"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h545"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h641"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h737"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h162"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h258"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h354"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h450"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h546"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h642"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h738"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h163"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h259"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h355"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h451"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h547"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h643"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h739"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h164"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h260"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h356"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h452"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h548"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h644"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h740"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">16:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h165"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h261"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h357"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h453"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h549"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h645"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h741"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h166"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h262"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h358"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h454"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h550"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h646"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h742"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h167"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h263"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h359"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h455"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h551"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h647"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h743"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h168"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h264"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h360"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h456"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h552"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h648"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h744"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">17:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h169"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h265"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h361"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h457"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h553"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h649"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h745"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h170"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h266"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h362"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h458"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h554"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h650"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h746"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h171"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h267"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h363"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h459"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h555"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h651"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h747"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h172"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h268"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h364"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h460"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h556"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h652"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h748"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">18:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h173"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h269"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h365"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h461"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h557"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h653"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h749"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h174"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h270"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h366"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h462"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h558"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h654"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h750"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h175"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h271"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h367"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h463"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h559"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h655"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h751"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h176"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h272"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h368"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h464"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h560"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h656"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h752"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">19:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h177"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h273"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h369"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h465"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h561"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h657"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h753"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h178"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h274"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h370"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h466"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h562"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h658"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h754"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h179"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h275"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h371"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h467"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h563"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h659"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h755"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h180"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h276"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h372"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h468"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h564"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h660"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h756"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">20:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h181"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h277"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h373"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h469"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h565"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h661"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h757"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h182"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h278"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h374"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h470"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h566"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h662"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h758"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h183"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h279"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h375"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h471"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h567"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h663"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h759"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h184"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h280"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h376"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h472"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h568"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h664"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h760"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">21:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h185"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h281"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h377"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h473"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h569"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h665"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h761"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h186"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h282"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h378"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h474"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h570"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h666"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h762"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h187"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h283"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h379"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h475"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h571"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h667"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h763"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h188"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h284"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h380"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h476"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h572"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h668"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h764"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">22:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h189"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h285"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h381"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h477"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h573"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h669"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h765"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h190"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h286"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h382"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h478"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h574"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h670"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h766"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h191"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h287"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h383"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h479"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h575"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h671"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h767"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h192"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h288"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h384"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h480"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h576"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h672"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h768"> </td>
                    </tr>
                    <tr>
                        <td rowspan="4">23:00 </td>
                        <td onclick="istenmeyensaat(this.id)" id="h193"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h289"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h385"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h481"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h577"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h673"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h769"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h194"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h290"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h386"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h482"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h578"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h674"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h770"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h195"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h291"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h387"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h483"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h579"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h675"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h771"> </td>
                    </tr>
                    <tr>
                        <td onclick="istenmeyensaat(this.id)" id="h196"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h292"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h388"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h484"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h580"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h676"> </td>
                        <td onclick="istenmeyensaat(this.id)" id="h772"> </td>
                    </tr>
                </table>
                <div class="col-sm-6"></div>
            </div>
            <div id="buttondiv">
                <button title="Ders listesini tekrar kullanmak için indir." type="button" class="btn btn-primary" id="farkli" onclick="downloadJson()">Listeyi indir</button>
                <button title="Tablonun ekran görüntüsünü indir" class="btn btn-success" onclick="takeScreenShot()">Ekran Görüntüsü</button>
                <div class="file-loading col-sm-3">
                    
                    
                    <div style="position:relative;"> <a class='btn btn-primary' href='javascript:;'>
            Dosya Yükleyiniz...
            <input title="Önceden indirilmiş olan '.json' dosyasını geri yükle." id="fileinput" type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='loadFile();' accept=".json ">
        </a> &nbsp; <span class='label label-info' id="upload-file-info"></span>
                    
                     </div>
                    
        
                    <!-- <input type='button' id='btnLoad' value='Load' onclick='loadFile();'> -->
                </div>
            </div>
            <!-- <button type="button" class="btn btn-primary">Göster</button> -->
        </div>
        <div id="image-version">
            <p id="demo"></p>
        </div>
        <!-- <script>document.addEventListener('touchstart', onTouchStart, { passive: true });</script> -->
        <script type="text/javascript" src="javascript/script.js"></script>
  
</body>

</html>