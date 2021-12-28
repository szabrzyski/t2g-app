 @extends('layouts.app',['aktywneMenu' => "wyswietlacz"])
 @push('js')
     <script src="{{ asset('js/wyswietlacz.js') }}"></script>
 @endpush
 @section('content')
     <div id="wyswietlacz">
         <div class="container-fluid border-bottom">
         </div>
         <div class="container mt-3 mt-md-3 mt-xl-4">
             <div class="row mt-2 mt-md-2 mt-xl-3 gx-4 gy-2">
                 <div class="col-12 col-lg-6 mb-3">
                     <div class="border rounded-top border-start border-end border-bottom rounded-bottom h-100">
                         <form class="mb-0">
                             @csrf
                             <div class="row g-0">
                                 <div class="col-12">
                                     <div class="niebieskie-tlo py-3 rounded-top text-center text-light">Panel sterowania
                                     </div>
                                 </div>
                             </div>
                             <div class="row py-4 px-2 px-sm-4 g-0">
                                 <div class="col-12">
                                     <div class="row text-center">
                                         <div class="col-12">
                                             <input type="text" class="form-control lekko-niebieskie-tlo"
                                                 placeholder="Wpisz liczbę..." v-model="liczbaDoWyswietlenia" maxlength="20" required>
                                         </div>
                                     </div>
                                     <div class="row pt-4">
                                         <div class="col-12">
                                             <button type="button" class="btn btn-success w-100"
                                                 v-on:click="wyswietlLiczbe()">Zatwierdź
                                             </button>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
                 <div class="col-12 col-lg-6 mb-3">
                    <div class="border rounded-top border-start border-end border-bottom rounded-bottom h-100 bg-dark">
                        <form class="mb-0">
                            @csrf
                            <div class="row g-0">
                                <div class="col-12">
                                    <div class="niebieskie-tlo py-3 rounded-top text-center text-light">Wyświetlacz LCD
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-4 py-3 px-2 px-sm-4 g-0">
                                <div class="col-12">
                                    <div class="row text-center">
                                        <div class="col-12">
                                            <iframe class="w-100" height="100" v-bind:src="pelnyAdresWyswietlaczaLcd">Twoja przeglądarka nie obsługuje Iframe</iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
             </div>
         </div>
     </div>
 @endsection
