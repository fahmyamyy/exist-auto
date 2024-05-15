<div class="row">
    <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{ route('admin.appointments') }}" class="card border-left-warning shadow h-100 py-2" style="text-decoration: none; cursor: pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Waiting for Appointment</div>
                        <div id="pendingCars" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <a href="{{ route('admin.approvals') }}" class="card border-left-success shadow h-100 py-2" style="text-decoration: none; cursor: pointer;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Waiting for Approval</div>
                        <div id="onProgressCars" class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        if ($("#pendingCars").length > 0) {
            fetch('/admin/base')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.responseCode === "200") {
                        // Mapping the response data to HTML elements
                        document.getElementById('pendingCars').textContent = data.data.pendingCars;
                        document.getElementById('onProgressCars').textContent = data.data.onProgressCars;
                    } else {
                        console.error('API response:', data.responseMessage);
                    }
                })
                .catch(error => {
                    console.error('There has been a problem with your fetch operation:', error);
                });
        } else {
            console.log("No pending cars element found, fetch aborted.");
        }
    });
</script>
