<html>
<head>
<title>Celsius to Kelvin</title>
</head>
<body>

<h3>Temperature Converter</h3>

<td>
  <label>Celsius</label>
  <input id="inputCelsius" type="number" placeholder="Celsius" oninput="temperatureConverter(this.value)" onchange="temperatureConverter(this.value)">
</td>
<td><br><br>Kelvin: <span id="outputKelvin"></span></td>

<script>
function temperatureConverter(valNum) {
  valNum = parseFloat(valNum);
  document.getElementById("outputKelvin").innerHTML=valNum+273.15;
}
</script>

</body>
</html>