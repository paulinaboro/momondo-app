async function getFromCities() {
  oFromCityResults = document.querySelector("#fromCityResults");
  oFromCityResults.innerHTML = "";

  //   var aCities = ["a", "b", "c"];
  var jResponse = await fetch("api-get-from-cities.php");
  var aCities = await jResponse.json();
  console.log(aCities);

  for (var i = 0; i < aCities.length; i++) renderFromCity(aCities[i]);
  oFromCityResults.style.display = "none";
}

//Show the city in the drop down
function renderFromCity(sCityName) {
  oFromCityResults = document.querySelector("#fromCityResults");
  var sDivCityName = ` <div>${sCityName}</div>`;
  oFromCityResults.innerHTML += sDivCityName;
}
