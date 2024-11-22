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
          <a class="btn btn-ghost text-xl">Mariela's Coffee Shop</a>
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
                                <li><a class="text-2xl font-bold ">Coffees</a></li>
                                <li><a class="text-2xl font-bold">Snacks</a></li>
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
        <div class=" flex justify-between columns-4 px-4">
            {{-- Card 1 --}}
            <div class="card card-compact bg-base-100 w-72 shadow-xl">
                <figure>
                  <img
                    src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                    alt="Shoes" />
                </figure>
                <div class="card-body">
                  <h2 class="card-title">Shoes!</h2>
                  <p>If a dog chews shoes whose shoes does he choose?</p>
                  <div class="card-actions justify-end">
                    <button class="btn btn-primary">Buy Now</button>
                  </div>
                </div>
            </div> 
        </div>

        <div class="divider"></div>

        {{-- For Snacks --}}
        <div class="card bg-base-300 rounded-box grid h-20 place-items-center text-4xl font-bold mb-5">Available Snacks</div>

        <div class=" flex justify-between columns-4 px-4">
            
            <div class="card card-compact bg-base-100 w-72 shadow-xl">
                <figure>
                  <img
                    src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                    alt="Shoes" />
                </figure>
                <div class="card-body">
                  <h2 class="card-title">Shoes!</h2>
                  <p>If a dog chews shoes whose shoes does he choose?</p>
                  <div class="card-actions justify-end">
                    <button class="btn btn-primary">Buy Now</button>
                  </div>
                </div>
            </div>
        </div>
    </div> 
    
</body>
</html>