@include('layout.sidebar')

<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> Trips
    </h3>
    <a href="{{ route('cargo.new') }}"> Add Cargo</a>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"> Trips list</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th> Company </th>
                                <th> Route </th>
                                <th>Status </th>
                                <th> Trip start </th>
                                <th> departs </th>
                                <th> arrive </th>
                                <th> Estimated </th>
                                <th> tickets </th>
                                <th> Controls </th>
                                <th> <input type="text" placeholder="Search"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cargos as $cargo)
                                @php
                                    $capacity = App\Models\Bus::where('id', $cargo->bus_id)->value('capacity');
                                    $tickets = App\Models\Ticket::where('trip_id', $cargo->id)->get();
                                @endphp

                                <tr>
                                    <td>
                                        <img src="{{ Storage::url(App\Models\Company::where('id', $cargo->company_id)->value('logo')) }}"
                                            class="me-2" alt="image">
                                        {{ App\Models\Company::where('id', $cargo->company_id)->value('name') }}
                                    </td>
                                    <td>{{ App\Models\Location::where('id', $cargo->location_id)->value('location') }} --
                                        {{ App\Models\Location::where('id', $cargo->destination_id)->value('location') }}
                                    </td>
                                    <td>
                                        <label class="badge badge-gradient-success">{{ $cargo->status }}</label>
                                    </td>
                                    <td> {{ $cargo->start_date }}</td>
                                    <td> {{ \Carbon\Carbon::parse($cargo->depart)->format('h:i') }}</td>
                                    <td> {{ \Carbon\Carbon::parse($cargo->arrive)->format('h:i') }}</td>
                                    <td> {{ $cargo->estimated_date }}</td>
                                    <td>
                                        @if ($tickets->count() > 0)
                                            {{ $loop->index + 1 }}/{{ $capacity }}
                                        @else
                                            0/{{ $capacity }}
                                        @endif
                                    </td>
                                    <td>
                                        <i class="fa fa-eye"></i>
                                        <a href="{{ route('trip.edit.view', $cargo->id) }}"> <i class="fa fa-edit"></i></a>
                                        <a href="{{ route('trip.delete', $cargo->id) }}"> <i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layout.footer')
