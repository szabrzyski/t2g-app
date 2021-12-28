 @extends('layouts.app',['aktywneMenu' => "wygraneLosy"])
 @section('content')
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
                                 <div class="niebieskie-tlo py-3 rounded-top text-center text-light">Zapytanie SQL
                                 </div>
                             </div>
                         </div>
                         <div class="row py-4 px-2 px-sm-4 g-0">
                             <div class="col-12">
                                 <div class="row text-center">
                                     <div class="col-12 text-start">
                                         <p><b>SELECT</b> t.id <b>AS</b> 'ID losu'<br>
                                             <b>FROM</b> tickets t<br>
                                             <b>LEFT JOIN</b> draws d <b>ON</b> d.id = t.draw_id<br>
                                             <b>LEFT JOIN</b> lotteries l <b>ON</b> l.id = d.lottery_id<br>
                                             <b>WHERE</b> l.name = 'GG World X' <b>AND</b> t.number = d.won_number
                                         </p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="col-12 col-lg-6 mb-3">
                 <div class="border rounded-top border-start border-end border-bottom rounded-bottom h-100">
                     <form class="mb-0">
                         @csrf
                         <div class="row g-0">
                             <div class="col-12">
                                 <div class="niebieskie-tlo py-3 rounded-top text-center text-light">Wynik zapytania
                                 </div>
                             </div>
                         </div>
                         <div class="row pt-4 py-3 px-2 px-sm-4 g-0">
                             <div class="col-12">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ID losu</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>12</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>14</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">3</th>
                                        <td>17</td>
                                      </tr>
                                    </tbody>
                                  </table>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 @endsection
