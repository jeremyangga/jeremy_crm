<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">PT Smart</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">My Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/lead">Lead (Customer not yet subscribed list)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/projects">Project</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/customers-subscribed">Customer Subscribed</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" style="color: white" href="{{ route('employee.logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('employee.logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2>Subscribe Page</h2>
        @if(count($customers) != 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Approved</th>
                    <th>Product</th>
                    <th>Subscribe</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <form action="{{ route('employee.subscribe_customer', $customer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <td>{{ $customer->id }}</td>
                        <td>
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $customer->name)}}" required/>
                        </td>
                        @if($customer->employee && $customer->employee->isManager)
                        <td>
                            <select class="form-control" id="isApproved" name="isApproved">
                                <option value="0" {{ $customer->isApproved == false ? 'selected' : '' }}>No</option>
                                <option value="1" {{ $customer->isApproved == true ? 'selected' : '' }}>Yes</option>
                            </select>
                        </td>
                        @else
                            <td>{{ $customer->isApproved ? 'Yes' : 'No' }}</td>
                        @endif
                        <td>
                            <select class="form-control" id="idProduct" name="idProduct">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ $customer->idProduct == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }}
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control" id="isSubscribed" name="isSubscribed">
                                <option value="0" {{ $customer->isSubscribed == false ? 'selected' : '' }}>No</option>
                                <option value="1" {{ $customer->isSubscribed == true ? 'selected' : '' }}>Yes</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-success">Confirm</button>
                        </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h1> All your customer is subscribed </h1>
        @endif
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
