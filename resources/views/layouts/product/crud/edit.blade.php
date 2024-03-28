<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Create Student</title>
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
                    <h3>Dachboard</h3>
                </a>
                <a href="{{route('product.main')}}" class="active">
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
                <a href="#">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>New Login</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <p style="font-size: 25px">Product<b>/Update-Product</b></p>
            <!-- End of Analyses -->

        

            <!-- Adding student field including student id, name, email which course did that student take, did they pay yet.. -->
            <!-- Adding student section -->
            <div class="add-student">
                <h2>Update Product</h2>
                <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="inputName">Name</label>
                        <input type="text" id="inputName" name="name" value={{$product->name}}>
                        @error('name')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="inputImage">Image</label>
                        <input type="file" id="inputImage" name="image" value={{$product->image}}>
                    </div>

                    <div>
                        <label for="inputBarcode">Barcode</label>
                        <input type="text" id="inputBarcode" name="barcode" value={{$product->barcode}}>
                        @error('barcode')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="inputQuantity">Quantity</label>
                        <input type="text" id="inputQuantity" name="quantity" value={{$product->quantity}}>
                        @error('quantity')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="inputPrice">Price</label>
                        <input type="text" id="inputPrice" name="price" step="0.01" value={{$product->price}}>
                        @error('price')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div >
                        <label for="inputDescription">Description</label>
                        <input type="text" id="inputDescription" name="description" rows="4" value={{$product->description}}></input>
                    </div>
                    <div>
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" name="status">
                            <option selected disabled>Select one</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Discontinued">Discontinued</option>
                        </select>
                    </div><br>
                    <div>
                        <a href="{{route('product.main')}}" class="btn btn-secondary">Cancel</a>
                    </div>
                    <div>
                        <input type="submit" value="Create new Product">
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </form>
            </div>
            <!-- End of Adding student section -->

        

        </main>
        <!-- End of Main Content -->



    </div>

    <script src="../assets/js/index.js"></script>
</body>

</html>