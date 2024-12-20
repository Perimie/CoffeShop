<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @vite('resources/css/app.css')
    
    <title>Admin Dashboard</title>
</head>
<body class="flex flex-col h-screen">
    <!-- Navbar -->
    <div class="navbar bg-neutral">
        <div class="flex-1">
            <a class="text-2xl font-bold text-base-100">Admin Dashboard</a>

        </div>
        <div class="dropdown dropdown-end ">
            <div tabindex="0" role="button" class="btn m-1  ">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    class="inline-block h-5 w-5 stroke-current">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                </svg>
            </div>
            <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
              <li><a>Profile</a></li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
        
                <li><input type="submit" value="Logout"></li>
               
            </form>
            </ul>
          </div>

        
    </div>
    <!-- Main Content -->
    <div class="flex flex-1">
        <!-- Drawer -->
        <div class="drawer lg:drawer-open w-80">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content flex flex-col items-center justify-center">
                <!-- Page content here -->
                <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">
                    Open drawer
                </label>
            </div>
            <div class="drawer-side bg-base-200">
                <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu text-base-content min-h-full w-80 p-4">
                    <!-- Sidebar content -->
                    <li><a href="{{ route('home') }}" 
                        class="text-xl font-bold">
                        Home
                     </a></li>
                   
                    <li><a href="{{ route('products') }}" 
                        class="text-xl font-bold">Coffees</a></li>
                        <li><a href="{{ route('snacks') }}" 
                            class="text-xl font-bold {{ request()->routeIs('snacks') ? 'bg-neutral text-base-100' : '' }}" class="text-xl font-bold">Snacks</a></li>
                    <li><a class="text-xl font-bold">Orders</a></li>
                </ul>
            </div>
        </div>




        <!-- Start Dashboard Section -->
        <div class="flex-1 bg-base-300">
            

            <div class="overflow-x-auto m-8">

                <button class="btn btn-success mb-5 float-right " onclick="openModal('my_modal_1')">Add Snacks</button>
                {{-- Modal --}}
                <dialog id="my_modal_1" class="modal">
                    <div class="modal-box">
                        <form action="{{url('add_snacks')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col mb-2">
                                <label class="mb-2 text-lg font-bold" for="productName">Product Name:</label>
                                <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" id="productName"
                                 name="productName" required>
                            </div>

                            <div class="flex flex-col mb-2">
                                <label class="mb-2 text-lg font-bold" for="text-description">Description:</label>
                                <textarea placeholder="Type here" name="description" class="textarea textarea-bordered textarea-xs w-full max-w-xs" id="text-description" rows="3" required></textarea>
                            </div>

                            <div class="flex flex-col mb-2">
                                <label class="mb-2 text-lg font-bold" for="price">Price</label>
                                <input type="number" placeholder="Type here" class="input input-bordered w-full max-w-xs" id="price"
                                 name="price" required>
                            </div>

                            <div class="flex flex-col mb-2">
                                <div class="input-group-prepend mb-2 text-lg font-bold">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Size</span>
                                </div>

                                <select required name="size" class="select select-bordered w-full max-w-xs">

                                    <option disabled selected>Sizing</option>
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>
                                </select>
                            </div>

                            <div class="flex flex-col mb-2">
                                <div class="input-group-prepend mb-2 text-lg font-bold">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Product Image</span>
                                </div>
                                <input name="image" type="file" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default"  >
                            </div>
                            <button type="submit" class="btn btn-success w-28 float-left ">Save</button>
                        </form>
                        
                          <button class="btn btn-error float-right" onclick="closeModal('my_modal_1')">Close</button>
                      
                    </div>
                  </dialog>


                <table class="table">
                    <!-- head -->
                    <thead>
                      <tr class="bg-neutral">
                        
                        <th class="text-lg font-bold text-base-100" text-base-100>Product Name</th>
                        <th class="text-lg font-bold text-base-100" text-base-100>Price</th>
                        <th class="text-lg font-bold text-base-100" text-base-100>Size</th>
                        <th class="text-lg font-bold text-base-100" text-base-100>Image</th>
                        <th class="text-lg text-base-100">Edit</th>
                        <th class="text-lg text-base-100">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- row -->
                      @foreach ($snacks as $snack)
                      <tr>
                        <td>{{$snack->productName}}</td>
                        <td>₱ {{$snack->price}}</td>
                        <td>{{$snack->size}}</td>
                        <td><img style="height: 60px" src="items/{{$snack->image}}" alt="product image"></td>
                        
                        <!-- Button -->
                        <td>                          
                          <button 
                          class="btn btn-success" 
                          onclick="openEditModalSnack({{ $snack->id }}, '{{ $snack->productName }}', '{{ $snack->description }}', {{ $snack->price }}, '{{ $snack->size }}', '{{ $snack->image }}')">
                          Edit
                        </button>
                        </td>
                        <td>
                            <a href="{{url('delete_snack',$snack->id)}}" onclick="confirm(event)" class="btn btn-error">Delete</a>
                        </td>
                      </tr>
                      @endforeach
    
                    </tbody>
                  </table>
            </div>

            <dialog id="my_modal_5" class="modal">
              <div class="modal-box">
                  <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2" onclick="closeModal('my_modal_5')">✕</button>
                  <form id="editProductForm" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="flex flex-col mb-2">
                          <label class="mb-2 text-lg font-bold" for="productName">Product Name:</label>
                          <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" id="editProductName" name="productName" required>
                      </div>
                      <div class="flex flex-col mb-2">
                          <label class="mb-2 text-lg font-bold" for="text-description">Description:</label>
                          <textarea placeholder="Type here" name="description" class="textarea textarea-bordered textarea-xs w-full max-w-xs" id="editDescription" rows="3" required></textarea>
                      </div>
                      <div class="flex flex-col mb-2">
                          <label class="mb-2 text-lg font-bold" for="price">Price</label>
                          <input type="number" placeholder="Type here" class="input input-bordered w-full max-w-xs" id="editPrice" name="price" required>
                      </div>
                      <div class="flex flex-col mb-2">
                          <div class="input-group-prepend mb-2 text-lg font-bold">
                              <span class="input-group-text">Size</span>
                          </div>
                          <select required name="size" class="select select-bordered w-full max-w-xs" id="editSize">
                              <option disabled>Sizing</option>
                              <option value="Small">Small</option>
                              <option value="Medium">Medium</option>
                              <option value="Large">Large</option>
                          </select>
                      </div>
                      <div class="flex flex-col mb-2">
                          <div class="input-group-prepend mb-2 text-lg font-bold">
                              <span class="input-group-text">Product Image</span>
                          </div>
                          <input name="image" type="file" class="form-control">
                      </div>
                      <button type="submit" class="btn btn-success w-28 float-left">Save</button>
                  </form>
              </div>
          </dialog>
            

        </div>
        <!-- end Dashboard Section -->




    </div>

    <!-- Footer -->
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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  function openEditModalSnack(id, name, description, price, size, image) {

     // Show modal
     document.getElementById('my_modal_5').showModal();
      // Populate form inputs
      document.getElementById('editProductName').value = name;
      document.getElementById('editDescription').value = description;
      document.getElementById('editPrice').value = price;
      document.getElementById('editSize').value = size;

      // Update form action to include the product ID
      document.getElementById('editProductForm').action = `/update_snack/${id}`;

     
  }
</script>


{{-- Closing the modal --}}
 <script>
    function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.close();
    } else {
        console.error('Modal not found:', modalId);
    }
}
  </script>

<script>
  function confirm(event) {
      event.preventDefault();

      var hrefAtt = event.currentTarget.getAttribute('href');
      Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = hrefAtt;
          }
      });
  }
  </script>




</html>
