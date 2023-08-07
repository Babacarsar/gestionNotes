<table class="table table-bordered table-responsive text-center">
    <thead>
    <tr>
        <th rowspan="2">S/N</th>
        <th rowspan="2">MATIERES</th>
        <th rowspan="2">DEVOIR<br>(20)</th>
        <th rowspan="2">COMPOSITION<br>(20)</th>
        <th rowspan="2">MOYENNE<br>(20)</th>
        <th rowspan="2">COEFFICIENT<br>(20)</th>
        <th rowspan="2">MOYENNE x <br>(20)</th>

       


        <th rowspan="2">RANG</th>
        <th rowspan="2">APPRECIATION</th>
        
    </tr>
    </thead>

    <tbody>
    @foreach($subjects as $sub)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sub->name }}</td>
            @foreach($marks->where('subject_id', $sub->id)->where('exam_id', $ex->id) as $mk)
                <td>{{ ($mk->tca) ?: '-' }}</td>
                <td>{{ ($mk->exm) ?: '-' }}</td>
                <td>{{ ($mk->tca2) ?: '-' }}</td>
                <td>{{ ($sub->coefficient) ?: '-' }}</td>
                <td>
                    @if($ex->term === 1) {{ ($mk->tca2) }}
                    @elseif ($ex->term === 2) {{ ($mk->tca2) }}
                    @elseif ($ex->term === 3) {{ ($mk->tca2) }}
                    @else {{ '-' }}
                    @endif
                </td>

                {{--Grade, Subject Position & Remarks--}}
                <td>{{$mk->sub_pos}}</td>
                <td>{{ $mk->grade ? $mk->grade->remark : '-' }}</td>
            @endforeach
        </tr>
    @endforeach
    <tr>
        <td colspan="4"><strong>NOMBRE DE POINTS OBTENUS: </strong> {{ $exr->total }}</td>
        <td colspan="3"><strong>MOYENNE : </strong> {{ $exr->ave }}</td>
        @if($ex->term == 2)
            {{-- Code for the 2nd Term --}}
            <td colspan="4"><strong>MOYENNE GENERALE: </strong> {{ $exr->weighted_average }}</td>
        @endif
    </tr>
    </tbody>
</table>
