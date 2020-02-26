//From City
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
  console.log(jData);
  var sDivCities = ""; // <div>X</div><div>Y</div>
  for (var i = 0; i < jData.cities.length; i++) {
    //     // Concatanate
    sDivCities += `<div onclick="selectCityFrom(this)">${jData.cities[i].cityName}</div>`;
  }
  // Overwrite results
  oFromCityResults.innerHTML = sDivCities;
  oFromCityResults.style.display = "block";
  // console.log(jData);
}

function selectCityFrom(objectDOM) {
  var txtSearch = document.querySelector("#txtSearchFrom");
  var oFromCityResults = document.querySelector("#fromCityResults");
  var sCityName = objectDOM.innerHTML;
  txtSearch.value = sCityName;
  oFromCityResults.style.display = "none";
  // console.log(objectDOM);
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
  for (var i = 0; i < jData.cities.length; i++) {
    //     // Concatanate
    sDivCities += `<div onclick="selectCityTo(this)">${jData.cities[i].cityName}</div>`;
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

async function getMatchingFlightConnections() {
  var inputValueFrom = document.getElementById("txtSearchFrom").value;
  var inputValueTo = document.getElementById("txtSearchTo").value;
  var url = "api-find-matching-flight-connections.php?from=" + inputValueFrom;
  var connection = await fetch(url);
  var sData = await connection.text();
  location.reload();
}

async function findBooking() {
  var bookingCode = document.getElementById("bookingCode").value;
  var bookingLastName = document.getElementById("bookingLastName").value;

  var url =
    "api-find-matching-booking.php?code=" +
    bookingCode +
    "&lastName=" +
    bookingLastName;
  var connection = await fetch(url);
  var sData = await connection.text();
  console.log(sData);
  // populateReservationInfo(sData);
}

// function populateReservationInfo(booking) {
//   document.getElementById("name").innerHTML = booking.passengerEmail;

//   console.log(booking);
// }
