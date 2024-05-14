<!DOCTYPE html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
              font-weight: b;

            }
            p {
                font-weight: 600;
                font-size: 12.8px;
                font-family: sans-serif;
                color: #4c4c4c;
                line-height: 1.25;
            }
            .table {
              border-radius: 5px;
              float: none;
              margin: 0px auto;
            }

            h1, footer, #divBut {
              text-align: center;
            }
            h2 {
                font-family: sans-serif;
                color: #4c4c4c;
                line-height: 1.25;
                font-size: 28px;

            }
            button {
              border-radius: 5px;
              padding: 0 30px 0px 30px;
            }
            .card-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            span {
                font-weight: 400;
            }
            .card-img {
                width: 50px;
            }
            @media (max-width: 768px) {
                .card-img {
                    padding-top: 30px;
                }
            }
            .card-title {
                margin-top: 10px; /* Adjust this value as needed */
            }
        </style>
    </head>
    <body>

        @include('template.topbar2')
        @include('template.header')

        <div class="container mt-5">
            <h1>CryptoCoin Statistics</h1>
            <br>
            <div class="mt-4 row">
                <div class="col-md-4 col-sm-6">
                    <form method="GET" action="{{ url('crypto_table') }}" >
                        <div class=" input-group mb-3 form-inline d-flex dropdown">
                            <input list="browsers" type="text" class="form-control border-right-0 search-input" name="search-term" style="border-right: 0px; width: 40%" placeholder="Search">
                            <button type="submit" class="btn border-secondary-subtle bg-white"  style="border-left: 0px; border-radius: 10px">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA7klEQVR4nO2USwrCQBBE397
                                    PSr2OxhsoXkXEhajJxtsoeg6NN/G71ZGBCgQhTjJBFLGgITDVXUNNdeBX0QIiIAauqh0QAs2ywwfAGTAZdQL6ZYbfNWgJtIGKqgOsdHYDej62JDcfvuCNxDkCjSICUermLqz
                                    FnRcR2KvJ2uJCIK59+Ny4qKmag1sT11qaG+cCAnUfgVhNNi0udH0sCtVko+jCRtxZEYGmlsgoilkYi3Pw2eq+lsgoioHepCpbkpvbmuCJnpYo61dx0HDjY1OChpZoq/he9T1
                                    P2WLKirgwehJZ/EW+yq4pb8LsXYn6HB6EGmSrW6n6egAAAABJRU5ErkJggg==">
                            </button>
                            <datalist id="browsers">
                            </datalist>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 d-none d-md-inline">
                    @if(isset($coinDetails))
                    <a class="btn border-secondary-subtle bg-white float-right" href="{{ url('crypto_table') }}" style="float:right;border-radius: 10px">Clear Filter</a>
                    @endif
                </div>
            </div>

            @if(isset($coinDetails))
            <div class="card" style="font-family: sans-serif;">
                <div class="row no-gutters">
                    @foreach($coinDetails as $coin)
                    <div class="col-md-6 card-container d-flex align-items-center justify-content-center">
                        <img src="{{ $coin['image'] }}" class="card-img" alt="...">
                        <h5 class="card-title text-dark">{{ $coin['name'] }}</h5>
                        <h5 class="text-secondary">USD / {{ $coin['symbol'] }}</h5>
                    </div>
                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                        <div class="card-body ">
                            <div class="card-text">
                                <span class="d-flex align-items-center justify-content-center text-gray"><h2>${{ rtrim(sprintf('%.10f', $coin['current_price']), '0') }}</h2></span>
                                <p>Market Cap Rank <span style="float:right;">#{{ $coin['market_cap_rank'] }}</span></p>
                                <p>Market Cap <span style="float:right;">${{ $coin['market_cap'] }}</span></p>
                                <p>24H Volume <span style="float:right;">${{ rtrim(sprintf('%.10f', $coin['total_volume']), '0') }}</span></p>
                                <p>24H High/Low<span style="float:right;">${{ rtrim(sprintf('%.10f', $coin['high_24h']), '0') }}/${{ rtrim(sprintf('%.10f', $coin['low_24h']), '0') }}</span></p>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
            @else
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
            </div>
            @endif
        </div>

        <br><br>
        @include('template.footer')
        <script>
            let debounceTimer;

            document.addEventListener("DOMContentLoaded", function() {
                const searchBar = document.querySelector("input[name='search-term']");
                const resultsDropdown = $("#browsers");

                searchBar.addEventListener("input", filterOnChange);

                function filterOnChange(e) {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => {
                        const searchTerm = e.target.value.trim(); // Trim whitespace

                        if (searchTerm.length > 0) {
                            // Show loading indicator
                            resultsDropdown.html('<span class="dropdown-item">Searching...</span>');

                            $.ajax({
                                url: '/currency_filter',
                                method: 'GET',
                                data: { search: searchTerm },
                                success: function(response) {
                                    showSearchResults(response);
                                },
                                error: function(xhr, status, error) {
                                    // Display error message
                                    resultsDropdown.html(`<span class="dropdown-item text-danger">Error: ${error}</span>`);
                                }
                            });
                        } else {
                            resultsDropdown.empty();
                        }
                    }, 500); // Reduce debounce time
                }

                // Hide dropdown when clicking outside
                $(document).on('click', function (e) {
                    if (!$(e.target).closest(".dropdown").length) {
                        $(".dropdown-menu").parent().removeClass("show");
                    }
                });

                // Function to display search results
                function showSearchResults(results) {
                    resultsDropdown.empty();
                    if (results.length > 0) {
                        results.forEach(function (result) {
                            const resultItem = $("<option>").addClass("dropdown-item").text(result.name);
                            resultsDropdown.append(resultItem);
                        });
                    } else {
                        // Inform user of no results
                        const noResultItem = $("<span>").addClass("dropdown-item").text("No results found");
                        resultsDropdown.append(noResultItem);
                    }
                    // Show dropdown
                    resultsDropdown.parent().addClass("show");
                }
            });

        </script>
</body>
</html>
