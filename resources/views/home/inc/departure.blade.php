<section class="bg-light py-md-5">
    <div class="container py-5 my-5">
        <div class="fw-bold d-inline-flex align-items-center mb-3"><span
                style="width: 50px; height:1px; background-color: var(--brand-color)"
                class="d-inline-block my-2 me-2"></span>DEPARTURE
            DATES</div>

        <div class="mb-5 d-flex gap-3 justify-content-md-between flex-column flex-md-row align-items-center">
            <h2 class="mb-0">Join Fixed Departure Trips</h2>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Select Month, Year
                </button>
                <div class="dropdown-menu" style="min-width: 250px;">
                    <form class="px-4 py-3">
                        <div class="mb-3">
                            <label for="monthSelect" class="form-label">Month</label>
                            <select class="form-select" id="monthSelect">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="yearSelect" class="form-label">Year</label>
                            <select class="form-select" id="yearSelect">
                                @php
                                    $currentYear = date('Y');
                                    $endYear = $currentYear + 2;
                                @endphp
                                @for ($year = $currentYear; $year <= $endYear; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="table-responsive trips-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-muted">TRIP NAME</th>
                        <th scope="col" class="text-muted">DEPATURE DATE</th>
                        <th scope="col" class="text-muted">STATUS</th>
                        <th scope="col" class="text-muted">PRICES</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <th scope="row">Everest Base Camp Trek</th>
                            <td>
                                <div class="fw-bold">16 Days</div>
                                <div class="small text-muted">From 9th - 24th Nov</div>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <div>
                                        <svg width="22" height="21" viewBox="0 0 22 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M22 10.5L19.56 7.72004L19.9 4.04004L16.29 3.22004L14.4 0.0400391L11 1.50004L7.6 0.0400391L5.71 3.22004L2.1 4.03004L2.44 7.71004L0 10.5L2.44 13.28L2.1 16.97L5.71 17.79L7.6 20.97L11 19.5L14.4 20.96L16.29 17.78L19.9 16.96L19.56 13.28L22 10.5ZM9 15.5L5 11.5L6.41 10.09L9 12.67L15.59 6.08004L17 7.50004L9 15.5Z"
                                                fill="#FF8C00" />
                                        </svg>

                                    </div>
                                    <div>
                                        <div class="fw-bold">Guranteed</div>
                                        <div class="small text-muted">12 seats left</div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <div class="fw-bold mb-1">$ 4500</div>
                                <div class="small text-muted">
                                    <a href="#" class="btn btn-primary">Join us <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</section>
