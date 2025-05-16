 @props([
    'title',
    'count',
    'icon' => 'ri-account-boc-line',
    'color' => 'primary'
 ])
 <div class="card widget-flat">
     <div class="card-body">
         <div class="float-end   ">
             <i class="{{ $icon }} rounded-circle bg-{{ $color }} p-2 text-white  " style="font-size: 20px"></i>
         </div>
         <h5 class="text-muted fw-normal mt-0 text-capitalize " title="Number of Customers">
             {{ $title }}
         </h5>
         <h3 class="mb-3 mt-3">{{ $count }}</h3>
     </div> <!-- end card-body-->
 </div> <!-- end card-->
