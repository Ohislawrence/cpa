<div class="p-4 border rounded-lg shadow-md relative">
    <div class="absolute top-2 left-2 text-2xl font-bold">
        Total Clicks: <span id="total-clicks">0</span>
    </div>

    <div class="mb-4">
        <label>Select Date Range:</label>
        <input type="date" id="start-date" />
        <input type="date" id="end-date" />
        <button onclick="fetchClickData()">Apply</button>
    </div>

    <div id="clicks-chart">
        Loading chart...
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetchClickData();
    });

    function fetchClickData() {
        const startDate = document.getElementById("start-date").value;
        const endDate = document.getElementById("end-date").value;

        axios.get('/campaign/chart/single/'. $ffer->offerid .'/charts', {
            params: {
                start_date: startDate,
                end_date: endDate
            }
        }).then(response => {
            document.getElementById("clicks-chart").innerHTML = response.data.chart;
            document.getElementById("total-clicks").textContent = response.data.totalClicks;
        }).catch(error => {
            console.error("Error fetching click data:", error);
        });
    }
</script>
