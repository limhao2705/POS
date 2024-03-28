<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS System</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
    @yield('css')
    <script nonce="b35176a7-55f1-403a-bd7c-ecef8ae24fc6">
        try {
            (function(w, d) {
                ! function(j, k, l, m) {
                    j[l] = j[l] || {};
                    j[l].executed = [];
                    j.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    j.zaraz.q = [];
                    j.zaraz._f = function(n) {
                        return async function() {
                            var o = Array.prototype.slice.call(arguments);
                            j.zaraz.q.push({
                                m: n,
                                a: o
                            })
                        }
                    };
                    for (const p of ["track", "set", "debug"])
                        j.zaraz[p] = j.zaraz._f(p);
                    j.zaraz.init = () => {
                        var q = k.getElementsByTagName(m)[0],
                            r = k.createElement(m),
                            s = k.getElementsByTagName("title")[0];
                        s && (j[l].t = k.getElementsByTagName("title")[0].text);
                        j[l].x = Math.random();
                        j[l].w = j.screen.width;
                        j[l].h = j.screen.height;
                        j[l].j = j.innerHeight;
                        j[l].e = j.innerWidth;
                        j[l].l = j.location.href;
                        j[l].r = k.referrer;
                        j[l].k = j.screen.colorDepth;
                        j[l].n = k.characterSet;
                        j[l].o = (new Date).getTimezoneOffset();
                        if (j.dataLayer)
                            for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                    ...x[1],
                                    ...y[1]
                                })), {})))
                                zaraz.set(w[0], w[1], {
                                    scope: "page"
                                });
                        j[l].q = [];
                        for (; j.zaraz.q.length;) {
                            const z = j.zaraz.q.shift();
                            j[l].q.push(z)
                        }
                        r.defer = !0;
                        for (const A of [localStorage, sessionStorage])
                            Object.keys(A || {}).filter((C => C.startsWith("_zaraz_"))).forEach((B => {
                                try {
                                    j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                                } catch {
                                    j[l]["z_" + B.slice(7)] = A.getItem(B)
                                }
                            }));
                        r.referrerPolicy = "origin";
                        r.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
                        q.parentNode.insertBefore(r, q)
                    };
                    ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        @include('layouts.partials.navbar')
        @include('layouts.partials.sidebar')
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>New Products</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">New Products</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('status'))
                            <div class="alert alert-success">{{session('status')}}</div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">General</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <form method="POST" action="{{route('product.update', $product->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Name</label>
                                        <input type="text" id="inputName" name="name" class="form-control" value={{$product->name}}>
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputImage">Image</label>
                                        <input type="file" id="inputImage" name="image" class="form-control" value={{$product->image}}>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="inputImage">Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputImage" name="image">
                                            <label class="custom-file-label" for="inputImage">Choose file</label>
                                        </div>
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="inputBarcode">Barcode</label>
                                        <input type="text" id="inputBarcode" name="barcode" class="form-control" value={{$product->barcode}}>
                                        @error('barcode')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputQuantity">Quantity</label>
                                        <input type="number" id="inputQuantity" name="quantity" class="form-control" value={{$product->quantity}}>
                                        @error('quantity')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPrice">Price</label>
                                        <input type="number" id="inputPrice" name="price" class="form-control "
                                            step="0.01" value={{$product->price}}>
                                        @error('price')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Description</label>
                                        <textarea id="inputDescription" name="description" class="form-control" value={{$product->description}} rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Status</label>
                                        <select id="inputStatus" name="status" class="form-control custom-select" value={{$product->status}}>
                                            <option selected disabled>Select one</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Discontinued">Discontinued</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <a href="{{route('product.main')}}" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Submit" class="btn btn-success float-right">
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

                        {{-- </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Budget</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEstimatedBudget">Estimated budget</label>
                                    <input type="number" id="inputEstimatedBudget" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputSpentBudget">Total amount spent</label>
                                    <input type="number" id="inputSpentBudget" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputEstimatedDuration">Estimated project duration</label>
                                    <input type="number" id="inputEstimatedDuration" class="form-control">
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Create new Project" class="btn btn-success float-right">
                    </div>
                </div> --}}
            </section>

        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        @include('layouts.partials.footer')
    </div>

    <script src="../../plugins/jquery/jquery.min.js"></script>

    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="../../dist/js/demo.js"></script> {{-- Pop ups screen, can be used for ads --}}
</body>

</html>
