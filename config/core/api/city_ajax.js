var postalcodes,alarm;function getLocation(e){if(null!=e)if((postalcodes=e.postalcodes)[0].postalcode=parseInt(postalcodes[0].postalcode),postalcodes.length>1){document.getElementById("suggestBoxElement").style.visibility="visible";var t="";for(i=0;i<e.postalcodes.length;i++)t+="<div class='suggestions' id=pcId"+i+" onmousedown='suggestBoxMouseDown("+i+")' onmouseover='suggestBoxMouseOver("+i+")' onmouseout='suggestBoxMouseOut("+i+")'> "+postalcodes[i].countryCode+" "+postalcodes[i].postalcode+" - "+postalcodes[i].placeName+"</div>";document.getElementById("suggestBoxElement").innerHTML=t}else 1==postalcodes.length&&(postalcodes[0].postalcode>9999&&postalcodes[0].postalcode<10999?document.getElementById("state").value="Caceres":(document.getElementById("state").value=postalcodes[0].adminName1,vlen1=document.getElementById("state"),vlen2=document.getElementById("state"),vlen3=document.getElementById("state"),vlen4="","undefined"==postalcodes[0].adminName2&&(alert("dentro adminname undefined: "+postalcodes[0].adminName3),document.getElementById("state").value=postalcodes[0].adminName3),"undefined"==postalcodes[0].adminName3&&(alert("dentro adminname undefined: "+postalcodes[0].adminName3),document.getElementById("state").value=postalcodes[0].adminName3)),document.getElementById("city").value=postalcodes[0].placeName,postalcodes[0].postalcode>3e3&&postalcodes[0].postalcode<4e3&&(document.getElementById("state").value="Alicante"),postalcodes[0].postalcode>4e3&&postalcodes[0].postalcode<5e3&&(document.getElementById("state").value="Almeria"),postalcodes[0].postalcode>8e3&&postalcodes[0].postalcode<9e3&&(document.getElementById("state").value="Barcelona"),postalcodes[0].postalcode>12e3&&postalcodes[0].postalcode<13e3&&(document.getElementById("state").value="Castellon"),postalcodes[0].postalcode>15e3&&postalcodes[0].postalcode<16e3&&(document.getElementById("state").value="A Coruna"),postalcodes[0].postalcode>23e3&&postalcodes[0].postalcode<24e3&&(document.getElementById("state").value="Jaen"),postalcodes[0].postalcode>25e3&&postalcodes[0].postalcode<26e3&&(document.getElementById("state").value="Lleida"),postalcodes[0].postalcode>10999&&postalcodes[0].postalcode<11999&&(document.getElementById("state").value="Cadiz"),postalcodes[0].postalcode>45e3&&postalcodes[0].postalcode<46e3&&(document.getElementById("state").value="Toledo"),postalcodes[0].postalcode>51e3&&postalcodes[0].postalcode<52e3&&(document.getElementById("state").value="Ceuta"),postalcodes[0].postalcode>52e3&&postalcodes[0].postalcode<53e3&&(document.getElementById("state").value="Melilla"),postalcodes[0].postalcode>4999&&postalcodes[0].postalcode<5999&&(document.getElementById("state").value="Avila"),postalcodes[0].postalcode>7e3&&postalcodes[0].postalcode<8e3&&(document.getElementById("state").value="Baleares"),postalcodes[0].postalcode>33e3&&postalcodes[0].postalcode<34e3&&(document.getElementById("state").value="Asturias"),postalcodes[0].postalcode>35e3&&postalcodes[0].postalcode<36e3&&(document.getElementById("state").value="Las Palmas"),postalcodes[0].postalcode>39e3&&postalcodes[0].postalcode<4e4&&(document.getElementById("state").value="Cantabria"),postalcodes[0].postalcode>48e3&&postalcodes[0].postalcode<49e3&&(document.getElementById("state").value="Vizcaya"),postalcodes[0].postalcode>2e4&&postalcodes[0].postalcode<21e3&&(document.getElementById("state").value="Guipuzcoa"),postalcodes[0].postalcode>22e3&&postalcodes[0].postalcode<23e3&&(document.getElementById("state").value="Huesca"),postalcodes[0].postalcode>26e3&&postalcodes[0].postalcode<27e3&&(document.getElementById("state").value="La Rioja"),postalcodes[0].postalcode>29e3&&postalcodes[0].postalcode<3e4&&(document.getElementById("state").value="Malaga")),closeSuggestBox()}function closeSuggestBox(){document.getElementById("suggestBoxElement").innerHTML="",document.getElementById("suggestBoxElement").style.visibility="hidden"}function suggestBoxMouseOut(e){document.getElementById("pcId"+e).className="suggestions"}function suggestBoxMouseDown(e){closeSuggestBox();var t=postalcodes[e].adminName1,o=postalcodes[e].adminName2;"A"==o.charAt(0)&&"l"==o.charAt(1)&&"m"==o.charAt(2)&&(o="Almeria"),"C"==o.charAt(0)&&"a"==o.charAt(1)&&"s"==o.charAt(2)&&"t"==o.charAt(3)&&"e"==o.charAt(4)&&(o="Castellon"),"L"==o.charAt(0)&&"e"==o.charAt(1)&&"n"==o.charAt(4)&&(o="Leon"),"J"==o.charAt(0)&&"a"==o.charAt(1)&&"n"==o.charAt(4)&&(o="Jaen"),"d"==o.charAt(3)&&"i"==o.charAt(4)&&"z"==o.charAt(5)&&(o="Cadiz"),"d"==o.charAt(4)&&"o"==o.charAt(5)&&"b"==o.charAt(6)&&"a"==o.charAt(7)&&(o="Cordoba"),"C"==o.charAt(0)&&"o"==o.charAt(1)&&"r"==o.charAt(2)&&"u"==o.charAt(3)&&(o="A Coruna"),document.getElementById("city").value=postalcodes[e].placeName,document.getElementById("state").value=t,document.getElementById("state").value=o}function suggestBoxMouseOver(e){document.getElementById("pcId"+e).className="suggestionMouseOver"}function postalCodeLookup(){var e=document.getElementById("country").value;if(-1!=geonamesPostalCodeCountries.toString().search(e)){document.getElementById("suggestBoxElement").style.visibility="visible",document.getElementById("suggestBoxElement").innerHTML='<img src="https://i.stack.imgur.com/sEKwt.gif" border="0"><small><i></i></small>';var t=document.getElementById("postcode").value;request="https://www.geonames.org/postalCodeLookupJSON?postalcode="+t+"&country="+e+"&callback=getLocation",aObj=new JSONscriptRequest(request),aObj.buildScriptTag(),aObj.addScriptTag()}}function setDefaultCountry(){var e=document.getElementById("country");for(i=0;i<e.length;i++)e[i].value==geonamesUserIpCountryCode&&(e.selectedIndex=e[i].value)}