    <!-- Page Wrapper for centering div-->
<div class="d-none position-absolute flex-column justify-content-center align-items-center w-100 h-100" id="popup_filter">
    <!-- Card Content Container -->
    <div class="card shadow border border-danger border-3" style="max-width: 600px; min-width:400px;">
        <div class="card-header d-flex w-100 justify-content-between align-items-center fw-semibold">
            Filter Options
            <!-- close button -->
            <a href="#" onclick="close_popup('filter')">
                <i class="bi bi-x fs-4"></i>
            </a>
        </div>
        <!-- Body -->
        <div class="card-body d-flex flex-column justify-content-evenly align-items-center px-3 py-2">
            <!-- School Year filter option Wrapper -->
            <div class="d-flex flex-column justify-content-between w-100 my-0">
                <!-- label -->
                <p class="fw-semibold">School Year</p>
                <!-- Dropdown button -->
                <div class="dropdown py-1 w-100 my-1">
                    <button class="btn btn-outline-dark rounded-pill w-100" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Reference ul dropdown items -->
                        2022-2023 
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">2022-2023</a></li>
                        <li><a class="dropdown-item" href="#">2021-2022</a></li>
                        <li><a class="dropdown-item" href="#">2020-2021</a></li>
                        <li><a class="dropdown-item" href="#">2019-2020</a></li>
                    </ul>
                </div>
            </div>
            <!-- Class filter option Wrapper -->
            <div class="d-flex flex-column justify-content-between w-100 my-0">
                <!-- label -->
                <p class="fw-semibold">Class</p>
                <!-- Dropdown button -->
                <div class="dropdown py-1 w-100 my-1">
                    <button class="btn btn-outline-dark rounded-pill w-100" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Reference ul dropdown items -->
                        2022-2023 
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Class 1</a></li>
                        <li><a class="dropdown-item" href="#">Class 2</a></li>
                        <li><a class="dropdown-item" href="#">Class 3</a></li>
                        <li><a class="dropdown-item" href="#">Class 4</a></li>
                    </ul>
                </div>
            </div>
            <button class="btn btn-success rounded-pill p-1 align-self-end mt-2" onclick="close_popup('filter')" style="width:120px">Filter</button>
        </div>
    </div>
</div>



