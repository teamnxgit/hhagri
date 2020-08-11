@php
if (Auth::check()) {
@endphp
    @section('sidebar')
    <div class="p-3 border-bottom border-secondary sidebar-heading">
        <img src="{{asset('images/logo.png')}}" alt="">
    </div>
    <div class="user text-light py-3 border-bottom border-secondary row m-0">
        <div class="col-4 p-0 pl-3">
            <img class="rounded-circle" src="{{asset('images/user.jpg')}}" style="width:50px">
        </div>
        <div class="col-8 p-0">
            <h6 class="display p-0 m-0 pt-1 mt-1">{{Auth::user()->name}}</h6> 
            <div class="pt-0 mt-0 ">
                @php
                if(isset(Auth::user()->roles->first)){
                    echo Auth::user()->roles->first()->name;
                }
                @endphp
                </div>
        </div>
    </div>
    <div class="links border-bottom border-secondary py-3 text-light list-group list-group-flush">
    
        <a href="/dashbaord" class="pl-4 list-group-item list-group-item-action bg-dark text-light"><i class="fa fas fa-tachometer-alt mr-3" aria-hidden="true"></i>Dashboard</a>
        
        @can('Farmer Operator')
            <a href="/farmers" class="pl-4 list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-fw fa-male mr-3" aria-hidden="true"></i>Grower Database</a>
        @endcan
        
        @can('System Admin')
        <a href="/users" class="pl-4 list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-fw fa-user mr-3" aria-hidden="true"></i>User Accounts</a>
        @endcan

        <a href="/system" class="pl-4 list-group-item list-group-item-action bg-dark text-light"><i class="fa fa-fw fa-cog mr-3" aria-hidden="true"></i>System</a>
    </div>
    <div>
        <p class="p-2 text-center text-secondary" style="font-size:0.75rem">
            nxlab
        </p>
    </div>
@php
}
@endphp
