
<!--name : Nurul Natashah binti Hashim
//title : NeXT Graduate Programme Assessment(Extension A)-->

<!DOCTYPE html>
<html lang="en">


  <head>
    <title>ISS Tracker System</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <h1>ISS Tracker</h1>

    <label for="time">Choose Date & Time:</label>
    <input
      style="width: 300px"
      type="datetime-local"
      id="date"
      name="date"
      placeholder="23/07/2021 6:51pm (UTC +0)"
    /><br />

    <ul id="lat"></ul>
    <script type="text/javascript">
      $(document).ready(function () {
        //$("#date").val()
        $("#date").change(function () {
          //looping

          var add = 10;

          var datebefore = [];
          var dateafter = [];
          for (let index = 0; index < 6; index++) {
            var dateBefore = new Date($("#date").val()); //10.10 ->before
            dateBefore.setMinutes(dateBefore.getMinutes() - 10 * index);
            datebefore.push(dateBefore);
          }
          for (let index = 1; index < 7; index++) {
            var dateAfter = new Date($("#date").val()); //10.10 ->after
            dateAfter.setMinutes(dateAfter.getMinutes() + 10 * index);
            dateafter.push(dateAfter);
          }

          var dateCombine = [...datebefore.reverse(), ...dateafter];
          // console.log(dateCombine);
          var dateToTimeStamp = dateCombine.map(function (v) {
            var timestamp = toTimestamp(v);
            $.get(
              //   "https://api.wheretheiss.at/v1/satellites/25544",
              "https://api.wheretheiss.at/v1/satellites/25544/positions?timestamps=" +
                timestamp +
                "&units=miles",
              function (data, status) {
                //   alert("Data: " + data + "\nStatus: " + status);
                console.log(data, status);

                for (let index = 0; index < data.length; index++) {
                  $("#lat").append(
                    `<li><p><span>LATITUDE : </span>${data[index].latitude}</p>
                      <p><span>LONGITUDE : </span>${data[index].longitude}</p>
                      </li><br>`
                  );
                }
              }
            );

          });
        });
      });

      function toTimestamp(strDate) {
        var datum = Date.parse(strDate);
        return datum / 1000;
      }
    </script>
  </body>
</html>
