<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Products</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="{{asset('images/logo2.png')}}">
                    <h2><span class="danger">POS</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="{{route('home')}}">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="{{route('product.main')}}"  class="active">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Products</h3>
                </a>
                <a href="{{route('sale')}}">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Sales</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>Dashboard</h1>
            <!-- Analyses -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                        <h3>Total Sales</h3>
                            <h1>$8,029</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+51%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                        <h3>Employees</h3>
                            <h1>23</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>-48%</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                        <h3>Stocks</h3>
                            <h1>5,150</h1>
                        </div>
                        <div class="progresss">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="percentage">
                                <p>+21%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

            <!-- End of New Users Section -->
            <div class="recent-orders">
                <h2>Products</h2>
                <table>
                    <thead>
                        <tr>
                            <th >No</th>
                            <th>Name</th>
                            <th class="text-center ">Image</th>
                            <th>Barcode</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $index => $product)
                        <tr>
                            <td class="text-center align-middle">{{ $index + 1 }}</td>
                            <td class="text-center align-middle">{{ $product->name }}</td>
                            <td class="text-center align-middle">
                                <div class="image-container"> <!-- Added a container div -->
                                    <img src="{{ asset($product->image) }}" alt="product image">
                                </div>
                            </td>
                            <td class="text-center align-middle">{{ $product->barcode }}</td>
                            <td class="text-center align-middle">{{ $product->price }}</td>
                            <td class="text-center align-middle">{{ $product->quantity }}</td>
                            <td class="text-center align-middle">{{ $product->status }}</td>
                        
                            <td class="text-center align-middle">
                                <a href="{{route('product.edit', ['product'=>$product->id])}}" style="margin-right:5px">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <form action="{{ route('product.delete', $product->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form> 
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                <a href="{{route('product.create')}}">Add New Product</a>

            </div>

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b>Limhao</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="{{asset('images/pfp.png')}}">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="{{asset('images/pfp.png')}}">
                    <h2>Chim Limhao</h2>
                    <p>An Administrator</p>
                </div>
            </div>


        </div>


    </div>

    <script src="../assets/js/index.js"></script>
</body>

</html>