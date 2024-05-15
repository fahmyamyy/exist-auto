<style>
    .filter-sidebar.open {
        width: 500px;
        /* Adjust the width as needed */
    }

    .filter-sidebar {
        z-index: 3;
        overflow-x: hidden;
        overflow-y: visible;
        /* Default, allows overflow vertically but won't scroll */

        /* Ensure this is higher than the overlay's z-index */
        position: fixed;
        right: 0;
        top: 0;
        width: 0;
        /* Initial state, closed */
        height: 100%;
        transition: width 0.5s;
        /* Smooth transition for opening/closing */
        background-color: white;
        /* Make sure it's visible */
    }

    #overlay {
        z-index: 2;
        /* Must be lower than the sidebar's z-index */
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);
        /* Semi-transparent */
        display: none;
        /* Initially hidden */
    }


    .form-filter label {
        font-size: 10pt;
        font-weight: bold;
        margin-top: 10px;
        /* align-items: center; */
        /* padding: 0 32px; */
    }

    */ .filter-sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .filter-header {
        display: flex;
        align-items: center;
        padding: 0 32px;
    }

    .filter-header h2 {
        margin: 0;
        flex-grow: 1;
    }

    .close-btn {
        font-size: 36px;
        cursor: pointer;
        border: none;
        background: none;
    }

    .buttons-container {
        display: flex;
        justify-content: center;
        /* Align buttons in the center */
        padding: 20px;
    }

    .apply-button,
    .reset-button {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        /* Changed to inline-flex to allow internal flex alignment */
        font-size: 16px;
        margin: 4px;
        cursor: pointer;
        flex: 1;
        /* Both buttons will take equal space */
    }

    .reset-button {
        background-color: #f44336;
        /* Red */
    }

    /* Style untuk form filter */
    /* label {
        font-weight: bold;
        margin-top: 10px;
    } */

    /* select,
    input[type=text] {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
    } */

    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 15px;
        border-radius: 5px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #4CAF50;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #4CAF50;
        cursor: pointer;
    }

    .slider-labels {
        display: flex;
        justify-content: space-between;
    }

    .slider-container {
        margin: 10px 0;
    }

    /* Style untuk input field */
    .input-min-max {
        display: flex;
        justify-content: space-between;
        margin-top: 5px;
    }

    .input-min-max input {
        width: 48%;
    }


    /* Add additional styles here */
    /* Cards container */
    .sidebar-cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 0 20px;
        margin-top: 50px;
        /* Increased top margin */
    }

    /* Card styling */
    .sidebar-card {
        flex-basis: calc(33.333% - 40px);
        /* 3 cards per row, adjust margin as needed */
        margin: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 5px;
        overflow: hidden;
        background-color: #ffffff;
    }

    .sidebar-card-img {
        width: 100%;
        height: 200px;
        /* Fixed height, or use aspect-ratio property */
        object-fit: cover;
        /* This makes the image cover the area without stretching */
    }

    .sidebar-card-body {
        padding: 15px;
    }

    .sidebar-card-title {
        margin: 0;
        font-size: 1.1em;
        font-weight: bold;
    }

    .sidebar-card-info {
        font-size: 0.9em;
        color: #333333;
        margin: 10px 0;
    }

    .sidebar-card-price {
        font-size: 1em;
        color: #333333;
        font-weight: bold;
    }

    /* Responsive card layout */
    @media (max-width: 768px) {
        .card {
            flex-basis: calc(50% - 40px);
            /* 2 cards per row on smaller screens */
        }
    }

    @media (max-width: 480px) {
        .card {
            flex-basis: 100%;
            /* 1 card per row on very small screens */
        }
    }
</style>

