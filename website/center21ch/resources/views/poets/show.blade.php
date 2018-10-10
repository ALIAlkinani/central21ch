@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
@endsection

@section('content')
<div class="container">
<div class="card">              


                <div class="card-body">

              
                    <div class="form-group" >
                    <h5>
                      <span class="badge badge-primary ">First name: {{ $poet->first_name }}</span>
                    </h5>
                   <br>
                     <h5>
                        <span   class="badge badge-primary"> Last name:  {{ $poet->last_name }} </span>
                     </h5>
                   <br>
                        <h5>
                                <span class="badge badge-primary"> nationality : {{ $poet->nationality }}</span>

                        </h5>                     

                        <br>
                 
                      <h5>
                            <span class="badge badge-primary">date of birth: {{ $poet->date_of_death  }} </span>
                      </h5>
                
                      <br>

                      <h5>
                            <span class="badge badge-primary" > date of death: {{ $poet->date_of_death  }}</span>

                      </h5>
                      <br>

                                        <h5>
                                                <span class="badge badge-primary"> language: {{ $poet->mother_language }}</span>
 
                                        </h5>                      
                   
                     </div>

                   


                </div>
            </div>                   
                                       
        </div>
        <flash message="{{ session('flash') }}"></flash>
    </div>

 
@endsection