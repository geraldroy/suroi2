
@if(session()->get('success'))
    <div class="alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
@endif

@include('home.partials.nav_header', ['userType' => $userString] )

<div class="tab-content pt-4 w-100" id="nav-tabContent">

    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        @include('home.partials.dashboard', ['userType' => $userString])
    </div>
    <div class="tab-pane fade" id="nav-locations" role="tabpanel" aria-labelledby="nav-locations-tab">
        @include('home.partials.locations', ['userType' => $userString])
    </div>
    <div class="tab-pane fade" id="nav-activities" role="tabpanel" aria-labelledby="nav-activities-tab">
        @include('home.partials.activities', ['userType' => $userString])
    </div>
    <div class="tab-pane fade" id="nav-tags" role="tabpanel" aria-labelledby="nav-tags-tab">...</div>
    <div class="tab-pane fade" id="nav-agencies" role="tabpanel" aria-labelledby="nav-agencies-tab">
        <!-- Agency tab --->

        <div class="d-flex w-100">
            <form class="my-auto d-inline-flex mr-4 mx-3" autocomplete="off" action="/search">
                <input class="form-control shadow-box pl-5" name="activity-search" type="search" placeholder='Search' aria-label="Search">
                <div class="position-absolute align-middle color-suroi-green suroi-landing-searchico d-flex">
                  <i class="fas fa-search m-auto h6"></i>
                </div>
            </form>
        </div>

        <div class="row mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th style="width: 25%">Agency Name</th>
                        <th >Description</th>
                        <th>Packages</th>
                        <th style="width: 5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agencies as $key => $agency)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><a href="#">{{ $agency->name }}</a></td>
                        <td>{{ $agency->description }}</td>
                        <td>{{ $agency->packages_count }}</td>
                        <td class="d-flex">
                            <div class="btn-group mx-auto" role="group">
                                <button class="btn btn-success btn-sm d-flex p-2" type="submit"><i class="fas fa-edit m-auto"></i></button>
                                <form action="#" method="post" class="mx-2">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger btn-sm d-flex p-2" type="submit"><i class="fas fa-trash-alt m-auto"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End of Agency tab --->
    </div>
    <div class="tab-pane fade" id="nav-customers" role="tabpanel" aria-labelledby="nav-customers-tab">
        <!-- Customers tab -->
        <div class="d-flex w-100">
            <form class="my-auto d-inline-flex mr-4 mx-3" autocomplete="off" action="/search">
                <input class="form-control shadow-box pl-5" name="activity-search" type="search" placeholder='Search' aria-label="Search">
                <div class="position-absolute align-middle color-suroi-green suroi-landing-searchico d-flex">
                  <i class="fas fa-search m-auto h6"></i>
                </div>
            </form>
        </div>

        <div class="row mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th style="width: 25%">Customer Name</th>
                        <th >Email Address</th>
                        <th>Transactions</th>
                        <th style="width: 5%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $key => $customer)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td><img src="{{ $customer->photo }}" class="rounded" style="height: 100px"></td>
                        <td><a href="#">{{ $customer->lastname.', '.$customer->firstname }}</a></td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->transactions_count }}</td>
                        <td class="d-flex">
                           <div class="btn-group mx-auto" role="group">
                                <button class="btn btn-success btn-sm d-flex p-2" type="submit"><i class="fas fa-edit m-auto"></i></button>
                                <form action="#" method="post" class="mx-2">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger btn-sm d-flex p-2" type="submit"><i class="fas fa-trash-alt m-auto"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- End of Customers tab -->
    </div>
</div>
