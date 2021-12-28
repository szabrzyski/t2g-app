@extends('layouts.app',['aktywneMenu' => "statystykaZarobkow"])
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
                                        <p><b>SELECT</b> l.name <b>AS</b> 'nazwa loterii',<br>
                                            <b>SUM</b>(l.ticket_price) <b>AS</b> 'przychod',<br>
                                            <b>SUM</b>(l.ticket_price) - <b>SUM</b>(<br>
                                            &nbsp&nbsp&nbsp&nbsp<b>CASE</b><br>
                                            &nbsp&nbsp&nbsp&nbsp<b>WHEN</b> t.bought_date > d.draw_date <b>THEN</b> l.ticket_price<br>
                                            &nbsp&nbsp&nbsp&nbsp<b>ELSE</b> 0<br>
                                            &nbsp&nbsp&nbsp&nbsp<b>END</b><br>
                                            &nbsp&nbsp&nbsp&nbsp) <b>AS</b> 'zysk'<br>
                                            <b>FROM</b> lotteries l<br>
                                            <b>LEFT JOIN</b> draws d <b>ON</b> d.lottery_id = l.id<br>
                                            <b>LEFT JOIN</b> tickets t <b>ON</b> t.draw_id = d.id <br>
                                            <b>WHERE</b> month(d.draw_date) = 7<br>
                                            <b>GROUP BY</b> l.id

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
                                            <th scope="col">nazwa loterii</th>
                                            <th scope="col">przychód</th>
                                            <th scope="col">zysk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>GG World Million</td>
                                            <td>31.47</td>
                                            <td>20.98</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>GG World X</td>
                                            <td>64.95</td>
                                            <td>25.98</td>
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
