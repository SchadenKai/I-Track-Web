<div class="modal fade" id="filterOptions">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Filter Option</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="fw-semibold">School Year</p>
                <div class="dropdown py-1 w-100 my-1">
                    <button class="btn btn-outline-dark rounded-pill w-100" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Reference ul dropdown items -->
                        2022-2023 
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item yearFilter" href="#">2022-2023</a></li>
                        <li><a class="dropdown-item yearFilter" href="#">2021-2022</a></li>
                        <li><a class="dropdown-item yearFilter" href="#">2020-2021</a></li>
                        <li><a class="dropdown-item yearFilter" href="#">2019-2020</a></li>
                    </ul>
                </div>
                <p class="fw-semibold">Class</p>
                <!-- Dropdown button -->
                <div class="dropdown py-1 w-100 my-1">
                    <button class="btn btn-outline-dark rounded-pill w-100" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Reference ul dropdown items -->
                        Class 1
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#">Class 1</a></li>
                        <li><a class="dropdown-item" href="#">Class 2</a></li>
                        <li><a class="dropdown-item" href="#">Class 3</a></li>
                        <li><a class="dropdown-item" href="#">Class 4</a></li>
                    </ul>
                </div>
                
            </div>
            <button type="button" class="btn btn-success m-3 " data-bs-dismiss="modal" >Filter</button>
            
          </div>
        </div>
      </div>