<div class="container-fluid">
    <div class="row justify-content-center" style="margin-top: 80px;">
        <div class="col-sm-12 col-md-12 col-lg-2">
            <!-- User Metrics -->
            <div class="status-card text-center mb-4">
                <div class="stat-icon">
                    <i class="bx bx-user"></i>
                </div>
                <h5>Users</h5>
                <h2>{{ $usersCount ?? 0 }}</h2>
            </div>
            <!-- Application Metrics -->
            <div class="status-card text-center mb-4">
                <div class="stat-icon">
                    <i class="bx bx-hourglass"></i>
                </div>
                <h5>Pending Applications</h5>
                <h2>{{ $pendingApplicationsCount ?? 0 }}</h2>
            </div>
            <div class="status-card text-center mb-4">
                <div class="stat-icon">
                    <i class="bx bx-check-circle"></i>
                </div>
                <h5>Approved Applications</h5>
                <h2>{{ $approvedApplicationsCount ?? 0 }}</h2>
            </div>
            <div class="status-card text-center mb-4">
                <div class="stat-icon">
                    <i class="bx bx-x-circle"></i>
                </div>
                <h5>Rejected Applications</h5>
                <h2>{{ $rejectedApplicationsCount ?? 0 }}</h2>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-10">
            <div class="row g-4 mb-4">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <x-dashboard-card link="/pets" title="Overall Total Number of Pets"
                        :petsCount="$totalPetsCount"
                        :catsCount="$catsCount"
                        :dogsCount="$dogsCount" />
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <x-dashboard-card link="/pets" title="Available Pets in the Shelter"
                        :petsCount="$availableCatsCount + $availableDogsCount"
                        :catsCount="$availableCatsCount"
                        :dogsCount="$availableDogsCount" />
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <x-dashboard-card link="/pets" title="Adopted Pets"
                        :petsCount="$adoptedCatsCount + $adoptedDogsCount"
                        :catsCount="$adoptedCatsCount"
                        :dogsCount="$adoptedDogsCount" />
                </div>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <x-dashboard-card link="/applications" title="Pending Applications"
                        :petsCount="$pendingApplicationsCount"
                        :catsCount="$pendingCatsCount"
                        :dogsCount="$pendingDogsCount" />
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <x-dashboard-card link="/applications" title="Approved Applications"
                        :petsCount="$approvedApplicationsCount"
                        :catsCount="$approvedCatsCount"
                        :dogsCount="$approvedDogsCount" />
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <x-dashboard-card link="/applications" title="Rejected Applications"
                        :petsCount="$rejectedApplicationsCount"
                        :catsCount="$rejectedCatsCount"
                        :dogsCount="$rejectedDogsCount" />
                </div>
            </div>
        </div>
    </div>
</div>
