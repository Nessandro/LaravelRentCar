<html>
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
    </head>
    <body>
        <div id="app">
            <div class="container max-auto">

                <header class="py-6 mb-8">
                    <h1>Rent Car Application</h1>
                </header>
                <main class="flex">
                    <aside class="w-1/5">
                        <ul class="list-reset">
                            <li class="pb-4"><router-link  to="/" exact>Home</router-link></li>
                            <li class="pb-4"><router-link to="/reservations">Reservations</router-link></li>
                        </ul>
                    </aside>

                    <div class="primary primary flex-1">
                        <router-view></router-view>
                    </div>

                </main>

            </div>
        </div>

    <script src="{{asset('/js/app.js')}}"></script>

    </body>
</html>