<div class="vh-100 d-flex flex-column justify-content-center filter-sidebar border" id="filterSidebar">
    <div class="row justify-content-center p-2 align-items-center border-bottom" style="z-index: 1051;">
        <p class="font-weight-bold">All Filters</p>
    </div>
    <form class="px-4 form-filter" method="GET" action="{{ route('car.buy.view') }}">
        @csrf
        <label for="brand">Brand</label>
        <select class="form-control" id="brand" name="brand">
            <option value="">Brand</option>
            @foreach ($carBrands as $brands)
                <option value="{{ $brands->id }}">{{ $brands->brand }}</option>
            @endforeach
        </select>
        <label for="model">Model</label>
        <select class="form-control" id="model" name="model">
            <option value="">Model</option>
            @foreach ($carModels as $models)
                <option value="{{ $models->id }}">{{ $models->model }}</option>
            @endforeach
        </select>
        <label for="type">Tipe</label>
        <select class="form-control" id="type" name="type">
            <option value="">Type</option>
            @foreach ($carTypes as $types)
                <option value="{{ $types->id }}">{{ $types->type }}</option>
            @endforeach
        </select>
        <label for="transmission">Transmission</label>
        <select class="form-control" id="transmission" name="transmission">
            <option value="">Transmission</option>
            <option value="manual">Manual</option>
            <option value="automatic">Automatic</option>
        </select>
        <label for="color">Color</label>
        <select class="form-control" id="color" name="color">
            <option value="">Color</option>
            <option value="hitam">Hitam</option>
            <option value="putih">Putih</option>
            <option value="merah">Merah</option>
            <option value="biru">Biru</option>
        </select>
        <label for="location">Location</label>
        <select class="form-control" id="location" name="location">
            <option value="">Location</option>
            <option value="jakarta">Jakarta</option>
            <option value="bogor">Bogor</option>
            <option value="tangerang">Tangerang</option>
            <option value="depok">Depok</option>
        </select>
        <label for="yearRange">Tahun</label>
        <input type="hidden" name="yearMin" id="yearMin" value="">
        <input type="hidden" name="yearMax" id="yearMax" value="">
        <div class="slider-container" style="margin: 0">
            <div class="input-min-max" style="margin: 0">
                <input class="form-control" type="text" id="yearMinText" readonly>
                <input class="form-control" type="text" id="yearMaxText" readonly>
            </div>
            <div class="m-2" style="margin: 0">
                <div id="slider" class="slider my-4"></div>
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-success m-3 col">Apply Filters</button>
            <button type="submit" class="btn btn-danger m-3 col">Reset</button>
        </div>
        
    </form>
</div>
<div id="overlay" style="display: none;"></div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var filterButton = document.querySelector('.filter-button');
        var sidebar = document.getElementById('filterSidebar');
        var overlay = document.getElementById('overlay');

        filterButton.addEventListener('click', function(event) {
            event.stopPropagation(); // Stop the event from bubbling up
            if (sidebar.style.width === '0px' || sidebar.style.width === '') {
                sidebar.style.width = '35%'; // Open sidebar
                overlay.style.display = 'block'; // Show overlay
            } else {
                sidebar.style.width = '0'; // Close sidebar
                overlay.style.display = 'none'; // Hide overlay
            }
        });

        // Close sidebar if clicking on the overlay
        overlay.addEventListener('click', function() {
            sidebar.style.width = '0';
            overlay.style.display = 'none';
        });

        // Optional: Stop propagation on sidebar to prevent it from triggering overlay close
        sidebar.addEventListener('click', function(event) {
            event.stopPropagation();
        });

        var slider = document.getElementById('slider');
        var inputMin = document.getElementById('yearMinText');
        var inputMax = document.getElementById('yearMaxText');

        var yearMin = document.getElementById('yearMin');
        var yearMax = document.getElementById('yearMax');

        noUiSlider.create(slider, {
            start: [2000, 2024],
            connect: true,
            range: {
                'min': 2000,
                'max': 2024
            },
            step: 1
        });

        slider.noUiSlider.on('update', function(values, handle) {
            if (handle) {
                inputMax.value = parseInt(values[handle]); // Convert to integer, remove decimal
                yearMax.value = parseInt(values[handle]); // Convert to integer, remove decimal
            } else {
                inputMin.value = parseInt(values[handle]); // Convert to integer, remove decimal
                yearMin.value = parseInt(values[handle]); // Convert to integer, remove decimal
            }
        });
        slider.noUiSlider.on('update', function(values, handle) {
            if (handle) {
                document.getElementById('yearMax').value = parseInt(values[handle]);
            } else {
                document.getElementById('yearMin').value = parseInt(values[handle]);
            }
        });
    });


    // $(document).ready(function() {
    //     $('.filter-button').click(function(event) {
    //         event.stopPropagation(); // Stop click event from bubbling up to document
    //         var sidebar = $('#filterSidebar');
    //         var overlay = $('#overlay');

    //         // Toggle the sidebar width
    //         if (sidebar.width() > 0) { // Check if sidebar is open
    //             sidebar.css('width', '0');
    //             overlay.fadeOut(200); // Hide overlay
    //         } else {
    //             sidebar.css('width', '35%');
    //             overlay.fadeIn(200); // Show overlay
    //         }
    //     });

    //     // Click on overlay to close sidebar
    //     $(document).on('click', '#overlay', function() {
    //         $('#filterSidebar').css('width', '0');
    //         $(this).fadeOut(200); // Hide overlay
    //     });
    // });
</script>
