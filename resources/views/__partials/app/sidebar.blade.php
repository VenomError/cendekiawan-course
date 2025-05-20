 <!-- ========== Left Sidebar Start ========== -->
 <div class="leftside-menu">

     <!-- Brand Logo Light -->
     <a href="{{ route('dashboard.index') }}" class="logo logo-light">
         <span class="logo-lg">
             <x-img src="logo.png" alt="logo" />
         </span>
         <span class="logo-sm">
             <x-img src="logo.png" alt="small logo" />
         </span>
     </a>

     <!-- Brand Logo Dark -->
     <a href="{{ route('dashboard.index') }}" class="logo logo-dark">
         <span class="logo-lg">
             <x-img src="logo.png" alt="dark logo" />
         </span>
         <span class="logo-sm">
             <x-img src="logo.png" alt="small logo" />
         </span>
     </a>

     <!-- Sidebar Hover Menu Toggle Button -->
     <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
         <i class="ri-checkbox-blank-circle-line align-middle"></i>
     </div>

     <!-- Full Sidebar Menu Close Button -->
     <div class="button-close-fullsidebar">
         <i class="ri-close-fill align-middle"></i>
     </div>

     <!-- Sidebar -->
     <div class="h-100" id="leftside-menu-container" data-simplebar>
         <!-- Leftbar User -->
         <div class="leftbar-user">
             <a href="pages-profile.html">
                 <x-img src="dashboard/assets/images/users/avatar-1.jpg" alt="user-image" height="42"
                     class="rounded-circle shadow-sm" />
                 <span class="leftbar-user-name mt-2">Dominic Keller</span>
             </a>
         </div>

         <!--- Sidemenu -->
         <ul class="side-nav">
             @foreach (config('navigation.dashboard') as $title => $items)
                 <li class="side-nav-title">{{ Str::title($title) }}</li>

                 @foreach ($items as $nav)
                     @hasanyrole($nav['roles'])
                         <li class="side-nav-item">
                             <a href="{{ route($nav['route']) }}" class="side-nav-link">
                                 {!! $nav['icon'] !!}
                                 <span> {{ Str::title($nav['title']) }} </span>
                             </a>
                         </li>
                     @endhasanyrole
                 @endforeach
             @endforeach
         </ul>
         <!--- End Sidemenu -->

         <div class="clearfix"></div>
     </div>
 </div>
 <!-- ========== Left Sidebar End ========== -->
