<!--name : Nurul Natashah binti Hashim
//title : NeXT Graduate Programme Assessment(Extension C)
//API :weatherapi(need to register at https://www.weatherapi.com/my/)-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ISS Tracker System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <h1>ISS Tracker</h1>

    <label for="time">Choose Location/ COuntry:</label>
    <input
      style="width: 300px"
      type="text"
      id="weather"
      name="weather"
      placeholder="london"
    /><br />

    <ul id="lat"></ul>
    <script type="text/javascript">
      $(document).ready(function () {

        $("#weather").change(function () {

            $.get(
              //   "https://api.wheretheiss.at/v1/satellites/25544",
              "https://api.weatherapi.com/v1/current.json?key=c3b5408a76fb4d6795b44343210212&q="+$(this).val()+"&aqi=no",
              function (data, status) {
                $("#lat").append(
                  `<li><p><span>Country Name : </span>${data.location.country}</p>
                    <p><span>Condition : </span>${data.current.condition.text}</p>
                    <p><span>Last Update Condition : </span>${data.current.last_updated}</p>

                    </li><br>`
                );
                console.log(data, status);
              }
            );
          });

        });

      function toTimestamp(strDate) {
        var datum = Date.parse(strDate);
        return datum / 1000;
      }
    </script>
  </body>
</html>
