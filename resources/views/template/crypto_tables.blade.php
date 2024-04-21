<!DOCTYPE html>
<html lang="en">
    <head>
        @include('template.css')
        <style>
            .tradingview-widget-copyright{
                visibility: hidden;
            }
            td,
            th {
              padding: 10px;
              text-align: center;
            }

            a {
              color: blue;
              font-weight: bold;
            }

            .table {
              border-radius: 5px;
              float: none;
              margin: 0px auto;
            }

            h1, footer, #divBut {
              text-align: center;
            }

            button {
              border-radius: 5px;
              padding: 0 30px 0px 30px;
            }
        </style>
    </head>
    <body>

        @include('template.topbar2')
        @include('template.header')

        <div class="container mt-5">
            <h1>CryptoCoin Statistics</h1>
            <br>
            <div style="height: 400px">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                        {
                            "width": "100%",
                            "height": "100%",
                            "defaultColumn": "overview",
                            "screener_type": "crypto_mkt",
                            "displayCurrency": "USD",
                            "colorTheme": "light",
                            "locale": "en",
                            "isTransparent": false
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>

        <br><br>
        @include('template.footer')
        <script>
            $(document).ready(function() {
                var allLink = "https://api.coinmarketcap.com/v1/ticker/";
                var nCurr = 100;
                function colorBox(idd, number) {
                    if (parseFloat(number) > 1) {
                      $(idd).css("background-color", "green");
                      $(idd).css("color", "white");
                    } else if (parseFloat(number) > 0) {
                      $(idd).css("background-color", "lightgreen");
                      $(idd).css("color", "white");
                    } else if (parseFloat(number) > -1) {
                      $(idd).css("background-color", "pink");
                      $(idd).css("color", "white");
                    } else {
                      $(idd).css("background-color", "red");
                      $(idd).css("color", "white");
                    }
                  }

                var cryptodata = [];
                $.ajax({
                    url: allLink,
                    async: false,
                    dataType: "json",
                    success: function(data) {
                      cryptodata = data;
                    }
                });

                  //$.getJSON(allLink, function(data) {
                document.title =
                    cryptodata[0].price_usd +
                    " " +
                    cryptodata[1].price_usd +
                    " " +
                    cryptodata[2].price_usd +
                    " " +
                    cryptodata[4].price_usd;

                for (var i = 0; i < nCurr; i++) {
                    var rowLine =
                      "<tr><td><a href='https://www.tradingview.com/chart/?symbol=" +
                      cryptodata[i].symbol +
                      "USD' target='_blank'>" +
                      cryptodata[i].symbol +
                      "</a></td><td>" +
                      cryptodata[i].name +
                      "</td><td>$" +
                      cryptodata[i].price_usd +
                      "</td><td>" +
                      cryptodata[i].price_btc +
                      "</td><td>" +
                      cryptodata[i].percent_change_1h +
                      "</td><td>" +
                      cryptodata[i].percent_change_24h +
                      "</td><td>" +
                      cryptodata[i].percent_change_7d +
                      "</td><td><input type='text' size='10' value='0' style='text-align:right' id='val" +
                      i.toString() +
                      "'/></td><td id='usd"+i.toString()+"'></td></tr>";
                    $("table > tbody:last-child").append(rowLine);
                    colorBox(
                      "table tr:last-child td:nth-child(5)",
                      cryptodata[i].percent_change_1h
                    );
                    colorBox(
                      "table tr:last-child td:nth-child(6)",
                      cryptodata[i].percent_change_24h
                    );
                    colorBox(
                      "table tr:last-child td:nth-child(7)",
                      cryptodata[i].percent_change_7d
                    );
                }

                  $("button").click(function() {
                    var sumNum = 0;
                    for (var i = 0; i < nCurr - 1; i++) {
                        $("#usd"+i).html("$0.00");
                      if ($.isNumeric($("#val" + i).val()) && parseFloat($("#val" + i).val())>=0) {
                        $("#usd"+i).html("$"+(parseFloat($("#val" + i).val()) * parseFloat(cryptodata[i].price_usd)).toFixed(2).toString());
                        sumNum +=
                          parseFloat($("#val" + i).val()) * parseFloat(cryptodata[i].price_usd);
                      }
                    }
                    $('#totalNum').html('$'+sumNum.toFixed(2).toString());
                  });

                  $("footer").html("Built By Syed Rizvi");
            });

        </script>
</body>
</html>
