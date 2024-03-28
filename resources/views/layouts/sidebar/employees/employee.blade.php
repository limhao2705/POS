
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS System</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
    @yield('css')
    <script nonce="b35176a7-55f1-403a-bd7c-ecef8ae24fc6">
    try {
        (function(w, d) {
            !function(j, k, l, m) {
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
                ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document)
    } catch (e) {
        throw fetch("/cdn-cgi/zaraz/t"), e;
    }
    ;
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
                            <h1>Employees</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Employees</li>
                            </ol>
                        </div>  
                    </div>
                </div>
            </section>

            <section class="content">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Employees</h3>
                        
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 5%" class="text-center align-middle">#</th>
                                    <th style="width: 10%" class="text-center align-middle">Name</th>
                                    <th style="width: 10%" class="text-center align-middle">Gender</th>
                                    <th style="width: 15%" class="text-center align-middle">Email</th>
                                    <th style="width: 15%" class="text-center align-middle">Phone Number</th>
                                    <th style="width: 5%" class="text-center align-middle">Position</th>
                                    <th  class="text-center align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $index => $user)
                                <tr>
                                    <td class="text-center align-middle">{{ $index + 1 }}</td>
                                    <td class="text-center align-middle">{{ $user->full_name }}</td>
                                    {{-- <td class="text-center align-middle">
                                        <img src="{{ asset($user->image) }}" alt="user image" style="width: 50px; height: auto;">
                                    </td> --}}
                                    <td class="text-center align-middle">{{ $user->gender }}</td>
                                    <td class="text-center align-middle">{{ $user->email }}</td>
                                    <td class="text-center align-middle">{{ $user->phone_number }}</td>
                                    <td class="text-center align-middle">{{ $user->position }}</td>
                                
                                    <td class="text-center align-middle">
                                        <a class="btn btn-primary btn-sm" href="{{ route('product.create') }}" style="margin-right:5px;">
                                            <i class="fas fa-folder"></i> Add
                                        </a>
                                        <a class="btn btn-info btn-sm" href="{{route('employee.edit', ['user'=>$user->id])}}" style="margin-right:5px">
                                            <i class="fas fa-pencil-alt"></i> Edit
                                        </a>
                                        <form action="{{ route('employee.delete', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirmDelete();">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                        
                                        {{-- <script>
                                            function confirmDelete() {
                                                if ("{{ $user->id }}" == "{{ Auth::user()->id }}") {
                                                    var confirmed = confirm("Are you sure you want to delete your own account?");
                                                    if (confirmed) {
                                                        alert("Your account will be deleted. Logging out now.");
                                                        // Optionally, you can redirect the user to the login page here
                                                        window.location.href = "{{ route('logout') }}"; // Redirect to logout route
                                                        return true; // Proceed with form submission
                                                    } else {
                                                        return false; // Cancel form submission
                                                    }
                                                }
                                                return true; // Proceed with form submission for other users
                                            }
                                        </script> --}}
                                        
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        @include('layouts.partials.footer')
    </div>

    <script src="../../plugins/jquery/jquery.min.js"></script>

    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="../../dist/js/demo.js"></script>
</body>
</html>
