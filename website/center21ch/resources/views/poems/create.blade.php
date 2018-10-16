@extends('layouts.app')
@section('head')
<script src='https://www.google.com/recaptcha/api.js'></script>
    
@endsection

@section('content')
<div class="container">

  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">               

                <div class="card-header"> 
                    Create Poem
                      </div>

                <div class="card-body">

                <form action="/poems" method="post">

                    @csrf
                    <div class="form-group">
                      <label for="channel_id">Choose a channel:</label>
                      <select class="form-control" name="channel_id" id="channel_id">
                          <option value=""></option>
                          @foreach ($channels as $channel )

                        <option value="{{ $channel->id }}"{{ old('channel_id') == $channel->id ?'selected': '' }}>{{ $channel->name }}</option>
                            
                        @endforeach
                        
                      </select>
                    </div>
                    <div class="form-group">
                            <label for="language">Choose a language:</label>
                      
                            <select  class="form-control" name="language" v-model="language" data-placeholder="Choose a Language...">
                                    <option value="Afrikanns">Afrikanns</option>
                                    <option value="Albanian">Albanian</option>
                                    <option value="Arabic">Arabic</option>
                                    <option value="Armenian">Armenian</option>
                                    <option value="Basque">Basque</option>
                                    <option value="Bengali">Bengali</option>
                                    <option value="Bulgarian">Bulgarian</option>
                                    <option value="Catalan">Catalan</option>
                                    <option value="Cambodian">Cambodian</option>
                                    <option value="Chinese_Mandarin">Chinese (Mandarin)</option>
                                    <option value="Croation">Croation</option>
                                    <option value="Czech">Czech</option>
                                    <option value="Danish">Danish</option>
                                    <option value="Dutch">Dutch</option>
                                    <option value="English">English</option>
                                    <option value="Estonian">Estonian</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finnish">Finnish</option>
                                    <option value="French">French</option>
                                    <option value="Georgian">Georgian</option>
                                    <option value="German">German</option>
                                    <option value="Greek">Greek</option>
                                    <option value="Gujarati">Gujarati</option>
                                    <option value="Hebrew">Hebrew</option>
                                    <option value="Hindi">Hindi</option>
                                    <option value="Hungarian">Hungarian</option>
                                    <option value="Icelandic">Icelandic</option>
                                    <option value="Indonesian">Indonesian</option>
                                    <option value="Irish">Irish</option>
                                    <option value="Italian">Italian</option>
                                    <option value="Japanese">Japanese</option>
                                    <option value="Javanese">Javanese</option>
                                    <option value="Korean">Korean</option>
                                    <option value="Latin">Latin</option>
                                    <option value="Latvian">Latvian</option>
                                    <option value="Lithuanian">Lithuanian</option>
                                    <option value="Macedonian">Macedonian</option>
                                    <option value="Malay">Malay</option>
                                    <option value="Malayalam">Malayalam</option>
                                    <option value="Maltese">Maltese</option>
                                    <option value="Maori">Maori</option>
                                    <option value="Marathi">Marathi</option>
                                    <option value="Mongolian">Mongolian</option>
                                    <option value="Nepali">Nepali</option>
                                    <option value="Norwegian">Norwegian</option>
                                    <option value="Persian">Persian</option>
                                    <option value="Polish">Polish</option>
                                    <option value="Portuguese">Portuguese</option>
                                    <option value="Punjabi">Punjabi</option>
                                    <option value="Quechua">Quechua</option>
                                    <option value="Romanian">Romanian</option>
                                    <option value="Russian">Russian</option>
                                    <option value="Samoan">Samoan</option>
                                    <option value="Serbian">Serbian</option>
                                    <option value="Slovak">Slovak</option>
                                    <option value="Slovenian">Slovenian</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="Swahili">Swahili</option>
                                    <option value="Swedish ">Swedish </option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="Tatar">Tatar</option>
                                    <option value="Telugu">Telugu</option>
                                    <option value="Thai">Thai</option>
                                    <option value="Tibetan">Tibetan</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Turkish">Turkish</option>
                                    <option value="Ukranian">Ukranian</option>
                                    <option value="Urdu">Urdu</option>
                                    <option value="Uzbek">Uzbek</option>
                                    <option value="Vietnamese">Vietnamese</option>
                                    <option value="Welsh">Welsh</option>
                                    <option value="Xhosa">Xhosa</option>
                           
                            </select>
                           
                    </div>
                    

                    <div class="form-group">
                        <label for="poet_id">Choose a Arthur:</label>
                        <select class="form-control selectpicker" name="poet_id" id="poet_id" >
                                <option>Select...</option>
                            @foreach ($poets as $poet)
                          
                          <option  value="{{ $poet->id }}"{{ old('poet_id') == $poet->id ?'selected': '' }} > {{ $poet->first_name }} &nbsp {{ $poet->last_name }}</option>
                              
                          @endforeach
                          
                        </select>
                       
                       
                            
                        
                      
                      </div>
                    <div class="form-group">
                      <label > Title</label>
                      <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" aria-describedby="helpId" required>
                      <small id="helpId" class="text-muted">Write the name of the poem here.</small>
                    </div>
                    <div class="form-group">
                      <label >Body</label>
                      <wysiwyg name="body"></wysiwyg>
                    </div>

                    <div class="form-group">
                           
                            <read-map></read-map>
                </div>

                    <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LfSYm4UAAAAAFGTRnQ06B_JVK3YfUbBN8LxtBIJ"></div>
                    </div>
                    

                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    <hr>
                  
                    @include('layouts.errors')
                
                
                </form>


                </div>
            </div>                   
                                       
        </div>
    </div>

    <br>
         
</div>



</div>
@endsection
