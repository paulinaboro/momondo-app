async function getFromCities() {
  var txtSearch = document.querySelector("#txtSearchFrom");
  var oFromCityResults = document.querySelector("#fromCityResults");
  oFromCityResults.innerHTML = "";
  if (txtSearch.value.length == 0) {
    oFromCityResults.style.display = "none";
    return; // Return means take me out of the function
  }
  var sSearchFor = txtSearch.value;
  var url = "api-city-search-from.php?cityName=" + sSearchFor;
  var connection = await fetch(url);
  // console.log(response) // 200
  var sData = await connection.text();
  // console.log(sData); // text
  var jData = JSON.parse(sData); // convert text into object
  var sDivCities = ""; // <div>X</div><div>Y</div>
  for (var i = 0; i < jData.flights.length; i++) {
    //     // Concatanate
    sDivCities += `<div onclick="selectCityFrom(this)">${jData.flights[i].from}</div>`;
  }
  // Overwrite results
  oFromCityResults.innerHTML = sDivCities;
  oFromCityResults.style.display = "block";
}

function selectCityFrom(objectDOM) {
  var txtSearch = document.querySelector("#txtSearchFrom");
  var oFromCityResults = document.querySelector("#fromCityResults");
  var sCityName = objectDOM.innerHTML;
  txtSearch.value = sCityName;
  oFromCityResults.style.display = "none";
}

{
  /* <div id="boxToCity">
<input oninput="getToCities()" id="txtSearchTo" value="" type="text" placeholder="to city">
<div id="toCityResults"></div>
</div> */
}

async function getToCities() {
  var txtSearch = document.querySelector("#txtSearchTo");
  var oToCityResults = document.querySelector("#toCityResults");
  oToCityResults.innerHTML = "";
  if (txtSearch.value.length == 0) {
    oToCityResults.style.display = "none";
    return; // Return means take me out of the function
  }
  var sSearchFor = txtSearch.value;
  var url = "api-city-search-to.php?cityName=" + sSearchFor;
  var connection = await fetch(url);
  // console.log(response) // 200
  var sData = await connection.text();
  // console.log(sData); // text
  var jData = JSON.parse(sData); // convert text into object
  var sDivCities = ""; // <div>X</div><div>Y</div>
  for (var i = 0; i < jData.flights.length; i++) {
    //     // Concatanate
    sDivCities += `<div onclick="selectCityTo(this)">${jData.flights[i].to}</div>`;
  }
  // Overwrite results
  oToCityResults.innerHTML = sDivCities;
  oToCityResults.style.display = "block";
}

function selectCityTo(objectDOM) {
  var txtSearch = document.querySelector("#txtSearchTo");
  var oToCityResults = document.querySelector("#toCityResults");
  var sCityName = objectDOM.innerHTML;
  txtSearch.value = sCityName;
  oToCityResults.style.display = "none";
}
