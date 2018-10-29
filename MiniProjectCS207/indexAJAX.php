<!DOCTYPE html>
<html>
<head>
  <title>Weather Data | CS207</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <?php include('dataLoad.php'); ?>
  <script>
  function sendData(str)
  {
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    }
    else
    {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function()
    {
      if (this.readyState == 4 && this.status == 200)
      {
        document.getElementById("result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", str, true);
    xmlhttp.send();
  }

  function trigger()
  {
    frm = document.getElementById('from').value;
    too = document.getElementById('to').value;
    fld = document.getElementById('dropdown').value;
    mi = (document.getElementById('min').checked)?(1):(0);
    av = (document.getElementById('avg').checked)?(1):(0);
    Ma = (document.getElementById('max').checked)?(1):(0);
    if (frm != "" && too != "" && (mi || av || Ma))
    {
      sendData("dataQueryGET.php?from="+frm+"&to="+too+"&dropdown="+fld+"&submit=Submit+Query&min="+mi+"&avg="+av+"&max="+Ma);
    }
  }
</script>
</head>
<body>
  <div id="heading" class="container flexdown">
    <div id="innerContainer">
      <center>
        <h1 class="headitem">CS207 Miniproject</h1>
        <hr class="headitem">
        <h3 class="headitem">Aug-Nov 2018</h3>
      </center>
    </div>
  </div>
  <div class="container">
    <form id="form1">
      <label for="from" class="items">From: </label>
      <input type="date" id="from" class="items" name="from" onchange="trigger()">
      <label for="to" class="items">To: </label>
      <input type="date" id="to" class="items" name="to" onchange="trigger()">
      <select id="dropdown" class="items" name="dropdown" onchange="trigger()">
        <option value="Temperature">Temperature</option>
        <option valur="Pressure">Pressure</option>
        <option value="Relative_Humidity">Relative Humidity</option>
        <option value="Rain">Rain</option>
        <option value="Light_Intensity">Light Intensity</option>
      </select>
      <br>
      <input type="checkbox" name="min" class="items" value="Minimum" id="min" onchange="trigger()">Minimum
      <input type="checkbox" name="avg" class="items" value="Average" id="avg" onchange="trigger()">Average
      <input type="checkbox" name="max" class="items" value="Maximum" id="max" onchange="trigger()">Maximum
      <hr id="rule">
    </form>
  </div>
  <div class="container">
    <br>
    <div id="result" style="text-align: center;">
    </div>
  </div>
</body>
</html>
