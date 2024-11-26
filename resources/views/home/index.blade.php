<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  
    <div class="z-10 navbar bg-neutral text-neutral-content">
        <div class="flex-1">
          <a href="{{url('dashboard')}}" class="btn btn-ghost text-xl">Mariela's Coffee Shop</a>
        </div>
        {{-- Cart --}}
        <div class="flex-none">
          <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
              <div class="indicator">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  class="h-5 w-5"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="badge badge-sm indicator-item">0</span>
              </div>
            </div>
          </div>
        </div>
        {{-- menu --}}
        <div class="dropdown dropdown-end ml-5">
            <button class="btn btn-square btn-ghost">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  class="inline-block h-5 w-5 stroke-current">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
              </button>
            <ul tabindex="0" class="dropdown-content menu bg-neutral rounded-box z-[1] w-52 p-2 shadow">
              <li><a class="" href="">Profile</a></li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
        
                <li><input type="submit" value="Logout"></li>
               
            </form>
            </ul>
        </div>
    </div>


        {{-- Hero --}}
        <div
            class="hero min-h-screen"
            style="background-image: url(https://img.daisyui.com/images/stock/photo-1507358522600-9f71e620c44e.webp);">
            <div class="hero-overlay bg-opacity-60"></div>
            <div class="hero-content text-neutral-content text-center">
                <div class="max-w-md">
                <h1 class="mb-5 text-5xl font-bold">Hello there</h1>
                <p class="mb-5">
                    Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>
                        {{-- Drawer --}}
                        <div class="drawer justify-center mt-5">
                            <input id="my-drawer" type="checkbox" class="drawer-toggle" />
                            <div class="drawer-content">
                            <!-- Page content here -->
                            <label for="my-drawer" class="btn btn-primary drawer-button">Order Now!</label>
                            </div>
                            <div class="drawer-side">
                            <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                            <ul class="menu bg-base-200 text-base-content min-h-96 w-80 p-4">
                                <!-- Sidebar content here -->
                                <li><a href="{{url('coffee_page')}}" class="text-2xl font-bold ">Coffees</a></li>
                                <li><a href="{{url('snack_page')}}" class="text-2xl font-bold">Snacks</a></li>
                            </ul>
                            </div>
                        </div>
                        {{-- End Drawer --}}
                </div>
            </div>
        </div>
          {{-- End of Hero --}}
        
 


        {{-- For Coffees --}}
    <div class="flex w-full flex-col mt-10 ">
        <div class="card bg-base-300 rounded-box grid h-20 place-items-center text-4xl font-bold mb-5">Available Coffees</div>
        <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
            {{-- Card 1 --}}
            @foreach ($coffees as $coffee)
            <div class="card card-compact bg-base-100 w-72 shadow-xl">
              <figure>
                <img
                  src="items/{{$coffee->image}}"
                  alt="Coffee" />
              </figure>
              <div class="card-body">
                <h2 class="card-title">{{$coffee->productName}}</h2>
                <p>{{$coffee->description}}</p>
                <p>₱ {{$coffee->price}}</p>
                <div class="card-actions justify-end">
                  <button class="btn btn-primary">Buy Now</button>
                </div>
              </div>
          </div> 
            @endforeach
            
        </div>

        <div class="divider"></div>

        {{-- For Snacks --}}
        <div class="card bg-base-300 rounded-box grid h-20 place-items-center text-4xl font-bold mb-5">Available Snacks</div>

        <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
            
          @foreach ($snacks as $snack)
          <div class="card card-compact bg-base-100 w-72 shadow-xl">
            <figure>
              <img
                src="items/{{$snack->image}}"
                alt="Coffee" />
            </figure>
            <div class="card-body">
              <h2 class="card-title">{{$snack->productName}}</h2>
              <p>{{$snack->description}}</p>
              <p>₱ {{$snack->price}}</p>
              <div class="card-actions justify-end">
                <button class="btn btn-primary">Buy Now</button>
              </div>
            </div>
        </div> 
          @endforeach
        </div>
    </div> 
    {{-- footer --}}
    <footer class="footer bg-neutral text-neutral-content items-center p-4">
      <aside class="grid-flow-col items-center">
        <svg
          width="36"
          height="36"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
          fill-rule="evenodd"
          clip-rule="evenodd"
          class="fill-current">
          <path
            d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path>
        </svg>
        <p>Copyright © {{ date('Y') }} - All rights reserved</p>
      </aside>
      <nav class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
        <a>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            class="fill-current">
            <path
              d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
          </svg>
        </a>
        <a>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            class="fill-current">
            <path
              d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
          </svg>
        </a>
        <a>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            class="fill-current">
            <path
              d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
          </svg>
        </a>
      </nav>
    </footer>
    
</body>
</html>